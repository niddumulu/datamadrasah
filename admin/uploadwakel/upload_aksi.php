<!-- import excel ke mysql -->

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$username	= $data->val($i, 1);
	$nim	    = $data->val($i, 3);
	$nama  		= $data->val($i, 4);
	$jenis_kelamin  = $data->val($i, 5);
	$walikelas  = $data->val($i, 6);

	if($nim != "" && $walikelas !="" ){
		// input data ke database (table data_pegawai)
		$password = md5('12345');
		mysqli_query($koneksi,"INSERT into tbl_mahasiswa values('','$username','$password','walikelas','$nim','$nama','$jenis_kelamin','','','','','','','','','','','','','','','','','','','','','','$walikelas','')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:../walikelas.php?berhasil=$berhasil");
?>