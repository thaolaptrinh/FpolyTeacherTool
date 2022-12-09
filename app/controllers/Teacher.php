<?php

class Teacher extends  Controller
{

  public $data = array();
  public $model_home;



  public function __construct()
  {
    # code...
    $this->model_home = $this->model('TeacherModel');

    if (!isset($_SESSION['email'])) {
      header('Location: ' . BASE_URL('auth/login'));
      exit();
    } else {
      if ($this->model_home->getInfoTeacher('status') != 2) {
        error('deactivated');
        die();
      }
    }

    $this->data['type'] = 'teacher';
    $this->data['page_parent'] = 'teacher';
    $this->data['page_target'] = 'teacher';
    $this->data = array_merge($this->data, $this->model_home->data);
  }

  public function index()
  {
    # code...

    $this->data['page_title'] = 'Trang chủ';
    $this->data['content'] = 'teacher/index';
    $this->data['page_target'] = 'index';
    $this->model_home->index();
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }


  // Danh mục

  public function khoa_hoc()
  {
    # code...
    $this->model_home->khoa_hoc();
    $this->data['content'] = 'teacher/danhmuc/khoa_hoc';
    $this->data['page_title'] = 'Khóa học';
    $this->data['page_parent'] = 'danh-muc';
    $this->data['page_target'] = 'khoa-hoc';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }


  public function hoc_ky()
  {
    # code...
    $this->model_home->hoc_ky();
    $this->data['content'] = 'teacher/danhmuc/hoc_ky';
    $this->data['page_title'] = 'Học kỳ';
    $this->data['page_parent'] = 'danh-muc';
    $this->data['page_target'] = 'hoc-ky';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }

  public function mon_hoc()
  {
    # code...
    $this->model_home->mon_hoc();

    $this->data['content'] = 'teacher/danhmuc/mon_hoc';
    $this->data['page_title'] = 'Môn học';
    $this->data['page_parent'] = 'danh-muc';
    $this->data['page_target'] = 'mon-hoc';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }

  public function loai_lop()
  {
    # code...
    $this->model_home->loai_lop();
    $this->data['content'] = 'teacher/danhmuc/loai_lop';
    $this->data['page_title'] = 'Loại lớp';
    $this->data['page_parent'] = 'danh-muc';
    $this->data['page_target'] = 'loai-lop';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }



  public function loai_diem()
  {
    # code...
    $this->model_home->loai_diem();
    $this->data['content'] = 'teacher/danhmuc/loai_diem';
    $this->data['page_title'] = 'Loại diểm';
    $this->data['page_parent'] = 'danh-muc';
    $this->data['page_target'] = 'loai-diem';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }





  public function bang_diem()
  {
    # code...
    $this->model_home->bang_diem();
    $this->data['content'] = 'teacher/bang_diem';
    $this->data['page_title'] = 'Bảng điểm';
    $this->data['page_target'] = 'bang-diem';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }

  public function tao_bang_diem()
  {
    # code...
    $this->model_home->tao_bang_diem();
    $this->data['content'] = 'teacher/tao_bang_diem';
    $this->data['page_title'] = 'Tạo bảng điểm';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }


  public function links()
  {
    # code...
    $this->model_home->links();
    $this->data['content'] = 'teacher/extensions/links';
    $this->data['page_title'] = 'Liên kết';
    $this->data['page_target'] = 'lien-ket';
    $this->data['page_parent'] = 'extensions';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }

  public function thanh_ngu()
  {
    # code...
    $this->model_home->thanh_ngu();
    $this->data['content'] = 'teacher/extensions/thanh_ngu';
    $this->data['page_title'] = 'Thành ngữ';
    $this->data['page_target'] = 'thanh-ngu';
    $this->data['page_parent'] = 'extensions';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }





  public function profile()
  {
    # code...
    $this->model_home->profile();
    $this->data['content'] = 'teacher/profile';
    $this->data['page_title'] = 'Profile';
    $this->data['page_target'] = 'profile';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }


  public function lich_day()
  {
    # code...
    $this->model_home->lich_day();
    $this->data['content'] = 'teacher/calendar/lich_day';
    $this->data['page_title'] = 'Lịch dạy';
    $this->data['page_target'] = 'lich';
    $this->data = array_merge($this->data, $this->model_home->data);
    $this->render('layouts/teacher', $this->data);
  }



  public function logout()
  {
    # code...
    unset($_SESSION['email']);
    header("Location: " . BASE_URL('auth/login'));
  }
}
