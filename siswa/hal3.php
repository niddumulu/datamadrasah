<?php $thisPage="Edit"; ?>
<?php $title = "Edit Sekolah Sebelumnya - Data Siswa" ?>
<?php $description = "Sekolah Sebelumnya" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Edit Sekolah Sebelumnya</h2>
			<hr />
			<form class="form-horizontal" action="" >
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<a href="hal1.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Data pribadi</a>
						<a href="hal2.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Data Keluarga</a>
						<a href="hal3.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Sekolah Sebelumya</a>
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
				
				$npsn		= $_POST['npsn'];
				$namasdmi	= $_POST['namasdmi'];
				$nopstun	= $_POST['nopstun'];
				$nilaiun	= $_POST['nilaiun'];
				$blankoij	= $_POST['blankoij'];
				$blankoskh	= $_POST['blankoskh'];
				
				$update = mysqli_query($koneksi, "UPDATE tbl_siswa SET npsn='$npsn', namasdmi='$namasdmi', nopstun='$nopstun', nilaiun='$nilaiun', blankoij='$blankoij', blankoskh='$blankoskh' WHERE username='$username'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: hal3.php?username=".$username."&pesan=sukses"); // tambahkan pesan=sukses pada url
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
					<label class="col-sm-3 control-label">NPSN</label>
					<div class="col-sm-4">
						<input type="text" name="npsn" value="<?php echo $row ['npsn']; ?>" class="form-control" placeholder="npsn" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Asal SD/MI</label>
					<div class="col-sm-4">
						<input type="text" name="namasdmi" value="<?php echo $row ['namasdmi']; ?>" class="form-control" placeholder="Nama SD/MI" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No. Peserta UN </label>
					<div class="col-sm-4">
						<input type="text" name="nopstun" value="<?php echo $row ['nopstun']; ?>" class="form-control" placeholder="No. Peserta UN SD/MI" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nilai Total UN</label>
					<div class="col-sm-4">
						<input type="text" name="nilaiun" value="<?php echo $row ['nilaiun']; ?>" class="form-control" placeholder="Nilai Total UN" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NO. Blanko Ijasah</label>
					<div class="col-sm-4">
						<input type="text" name="blankoij" value="<?php echo $row ['blankoij']; ?>" class="form-control" placeholder="blanko ijasah" required>
					</div>
				</div>
								
				<div class="form-group">
					<label class="col-sm-3 control-label">No. Blanko SKHUN</label>
					<div class="col-sm-4">
						<input type="text" name="blankoskh" value="<?php echo $row ['blankoskh']; ?>" class="form-control" placeholder="blanko skhun" required>
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
