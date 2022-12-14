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
                return true;
            }
        } catch (Exception $e) {

            $this->response['status'] = false;
            $this->response['data'] = $address;
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

    public function add_item($table, $data_insert, $data_required = [])
    {
        # code...

        if (!empty($data_required)) {
            $result = array_filter($data_required, 'myFilter');
        } else {
            $result = array_filter($data_insert, 'myFilter');
        }

        if (!$result) {

            $is_insert  = $this->insert($table, $data_insert);

            if ($is_insert) {
                $this->response['status'] = true;
                $this->response['message'] = 'Th??m d??? li???u th??nh c??ng!';
                $this->response['data'] = $data_insert;
            } else {
                $this->response['status'] = false;
                $this->response['message'] = 'Th??m d??? li???u th???t b???i!';
            }
        } else {
            $this->response['status'] = false;
            $this->response['message'] = 'Kh??ng ????? tr???ng d??? li???u!';
        }

        die(json_encode($this->response));
    }


    public function delete_item($table, $where)
    {
        # code...

        $result =  $this->remove($table, $where);
        if ($result) {
            $this->response['status'] = true;
            $this->response['message'] = 'X??a d??? li???u th??nh c??ng!';
        } else {
            $this->response['status'] = false;
            $this->response['message'] = 'X??a d??? li???u th???t b???i!';
        }

        die(json_encode($this->response));
    }

    public function update_item($table, $data_post, $where, $data_required = [])
    {
        # code...
        $result = array_filter($data_post, 'myFilter');

        if (!empty($data_required)) {
            $result = array_filter($data_required, 'myFilter');
        } else {
            $result = array_filter($data_post, 'myFilter');
        }


        if (!($result)) {

            $result = $this->update_value($table, $data_post, $where);

            if ($result) {
                $this->response['status'] = true;
                $this->response['message'] = 'C???p nh???t d??? li???u th??nh c??ng!';
            } else {
                $this->response['status'] = false;
                $this->response['message'] = 'C???p nh???t d??? li???u th???t b???i!';
            }
        } else {
            $this->response['status'] = false;
            $this->response['message'] = 'Kh??ng ????? tr???ng d??? li???u!';
        }

        die(json_encode($this->response));
    }
}
