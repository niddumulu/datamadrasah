<?php $thisPage="Data"; ?>
<?php $title = "Data Wali Kelas - Data Siswa v2.0" ?>
<?php $description = "Wali Kelas - Data Siswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<p>Pilih Menu</p><br />
				<a href="walikelas.php" data-toggle="tooltip" title="walikelas" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user"></span> Wali Kelas</a>
				<a href="guru.php" data-toggle="tooltip" title="guru" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Guru</a>
				<a href="siswa.php" data-toggle="tooltip" title="Data Siswa" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user"></span> Siswa</a>
			</div> <!-- /.jumbotron -->
				<?php
				$username = $_SESSION['admin']; // mengambil username dari session yang login
				$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE username='$username'"); // query memilih entri username pada database
				if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
				}else{
					$row = mysqli_fetch_assoc($sql);
				}
				?>			

			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Nama Wali Kelas </th>
						<th>Kelas </th>
						<th>Tools</th>
					</tr>
					<?php	
					//$walikelas = 'walikelas';				
					$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE level='walikelas' ORDER BY walikelas ASC "); // query jika filter dipilih					
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td><a href="profile_wali.php?nim='.$row['nim'].'">'.$row['nama'].'</a></td>
								<td>'.$row['walikelas'].'</td>
								<td>		
									<a href="edit_wali_kelas.php?nim='.$row['nim'].'" title="edit wali kelas" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
									</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>
