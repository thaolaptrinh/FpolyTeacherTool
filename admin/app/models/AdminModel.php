<?php

class AdminModel extends Model
{
  public $data = array();



  public function __construct()
  {
    # code...

  }


  public function index()
  {
    # code...
    $this->data = [
      'site_status' => $this->settings('site_status'),
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
  }

  public function co_so()
  {
    # code...
  }

  public function teachers()
  {
    # code...
  }
}
