<?php
    require_once('koneksi.php');

    $id_pembeli =$_POST['id'];

    $sql="DELETE FROM pesanan WHERE id_pembeli='$id_pembeli'";
    $result=$conn->query($sql);
    
    if($result){
        echo 'yes';
    }else{
        echo 'no';
    }
?>