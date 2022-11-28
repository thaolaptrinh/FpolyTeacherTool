<?php

class AuthModel extends Model
{
  public $data = array();



  public function __construct()
  {
    # code...
    $this->data = [
      'coso' => $this->get_list("SELECT * FROM `co_so` ")
    ];
  }

  public function login()
  {
    # code...



    if (isset($_POST['email'])) {

      $data = [
        'email' => check_string($_POST['email']),
        'password' => check_string($_POST['password']),
      ];

      $result = array_filter($data, 'myFilter');
      if (!$result) {

        if (!$this->get_row("SELECT * FROM `teachers` WHERE email = '" . $data['email'] . "'")) {
          $response['status'] = false;
          $response['message']  = 'Không tồn tại email này trong hệ thống!';
          die(json_encode($response));
        } elseif (!$this->get_row("SELECT * FROM `teachers` WHERE email = '" . $data['email'] . "' AND password = '" . typepass($data['password']) . "'")) {
          $response['status'] = false;
          $response['message']  = 'Mật khẩu không chính xác!';
          die(json_encode($response));
        } else {
          $response['status'] = true;
          $response['message']  = 'Bạn đã đăng nhập thành công!';
          $_SESSION['email'] = $data['email'];
          die(json_encode($response));
        }
      } else {
        $response['status'] = false;
        $response['message']  = 'Không được bỏ trống các trường dữ liệu!';
        die(json_encode($response));
      }
    }
  }


  public function register()
  {
    # code...

    if (isset($_POST['email'])) {


      // 'name' => check_string($_POST['name']),
      $data = [
        'coso' => $_POST['coso'],
        'email' => check_string($_POST['email']),
        'password' => check_string($_POST['password']),
        'confirm_password' => check_string($_POST['confirm-password']),
      ];


      $result = array_filter($data, 'myFilter');
      if (!$result) {
        if (!check_email($data['email'])) {
          $response['status'] = false;
          $response['message']  = 'Định dạng email không hợp lệ!';
          die(json_encode($response));
        } elseif ($this->get_row("SELECT * FROM `teachers` WHERE email = '" . $data['email'] . "'")) {
          $response['status'] = false;
          $response['message']  = 'Email này đã tồn tại trong hệ thống!';
          die(json_encode($response));
        } elseif (count_string($data['password']) < 8) {
          $response['status'] = false;
          $response['message']  = 'Vui lòng điền mật khẩu từ 8 ký tự trở lên!';
          die(json_encode($response));
        } else {
          $data_insert = [
            'email' => $data['email'],
            'password' => typepass($data['password']),
            'id_coso' =>  $data['coso'],
          ];
          $insert = $this->insert('teachers', $data_insert);
          if ($insert) {
            $response['status'] = true;
            $response['message'] = 'Đăng ký thành công!';
            die(json_encode($response));
          } else {
            $response['status'] = false;
            $response['message']  = 'Đăng ký tài khoản thất bại!';
            die(json_encode($response));
          }
        }
      } else {
        $response['status'] = false;
        $response['message']  = 'Không được bỏ trống các ô dữ liệu';
        die(json_encode($response));
      }
    }
  }

  public function resetpass()
  {
    # code...
  }
}
