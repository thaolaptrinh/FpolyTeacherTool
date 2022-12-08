<?php

class TeacherModel extends Model
{
    public $data = array();
    public $data_public = array();



    public function __construct()
    {
        # code...
        $this->data = [
            'ung_ho' => $this->get_list("SELECT * FROM `ung_ho` WHERE isAlert = 1  AND 
             id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'
            ORDER BY id DESC"),
            'hoc_ky' => $this->get_list("SELECT * FROM  `hoc_ky` 
            WHERE id_teacher  = '" . $this->getInfoTeacher('id_teacher') . "' ORDER BY ten_hocky"),
            'khoa' => $this->get_list("SELECT * FROM `khoa` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "' 
            ORDER BY ten_khoa DESC"),
            'mon_hoc' => $this->get_list("SELECT * FROM `mon_hoc` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'ORDER BY id_mon DESC"),
            'loai_lop' => $this->get_list("SELECT * FROM `loai_lop` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'ORDER BY id_loai DESC"),
            'lien_ket' => $this->get_list("SELECT * FROM `lien_ket` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') .
                "'ORDER BY id_lienket DESC limit 5"),
        ];

        if (isset($_POST['is_alertDonate'])) {
            if (!empty($this->data['ung_ho'])) {
                foreach ($this->data['ung_ho'] as $row) {
                    $update_alert = $this->update_value('ung_ho', ['isAlert' => 2], "id = '" . $row['id'] . "'");
                    if ($update_alert) {
                        $response['status'] = true;
                        $response['message'] = 'Chúng tôi đã nhận ủng hộ từ bạn. Xin cảm ơn!';
                        die(json_encode($response));
                    }
                }
            } else {

                $response['status'] = false;
                die(json_encode($response));
            }
        }


        if (isset($_POST["is_import"])) {
            $hoc_ky = $_POST['hoc-ky'];
            $mon_hoc = $_POST['mon-hoc'];
            $loai_lop = $_POST['loai-lop'];
            $id_teacher = $this->getInfoTeacher('id_teacher');
            $fileName = $_FILES["file-sv"]["name"];
            $fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
            $newFileName = date("Y.m.d")  . date("h.i.sa") . "." . $fileExtension;
            $pathFile = "uploads/" . $newFileName;
            $upload =  move_uploaded_file($_FILES['file-sv']['tmp_name'], $pathFile);


            $ds_monhoc = $this->get_row("SELECT * FROM `mon_hoc`");

            $array_diem = explode(',', $ds_monhoc['diem']);

            foreach ($array_diem as  $value) {
                $format_array_diem[$value] = null;
            }

            // if (!empty($upload)) {
            //     $objReader = PHPExcel_IOFactory::createReaderForFile($pathFile);
            //     $objExcel = $objReader->load($pathFile);
            //     $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
            //     print_r($sheetData);
            // }

            if (!empty($upload)) {

                $objFile = PHPExcel_IOFactory::identify($pathFile);
                $objData = PHPExcel_IOFactory::createReader($objFile);

                $objPHPExcel = $objData->load($pathFile);

                $sheet = $objPHPExcel->setActiveSheetIndex(0);

                $TotalRow = $sheet->getHighestRow();
                $LastColumn = $sheet->getHighestColumn();
                $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

                $data_import = [];

                for ($i = 2; $i <= $TotalRow; $i++) {
                    for ($j = 0; $j < $TotalCol; $j++) {
                        $data_import[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                    }
                }
                unlink($pathFile);

                foreach ($data_import as $row) {
                    $data_insert = [
                        'mssv' => $row[1],
                        'ho_ten' => $row[2],
                        'email' => $row[3],
                        'sdt' => $row[4],
                        'thongtin_sv' => json_encode($row),
                        'id_mon' => $mon_hoc,
                        'id_lop' => $loai_lop,
                        'array_diem' => json_encode($format_array_diem),
                        'id_teacher' => $id_teacher
                    ];
                    if (!$this->get_row("SELECT * FROM `diem_sv` WHERE 
                    mssv = '" . $row[1] . "' AND id_mon = '$mon_hoc' ")) {
                        $this->insert("diem_sv", $data_insert);
                    }
                }

                $response['data'] = [
                    'lop' => $this->get_row("SELECT * FROM `loai_lop` WHERE id_loai = '$loai_lop' ")['ten_lop'],
                    'mon' => $this->get_row("SELECT * FROM `mon_hoc` WHERE id_mon = '$mon_hoc' ")['ma_mon'],
                ];
                $response['status'] = true;

                die(json_encode($response));
            } else {
                $response['status'] = false;
                $response['message'] = 'Upload file sinh viên không thành công!';
                die(json_encode($response));
            }
        }
    }


    public function index()
    {
        # code...

        $this->data = [
            'lich_day' => $this->get_list("SELECT lich_day.*, loai_lop.ten_lop, mon_hoc.ten_mon, mon_hoc.ma_mon FROM `lich_day`
            INNER JOIN loai_lop ON lich_day.id_lop = loai_lop.id_loai
            INNER JOIN mon_hoc ON lich_day.id_mon = mon_hoc.id_mon            
            WHERE lich_day.id_teacher = '" . $this->getInfoTeacher('id_teacher') . "' ORDER BY lich_day.id DESC"),
            'thanh_ngu' => $this->get_row("SELECT * FROM `thanh_ngu` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "' AND status = '2' ORDER BY rand() LIMIT 1"),


        ];
    }

    public function bang_diem()
    {
        # code...
        $this->data = [
            'lop_hoc' => $this->get_list("SELECT * FROM `loai_lop` ORDER BY id_loai DESC"),
            'mon_hoc' => $this->get_list("SELECT * FROM `mon_hoc` ORDER BY id_mon DESC"),

        ];

        if (isset($_GET['lop']) && !empty($_GET['lop'])) {

            $this->data = [
                'lop_hoc' => $this->get_list("SELECT * FROM `loai_lop` ORDER BY id_loai DESC"),
                'mon_hoc' => $this->get_list("SELECT * FROM `mon_hoc` ORDER BY id_mon DESC"),
                'bang_diem' => $this->get_list("SELECT diem_sv.* ,
                `mon_hoc`.ma_mon,  `loai_lop`.ten_lop 
                FROM diem_sv 
                INNER JOIN `mon_hoc` on mon_hoc.id_mon   = diem_sv.id_mon 
                INNER JOIN `loai_lop` on loai_lop.id_loai  = diem_sv.id_lop
                INNER JOIN `khoa` on khoa.id_khoa  = loai_lop.id_khoa
                WHERE loai_lop.ten_lop like '%" . $_GET['lop'] . "%' ORDER BY diem_sv.id_mon DESC
                ")
            ];
            if (isset($_GET['mon']) && !empty($_GET['mon'])) {
                $this->data = [
                    'lop_hoc' => $this->get_list("SELECT * FROM `loai_lop` ORDER BY id_loai DESC"),
                    'diem_cua_mon' => $this->get_row("SELECT * FROM `mon_hoc`  WHERE mon_hoc.ma_mon = '" . $_GET['mon'] . "' ORDER BY id_mon DESC"),
                    'mon_hoc' => $this->get_list("SELECT * FROM `mon_hoc` ORDER BY id_mon DESC"),
                    'bang_diem' => $this->get_list("SELECT diem_sv.* ,
                    `mon_hoc`.ma_mon,  `loai_lop`.ten_lop
                    FROM diem_sv 
                    INNER JOIN `mon_hoc` on mon_hoc.id_mon   = diem_sv.id_mon 
                    INNER JOIN `loai_lop` on loai_lop.id_loai  = diem_sv.id_lop
                    INNER JOIN `khoa` on khoa.id_khoa  = loai_lop.id_khoa
                    WHERE loai_lop.ten_lop  = '" . $_GET['lop'] . "' AND mon_hoc.ma_mon LIKE '%" . $_GET['mon'] . "%' ORDER BY diem_sv.id_mon DESC
                    ")
                ];
            } else {
                $this->data = [
                    'lop_hoc' => $this->get_list("SELECT * FROM `loai_lop` ORDER BY id_loai DESC"),
                    'mon_hoc' => $this->get_list("SELECT * FROM `mon_hoc` ORDER BY id_mon DESC"),

                ];
            }
        }


        // edit dữ liệu điểm

        if (isset($_POST['is_update'])) {
            $id_diem = $_POST['id'];
            $text = check_string($_POST['text']);
            $column_name = $_POST['column_name'];
            $target = $_POST['target'];

            $array_diem = $this->getDetailDiem($id_diem, 'array_diem');

            if ($target == 'diem') {
                if ($text == '') {
                    $response['status'] =  false;
                    $response['message'] =  'Dữ liệu rỗng!';
                    die(json_encode($response));
                }
                if (!is_numeric($text) || floatval($text) < 0 ||  floatval($text) > 10) {
                    $response['status'] =  false;
                    $response['message'] =  'Điểm không hợp lệ!';
                    die(json_encode($response));
                }
                $array_diem = json_decode($array_diem, true);
                $array_diem[$column_name] =  $text;
                $response['status'] =  $array_diem;
                $is_update =  $this->update_value('diem_sv', ['array_diem' => json_encode($array_diem)], "id = $id_diem");
            } else {
                $is_update =  $this->update_value('diem_sv', [$column_name => $text], "id = $id_diem");
            }
            if ($is_update) {
                $response['status'] =  true;
                $response['message'] =  'Cập nhật thành công!';
                die(json_encode($response));
            } else {
                $response['status'] =  false;
                $response['message'] =  'Cập nhật thất bại!';
                die(json_encode($response));
            }
        }

        if (isset($_POST['is_delete'])) {
            $this->delete_item('diem_sv', "id = '" . $_POST['id'] . "'");
        }
    }



    public function profile()
    {
        # code...

        if (isset($_POST['is_changepass'])) {

            $data = [
                'currentpassword' => check_string($_POST['currentpassword']),
                'newpassword' => check_string($_POST['newpassword']),
                'confirmpassword' => check_string($_POST['confirmpassword']),
            ];

            $result = array_filter($data, 'myFilter');

            if (!$result) {

                if (count_string($data['newpassword']) < 8) {
                    $response['status'] = false;
                    $response['message'] = 'Mật khẩu mới phải từ 8 ký tự trở lên';
                    die(json_encode($response));
                } elseif ($data['newpassword'] !=  $data['confirmpassword']) {
                    $response['status'] = false;
                    $response['message'] = 'Mật khẩu mới không khớp';
                    die(json_encode($response));
                } elseif (typepass($data['newpassword']) == $this->getInfoTeacher('password')) {
                    $response['status'] = false;
                    $response['message'] = 'Mật khẩu mới không được trùng với mật khẩu cũ';
                    die(json_encode($response));
                } elseif (typepass($data['currentpassword']) != $this->getInfoTeacher('password')) {
                    $response['status'] = false;
                    $response['message'] = 'Mật khẩu cũ không khớp';
                    die(json_encode($response));
                } else {

                    $data_update = [
                        'password' => typepass($data['newpassword'])
                    ];

                    $is_change = $this->update_value('teachers', $data_update, "email = '" . $this->getInfoTeacher('email') . "'");

                    if ($is_change) {

                        $response['status'] = true;
                        $response['message'] = 'Bạn đã đổi mật khẩu thành công';
                        die(json_encode($response));
                    } else {
                        $response['status'] = false;
                        $response['message'] = 'Đã xảy ra lỗi';
                        die(json_encode($response));
                    }
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'Vui lòng điền đầy đủ thông tin';
                die(json_encode($response));
            }
        }
    }



    public function thanh_ngu()
    {
        # code...
        $this->data = [
            'thanh_ngu' => $this->get_list("SELECT * FROM `thanh_ngu` 
            WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "' ORDER BY id DESC"),
        ];



        if (isset($_POST['is_detail'])) {
            $id = $_POST['id'];
            $response['data'] = $this->get_row("SELECT * FROM `thanh_ngu` WHERE id = '$id'");
            die(json_encode($response));
        }

        if (isset($_POST['is_update'])) {
            $id = $_POST['id'];
            $noidung = $_POST['tn_noidung_update'];
            $status = $_POST['tn_status_update'];

            if (!empty($noidung)) {

                $result = $this->update_value('thanh_ngu', ['noi_dung' => $noidung, 'status' => $status], "id = '$id'");

                if ($result) {
                    $response['status'] = true;
                    $response['message'] = 'Bạn đã cập nhật dữ liệu thành công!';
                    die(json_encode($response));
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Cập nhật thất bại!';
                    die(json_encode($response));
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'Vui lòng không để trống dữ liệu!';
                die(json_encode($response));
            }
        }



        if (isset($_POST['is_delete'])) {
            $id = $_POST['id'];
            $result =  $this->remove('thanh_ngu', "id = '$id'");
            if ($result) {
                $response['status'] = true;
                $response['title'] = 'Xóa thành công thành công';
                $response['message'] = 'Bạn đã xóa thành công dữ liệu';
                die(json_encode($response));
            }
        }


        if (isset($_POST['is_add'])) {

            $data_insert = [
                'noi_dung' => check_string($_POST['tn_noidung']),
                'status' => check_string($_POST['tn_status']),
                'id_teacher' => $this->getInfoTeacher('id_teacher'),
            ];

            $result = array_filter($data_insert, 'myFilter');

            if (!$result) {

                $is_insert  = $this->insert('thanh_ngu', $data_insert);

                if ($is_insert) {
                    $response['status'] = true;
                    $response['message'] = 'Bạn đã thêm mới thành công';
                    die(json_encode($response));
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Đã có lỗi xảy ra';
                    die(json_encode($response));
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'Đã có lỗi xảy ra';
                die(json_encode($response));
            }
        }
    }

    public function links()
    {
        # code...


        $this->data = [
            'lien_ket' => $this->get_list("SELECT * FROM `lien_ket` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'"),
        ];

        if (isset($_POST['is_detail'])) {
            $id = $_POST['id'];
            $response['data'] = $this->get_row("SELECT * FROM `lien_ket` WHERE id_lienket = '$id'");
            die(json_encode($response));
        }

        if (isset($_POST['is_updatelink'])) {
            $id = $_POST['id'];
            $data_post = [
                'ten' => check_string($_POST['link_name_update']),
                'url' => check_string($_POST['link_url_update']),
                'mo_ta' => check_string($_POST['link_mota_update']),
            ];

            $result = array_filter($data_post, 'myFilter');


            if (!($result)) {

                $result = $this->update_value('lien_ket', $data_post, "id_lienket = '$id'");

                if ($result) {
                    $response['status'] = true;
                    $response['message'] = 'Bạn đã cập nhật dữ liệu thành công!';
                    die(json_encode($response));
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Cập nhật thất bại!';
                    die(json_encode($response));
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'Vui lòng không để trống dữ liệu';
                die(json_encode($response));
            }
        }




        if (isset($_POST['is_removelink'])) {

            $id = $_POST['id'];
            $result =  $this->remove('lien_ket', "id_lienket = '$id'");
            if ($result) {
                $response['status'] = true;
                $response['message'] = 'Xóa dữ liệu thành công!';
                die(json_encode($response));
            } else {
                $response['status'] = true;
                $response['message'] = 'Xóa dữ liệu không thành công!';
                die(json_encode($response));
            }
        }


        if (isset($_POST['is_addlink'])) {

            $data_insert = [
                'ten' => check_string($_POST['link_name']),
                'url' => check_string($_POST['link_url']),
                'mo_ta' => check_string($_POST['link_mota']),
                'id_teacher' => $this->getInfoTeacher('id_teacher'),

            ];

            $result = array_filter($data_insert, 'myFilter');

            if (!$result) {

                $is_insert  = $this->insert('lien_ket', $data_insert);

                if ($is_insert) {
                    $response['status'] = true;
                    $response['message'] = 'Thêm mới thành công!';
                    die(json_encode($response));
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Đã có lỗi xảy ra!';
                    die(json_encode($response));
                }
            } else {
                $response['status'] = false;
                $response['message'] = 'Đã có lỗi xảy ra!';
                die(json_encode($response));
            }
        }
    }

    public function khoa_hoc()
    {
        # code...

        $this->data = [
            'khoa' => $this->get_list("SELECT * FROM `khoa`
             WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'
             ORDER BY ten_khoa DESC
             "),
        ];

        if (isset($_POST['is_detail'])) {
            $this->get_item(
                "SELECT * FROM `khoa` WHERE id_khoa = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_update'])) {
            $data_post = [
                'ten_khoa' => check_string($_POST['ten_khoa_update']),
            ];
            $this->update_item(
                "khoa",
                $data_post,
                "id_khoa = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_add'])) {

            $data_insert = [
                'ten_khoa' => check_string($_POST['ten_khoa']),
                'id_teacher' => $this->getInfoTeacher('id_teacher'),

            ];

            $this->add_item(
                "khoa",
                $data_insert
            );
        } elseif (isset($_POST['is_delete'])) {
            $this->delete_item(
                'khoa',
                "id_khoa = '" . $_POST['id'] . "'"
            );
        }
    }

    // học kỳ
    public function hoc_ky()
    {
        # code...

        $this->data = [
            'hoc_ky' => $this->get_list("SELECT * FROM  `hoc_ky` 
            WHERE id_teacher  = '" . $this->getInfoTeacher('id_teacher') . "' 
            order by case 
            when ten_hocky LIKE '%spring%' then 1 
            when ten_hocky LIKE '%summer%'  then 2 
            when ten_hocky LIKE '%fall%'  then 3
            end

            , reverse(reverse(ten_hocky) + 0) + 0 DESC"),
        ];

        if (isset($_POST['is_detail'])) {
            $this->get_item(
                "SELECT * FROM `hoc_ky` WHERE id_hocky = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_update'])) {
            $data_post = [
                'ten_hocky' => check_string($_POST['ten_hocky_update']),
            ];
            $this->update_item(
                "hoc_ky",
                $data_post,
                "id_hocky = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_add'])) {
            $data_insert = [
                'ten_hocky' => check_string($_POST['ten_hocky']),
                'id_teacher' => $this->getInfoTeacher('id_teacher'),

            ];
            $this->add_item(
                "hoc_ky",
                $data_insert
            );
        } elseif (isset($_POST['is_delete'])) {
            $this->delete_item(
                'hoc_ky',
                "id_hocky = '" . $_POST['id'] . "'"
            );
        }
    }
    // loại lớp

    public function loai_lop()
    {
        # code...
        $this->data = [
            'loai_lop' => $this->get_list("SELECT loai_lop.*, khoa.ten_khoa FROM `loai_lop` 
            INNER JOIN khoa ON khoa.id_khoa = loai_lop.id_khoa
            WHERE loai_lop.id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'"),
            'khoa' => $this->get_list("SELECT * FROM `khoa` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "' 
              ORDER BY ten_khoa DESC"),
        ];


        if (isset($_POST['is_detail'])) {
            $this->get_item(
                "SELECT * FROM `loai_lop` WHERE id_loai = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_update'])) {
            $data_post = [
                'ten_lop' => check_string($_POST['ten_lop_update']),
                'mo_ta' => check_string($_POST['mo_ta_update']),
                'id_khoa' => ($_POST['id_khoa_update']),
            ];
            $this->update_item(
                "loai_lop",
                $data_post,
                "id_loai = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_add'])) {
            $data_insert = [
                "ten_lop" => check_string($_POST['ten_lop']),
                "mo_ta" => check_string($_POST['mo_ta']),
                "id_khoa" => ($_POST['id_khoa']),
                "id_teacher" => $this->getInfoTeacher('id_teacher'),
            ];
            $this->add_item(
                "loai_lop",
                $data_insert
            );
        } elseif (isset($_POST['is_delete'])) {
            $this->delete_item(
                'loai_lop',
                "id_loai = '" . $_POST['id'] . "'"
            );
        }
    }

    // môn học

    public function mon_hoc()
    {
        # code...

        $this->data = [
            'mon_hoc' => $this->get_list("SELECT * FROM `mon_hoc` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'"),
            'loai_diem' => $this->get_list("SELECT * FROM `loai_diem` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'"),

        ];


        if (isset($_POST['is_detail'])) {
            $this->get_item(
                "SELECT * FROM `mon_hoc` WHERE id_mon = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_update'])) {
            $data_post = [
                'diem' => check_string($_POST['diem_update']),
                'ma_mon' => check_string($_POST['ma_mon_update']),
                'ten_mon' => check_string($_POST['ten_mon_update']),
                'ghi_chu' => check_string($_POST['ghi_chu_update']),
            ];
            $this->update_item(
                "mon_hoc",
                $data_post,
                "id_mon = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_add'])) {
            $data_insert = [
                'ten_mon' => check_string($_POST['ten_mon']),
                'ma_mon' => check_string($_POST['ma_mon']),
                'ghi_chu' => check_string($_POST['ghi_chu']),
                'diem' => $_POST['diem'],
                'id_teacher' => $this->getInfoTeacher('id_teacher'),
            ];
            $this->add_item(
                "mon_hoc",
                $data_insert
            );
        } elseif (isset($_POST['is_delete'])) {
            $this->delete_item(
                'mon_hoc',
                "id_mon = '" . $_POST['id'] . "'"
            );
        }
    }


    // loại điểm
    public function loai_diem()
    {
        # code...

        $this->data = [
            'loai_diem' => $this->get_list("SELECT * FROM `loai_diem` WHERE id_teacher = '" . $this->getInfoTeacher('id_teacher') . "'"),
        ];

        if (isset($_POST['is_detail'])) {
            $this->get_item(
                "SELECT * FROM `loai_diem` WHERE id = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_update'])) {
            $data_post = [
                "ten_diem" => check_string($_POST['ten_diem_update']),
            ];
            $this->update_item(
                "loai_diem",
                $data_post,
                "id = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_add'])) {
            $data_insert = [
                "ten_diem" => check_string($_POST['ten_diem']),
                "id_teacher" => $this->getInfoTeacher('id_teacher'),
            ];
            $this->add_item(
                "loai_diem",
                $data_insert
            );
        } elseif (isset($_POST['is_delete'])) {
            $this->delete_item(
                'loai_diem',
                "id = '" . $_POST['id'] . "'"
            );
        }
    }

    // lịch dạy


    public function lich_day()
    {
        # code...


        $status = 2;
        if (isset($_GET['status'])) {
            $status = ($_GET['status'] == 1) ?  2 :  1;
        }
        $day = 7;
        if (isset($_GET['day'])) {
            $day = $_GET['day'];
        }

        $this->data = [
            'lich_day' => $this->get_list("SELECT lich_day.* ,`hoc_ky`.ten_hocky, `mon_hoc`.ma_mon, `mon_hoc`.ten_mon,  `loai_lop`.ten_lop FROM lich_day 
            INNER JOIN `hoc_ky` on hoc_ky.id_hocky  = lich_day.id_hocky
            INNER JOIN `mon_hoc` on mon_hoc.id_mon   = lich_day.id_mon 
            INNER JOIN `loai_lop` on loai_lop.id_loai  = lich_day.id_lop
            WHERE lich_day.status = $status AND 
             DATE_ADD(CURDATE(), INTERVAL $day DAY) 
                 BETWEEN  lich_day.ngay_bat_dau AND lich_day.ngay_ket_thuc
             ORDER BY lich_day.id DESC")
        ];



        if (isset($_POST['is_add'])) {
            $data_insert = [
                "id_hocky" => check_string($_POST['hoc_ky']),
                "id_mon" => check_string($_POST['mon_hoc']),
                "id_lop" => check_string($_POST['loai_lop']),
                "ca_hoc" => check_string($_POST['ca_hoc']),
                "phong_hoc" => check_string($_POST['phong_hoc']),
                "ngay_hoc" => check_string($_POST['ngay_hoc']),
                "ghi_chu" => check_string($_POST['ghi_chu']),
                "so_sv" => check_string($_POST['so_sv']),
                "ngay_bat_dau" => check_string($_POST['ngay_bat_dau']),
                "ngay_ket_thuc" => check_string($_POST['ngay_ket_thuc']),
                "status" => check_string($_POST['status']),
                "id_teacher" => $this->getInfoTeacher('id_teacher'),
            ];

            if ($this->get_row("SELECT * FROM `lich_day` WHERE id_lop = '" . $_POST['loai_lop'] . "' AND 
            id_mon = '" . $_POST['mon_hoc'] . "'")) {
                $response['status'] = false;
                $response['message'] = 'Lịch dạy này đã tồn tại trên hệ thống!';
                die(json_encode($response));
            } else {
                $this->add_item(
                    "lich_day",
                    $data_insert
                );
            }
        } elseif (isset($_POST['is_delete'])) {
            $this->delete_item(
                'lich_day',
                "id = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_detail'])) {
            $this->get_item(
                "SELECT * FROM `lich_day` WHERE id = '" . $_POST['id'] . "'"
            );
        } elseif (isset($_POST['is_update'])) {
            $data_post = [
                "id_hocky" => check_string($_POST['hoc_ky_update']),
                "id_mon" => check_string($_POST['mon_hoc_update']),
                "id_lop" => check_string($_POST['loai_lop_update']),
                "ca_hoc" => check_string($_POST['ca_hoc_update']),
                "phong_hoc" => check_string($_POST['phong_hoc_update']),
                "ngay_hoc" => check_string($_POST['ngay_hoc_update']),
                "ghi_chu" => check_string($_POST['ghi_chu_update']),
                "so_sv" => check_string($_POST['so_sv_update']),
                "ngay_bat_dau" => check_string($_POST['ngay_bat_dau_update']),
                "ngay_ket_thuc" => check_string($_POST['ngay_ket_thuc_update']),
                "status" => check_string($_POST['status_update']),
            ];
            $this->update_item(
                "lich_day",
                $data_post,
                "id = '" . $_POST['id'] . "'"
            );
        }
    }
}
