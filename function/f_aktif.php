<?php
include('../config.php');
$id = $_GET['id_user'];
$keadaan = $_GET['keadaan'];

//query update
$query = "UPDATE tbl_user SET keadaan='tidak_aktif' WHERE id_user='$id' ";
$query1 = "UPDATE tbl_user SET keadaan='aktif' WHERE id_user='$id' ";

if ($keadaan == "aktif") {
	if (mysqli_query($koneksi,$query)) {
	    # credirect ke page index
	    header("location:../admin/tambah_user.php");    
	}
	else{
	    echo "ERROR, data gagal diupdate". mysql_error();
	}
}else{
	if (mysqli_query($koneksi,$query1)) {
	    # credirect ke page index
	    header("location:../admin/tambah_user.php");    
	}
	else{
	    echo "ERROR, data gagal diupdate". mysql_error();
	}
}

//mysql_close($host);
?>