<?php
	session_start();
	require_once('koneksi.php');
	
	$id_penjual = $_POST['id_penjual'];
	$password = $_POST['password'];
	
	$sql = "SELECT password FROM penjual WHERE id_penjual='$id_penjual'";
	$result = $conn->query($sql);
	
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		
		if($row['password']!=$password){
			echo 'no';
		}else{
			$_SESSION['id_penjual']=$id_penjual;
            echo 'yes';
		}
	}else{
		echo 'not';
	}
?>