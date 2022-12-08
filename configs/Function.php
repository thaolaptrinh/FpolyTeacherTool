<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');


$DB = new Database;

function count_string($data)
{
  return strlen(check_string($data));
}

function myFilter($var)
{
  return ($var == NULL && $var == FALSE && $var == "");
}


function error($e)
{
  # code...
  if (file_exists('app/views/error/' .  $e . '.php')) {
    require_once 'app/views/error/' . $e . '.php';
  }
}
function check_email($data)
{
  if (preg_match('/^.+@.+$/', $data, $matches)) {
    return true;
  } else {
    return false;
  }
}

function typepass($str)
{
  return base64_encode(md5(base64_encode(md5($str))));
}

function logout()
{    # code...
  session_start();
  session_destroy();
  header("Location: " . BASE_URL(''));
}


function check_string($data)
{
  return (trim(htmlspecialchars(addslashes($data))));
}


function get_time()
{
  return date('Y-m-d H:i:s');
}


function get_client_ip()
{
  if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) $ip = getenv("HTTP_CLIENT_IP");
  else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) $ip = getenv("HTTP_X_FORWARDED_FOR");
  else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) $ip = getenv("REMOTE_ADDR");
  else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) $ip = $_SERVER['REMOTE_ADDR'];
  else $ip = "unknown";
  return ($ip);
}


function curl_url($url, $arr = [])
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_POSTFIELDS => http_build_query($arr)
  ));


  $resp = curl_exec($curl);
  $result = json_decode($resp, TRUE);
  curl_close($curl);
  return $result;
}


function curl_get($url)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
  ));

  $resp = curl_exec($curl);
  $result = json_decode($resp, true);
  curl_close($curl);
  return $result;
}
