<?php $thisPage="Data"; ?>
<?php $title = "Data Siswa - Data Siswa v2.0" ?>
<?php $description = "Data Siswa - Data Siswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Siswa</h2>
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
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Tools</th>
					</tr>
					<?php
					
					$wakel = $row['walikelas'];
					echo $wakel;
					$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE kelas='$wakel' ORDER BY nama ASC"); // query jika filter dipilih
					//$sqlsiswa = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim ");
					//mysqli_num_rows($sqlsiswa);
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nim'].'</td>
								<td><a href="profile_siswa.php?nim='.$row['nim'].'">'.$row['nama'].'</a></td>
								<td>		
									<a href="pindahkelas.php?nim='.$row['nim'].'" title="pindah kelas" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
									<a href="pindahsekolah.php?nim='.$row['nim'].'" title="pindah sekolah" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
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
