
    <?php
        include "koneksi.php";
        
        $id_pembeli =$_POST["id_pembeli"];
        $password =$_POST["password"];
        $nama =$_POST["nama"];
        $alamat =$_POST["alamat"];
        $no_hp =$_POST["no_hp"];
        $plat_kendaraan =$_POST["plat_kendaraan"];
        $jenis_kendaraan =$_POST["jenis_kendaraan"];
        $tarif =$_POST["tarif"];


        $sql="INSERT INTO pembeli VALUES ('$id_pembeli', '$password', '$nama', '$alamat', '$no_hp', '$plat_kendaraan', '$jenis_kendaraan', '$tarif')";
        $result=$conn->query($sql);

        if($result){
            echo "<div>
                    <div>
                     <label>username :</label>$id_pembeli
                    </div>
                    <div>
                     <label>password :</label>$password
                    </div>
                 </div>";
        }
        else{
            echo 'no';
        }
        
    ?>
