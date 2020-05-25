<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $target = $_POST['target'];
  $loginField = $_POST['login-field'];
  $passwordField = $_POST['password-field'];
  $rounds = $_POST['rounds'];
  $credentials = json_decode(get_file_content("credentials.json"));

  if(!is_int($rounds)){
    $rounds = 10;
  }

  $round = 1
  while($round <= $rounds){

    $login = $credentials['username'][rand(0,count($credentials['username']))].rand(3,999)."@".$credentials['domain'][rand(0,count($credentials['domain']))];
    $password = $credentials['password'][rand(0,count($credentials['password']))];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$target);
  curl_setopt($ch, CURLOPT_PROXY, $proxy[rand(0,count($proxy))]);

  curl_setopt($ch,CURLOPT_POST, "$loginField=$login&$passwordField=$password");

  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FORBID_REUSE, 1)
  curl_close($ch);

  $round++;
  }
}
 ?>
