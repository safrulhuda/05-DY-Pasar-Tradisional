<?php
    session_start();
    
    if(!isset($_SESSION['id_penjual'])){
        header('location:login.php');   
    }
    $id_penjual =$_SESSION['id_penjual'];
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Pedagang</title>
        <link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Chivo' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link href='font-awesome/css/font-awesome.min.css' rel='stylesheet'>
        <script src='asset/jquery-3.2.1.min.js'></script>
    </head>
    <script>
        $(document).ready(function(){
            $(".main ul li a").click(function(){
                var target=$(this).attr('href');
                $('#main > div').not(target).hide();
                $(target).show();
                
                return false;
            });
            
            $("#menu-one a").click(function(){     
                $(this).parent().addClass('active-one');
                $(this).parent().siblings().removeClass();
                
             });
                
            $("#menu-two a").click(function(){
                $(this).parent().addClass('active-two');
                $(this).parent().siblings().removeClass();
                            
            });
                
            $("#menu-three a").click(function(){
                $(this).parent().addClass('active-three');
                $(this).parent().siblings().removeClass();
            });
            
            $("#form-menu").submit(function(e){
					e.preventDefault();
					var formData = new FormData(this);
					
					$.ajax({
						type: 'POST',
						url: 'add_menu.php',
						data: formData,
						cache:false,
						contentType: false,
						processData: false,
						success: function(data){
                                
                                if(data!='gagal'){
								    $("#table-menu").append(data);
                                    alert('berhasil');
                                    $("#form-menu").find("input, select").val("");
                                    $("#list-barang").click();
                                }else{
                                    alert(data);
                                }
						}
					});
					return false;
            });
        });
        
        function update(nomor){
            $.post("show_update.php", {nomor : nomor}, function(result){
                $("#body").html(result);
            });
        }
        
        function updatemenu(id){
           $.get('get_data.php', {id:id}, function(result){
                $('#form-tambah').html(result);
                $('#tambah-barang').click();
           });  
        }
        
        function saveupdate(){
           var formData = $('#form-update').serialize();
            $.ajax({
                type: 'POST',
                url: 'show_update.php',
                data:formData,
                success: function(result) {
                    if(result=="yes"){
                        alert("berhasil");
                        $('#list-barang').click();
                        document.location="admin.php";
                    }else{
                        alert("tidak berhasil");
                    }
                }   
            }); 
        }
        
        function del(nomor){
            $.post("delete_menu.php", {nomor : nomor}, function(result){
                if(result=="yes"){
                    $("#"+nomor).parent().parent().remove();
                }else{
                    alert(result);
                }
            });
        }
        
        function load(){
        var target = document.getElementById("menu-barang");
        $(target).load("view_menu.php");
    }
        setInterval(load, 2000);
    </script>
    <style>
        
        body{
            margin: 0px;
            background-color: #E7E2E1;
        }
        
        .header{
            position: fixed;
            z-index: 1;
            top: 0px;
            left: 0px;
            display: block;
            margin: 0px;
            height: 50px;
            width: 100%;
            background-color: #156A75;
        }
        
        .header-title{
            font-family: 'Capriola';
            font-size: 18px;
            color: white;
            padding: 14.5px 94.5px;
            background-color: #1AC1D5;
            float: left;
        }
        
        .header ul{
            list-style: none;
            overflow: hidden;
            margin: 0px;
            float: right;
            padding: 13.5px;
        }
        
        .header li{
            border-right: 1px solid white;
            float: left;
            padding: 0px 10px;
        }
        
        .header li a{
            font-family: 'Chivo';
            color: white;
            text-decoration: none;
            display: block;
        }
        
        .header li a i{
            font-size: 20px;
            color: white;
        }
        
        .main{
            margin-top: 50px;
            width: 100%;
            height: 100%;
        }
        
        .menu{
            float: left;
            height: 800px;
            width: 250px;
            background-color: #E9ECEE;  
        }
        
        .menu img{
            margin: 25px 25px;
            border-radius: 200px;
            height: 70px;
            width: 70;
        }
        
        .home{
            background-size: cover;
            background-image: url(image/wf.jpg);
        }

        .home-profil{
            background-color: rgba(177, 181, 182, 0.4); 
            text-align: center;
            padding: 5px;
            color: black;
        }
        
        .menu-list{
            margin-top: -1px;
            list-style: none;
            overflow: hidden;
            padding: 0px 0px;
        }
        
        .menu-list li{
            font-family: 'Chivo';
            width: 100%;
        }
        
        .menu-list li a{
            color: black;
            padding: 18px;
            display: block;
            background-color: transparent;
            text-decoration: none;
        }
        
        .menu-list li a:active{
            color: white;
        }
    
        #tambah-menu{
            display: none;
        }
        
        #pemesanan{
            display: none;
        }
        
        #bantuan{
            display: none;
        }
        
        #menu-one:hover{
            background-color: rgba(168, 224, 63, 0.8);
            color: white;
        }
        
        #menu-two:hover{
            background-color: rgba(238, 197, 27, 0.8);
            color: white;
        }
        
        #menu-three:hover{
            background-color: rgba(17, 177, 177, 0.8);
            color: white;
        }
        
        .active-one{
            border-left: 5px solid rgba(51, 56, 56, 0.7);
            background: #A8E03F;
            color: white;
        }
        
        .active-two{
            border-left: 5px solid rgba(51, 56, 56, 0.7);
            background: #EEC51B;
            color: white;
        }
        
        .active-three{
            border-left: 5px solid rgba(51, 56, 56, 0.7);
            background: #11B1B1;
            color: white;
        }
        
        .form-title-one{
            background-color: #A8E03F;
            padding: 10px;
            margin-bottom: 30px;
        }
        
        .form-title-one span{
            font-family: 'Josefin Sans';
            font-size: 18px;
            color: white;
            margin-left: 25px;
        }
        
        .form-title-two{
            background-color: #EEC51B;
            padding: 10px;
            margin-bottom: 30px;
        }
        
        .form-title-two span{
            font-family: 'Josefin Sans';
            font-size: 18px;
            color: white;
            margin-left: 25px;
        }
        
        .form-title-three{
            background-color: #11B1B1;
            padding: 10px;
            margin-bottom: 30px;
        }
        
        .form-title-three span{
            font-family: 'Josefin Sans';
            font-size: 18px;
            color: white;
            margin-left: 25px;
        }
        
        .form-control{
            font-family: 'Raleway';
            margin-left: 20%;
            margin-right: 50%;
            padding: 10px;
        }
        
        .form-input{
            background-color: none;
            width: 270px;
            margin-top: -4px;
            float: right;
            font-size: 18px;
            margin-left: 20px;
        }
        
        .form-control button{
            padding: 10px;
            color: white;
            border: none;
            background-color: #1C9849;
        }
        
        table{
            border-collapse:collapse;
        }
        
        table, th, td{
            border: 1px solid black;
        }
        
        a{
            text-decoration: none;
            color: black;
        }
    </style>
    <body>
        <div class="header">
            <div class="header-title">
                <i class="fa fa-home"></i> home
            </div>
            <ul>
                <li>
                    <a href="#">Info <i class="fa fa-info"></i></a>
                </li>
                <li>
                    <a href="signout_admin.php">Sign Out <i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="menu">
                <div class="home">
                    <img src="image/user.png">
                    <div class="home-profil">
                        nama+mu
                    </div>
                </div>
                <div>
                    <ul class="menu-list">
                        <li class="active-one" id="menu-one">
                            <a id="list-barang" href="#list-menu"><i class="fa fa-cubes"></i> List Barang</a>
                        </li>
                         <li id="menu-two">
                            <a id="tambah-barang" href="#tambah-menu"><i class="fa fa-cloud-upload"></i> Tambah Barang</a>
                        </li>
                        <li id="menu-three">
                            <a href="#pemesanan"><i class="fa fa-envelope"></i> Pemesanan</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="main">
            <div id="list-menu">
                <div class="form-title-one">
                    <span><strong><i class="fa fa-clipboard"></i> List dagangan</strong></span>
                </div>
                <div id="menu-barang">
                    <?php include'view_menu.php';?>
                </div>
            </div>
            <div id="tambah-menu" class="tambah-menu">
                <div class="form-title-two">
                    <span><strong><i class="fa fa-clipboard"></i> Form dagangan</strong></span>
                </div>
                <div id="form-tambah">
                    <form id="form-menu" method="post" action="add_menu.php" enctype="multipart/form-data">
                    <div class="form-control">
                        <label for="id_barang">id barang</label>
                        <input class="form-input" type="text" id="id_barang" name="id_barang" required/>
                    </div>
                    <div class="form-control">
                        <label for="nama">nama</label>
                        <input class="form-input" type="text" id="nama" name="nama" required/>
                    </div>
                    <div class="form-control">
                        <label for="jenis">jenis</label>
                        <select class="form-input" name="jenis" id="jenis" required>
							<option value="0" disabled selected>Jenis Dagangan</option>
							<option value="daging">daging</option>
							<option value="sayur-sayuran">sayur-sayuran</option>
                            <option value="rempah-rempah">rempah-rempah</option>
                            <option value="lain-lainnya">lain-lainnya</option>
						</select>
                    </div>
                    <div class="form-control">
                        <label for="harga">harga</label>
                        <input class="form-input" type="number" id="harga" name="harga" required/>
                    </div>
                    <div class="form-control">
                        <label for="stock">stock</label>
                        <input class="form-input" type="number" id="stock" name="stock" required/>
                    </div>
                    <div class="form-control">
                        <label for="keterangan">keterangan</label>
                        <input class="form-input" type="text" id="keterangan" name="keterangan" required/>
                    </div>
                    <div class="form-control">
                        <label for="gambar">gambar</label>
                        <input type="file" id="gambar" name="gambar" required/>
                    </div>
                    <div class="form-control">
                        <button type="submit"><i class="fa fa-send"></i> submit</button>
                        <button type="reset" style="background-color:#ED3F1D;"><i class="fa fa-close "></i> cancel</button>
                    </div>
                </form>
                </div>
            </div>
            <div id="pemesanan" class="pemesanan">
                <div class="form-title-three">
                    <span><strong><i class="fa fa-clipboard"></i> Form dagangan</strong></span>
                </div>
<<<<<<< HEAD
                tabel pemesanan
=======
                    <?php include'view_order.php'; ?>
>>>>>>> IraSartika
            </div>
            </div>
        </div>
    </body>
</html>