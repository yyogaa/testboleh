<?php
  include "config.php";
  $id = $_POST['id'];
	 // variabel tambahan dari edit.php
	//$pass = $_POST['passmhs'];//gak dipake soalnya password
  $pict = $_FILES['pict']['name'];
  $temp = $_FILES['pict']['tmp_name'];
  $newpict = date('dmYHis').$pict;
  $path = "../images/".$newpict;
  if(move_uploaded_file($temp, $path)){
    $sql_ganti = "UPDATE users SET userpic = '$newpict' WHERE id_user= '$id' ";
    if(mysqli_query($conn, $sql_ganti)){
    ?>
   <script language="javascript">alert("Input Successful");</script>
   <script>document.location.href='../seller.php';</script>
  <?php
  }else{
    ?>
    <script language="javascript">alert("Input Failed");</script>
     <script>document.location.href='../seller.php';</script>
  <?php
    }
  }
  else{
    echo "Sorry, can't upload the picture at the moment";
   echo "<br><a href='../additem.php'>Back to Form</a>";
  }
  mysqli_close($conn);
   ?>
