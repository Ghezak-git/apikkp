<?php
include('../config.php');
$id = $_GET['id_quiz'];
$nama = $_GET['g_nama'];
$kelas = $_GET['g_kelas'];
//query update
$query = "UPDATE tbl_quiz SET nama='$nama' , kelas='$kelas' , update_date=NOW() WHERE id_quiz='$id' ";
if (mysqli_query($koneksi,$query)) {
    # credirect ke page index
    header("location:../admin/tambah_quiz.php");    
}
else{
    echo "ERROR, data gagal diupdate". mysql_error();
}
//mysql_close($host);
?>