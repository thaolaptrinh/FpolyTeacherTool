<?php

class AdminModel extends Model
{
  public $data = array();



  public function __construct()
  {
    # code...
    $this->data = [
      "co_so" => $this->get_list("SELECT * FROM `co_so` ORDER  BY id_coso  DESC"),
      'site_status' => $this->settings('site_status'),
    ];

    if (isset($_POST['toggle_status'])) {
      $site_status = $this->get_row("SELECT site_status FROM `settings`")['site_status'];

      $toggle_status = ($site_status == 2 ? 1 : 2);

      $update = $this->update_value("settings", ['site_status' => $toggle_status], '1');

      if ($update) {
        $response['status'] = true;
        $response['message'] = 'Bạn thay đổi dữ liệu thành công!';
        die(json_encode($response));
      }
    }
  }


  public function index()
  {
    # code...
    $this->data = [
      'teacher' => [
        'total' => $this->num_rows("SELECT * FROM `teachers`"),
        'active' => $this->num_rows("SELECT * FROM `teachers` WHERE status = 2"),
        'now' => $this->num_rows("SELECT * FROM `teachers` WHERE DATE_FORMAT(`register_date`, '%Y-%m-%d')  = CURDATE()")
      ]
    ];
  }

  // quản lý


  public function site()
  {
    # code...

    $this->data['site'] = $this->get_row("SELECT * FROM `settings` LIMIT 1");

    if (isset($_POST['is_change'])) {

      $data_post = [
        'site_title' => check_string($_POST['site_title']),
        'site_name' => check_string($_POST['site_name']),
        'site_keywords' => check_string($_POST['site_keywords']),
        'site_description' => check_string($_POST['site_description']),
        'smtp_user' => check_string($_POST['smtp_user']),
        'smtp_pass' => check_string($_POST['smtp_pass']),
        'smtp_port' => check_string($_POST['smtp_port']),
        'smtp_server' => check_string($_POST['smtp_server']),
        'smtp_protocol' => check_string($_POST['smtp_protocol']),
      ];

      $update = $this->update_item("settings", $data_post, "1");

      if ($update) {
        $response['status'] = true;
        $response['message'] = 'Bạn thay đổi dữ liệu thành công!';
        die(json_encode($response));
      }
    }
  }

  public function co_so()
  {
    # code...
    if (isset($_POST['is_detail'])) {
      $this->get_item(
        "SELECT * FROM `co_so` WHERE id_coso = '" . $_POST['id'] . "'"
      );
    } elseif (isset($_POST['is_update'])) {
      $data_post = [
        'value' => check_string($_POST['value_update']),
        'ten_coso' => check_string($_POST['ten_coso_update']),
      ];
      $this->update_item(
        "co_so",
        $data_post,
        "id_coso = '" . $_POST['id'] . "'",

      );
    } elseif (isset($_POST['is_add'])) {
      $data_insert = [
        'value' => check_string($_POST['value']),
        'ten_coso' => check_string($_POST['ten_coso']),
      ];


      $this->add_item(
        "co_so",
        $data_insert,

      );
    } elseif (isset($_POST['is_delete'])) {
      $this->delete_item(
        'co_so',
        "id_coso = '" . $_POST['id'] . "'"
      );
    }
  }

  public function teachers()
  {
    # code...
    $this->data = [
      'teachers' => $this->get_list("SELECT * FROM `teachers` INNER JOIN co_so ON teachers.id_coso = co_so.id_coso ORDER BY teachers.id_teacher  DESC"),
    ];

    if (isset($_GET['cs'])) {
      $this->data = [
        'teachers' => $this->get_list("SELECT * FROM `teachers` 
        INNER JOIN co_so ON teachers.id_coso = co_so.id_coso 
        WHERE co_so.id_coso = '" . $_GET['cs'] . "'
         ORDER BY teachers.id_teacher  DESC"),
      ];
    }


    if (isset($_POST['is_delete'])) {
      $id = $_POST['id'];
      $result =  $this->remove('teachers', "id_teacher = '$id'");
      if ($result) {
        $response['status'] = true;
        $response['message'] = 'Bạn đã xóa thành công dữ liệu';
        die(json_encode($response));
      }
    }

    if (isset($_POST['is_active'])) {
      $id = $_POST['id'];
      $status = $this->get_row("SELECT status FROM `teachers` WHERE id_teacher = $id")['status'];
      $status_toggle = ($status == 2 ? 1 : 2);
      $result =  $this->update_value('teachers', ['status' => $status_toggle], "id_teacher = '$id'");

      if ($result) {
        $response['status'] = true;
        $response['message'] = 'Bạn thay đổi dữ liệu thành công!';
        die(json_encode($response));
      }
    }
  }
}
