<?php

class Auth extends Controller
{

  public $data = array();
  public $model_home;



  public function __construct()
  {
    # code...
    if (!empty($_SESSION['access_token'])) {
      header('location: ' . BASE_URL(''));
    }

    $this->data['type'] = 'auth';

    $this->model_home = $this->model('AuthModel');
    $this->data = array_merge($this->data, $this->model_home->data);
  }

  public function login()
  {
    # code...
    $this->model_home->login();
    $this->data['content'] = 'auth/login';
    $this->data['page_title'] = 'Đăng nhập';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/auth', $this->data);
  }

  public function logout()
  {
    # code...
    $this->model_home->client->revokeToken();
    unset($_SESSION['access_token']);
    unset($_SESSION['user_data']);
    header('location: ' . BASE_URL(''));
  }
}
