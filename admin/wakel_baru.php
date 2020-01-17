<?php $thisPage="Siswa Baru"; ?>
<?php $title = "Siswa baru- Data Siswa v2.0" ?>
<?php $description = "Siswa Baru - Data Siswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("upload/koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<?php 
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<p>Menu - Siswa Baru</p><br />
				<a href="tambahsiswa.php" data-toggle="tooltip" title="Tambah Siswa" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Siswa</a>
				<a href="tambahguru.php" data-toggle="tooltip" title="Tambah Guru" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Guru</a>
				<a href="upload/upload.php" data-toggle="tooltip" title="Tambah Siswa" class="btn btn-light" role="button"><span class="glyphicon glyphicon-upload"></span> Upload Via Excel</a>
			</div> <!-- /.jumbotron -->
			
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIS </th>
						<th>Nama </th>
						<th>JK</th>
					</tr>
					<?php					
					$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE kelas='' AND walikelas='' "); // query jika filter dipilih					
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td><a href="profile_siswa.php?nim='.$row['nim'].'">'.$row['nama'].'</a></td>
								<td>'.$row['nama'].'</td>
								<td>'.$row['jenis_kelamin'].'</td>
								<td>		
									<a href="edit.php?nim='.$row['nim'].'" title="edit wali kelas" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
									<a href="hapus.php?nim='.$row['nim'].'" title="pindah sekolah" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
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
include("../footer.php"); // memanggil file footer.php
?>
