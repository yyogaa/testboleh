<?php
include "config.php";
session_start();
$id_user = $_SESSION['user'];

$item_name = $_POST['item_name'];
$category = $_POST['category'];
$price = $_POST['item_price'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$pict = $_FILES['pict']['name'];
$temp = $_FILES['pict']['tmp_name'];
//renaming the pic into users id prefix
$newpict = date('dmYHis').$pict;
//set the path folder
$path = "../images/".$newpict;
//Uploading Process
if(move_uploaded_file($temp, $path)){
  $sql_create = "INSERT INTO items(id_item, item_name, price, type, pic, description) VALUE('','$item_name','$price', '$category', '$newpict', '$description')";
  if(mysqli_query($conn, $sql_create)){
    $id_item_new = mysqli_insert_id($conn);
    $sql_create_2 = "INSERT INTO has_item(quantity, id_item, id_user) VALUE( '$quantity', '$id_item_new', '$id_user')";
    $result2 = mysqli_query($conn, $sql_create_2);
  ?>
  <script language="javascript">alert("Input Successful");</script>
  <script>document.location.href='../table.php';</script>
<?php
}else{
  ?>
  <script language="javascript">alert("Input Failed");</script>
   <script>document.location.href='../table.php';</script>
<?php
  }
}
else{
  echo "Sorry, can't upload the picture at the moment";
 echo "<br><a href='../additem.php'>Back to Form</a>";
}
mysqli_close($conn);
 ?>
