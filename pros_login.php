
<?php
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login    = mysqli_query($conn, "select * from uts_praktikum where username='$username' and password='$password'");
	$login1    = mysqli_query($conn, "select * from admin where username='$username' and password='$password'");
	$result   = mysqli_num_rows($login);
	$result1   = mysqli_num_rows($login1);
	if($result>0){
		$user = mysqli_fetch_array($login);
		session_start();
		$_SESSION['username'] = $user['username'];
		
		header("location:profil.php");
	}
	else if($result1>0){
		$user1 = mysqli_fetch_array($login1);
		session_start();
		$_SESSION['username'] = $user1['username'];
		
		header("location:data.php");
	}else{
		echo"<script>alert('Username dan password salah')</script>";
		include 'login.php';
	}
?>