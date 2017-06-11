<?php
    include'koneksi.php';
    $id_barang=$_GET['id'];
	$sql="SELECT a.nama, toko FROM barang a JOIN penjual b ON a.id_penjual=b.id_penjual WHERE id_barang='$id_barang'";
	$result=$conn->query($sql);
    $row=mysqli_fetch_assoc($result);

    echo'<div><input class="view-keranjang" type="text" name="order[]" value="'.$row['nama'].'" readonly></div>';
?>