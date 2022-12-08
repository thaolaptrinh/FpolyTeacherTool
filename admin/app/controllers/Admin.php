<?php

class Admin extends Controller
{

  public $data = array();
  public $model_home;



  public function __construct()
  {
    # code...
    if (empty($_SESSION['access_token']) || !isset($_SESSION['access_token'])) {
      header('Location: ' . BASE_URL('auth/login'));
      exit();
    }
    $this->data['type'] = 'admin';
    $this->model_home = $this->model('AdminModel');
    $this->data = array_merge($this->data, $this->model_home->data);
  }

  public function index()
  {
    # code...

    $this->model_home->index();
    $this->data['page_title'] = 'Trang chủ';
    $this->data['content'] = 'admin/index';
    $this->data['page_target'] = 'index';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/admin', $this->data);
  }

  public function site()
  {
    # code...

    $this->model_home->site();
    $this->data['page_title'] = 'Hệ thống';
    $this->data['content'] = 'admin/manager/site';
    $this->data['page_target'] = 'site';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/admin', $this->data);
  }

  public function co_so()
  {
    # code...

    $this->model_home->co_so();
    $this->data['page_title'] = 'Cơ sở';
    $this->data['content'] = 'admin/manager/co_so';
    $this->data['page_target'] = 'co_so';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/admin', $this->data);
  }

  public function teachers()
  {
    # code...

    $this->model_home->teachers();
    $this->data['page_title'] = 'Giáo viên';
    $this->data['content'] = 'admin/teacher';
    $this->data['page_target'] = 'teacher';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/admin', $this->data);
  }
}
