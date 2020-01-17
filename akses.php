<?php
if (session_status() == PHP_SESSION_NONE) { // mengecek apakah session belum dimulai
    session_start(); // maka mulai session
}
if(isset($_SESSION['admin'])){ // jika session adalah admin
	echo '<script language="javascript">document.location="admin/index.php";</script>'; // maka arahkan ke halaman admin
}
elseif(isset($_SESSION['siswa'])){ // jika session adalah user
	echo '<script language="javascript">document.location="siswa/index.php";</script>'; // maka arahkan ke halaman siswa
}
elseif(isset($_SESSION['walikelas'])){ // jika session adalah user
	echo '<script language="javascript">document.location="wali/index.php";</script>'; // maka arahkan ke halaman wali kelas
}
?>
