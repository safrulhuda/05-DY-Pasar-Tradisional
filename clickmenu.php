<?php
    include'koneksi.php';
    $id_barang=$_GET['id'];
	$sql="SELECT a.nama, toko, a.harga FROM barang a JOIN penjual b ON a.id_penjual=b.id_penjual WHERE id_barang='$id_barang'";
	$result=$conn->query($sql);
    $row=mysqli_fetch_assoc($result);

    echo'<tr>
            <td><input class="view-keranjang" type="text" name="order[]" value="'.$row['nama'].'" readonly></td>
            <td><span>'.$row['toko'].'</span></td>
            <td><span>'.$row['harga'].'</span></td>
            <td style="text-align:center;"><span><a id="'.$row['toko'].'" onclick="delRow(this.id)" href="javascript:void(0)"><i class="fa fa-close"></a></i></span></td>
        </tr>';
?>