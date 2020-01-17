<?php $thisPage="Profile"; ?>
<?php $title = "Profile - Data Siswa v2.0" ?>
<?php $description = "Halaman Profile" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Profile</h2>
			<hr />
			<?php
			$username = $_SESSION['user']; // mengambil username dari session yang login
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE username='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data profile -->
			<table class="table table-striped table-condensed">
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
				
				<tr>
					<th>Nama </th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
				
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo $row['jenis_kelamin']; ?></td>
				</tr>
				<tr>
					<th>Tempat & Tanggal Lahir</th>
					<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir']; ?></td>
				</tr>
				
				<tr>
					<th>Alamat Sekarang</th>
					<td><?php echo $row['alamat_sekarang']; ?></td>
				</tr>
				<tr>
					<th>No Hp/Telp</th>
					<td><?php echo $row['no_telepon']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				
				
			</table>
			
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Dashboard</a>
			<a href="password.php?username=<?php echo $row['username']; ?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ganti Password</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>
