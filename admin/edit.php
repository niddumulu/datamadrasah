<?php $thisPage="Edit "; ?>
<?php $title = "Edit Data  - Data Siswa v2.0" ?>
<?php $description = "Edit Data  - Data Siswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Edit &raquo;  Data</h2>
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
				$username		 = $_POST['username'];
				$level		     = $_POST['level'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];				
				$kelas	    	 = $_POST['kelas'];
				//$walikelas	     = $_POST['walikelas'];
				
				$update = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET username='$username', level='$level', nama='$nama', jenis_kelamin='$jenis_kelamin', kelas='$kelas' WHERE nim='$nim'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?nim=".$nim."&pesan=sukses"); // tambahkan pesan=sukses pada url
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
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php echo $row ['username']; ?>" class="form-control" placeholder="username" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">level</label>
					<div class="col-sm-2">
						<select name="level" class="form-control" required>
							<option value="<?php echo $row ['level']; ?>"><?php echo $row ['level']; ?></option>
							<option value="admin">admin</option>
							<option value="kamad">kamad</option>
							<option value="waka">waka</option>
							<option value="walikelas">Wali Kelas</option>
							<option value="guru">guru</option>
							<option value="siswa">siswa</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value="<?php echo $row ['jenis_kelamin']; ?>"><?php echo $row ['jenis_kelamin']; ?></option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Kelas</label>
					<div class="col-sm-2">
						<select name="kelas" class="form-control" >
							<option value="<?php echo $row['kelas']; ?>"> - Kelas Terbaru - </option>
							<option value="VII.1">VII.1</option>
							<option value="VII.2">VII.2</option>
							<option value="VII.3">VII.3</option>
							<option value="VII.4">VII.4</option>
							<option value="VII.5">VII.5</option>
							<option value="VII.6">VII.6</option>
							<option value="VII.7">VII.7</option>
							<option value="VIII.1">VIII.1</option>
							<option value="VIII.2">VIII.2</option>
							<option value="VIII.3">VIII.3</option>
							<option value="VIII.4">VIII.4</option>
							<option value="VIII.5">VIII.5</option>
							<option value="VIII.6">VIII.6</option>
							<option value="IX.1">IX.1</option>
							<option value="IX.2">IX.2</option>
							<option value="IX.3">IX.3</option>
							<option value="IX.4">IX.4</option>
							<option value="IX.5">IX.5</option>
							<option value="IX.6">IX.6</option>
							<option value="IX.7">IX.7</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>Kelas :</b> <span class="label label-success"><?php echo $row['kelas']; ?></span>
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
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Siswa">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>