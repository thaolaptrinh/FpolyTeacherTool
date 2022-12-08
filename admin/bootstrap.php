<?php

define('_DIR_ROOT', __DIR__);


if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  $base_url = 'https://' . $_SERVER['HTTP_HOST'] . '/admin';
  $base = 'https://' . $_SERVER['HTTP_HOST'] . '/admin';
} else {
  $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/fpoly_teacher_tool/admin/';
  $base = 'http://' . $_SERVER['HTTP_HOST'] . '/fpoly_teacher_tool/';
  // $base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}

function BASE_URL($url)
{
  global $base_url;
  return $base_url . $url;
}


function BASE($url)
{
  global $base;
  return $base . $url;
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




require_once 'vendor/autoload.php';
require_once  '../configs/Database.php';
require_once  '../configs/Function.php';
require_once  'configs/Routes.php';
require_once  '../core/Route.php';
require_once  '../core/Controller.php';

require_once  'core/Model.php';
require_once 'app/App.php';


// site setting
$path_public = BASE_URL('public/');
$site_url = BASE_URL('');
$site_images = BASE_URL('assets/images/');

$site_logo = BASE_URL('public/' . $DB->settings('site_logo'));
$site_favicon = BASE_URL('public/' . $DB->settings('favicon'));

$site_title = $DB->settings('site_title');
$site_description = $DB->settings('site_description');
$site_keywords = $DB->settings('site_keywords');
$site_name = $DB->settings('site_name');
$site_phone = $DB->settings('phone');
$site_email = $DB->settings('email');
$site_status = $DB->settings('site_status');
