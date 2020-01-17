<?php
include("akses_user.php"); // restriksi halaman user
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="../img/logo_ilmututorial_32x32.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
    <link href="../style.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>
	<!--
	Project      : Data Siswa v2.0
	Description	 : CRUD (Create, read, Update, Delete) PHP, MySQLi dan Bootstrap
	Author		 : Firman Dwi Jayanto
	Author URI   : http://www.facebook.com/firmandije 
	Website		 : http://www.ilmututorial.com
	Email	 	 : firmandije@gmail.com, firman@firmandije.com
	-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand visible-xs-block visible-sm-block" href="http://www.kangulumuddin.blogspot.com" target="_blank">bangnidd.com</a>
		  <a class="navbar-brand hidden-xs hidden-sm" href="http://www.kangulumuddin.blogspot.com" target="_blank">bangnidd.com</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-left">
			<li<?php if ($thisPage=="Dashboard") echo " class=\"active\""; ?>><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<form name="cari" method="post" action="cari.php" role="search" class="navbar-form navbar-left">
				<div class="form-group">
					<input type="text" name="carinim" placeholder="Cari NIM Siswa" class="form-control">
				</div>
				<button type="submit" name="submit" id="submit" value="search" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cari Data Mahasiswa">Cari</button>
			</form>
		  </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li<?php if ($thisPage=="Profile") echo " class=\"active\""; ?>><a href="profile.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
	        <a href="../logout.php" data-toggle="tooltip" data-placement="bottom" title="Logout" class="btn btn-danger navbar-btn" role="button"><span class="glyphicon glyphicon-off"></span> Logout</a>
	      </ul>
		</div>
	  </div>
	</nav>
	<!-- End navbar -->
