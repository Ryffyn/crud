<?php

  $mysqli = new mysqli("localhost", "root", "", "teste");
  if($mysqli->connect_error){
    printf("ERRO MySQLi: %s\n", $mysqli->connect_error);
    echo "<script> alert('conexao falhou!');</script>";
    exit();
}
  


 
  ?>