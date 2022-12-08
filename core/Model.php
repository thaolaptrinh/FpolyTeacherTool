<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Model extends Database
{
    public $response;

    public $mail;
    public function send_mail($address, $subject = 'subject', $body = 'body', $AltBody = 'AltBody')
    {
        # code...
        $this->mail  = new PHPMailer(true);
        try {

            $this->mail->isSMTP();
            $this->mail->CharSet = "UTF-8";
            $this->mail->Host       = $this->settings('smtp_server');
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->settings('smtp_user');
            $this->mail->Password   = $this->settings('smtp_pass');
            $this->mail->SMTPSecure = $this->settings('smtp_protocol');
            $this->mail->Port       = $this->settings('smtp_port');
            $this->mail->setFrom($this->settings('smtp_user'), $this->settings('site_name'));
            $this->mail->addBCC(trim($address), $this->settings('site_name'));

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $AltBody;

            $send = $this->mail->send();

            if ($send) {
                $this->response['status'] = true;
                $this->response['message'] = 'Gửi mail thành công!';
                die(json_encode($this->response));
            }
        } catch (Exception $e) {

            $this->response['status'] = false;
            $this->response['message'] = $e->getMessage();
            die(json_encode($this->response));
        }
    }


    public function get_item($query)
    {
        # code...
        $this->response['data'] = $this->get_row($query);
        die(json_encode($this->response));
    }

    public function add_item($table, $data_insert)
    {
        # code...

        $result = array_filter($data_insert, 'myFilter');

        if (!$result) {

            $is_insert  = $this->insert($table, $data_insert);

            if ($is_insert) {
                $this->response['status'] = true;
                $this->response['message'] = 'Thêm dữ liệu thành công!';
            } else {
                $this->response['status'] = false;
                $this->response['message'] = 'Thêm dữ liệu thất bại!';
            }
        } else {
            $this->response['status'] = false;
            $this->response['message'] = 'Không để trống dữ liệu!';
        }

        die(json_encode($this->response));
    }


    public function delete_item($table, $where)
    {
        # code...

        $result =  $this->remove($table, $where);
        if ($result) {
            $this->response['status'] = true;
            $this->response['message'] = 'Xóa dữ liệu thành công!';
        } else {
            $this->response['status'] = false;
            $this->response['message'] = 'Xóa dữ liệu thất bại!';
        }

        die(json_encode($this->response));
    }

    public function update_item($table, $data_post, $where)
    {
        # code...
        $result = array_filter($data_post, 'myFilter');
        if (!($result)) {

            $result = $this->update_value($table, $data_post, $where);

            if ($result) {
                $this->response['status'] = true;
                $this->response['message'] = 'Cập nhật dữ liệu thành công!';
            } else {
                $this->response['status'] = false;
                $this->response['message'] = 'Cập nhật dữ liệu thất bại!';
            }
        } else {
            $this->response['status'] = false;
            $this->response['message'] = 'Không để trống dữ liệu!';
        }

        die(json_encode($this->response));
    }
}
