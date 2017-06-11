<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require_once('koneksi.php');
    
    $sql="SELECT DISTINCT id_pembeli FROM pesanan";
    $result=$conn->query($sql);

    while($res=mysqli_fetch_assoc($result)){
        
        $id_pembeli=$res['id_pembeli'];
        
        $query="SELECT c.id_pembeli, b.nama, c.id_barang, a.nama, harga, jumlah FROM barang a JOIN pesanan c ON a.id_barang=c.id_barang JOIN pembeli b ON b.id_pembeli=c.id_pembeli WHERE c.id_pembeli='$id_pembeli'";
        $hasil=$conn->query($query);
        
        echo'<table id="table-menu">
            <thead>
                <tr>
                    <th>id pembeli</th>
                    <th>nama pembeli</th>
                    <th>id_barang</th>
                    <th>nama barang</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>total</th>
                </tr>		
            </thead>
            <tbody>';

        $jumlah = 0;
        while($row=mysqli_fetch_row($hasil)){
                $total = $row[4]*$row[5];
            echo'<tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td>'.$row[5].'</td>
                    <td>'.$total.'</td>        
                </tr>';
            $jumlah = $jumlah + $total;
        }
        echo '<tr>
                <td colspan="6">Jumlah</td>
                <td>'.$jumlah.'</td>
              </tr>';
        echo"</tbody></table>";
    }
?>