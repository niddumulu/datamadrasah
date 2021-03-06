<?php $thisPage="Tambah"; ?>
<?php $title = "Tambah Data Siswa - Data Siswa v2.0" ?>
<?php $description = "Tambah Data Siswa - Data Siswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<p>Pilih Menu</p><br />
				<a href="tambahsiswa.php" data-toggle="tooltip" title="Tambah Siswa" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Siswa</a>
				<a href="tambahguru.php" data-toggle="tooltip" title="Tambah Guru" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Guru</a>
				<a href="upload/upload.php" data-toggle="tooltip" title="Tambah Siswa" class="btn btn-light" role="button"><span class="glyphicon glyphicon-upload"></span> Upload Via Excel</a>
			</div> <!-- /.jumbotron -->
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" ditekan
				$nim		     = $_POST['nim'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$username		 = $_POST['username'];
				$pass1	         = $_POST['pass1'];
				$pass2           = $_POST['pass2'];
				$level			 = $_POST['level'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE nim='$nim'"); // query untuk memilih entri dengan nim terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah nim yang akan ditambahkan tidak ada dalam database
					if($pass1 == $pass2){ // mengecek apakah nilai pada pass1 dan pass2 bernilai sama
						$pass = md5($pass1); // assigment variabel pass dengan nilai pass1 yang sudah dienkripsi dengan md5
						$insert = mysqli_query($koneksi, "INSERT INTO tbl_siswa(nim, nama, jenis_kelamin, username, password, level) VALUES('$nim','$nama', '$jenis_kelamin', '$username',  '$pass', '$level')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						//$insert = mysqli_query($koneksi, "INSERT INTO tbl_nilaiqh(nim, username) VALUES('$nim','$username')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database

						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data Mahasiswa Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Mahasiswa Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Mahasiswa Gagal Di simpan!'
						}
					} else{ // mengecek jika password yang diinput tidak sama
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama!</div>'; // maka tampilkan 'Password Tidak sama!'
					}
				}else{ // mengecek jika nim yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'nim Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Induk</label>
					<div class="col-sm-2">
						<input type="text" name="nim" class="form-control" placeholder="Nomor Induk Siswa" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Lengkap</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama Sesuai Ijasah" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> - Pilih - </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" class="form-control" placeholder="Username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ulangi Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass2" class="form-control" placeholder="Ulangi Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data mahasiswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-1">
					<input type="hidden" name="level" value="<?php echo 'siswa'; ?>" class="form-control" placeholder="siswa" required>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>
