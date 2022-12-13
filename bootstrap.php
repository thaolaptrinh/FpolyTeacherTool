<?php

define('_DIR_ROOT', __DIR__);


if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  $base_url = 'https://' . $_SERVER['HTTP_HOST'] . '/';
} else {
  $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/fpoly_teacher_tool/';
  // $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}

function BASE_URL($url)
{
  global $base_url;
  return $base_url . $url;
}

if (!empty($_SERVER['PATH_INFO'])) {
  $url = $_SERVER['PATH_INFO'];
} else {
  $url = '/';
}

$route = array_filter(explode('/', $url));
$route  = array_values($route);


function route($index)
{
  global $route;
  if (isset($route[$index])) {

    return $route[$index];
  } else {
    return false;
  }
}


function route_last()
{
  global $route;
  return end($route);
}



require 'core/PHPMailer/src/Exception.php';
require 'core/PHPMailer/src/PHPMailer.php';
require 'core/PHPMailer/src/SMTP.php';


require_once  'configs/Database.php';
require_once  'configs/Function.php';


// site setting
$path_public = BASE_URL('public/');
$site_url = BASE_URL('');
$site_images = BASE_URL('assets/media/');

$site_logo = BASE_URL('assets/media/logos/' . $DB->settings('site_logo'));
$site_favicon = BASE_URL('assets/media/logos/' . $DB->settings('favicon'));

$site_title = $DB->settings('site_title');
$site_description = $DB->settings('site_description');
$site_keywords = $DB->settings('site_keywords');
$site_name = $DB->settings('site_name');
$site_status = $DB->settings('site_status');


if ($site_status != 2) {
  require_once 'app/views/error/503.php';
  die();
}

require_once  'configs/Routes.php';
require_once  'core/Route.php';
require_once  'core/Controller.php';
require_once  'core/Model.php';
require_once  'core/PHPExcel.php';
require_once 'app/App.php';
