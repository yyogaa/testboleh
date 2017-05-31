<?php
  include "config.php";
  $id = $_POST['idorder'];
	 // variabel tambahan dari edit.php
	//$pass = $_POST['passmhs'];//gak dipake soalnya password
  $pict = $_FILES['pict']['name'];
  $temp = $_FILES['pict']['tmp_name'];
  $newpict = date('dmYHis').$pict;
  $path = "../payment/".$newpict;
  if(move_uploaded_file($temp, $path)){
    $sql_ganti = "UPDATE orders SET pic = '$newpict' WHERE id_order= '$id' ";
    if(mysqli_query($conn, $sql_ganti)){
      $sql_ganti2 = "UPDATE orders SET paid = 1 WHERE id_order = '$id' ";
      mysqli_query($conn, $sql_ganti2);
    ?>
   <script language="javascript">alert("Input Successful");</script>
   <script>document.location.href='../transaction.php';</script>
  <?php
  }else{
    ?>
    <script language="javascript">alert("Input Failed");</script>
     <script>document.location.href='../transaction.php';</script>
  <?php
    }
  }
  else{
    echo "Sorry, can't upload the picture at the moment";
   echo "<br><a href='../additem.php'>Back to Form</a>";
  }
  mysqli_close($conn);
   ?>
