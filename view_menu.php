<?php 
	include 'koneksi.php';
	
	$sql="SELECT * FROM barang";
	
	$result = $conn->query($sql);
	echo'<table id="table-menu">
		<thead>
			<tr>
				<th>id_barang</th>
				<th>nama</th>
                <th>jenis</th>
				<th>harga</th>
				<th>stock</th>
				<th>keterangan</th>
                <th>gambar</th>
                <th>tools</th>
			</tr>		
		</thead>
		<tbody>';
	while($row=mysqli_fetch_assoc($result)){
		echo'<tr>
				<td>'.$row['id_barang'].'</td>
				<td>'.$row['nama'].'</td>
                <td>'.$row['jenis'].'</td>
				<td>'.$row['harga'].'</td>
				<td>'.$row['stock'].'</td>
				<td>'.$row['keterangan'].'</td>
                <td>'.$row['gambar'].'</td>
				<td><a id="'.$row['id_barang'].'" href="#" onclick="updatemenu(this.id)"><i class="fa fa-edit"></i> Update</a>  |  <a id="'.$row['id_barang'].'" href="#" onclick="del(this.id)"><i class="fa fa-remove"></i>  Delete</a></td>
			</tr>';
	}
	echo"</tbody></table>";
?>