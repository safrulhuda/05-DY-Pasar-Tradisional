<?php
    session_start();
    require_once('koneksi.php');
    
    $id_pembeli =$_SESSION['id_pembeli'];
    $id_barang =$_POST['id_barang'];
    $jumlah = $_POST['jumlah_order'];

    for($i=0; $i<count($id_barang); $i++){
			$sql = "INSERT INTO pesanan VALUES ('$id_pembeli','$id_barang[$i]','$jumlah[$i]')";
			$result =$conn->query($sql);
            
    }

    if($result){
		echo "yes";
        
	}else{
		echo "tidak berhasil";
	}
?>