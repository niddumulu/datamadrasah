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
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete'
				$nim = $_GET['nim']; // ambil nilai nim
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nim='$nim'"); // query untuk memilih entri dengan nim yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nim yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nim yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE nim='$nim'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan fakultas -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="admin" <?php if($filter == 'admin'){ echo 'selected'; } ?>>Admin</option>
						<option value="kamad" <?php if($filter == 'kamad'){ echo 'selected'; } ?>>Kamad</option>
						<option value="waka" <?php if($filter == 'waka'){ echo 'selected'; } ?>>Waka</option>
						<option value="walikelas" <?php if($filter == 'walikelas'){ echo 'selected'; } ?>>Wali Kelas</option>
						<option value="guru" <?php if($filter == 'guru'){ echo 'selected'; } ?>>Guru</option>
                        <option value="siswa" <?php if($filter == 'siswa'){ echo 'selected'; } ?>>Siswa</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
									
						<th>Level</th>
						<th>Tools</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE level='$filter' ORDER BY nim ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa ORDER BY nim ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
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
								<td>'.$row['jenis_kelamin'].'</td>
								
								
								<td>';
								if($row['level'] == 'admin'){
									echo '<span class="label label-success">Admin</span>';
								}
								else if ($row['level'] == 'guru' ){
									echo '<span class="label label-success">Guru</span>';
								}
								else if ($row['level'] == 'siswa' ){
									echo '<span class="label label-success">Siswa</span>';
								}
								else if ($row['level'] == 'kamad' ){
									echo '<span class="label label-success">Kamad</span>';
								}
								else if ($row['level'] == 'walikelas' ){
									echo '<span class="label label-success">Wali Kelas</span>';
								}
								else if ($row['level'] == 'waka' ){
									echo '<span class="label label-success">Wakil Kepala</span>';
								}
							echo '
								</td>
								<td>
									
									<a href="edit.php?nim='.$row['nim'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="password.php?nim='.$row['nim'].'" title="Ganti Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
									<a href="data.php?aksi=delete&nim='.$row['nim'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
