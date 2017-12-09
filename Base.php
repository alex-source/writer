<?php


class Base
{

  private $host = 'localhost'; // адрес сервера
  private $database = 'writer'; // имя базы данных
  private $user = 'root'; // имя пользователя
  private $password = 'secret'; // пароль
  private $mysqli;
  //разделить праметри баз по namespace
  function __construct()
  {

    $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
    $this->addUser('test2','test2');
    $this->get();


  }


  private function get()
  {
    /* check connection */
    if ($this->mysqli->connect_errno)
    {
      echo "Connect failed ".$mysqli->connect_error;
      exit();

      $login = $this->mysqli->real_escape_string($login);// screening
      $this->mysqli->query("SELECT * FROM 'users'");

      if ($result = $mysqli->query($query)) {

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {

          echo $row["login"]." ".$row["passsword"]." ".$row["type"]."<br />";

        }

        /* free result set */
        $result->free();

      }
      $this->mysqli->close();
    }
  }

  public function addUser($login, $password)
  {
    $stmt = $this->mysqli->prepare("INSERT INTO users VALUES (?, ?, ?)");
    if( ! $stmt ){ //если ошибка - убиваем процесс и выводим сообщение об ошибке.
      die( "SQL Error: {$this->mysqli->errno} - {$this->mysqli->error}" );
    }

    $stmt->bind_param('sss', $login, $password, $type);

    // $code = 'DEU';
    // $language = 'Bavarian';
    // $official = "F";
    $type = 'usr';

    /* выполнение подготовленного запроса */
    $stmt->execute();

    printf("%d line insert.\n", $stmt->affected_rows);

    /* закрываем запрос */
    $stmt->close();
  }
}
?>
