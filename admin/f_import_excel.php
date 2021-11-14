
<?php
/*
-- Source Code from My Notes Code (www.mynotescode.com)
--
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/mynotescode
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
*/

// Load file koneksi.php
include "../config.php";

$id_quiz = $_GET['id_quiz'];

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

				$tmp_file = $_FILES['file']['tmp_name'];
				move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	$numrow = 1;
	foreach($sheet as $row){
		$soal = $row['B']; 
		$pilihan_1 = $row['C']; 
		$pilihan_2 = $row['D']; 
		$pilihan_3 = $row['E'];
		$pilihan_4 = $row['F']; 
		$jawaban = $row['G']; 
		$pembahasan = $row['H']; 

		// Cek jika semua data tidak diisi
		if($id_quiz == "" && $soal == "" && $pilihan_1 == "" && $pilihan_2 == "" && $pilihan_3 == "" && $pilihan_4 == "" && $jawaban == "" && $pembahasan == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Buat query Insert
			$query = "INSERT INTO tbl_soal (id_quiz,soal,pilihan_1,pilihan_2,pilihan_3,pilihan_4,jawaban,pembahasan,create_date) VALUES('$id_quiz','$soal','$pilihan_1','$pilihan_2','$pilihan_3','$pilihan_4','$jawaban','$pembahasan',NOW())";

			// Eksekusi $query
			mysqli_query($koneksi, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

echo "<script>alert('Berhasil');location='javascript:history.go(-1)';</script>"; // Redirect ke halaman awal
?> 