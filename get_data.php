<?php
    require_once('koneksi.php');

    $id =$_GET['id'];

    $sql="SELECT * FROM barang WHERE id_barang='$id'";

    $result=$conn->query($sql);

    while($row=mysqli_fetch_assoc($result)){
        $nama=$row['nama'];
        $harga=$row['harga'];
        $stock=$row['stock'];
        $keterangan=$row['keterangan'];
    }

    echo '<form id="form-update" method="post" onsubmit="saveupdate(); return false;" enctype="multipart/form-data">
                    <div class="form-control">
                        <label for="id_barang">id barang</label>
                        <input class="form-input" type="text" id="id_barang" name="id_barang" value="'.$id.'" readonly/>
                    </div>
                    <div class="form-control">
                        <label for="nama">nama</label>
                        <input class="form-input" type="text" id="nama" name="nama" value="'.$nama.'" required/>
                    </div>
                    <div class="form-control">
                        <label for="harga">harga</label>
                        <input class="form-input" type="number" id="harga" name="harga" value="'.$harga.'" required/>
                    </div>
                    <div class="form-control">
                        <label for="stock">stock</label>
                        <input class="form-input" type="number" id="stock" name="stock" value="'.$stock.'" required/>
                    </div>
                    <div class="form-control">
                        <label for="keterangan">keterangan</label>
                        <input class="form-input" type="text" id="keterangan" name="keterangan" value="'.$keterangan.'" required/>
                    </div>
                    <div class="form-control">
                        <button type="submit"><i class="fa fa-send"></i> save edit</button>
                    </div>
                </form>';
?>