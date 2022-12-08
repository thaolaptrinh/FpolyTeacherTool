

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time1 = date("YmdHis", time() - 60 * 60 * 24 * 1) . '00';
$time2 = date("YmdHis") . '00';
$todate = date("d/m/Y");
require_once '../configs/Database.php';
require_once '../configs/Function.php';



$site_status = $DB->settings('site_status');


if (isset($site_status) && $site_status == 2) {



  $taikhoanmb = 'thao77tv'; // tài khoản đăng nhập mbbank của bạn tại https://online.mbbank.com.vn
  $deviceIdCommon = 'ypfs6nbl-mbib-0000-0000-2022120708485090'; // thay cái thông số mà bạn lấy đc từ F12 vào đây 
  $sessionId = '0fdedef2-36fc-424e-ba0d-6c58e916b288'; // thay cái thông số mà bạn lấy đc từ F12 vào
  $sotaikhoanmb = '0010142787305';


  $url = 'https://online.mbbank.com.vn/retail_web/common/getTransactionHistory';
  $data = array(
    "accountNo" => "$sotaikhoanmb", "deviceIdCommon" => "$deviceIdCommon", "fromDate" =>
    "$todate", "historyNumber" => "", "historyType" => "DATE_RANGE", "refNo" => "$taikhoanmb-$time2",
    "sessionId" =>  "$sessionId", "toDate" =>  "$todate", "type" => "ACCOUNT"
  );

  $postdata = json_encode($data);

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json, text/plain, */*',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: vi-US,vi;q=0.9',
    'Authorization: Basic QURNSU46QURNSU4=',
    'Connection: keep-alive',
    'Host: online.mbbank.com.vn',
    'Origin: https://online.mbbank.com.vn',
    'Referer: https://online.mbbank.com.vn/information-account/source-account',
    'sec-ch-ua: "Google Chrome";v="105", "Not)A;Brand";v="8", "Chromium";v="105"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36',
  ));
  $result = curl_exec($ch);
  curl_close($ch);


  print_r($result);

  $data = json_decode($result, true);


  $i = 0;

  $historys = $data['transactionHistoryList'];


  if (!empty($historys) && is_array($historys)) {


    foreach ($historys as $history) {

      $creditAmount = $history['creditAmount'];
      $description =  $history['description'];
      $refNo = stripslashes($history['refNo']);



      $check_teacher = $DB->get_row("SELECT * FROM `teachers` WHERE code_donate  = '$description' ");

      if ($check_teacher) {
        $check_ungho = $DB->num_rows("SELECT * FROM `ung_ho` WHERE refNo = '$refNo'");


        if ($check_ungho == 0) {

          $creditAmount = str_replace(',', '', $creditAmount);
          $id_teacher = $check_teacher['id_teacher'];

          $get = [
            'creditAmount' => $creditAmount,
            'description' =>  $description,
            'refNo' =>  $refNo,
            'id_teacher' => $id_teacher,
          ];


          $result = array_filter($get, "myFilter");

          if (!$result) {
            $create = $DB->insert('ung_ho', $get);
          }
        }
      }
    }
  }
} else {
  if (file_exists('../app/views/error/503.php')) {
    require_once '../app/views/error/503.php';
    die();
  }
}
