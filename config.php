<?php 
$koneksi = mysqli_connect("localhost","mhghzmyi_liquid","","mhghzmyi_kkp");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>