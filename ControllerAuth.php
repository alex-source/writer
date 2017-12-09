<?php
require 'Auth.php';
if (isset($_POST['submit_form'])) {
  echo 0;
  echo $_POST['login'];
  echo $_POST['password'];
}
$auth = new Auth;
$auth->setLogin($_POST['login']);
$auth->setPassword($_POST['password']);
$auth->newUser();
?>
