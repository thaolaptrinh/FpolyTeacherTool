<?php
session_start();
require_once '../configs/Database.php';
require_once '../configs/Function.php';
$id_teacher  = $DB->getInfoTeacher('id_teacher');

$historys = $DB->get_list("SELECT * FROM  `ung_ho` WHERE id_teacher = $id_teacher AND  isAlert = 1  ORDER BY id DESC");

if (isset($_POST['is_donate'])) {
  if (!empty($historys)) {
    $total = 0;
    foreach ($historys as $row) {
      $data_donate = json_decode($row['data'], true);
      $update_alert = $DB->update_value('ung_ho', ['isAlert' => 2], "id = {$row['id']}");
      if ($update_alert) {
        if (isset($data_donate['amount'])) {
          $total += $data_donate['amount'];
        }
      }
    }
    $response['status'] = true;
    $response['message'] = 'Cảm ơn bạn đã ủng hộ ' . number_format($total, 0, '.', ',') . ' đ';
    die(json_encode($response));
  } else {
    $response['status'] = false;
    die(json_encode($response));
  }
}
