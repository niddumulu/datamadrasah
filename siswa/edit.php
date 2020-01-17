<?php $thisPage="Edit"; ?>
<?php $title = "Edit Profile - Data Siswa" ?>
<?php $description = "Halaman Edit" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Edit Profile</h2>
			<hr />
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<a href="hal1.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Halaman 1</a>
						<a href="hal2.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Halaman 2</a>
						<a href="index.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Batal">Kembali</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>