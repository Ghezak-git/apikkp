<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// koneksi database
include '../config.php';


// menangkap data yang di kirim dari form
$nip = $_POST['nip_guru'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];
$gambar = $_FILES['gambar']['name'];

$token=$email ;
//cek user terdaftar
$sql_cek = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE email='$email' OR nip_guru='$nip'");
$r_cek = mysqli_num_rows($sql_cek);

if ($r_cek>0) {
	echo "<script>alert('Email atau NIP Telah Terdaftar');location='javascript:history.go(-1)';</script>";
}else{
	if ($gambar != "") {
		$extensi_boleh = array('png','jpg');
		$x = explode('.', $gambar);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['gambar']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_baru = $angka_acak.'-'.$gambar;
		if (in_array($ekstensi, $extensi_boleh) == true) {
			move_uploaded_file($file_tmp, '../admin/modul/'.$nama_baru);
			
            include('../admin/phpmailer/Exception.php');
			include('../admin/phpmailer/PHPMailer.php');
			include('../admin/phpmailer/SMTP.php');
			$email_pengirim = 'tugaskkp63@gmail.com'; // Isikan dengan email pengirim
			$nama_pengirim = 'Bimbel AIUEO'; // Isikan dengan nama pengirim
			$email_penerima = $_POST['email']; // Ambil email penerima dari inputan form
			$subjek = "Aktivasi Pendaftaran"; // Ambil subjek dari inputan form
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Username = $email_pengirim; // Email Pengirim
			$mail->Password = 'mantemand12'; // Isikan dengan Password email pengirim
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
			$mail->setFrom($email_pengirim, $nama_pengirim);
			$mail->addAddress($email_penerima, '');
			$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
			// Load file content.php
			ob_start();
			include "../admin/content.php";
			$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
			ob_end_clean();
			$mail->Subject = $subjek;
			$mail->Body = $content;
			$mail->AddEmbeddedImage('../admin/modul/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email
			$send = $mail->send();
			if($send){ // Jika Email berhasil dikirim
				// menginput data ke database
				mysqli_query($koneksi,"insert into tbl_user (nip_guru,email,fullname,gambar,username,password,status,token,keadaan,create_date) values('$nip','$email','$fullname','$nama_baru','$username','$password','$status','$token','tidak_aktif',NOW())");
		        echo "<script>alert('Berhasil Menambah akun');location='javascript:history.go(-1)';</script>";
		    }else{ // Jika Email gagal dikirim
		        // echo "<script>alert('Gagal bambanh');location='javascript:history.go(-1)';</script>";
		        echo '<h1>ERROR<br /><small>Error while sending email: '. $mail->ErrorInfo.'</small></h1>'; // Aktifkan untuk mengetahui error message
		    }
			// mengalihkan halaman kembali ke index.php
			// header("location:../admin/tambah_user.php");
		}else{
			echo "<script>alert('Maaf Hanya JPG atau PNG yang bisa');location='javascript:history.go(-1)';</script>";
		}
	}else{
		echo "<script>alert('Maaf Gambar tidak boleh kosong');location='javascript:history.go(-1)';</script>";
	}
}


 

 