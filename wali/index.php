<?php $thisPage="Dashboard"; ?>
<?php $title = "Dashboard Walikelas - Data Siswa" ?>
<?php $description = "Dashboard Walikelas - Data Siswa" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
						
				<?php
				$username = $_SESSION['user']; // mengambil username dari session yang login
				$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE username='$username'"); // query memilih entri username pada database
				if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
				}else{
					$row = mysqli_fetch_assoc($sql);
				}
				?>		
				<p>Selamat datang <strong><?php echo $row['nama']; ?></strong>.</p>
				<p>Anda login sebagai Walikelas <strong><?php echo $row['walikelas']; ?></strong></p> 
				<a href="data.php" data-toggle="tooltip" title="Lihat Data Siswa" class="btn btn-sm btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data</a>
				<a href="profile.php?username=<?php echo $row['username']; ?>" data-toggle="tooltip" title="Profile" class="btn btn-sm btn-success" role="button"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Profile</a>
				<a href="password.php?username=<?php echo $row['username']; ?>" data-toggle="tooltip" title="Ganti Password Siswa"class="btn btn-sm btn-warning" role="button"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Ganti Password</a>
								
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
	
<?php 
include("footer.php"); // memanggil file footer.php
?>
