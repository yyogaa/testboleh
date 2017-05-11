<?php
	include "config.php";

  $id = $_POST['id']; // variabel tambahan dari edit.php
	$email = $_POST['email']; // dollar underscore post itu ngambil data dari yang sebelumnya
	//$pass = $_POST['passmhs'];//gak dipake soalnya password
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];

//insert into buat nambahin entitas ke data base
//php gak ada tipe varibel ,, jadi enak aja masuk masukin
	$sql_ganti = "UPDATE identitas SET email = '$email',nama_mhs = '$name', nim = '$nim', gender = '$jk' WHERE id_mahasiswa = '$id'";
	if (mysqli_query($conn, $sql_ganti)){
?>
		<script language="javascript">alert("Edit Successful");</script>   //skrip javascript untuk alert sderhana
		<script>document.location.href='input.php';</script> //untuk nge link
<?php
	}
	else{
?>
		<script language="javascript">alert("Edit Failed");</script>
		<script>document.location.href='input.php';</script>
<?php
	}
	mysqli_close($conn); //untuk nutup koneksi,, agar abis ngirim data gak ada script lagi masuk ke data base
?>
