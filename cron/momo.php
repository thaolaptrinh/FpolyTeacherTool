<?php
require_once '../configs/Database.php';
require_once '../configs/Function.php';

function curl_get_api_dailysieure($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);

  curl_close($ch);
  return $data;
}

$apikey = '8dad37ee368e28d9993c7da38a36a09929ca7370e0540145c419fee98340b821';
$urlapi = 'https://api.dailysieure.com/api-momo?api=2&apikey=' . $apikey;
$ketquacurl = curl_get_api_dailysieure($urlapi);
$ketqua = json_decode($ketquacurl, true);
if ($ketqua['status'] == '1') {
  echo $ketqua['msg'];
} else {
  $checkGD = @json_decode($ketquacurl)->tranList;
  if ($checkGD == null) {
    echo 'Không có lịch sử gd nào gần đây hoặc bị block check giao dịch vài phút';
  } else {
    foreach (array_reverse($checkGD) as $struct) {

      if (!$DB->get_row("SELECT * FROM `ung_ho` WHERE tranId = $struct->tranId  ORDER BY id DESC")) {
        $json_data =  json_encode([
          $struct
        ]);

        $by_teacher = $DB->get_row("SELECT * FROM `teachers` WHERE code_donate = $struct->comment ");
        if ($by_teacher) {
          $id_teacher = $by_teacher['id_teacher'];
        }

        $DB->insert("ung_ho", ['tranId' => $struct->tranId, 'id_teacher' => $id_teacher, 'data' =>  $json_data]);
      }
    }
  }
}
