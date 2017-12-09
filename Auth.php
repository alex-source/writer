<?php
require 'Base.php';
class Auth
{
  private $login =  '';
  private $password = '';
  private $base;

  function __construct()
  {
    $this->base = new Base;
  }
  public function setLogin($arg)
  {
    $this->login = $arg;
  }

  public function setPassword($arg)
  {
    $this->password = $arg;
  }
  public function newUser()
  {
    if($this->login != '' & $this->password != '')
        $this->base->addUser($this->login,$this->password);
    else
        return;
  }
}
?>
