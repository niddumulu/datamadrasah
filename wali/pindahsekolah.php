<?php $thisPage="Pindah Sekolah"; ?>
<?php $title = "Pindah Sekolah - Data Siswa" ?>
<?php $description = "Pindah Sekolah - Data Siswa" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Pindah Sekolah</h2>
			<hr />		
			<?php
			$nim = $_GET['nim']; // assigment nim dengan nilai nim yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'"); // query untuk memilih entri data dengan nilai nim terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" ditekan
				$kelas		= $_POST['kelas'];
				$alasan		= $_POST['alasan'];
				$level		= $_POST['level'];
				
				$update = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET kelas='$kelas', alasan='$alasan', level='$level' WHERE nim='$nim'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: pindahsekolah.php?nim=".$nim."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}		
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Siswa</label>
					<div class="col-sm-2">
					<input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" placeholder="nama" required>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Pindah Ke</label>
					<div class="col-sm-2">
					<input type="text" name="kelas" value="<?php //echo $row['kelas']; ?>" class="form-control" placeholder="pindahke" required>
					</div>
                    <div class="col-sm-3">
                    <b>Kelas Lama :</b> <span class="label label-success"><?php echo $row['kelas']; ?></span>
				    </div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Alasan Pindah</label>
					<div class="col-sm-2">
					<input type="text" name="alasan" value="<?php echo $row['alasan']; ?>" class="form-control" placeholder="alasan" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-2">
					<input type="hidden" name="level" value="<?php echo 'mutasi'; ?>" class="form-control" placeholder="mutasi" required>
					</div>
				</div>
				
				
				<!--<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php //echo $row['username']; ?>" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" value="<?php //echo $row['password']; ?>" class="form-control" placeholder="Password">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Pindah" data-toggle="tooltip" title="Pindahkan Data Siswa">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>