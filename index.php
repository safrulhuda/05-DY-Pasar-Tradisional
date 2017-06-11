<?php
    session_start();
    
    if(!isset($_SESSION['id_pembeli'])){
        header('location:login.php');   
    }
    $id_penjual =$_SESSION['id_pembeli'];
?>
<!DOCTYPE html>

<html>
    <head>
        <title>HomePage</title>
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Lemon' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Londrina Solid' rel='stylesheet'>
        <script src="asset/jquery-3.2.1.min.js"></script>     
    </head>
    <script>
        $(document).ready(function(){
            $(".menu-one").mousedown(function(){
				$(this).css("transform","scale(0.95)");
            });
            $(".menu-one").mouseup(function(){
				$(this).css("transform","scale(1)");
            });
            $(".menu-two").mousedown(function(){
				$(this).css("transform","scale(0.95)");
            });
            $(".menu-two").mouseup(function(){
				$(this).css("transform","scale(1)");
            });
            $(".menu-three").mousedown(function(){
				$(this).css("transform","scale(0.95)");
            });
            $(".menu-three").mouseup(function(){
				$(this).css("transform","scale(1)");
            });
        });
    </script>
    <style>
        
        body{
            background-image: url(image/bg_dotted.png);
            background-repeat: repeat;
            margin: 0px;
            padding: 0px;
        }
        
        .container{
            position: relative;
            height: 100%;
            margin: 0px 200px;
            background-image: url(image/bg_dotted.png);
            background-repeat: repeat;
        }
        
        .header{
            background-image: url(image/background.fw-1-1.png);
            background-size: cover;
            padding: 10px;
        }
        
        .header-logo{
            font-family: 'Lemon';
            text-shadow: 1px 1px 8px rgba(150, 150, 150, 1);
            font-size: 45px;
            color: #421239;
            display: inline-block;
        }
        
        .header-logo i{
            color: #711654;
            font-size: 80px;
        }
        
        .menu-ul{
            overflow: hidden;
            margin: 0px;
            padding: 0px;
            list-style: none;
            float: right;
        }
        
        .menu-ul li{
            padding: 10px;
            text-align: center;
            float: left;
            margin: 10px 10px;
            background-color: rgba(217, 225, 229, 0.4);
        }
        
        .menu-ul li a{
            font-size: 18px;
            text-decoration: none;
            display: block;
        }
        
        .fitur-li-one a{
            color: #16C5DE;
        }
        
        .fitur-li-two a{
            color: #8BD81C;
        }
        
        .fitur-li-three a{
            color: #E9CC11;
        }
        
        .header-wrap{
            background-size: cover;
            background-image: url(image/sa.jpg);
            clear: both;
            margin-bottom: 15px;
        }
        
        .header-pixel{          
            position: absolute;
            width: 100%;
            z-index: 0;
            height: 330px;
            background-image: url(image/pattern1.png);
        }
        
        .header-wrap-text{      
            height: 250px;    
            color: white;
            padding: 40px 80px;
        }
        
        .header-wrap-text .text{
            font-family: 'Aladin';
            font-size: 25px;
            z-index: 1;
            position: absolute;
            color: white;
        }
        
        .row-wrap{
            background-color: rgba(29, 196, 250, 0.8);
            width: 100%;
            height: 3px;
            margin-top: -15px;
            margin-bottom: 5px;
        }
        
        .main-menu{
            margin-bottom: 10px;
        }
        
        .menu{
            width: 27%;
            height: 250px;
            min-width: 100px;
            float: left;
            color: white;
            padding: 10px;
        }
        
        .menu p{
            font-family: 'Amaranth';
            font-size: 16px;
        }
        
        .menu .icon{
            font-size: 60px;
        }
        
        .menu h3{
            font-family: 'Londrina Solid';
            letter-spacing: 2px;
        }
        
        .menu-one{
            margin-right: 6.325%;
            background-color: #F5A00C;
        }
        
        .menu-two{
            margin-right: 6.325%;
            background-color: #30B1D4;
        }
        
        .menu-three{
            background-color: #35DDEB;
        }
        
        .next-left{
            margin-top: 20%; 
            font-size: 35px;
            float: right;
        }
        
        .footer{
            margin-top: 5px;
            height: 30px;
            background-color: #DEE4EC;
            color: black;
            text-align: center;
            padding-top: 12px;
        }
    </style>
    <script>
        $(document).ready( function(){
           $('#pesan-becak').click(function(){
               alert("permintaan sedang di proses !");
           }); 
        });
        
        $(document).ready( function(){
           $('#pesan-kuli').click(function(){
               alert("permintaan sedang di proses !");
           }); 
        });
    </script>
    <body>
        <div class="container">
            <div class="header">
                <div class="header-logo">
                    <i class="fa fa-shopping-cart"></i> Mesin Belanja
                </div>
                <ul class="menu-ul">
                    <li class="fitur-li-one">
                        <a href="signout_member.php"><i class="fa fa-sign-out"></i><br/>sign out</a>
                    </li>
                    <li class="fitur-li-two">
                        <a href="#"><i class="fa fa-bell"></i><br/>notice</a>
                    </li>
                    <li class="fitur-li-three">
                        <a href="#"><i class="fa fa-info-circle"></i><br/>info</a>
                    </li>
                </ul>
            </div>
            <div class="header-wrap">
                <div class="header-pixel"></div>
                <div class="header-wrap-text">
                    <div class="text">
                        <h1><strong>WELCOME</strong><h1>
                        <h2>Selamat Datang di Website Belanja Pasar Tradisional Setui</h2>
                    </div>
                </div>
            </div>
            <div class="row-wrap">
            </div>
            <div class="main-menu">
                <a href="store.php">
                    <div class="menu menu-one">
                        <i class="fa fa-shopping-cart icon"></i>
                        <h3>BELANJA</h3>
                        <p>Ayo berbelanja di Pasar Tradisional Setui</p>
                        <i class="fa fa-angle-double-right next-left"></i>
                    </div>
                </a>
                <a id="pesan-becak" href="#">
                    <div class="menu menu-two">
                        <i class="fa fa-motorcycle icon"></i>
                        <h3>TUKANG BECAK</h3>
                        <p>Ayo dapatkan becak di Pasar Tradisional Setui</p>
                        <i class="fa fa-angle-double-right next-left"></i>
                    </div>
                </a>
                <a id="pesan-kuli" href="#">
                    <div class="menu menu-three">
                        <i class="fa fa-user-plus icon"></i>
                        <h3>KULI ANGKUT</h3>
                        <p>Ayo dapatkan kuli angkut di Pasar Tradisional Setui</p>
                        <i class="fa fa-angle-double-right next-left"></i>
                    </div>
                </a>
            </div>
            <br style="clear: both;">
            <div class="footer">
                2017 &copy; all right reserved
            </div>
        </div>
    </body>
</html>