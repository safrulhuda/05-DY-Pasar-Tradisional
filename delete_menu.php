<?php
	require_once('koneksi.php');
	$nomor=$_POST['nomor'];
	$sql="DELETE FROM barang WHERE id_barang='$nomor'";
	$res = $conn->query($sql);
	if($res){
		echo"yes";
	}else{
		echo"gagal";
	}
?>