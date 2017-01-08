<?php

/*  $connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
  );

  if ($connection == false) {
    echo 'Cannot connect to db!';
    echo mysqli_connect_arror();
    die();
  }
  */

define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'last_db');

function db_connect() {
  $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
    or die("Error: ".mysqli_error($link));
  if(!mysqli_set_charset($link, "utf8")){
    prinf("Error: ".mysqli_error($link));
  }
  
  return $link;
}

?>