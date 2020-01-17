<?php $thisPage="Home"; ?>
<?php $title = "Data Induk v2.0" ?>
<?php $description = "Data MTs. Ma'arif NU 2 Cilongok" ?>
<?php require('akses.php'); ?> <!-- ini untuk mengakses session, lihat file akses.php lebih lanjut -->
<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<h1>Data Madrasah</h1>
				<p>Aplikasi data MTs. Ma'arif NU 2 Cilongok.</p>
				<a href="login.php" data-toggle="tooltip" title="Login!" class="btn btn-info" role="button"><span class="glyphicon glyphicon-king"></span> Admin/Kamad/Waka</a>
				<a href="login.php" data-toggle="tooltip" title="Login!" class="btn btn-info" role="button"><span class="glyphicon glyphicon-grain"></span> Wali Kelas/Guru</a>
				<a href="login.php" data-toggle="tooltip" title="Login!" class="btn btn-info" role="button"><span class="glyphicon glyphicon-usd"></span> Bendahara</a>
				<a href="login.php" data-toggle="tooltip" title="Login!" class="btn btn-info" role="button"><span class="glyphicon glyphicon-education"></span> Data Siswa</a>			
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>