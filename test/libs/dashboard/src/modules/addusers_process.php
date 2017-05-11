<?php
  include "config.php";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = md5($_POST['password']);
  $type = 0;
  $phone = $_POST['phone'];
  $query = mysqli_query($conn, "SELECT * FROM users");
  $sql_buat = "INSERT INTO users(id, password, name, address, phone, email,code,updated_at,created_at	) VALUE('','$pass','$name','$address','$phone','$type','$phone')";
  
 ?>
