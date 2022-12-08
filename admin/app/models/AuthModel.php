
<?php

class AuthModel extends Model
{
  public $data = array();
  public $client;


  public function __construct()
  {
    # code...    
    $this->client = new Google\Client();
    $this->client->setClientId("1031684180441-i7gdhi9rh8kcrqo9isg8ndn9h1u0cdfc.apps.googleusercontent.com");
    $this->client->setClientSecret("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");
    $this->client->setRedirectUri("http://localhost/fpoly_teacher_tool/admin/auth/login");
    // $this->client->setAuthConfig('client_credentials.json');

    $this->client->setScopes(array(
      'https://www.googleapis.com/auth/plus.login',
      'profile',
      'email',
      'openid',
    ));
  }

  public function login()
  {
    # code...

    if (isset($_GET['code'])) {
      $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);

      if (!isset($token['error'])) {
        $this->client->setAccessToken(($token['access_token']));
        $service = new Google\Service\Oauth2($this->client);
        $data = $service->userinfo->get();


        if ($this->get_list("SELECT * FROM `admin` WHERE email = '" . $data['email'] . "'")) {

          $_SESSION['access_token'] = $token['access_token'];
          $_SESSION['user_data'] = json_decode(json_encode($data), true);
        }
      }
    }


    if (!isset($_SESSION['access_token'])) {
      $this->data['authUrl'] = $this->client->createAuthUrl() . '&hd=fpt.edu.vn';
    } else {
      header('Location: ' . BASE_URL(''));
      exit();
    }
  }
}
