<?php
    session_start();
	include'koneksi.php';

	$nama_file=$_FILES['gambar']['name'];
	$tmp_file=$_FILES['gambar']['tmp_name'];
	$path= "image/".$nama_file;
	$id_barang=$_POST['id_barang']; 
    $id_penjual=$_SESSION['id_penjual']; 
	$nama=$_POST['nama'];
    $jenis=$_POST['jenis'];
	$harga=$_POST['harga'];
	$stock=$_POST['stock'];
    $keterangan=$_POST['keterangan'];
	
	$sql="INSERT INTO barang VALUES('$id_barang','$id_penjual','$nama','$jenis','$harga','$stock','$keterangan','$nama_file')";
	
	if(move_uploaded_file($tmp_file,$path)) {
		$res=$conn->query($sql);
		if($res){
			echo'<tr>
					<td>'.$id_barang.'</td>
					<td>'.$nama.'</td>
                    <td>'.$jenis.'</td>
					<td>'.$harga.'</td>
					<td>'.$stock.'</td>
                    <td>'.$keterangan.'</td>
					<td>'.$nama_file.'</td>
					<td><a id="'.$id_barang.'" href="#update" class="" onclick ="update(this.id)" data-toggle="modal"><i class="fa fa-edit"></i> Update</a>  |  <a id="'.$id_barang.'" href="#" onclick="del(this.id)"><i class="fa fa-remove"></i>  Delete</a></td>
				</tr>';
		}else{
			echo"gagal";
		}
	}else{
		echo "no";
	}
?>