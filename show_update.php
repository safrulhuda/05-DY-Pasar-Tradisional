<?php
	require_once('koneksi.php');

	$nomor=$_POST['id_barang'];
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $stock=$_POST['stock'];
    $keterangan=$_POST['keterangan'];

	$sql="UPDATE barang SET nama='$nama', harga='$harga', stock='$stock', keterangan='$keterangan' WHERE id_barang='$nomor'";

	$res = $conn->query($sql);
	if($res){
		echo"yes";
	}else{
		echo"gagal";
	}
?>