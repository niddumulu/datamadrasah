<?php $thisPage="Data"; ?>
<?php $title = "Data Rekap - Data Siswa v2.0" ?>
<?php $description = "rekap - Data Siswa v2.0" ?>
<?php 
//include("header.php"); // memanggil file header.php
include("akses_admin.php");
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<?php
	$username = $_SESSION['admin'];
	$sqlwakel = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE level='walikelas' "); // query jika filter dipilih					
	$sqlwakelpr = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE level='walikelas' AND jenis_kelamin='Perempuan' "); // query jika filter dipilih					
	$sqlwakellk = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE level='walikelas' AND jenis_kelamin='Laki-laki' "); // query jika filter dipilih
	$countwakel = mysqli_num_rows($sqlwakel);
	$countwakelpr = mysqli_num_rows($sqlwakelpr);
	$countwakellk = mysqli_num_rows($sqlwakellk);
	echo "Jumlah Wali Kelas : $countwakel, Terdiri dari : $countwakellk laki-laki dan $countwakelpr perempuan <br>";

	$username = $_SESSION['admin'];
	$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE level='siswa' "); // query jika filter dipilih					
	$count = mysqli_num_rows($sql);
	echo "Jumlah Siswa : $count";
?>	
<?php 
include("footer.php"); // memanggil file footer.php
?>