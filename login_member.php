<?php
	session_start();
	require_once('koneksi.php');
	
	$id_pembeli = $_POST['id_pembeli'];
	$password = $_POST['password'];
	
	$sql = "SELECT password FROM pembeli WHERE id_pembeli='$id_pembeli'";
	$result = $conn->query($sql);
	
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		
		if($row['password']!=$password){
			echo "no";
		}else{
			$_SESSION['id_pembeli']=$id_pembeli;
            echo "yes";
		}
	}else{
		echo "no";
	}
?>