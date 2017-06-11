<?php 
    if(isset($_POST['submit-order'])){
        require_once('koneksi.php');
        if(isset($_POST['order'])){
            echo'<script>view();</script>';
            $nama=$_POST['order'];

                echo'<div class="coba"  id="tabel">
                        <form id="orderan" onsubmit="send(); return false;" method="post">
                            <table>
                                <tr>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Jumlah Harga</th>
                                </tr>';

            for($i=0; $i<count($nama); $i++){
                $sql="SELECT id_barang, harga FROM barang where nama='$nama[$i]'";
                $res=$conn->query($sql);
                $row=mysqli_fetch_assoc($res);
                $harga=$row['harga'];

                echo'<tr>
                        <td><input type="text" name="id_barang[]" value="'.$row['id_barang'].'" readonly /></td>
                        <td><input type="text" name="nama_order[]" value="'.$nama[$i].'" readonly /></td>
                        <td><input type="text" name="harga" value="'.$row['harga'].'" readonly/></td>
                        <td><input id="'.$nama[$i].'" type="number" onkeyup="hitung(this.id)" name="jumlah_order[]"  value=1 /></td>
                        <td><input type="number" name="jml[]" value="'.$harga.'" readonly /></td>
                     </tr>';
            }
            echo'   
                <tr>
                    <td colspan="5" align="right"><input type="text" name="total" id="total-harga" value=0 readonly/></td>
                </tr>
            </table>
                <button type="submit" >SEND ORDER</button>
                </form>
                    </div>';
        }
    }
?>