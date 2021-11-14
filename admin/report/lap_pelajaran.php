<!DOCTYPE html>
<html>
<head>
	<title>Yayasan Yazuha</title>
</head>
<body>
   
    <style>
div.absolute {
  position: absolute;
  top: 710px;
  right: 0;
  width: 230px;
  height: 100px;
}
div.absolute1 {
  position: absolute;
  top: 920px;
  right: 0;
  width: 205px;
  height: 30px;
}
div.absolute2 {
  position: absolute;
  top: 750px;
  right: 0;
  width: 190px;
  height: 30px;
}
div.absolute3 {
  position: absolute;
  top: 730px;
  right: 0;
  width: 180px;
  height: 30px;
}
</style>
    
    <table align="center">
	<tr>
		<td width="170">
			<img src="Logo.png" width="120dp" height="120dp">
		</td>
		<td align="center">
			<font size="100" color="#89360c" face="arial">Yayasan Yazuha</font>
			<br>Akta Notaris: Nomor 02 tanggal 27 agustus 2018
			<br>SK Nomor : AHU-0011829.AH.01.04 tahun 2018
			<br>Sekretariat : Griya Sakinah 2 Blok B No. 22 Rt. 002/013 Rangkapan Jaya
			<br>Pancoran Mas, Depok Jawa Barat
		</td>
	</tr>
    </table>    
    <hr color="black" size="3px" width="700" >
 
 <?php session_start(); 
    if($_SESSION['status1']!="login"){
			header("location:../index.php?pesan=belum_login");
		}?> 
 
	<center>
 
		<h2>DATA LAPORAN PELAJARAN</h2>
 
	</center>
	<br>
	<br>
	<p>Nama Guru : <?php echo $_SESSION['fullname'] ?></p>
	<p>Email Guru : <?php echo $_SESSION['email'] ?></p>
 
	<?php 
	include '../../config.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="5%">No</th>
			<th>Keterangan</th>
			<th width="5%">Kelas</th>
		</tr>
		<?php 
		$no = 1;
		$id_user_g = $_SESSION['id_user'];
		$q = "select q.nama, q.kelas, u.fullname from tbl_quiz q join tbl_user u on q.id_user=u.id_user where q.id_user='$id_user_g'";
		$sql = mysqli_query($koneksi,$q);
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama'] ?></td>
			<td><?php echo $data['kelas']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
	
	<?php
function format_hari_tanggal($waktu)
{
    $hari_array = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );
    $hr = date('w', strtotime($waktu));
    $hari = $hari_array[$hr];
    $tanggal = date('j', strtotime($waktu));
    $bulan_array = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    );
    $bl = date('n', strtotime($waktu));
    $bulan = $bulan_array[$bl];
    $tahun = date('Y', strtotime($waktu));
    $jam = date( 'H:i:s', strtotime($waktu));
    
    //untuk menampilkan hari, tanggal bulan tahun jam
    //return "$hari, $tanggal $bulan $tahun $jam";

    //untuk menampilkan hari, tanggal bulan tahun
    return "$hari $tanggal $bulan $tahun";
}
?>

      <div class="absolute">Depok, <?php echo format_hari_tanggal(date('Y-m-d')); ?> </div>
      <div class="absolute3">Mengetahui</div>
      <div class="absolute2">Kepala Yayasan</div>
      <div class="absolute1">(Laili Jumairoh, S.Ag.)</div>
 
	<script>
		window.print();
	</script>
 
</body>
</html>