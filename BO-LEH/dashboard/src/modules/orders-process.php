<?php
  session_start();
  include 'config.php';

  $id_item = $_POST['iditem'];
  $condition = $_POST['condition'];

  $query = mysqli_query($conn, "UPDATE orders SET paid = '$condition' WHERE id_item = $id_item ");

  if ($query) {
    ?>
    <script language="javascript">alert("Verification Successful");</script>
    <script>document.location.href='../orders.php';</script>
   <?php
   }else{
     ?>
      <script language="javascript">alert("Verification Failed");</script>
      <script>document.location.href='../orders.php';</script>
   <?php
     }
   mysqli_close($conn);
    ?>
