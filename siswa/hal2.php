<?php $thisPage="Edit"; ?>
<?php $title = "Edit Data Keluarga - Data Siswa" ?>
<?php $description = "Data Keluarga" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Edit Data Keluarga</h2>
			<hr />
			<form class="form-horizontal" action="" >
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<a href="hal1.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Data pribadi</a>
						<a href="hal2.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Data Keluarga</a>
						<a href="hal3.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Sekolah Sebelumnya</a>
					</div>
				</div>
			</form>
			<?php
			$username = $_SESSION['user']; // assigment username dengan nilai username yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE username='$username'"); // query untuk memilih entri data dengan nilai username terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" ditekan
				
				$namaayah	= $_POST['namaayah'];
				$namaibu	= $_POST['namaibu'];
				$nik		= $_POST['nik'];
				$nokk		= $_POST['nokk'];
				$nikayah	= $_POST['nikayah'];
				$nikibu		= $_POST['nikibu'];
				$jumlahsaudara		= $_POST['jumlahsaudara'];
				$anakke		= $_POST['anakke'];
				
				$update = mysqli_query($koneksi, "UPDATE tbl_siswa SET namaayah='$namaayah', namaibu='$namaibu', nik='$nik', nokk='$nokk', nikayah='$nikayah', nikibu='$nikibu', jumlahsaudara='$jumlahsaudara', anakke='$anakke' WHERE username='$username'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: hal2.php?username=".$username."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <- <a href="profile.php">Kembali ke Profile</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Ayah</label>
					<div class="col-sm-4">
						<input type="text" name="namaayah" value="<?php echo $row ['namaayah']; ?>" class="form-control" placeholder="Sesuaikan dengan ijasah" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Ibu</label>
					<div class="col-sm-4">
						<input type="text" name="namaibu" value="<?php echo $row ['namaibu']; ?>" class="form-control" placeholder="Sesuaikan dengan akta" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-4">
						<input type="text" name="nik" value="<?php echo $row ['nik']; ?>" class="form-control" placeholder="nik" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">No KK</label>
					<div class="col-sm-4">
						<input type="text" name="nokk" value="<?php echo $row ['nokk']; ?>" class="form-control" placeholder="nomor kartu keluarga" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK Ayah</label>
					<div class="col-sm-4">
						<input type="text" name="nikayah" value="<?php echo $row ['nikayah']; ?>" class="form-control" placeholder="nik ayah" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK Ibu</label>
					<div class="col-sm-4">
						<input type="text" name="nikibu" value="<?php echo $row ['nikibu']; ?>" class="form-control" placeholder="nik ibu" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jumlah Saudara</label>
					<div class="col-sm-4">
						<input type="text" name="jumlahsaudara" value="<?php echo $row ['jumlahsaudara']; ?>" class="form-control" placeholder="jumlah saudara" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Anak Ke</label>
					<div class="col-sm-4">
						<input type="text" name="anakke" value="<?php echo $row ['anakke']; ?>" class="form-control" placeholder="anak ke" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Siswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>
