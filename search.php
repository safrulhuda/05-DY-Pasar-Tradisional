<?php
    require_once('koneksi.php');

    $part =$_GET['search'];

    $sql="SELECT id_barang, a.nama, harga, toko, stock, keterangan, gambar FROM barang a JOIN penjual b ON a.id_penjual=b.id_penjual WHERE a.nama LIKE '%$part%'";
    $result=$conn->query($sql);
  
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            
            echo'<div class="menu-item">
                    <div class="image" style="background-image:url(image/'.$row['gambar'].')"></div>
                    <div class="image-ket">
                        <label><strong>'.$row['nama'].'</strong></label><br><br>
                        <i class="fa fa-dollar"> harga:'.$row['harga'].'</i><br>
                        <i class="fa fa-database"> stock:'.$row['stock'].'</i><br>
                        <i class="fa fa-building-o"> toko:'.$row['toko'].'</i><br>
                        <i class="fa fa-file-text-o"> keterangan:'.$row['keterangan'].'</i><br>
                    </div>
                    <a id="'.$row['id_barang'].'" onclick="set(this.id)" href="#">
                        <div class="send">
                            <i class="fa fa-send-o" style="color:white; font-size:40px;"></i>
                        </div>
                    </a>
                    <a href="#">
                        <div class="detail">
                            <i class="fa fa-ellipsis-v" style="color:black; font-size:18px;"></i>
                        </div>
                    </a>
                </div>';
        }
    }else{
        echo 'pencarian tidak ada';
    }
?>