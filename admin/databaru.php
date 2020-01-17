<?php $thisPage="Data"; ?>
<?php $title = "Data Siswa - Data Siswa v2.0" ?>
<?php $description = "Data Siswa - Data Siswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<?php
			$username = $_SESSION['admin']; // mengambil username dari session yang login
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE username='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<div class="jumbotron">
				<p>Pilih Menu</p><br />
				<a href="walikelas.php" data-toggle="tooltip" title="walikelas" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user"></span> Wali Kelas</a>
				<a href="guru.php" data-toggle="tooltip" title="guru" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Guru</a>
				<a href="siswa.php" data-toggle="tooltip" title="Data Siswa" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user"></span> Siswa</a>		
			</div> <!-- /.jumbotron -->	
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
//include("rekap.php");
include("footer.php"); // memanggil file footer.php
?>
