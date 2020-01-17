<?php $thisPage="Dashboard"; ?>
<?php $title = "Dashboard Admin - Data Siswa" ?>
<?php $description = "Dashboard Admin - Data Siswa" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<?php
			$username = $_SESSION['admin']; // mengambil username dari session yang login
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE username='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<div class="jumbotron">
				<h1>Data Siswa </h1>
				<p>Aplikasi input data Siswa</p><br />
				<p>Anda login sebagai <strong><a href="profile.php"><?php echo $row['nama']; ?></a></strong>.</p>
				<a href="databaru.php" data-toggle="tooltip" title="Lihat Data" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data</a>
				<a href="tambah.php" data-toggle="tooltip" title="Tambah Data Siswa" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Data</a>
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>