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
        <title>Store</title>
        <link href="font-awesome/css/font-awesome.min.css" rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Fugaz One' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
        <script src="asset/jquery-3.2.1.min.js"></script>
    </head>
    <script>
        $(document).ready(function(){
            $(".fitur ul li a").click(function(){
                $(this).parent().addClass('aktif');
                $(this).parent().siblings().removeClass();
                
                target = $(this).attr('href');
                $('#main-menu > div').not(target).hide();
                $(target).fadeIn(800);

                return false;
            });
                
            $(".send").mousedown(function(){
				$(this).css("transform","scale(0.95)");
            });
            $(".send").mouseup(function(){
				$(this).css("transform","scale(1)");
            });
            
            $(".shop button").click(function(){
                var target=$(this).attr("id");
                $(target).slideToggle("300");
            });
            
            $("#keranjang-close").click(function(){
                $('#keranjang').slideUp('300');
            });
            
            $('#search').click(function(){
                var search =$('#search-box').val();
                var target ='#search-view';
                $.get('search.php',{search:search}, function(result){
                    $('#search-view').html(result);
                    $('#main-menu > div').not(target).hide();
                    $(target).fadeIn(800);
                });
            });
        });
        
        function delRow(id){
            $("#"+id).parent().parent().parent().remove();
        }
        
        function set(id){
            $.get( "clickmenu.php", { id: id} )
                .done(function(data) {
                    $('#pilihan-menu tr:last').after(data);
            });
        }
    </script>
    <style>
        body{
            margin: 0px;    
        }
        
        .header{
            margin: 0px;
            width: 100%;
            height: 40px;
            background-position: fixed;
            background-color: #061B21;
        }
        
        .title{
            font-family: 'Fugaz One';
            margin-left: 44%;
            margin-top: 10px;
            display: inline-block;
            text-align: center;
            color: white;
        }
        
        .view-keranjang{
            border: none;
            background-color: transparent;
        }
        
        .shop{
            padding: 10px;
            float: right;
            margin-right: 25px;
        }
        
        .shop button{
            font-size: 15px;
            color: white;
            background-color: transparent;
            border: none;
            outline: none;
            cursor: pointer;
        }
        
        .header-wrap{
            height: 50px;
            width: 100%;
            background-color: #DCD9D9;
        }
        
        .header-title{
            font-family: 'Capriola';
            display: inline-block;
            font-size: 23px;
            color: black;
            float: left;
            padding: 10px;
        }
        
        .header-title a{
            text-decoration: none;
            color: black;
        }
        
        .search{
            display: inline-block;
            padding: 15px;
        }
        
        .fitur{
            float: right;
        }
        
        .fitur ul{
            list-style: none;
            margin: 0px;
            padding: 0px;
            overflow: hidden;
        }
        
        .fitur li{
            float: left;
        }
        
        .fitur ul li a{
            padding: 15px;
            display: block;
            text-decoration: none;
            color: black;
        }
        
        .fitur ul li a:hover{
            background-color: rgba(222, 232, 234, 0.8);
        }
        
        .menu{
            width: 100%;
        }
        
        .menu-item{
            display: inline-block;
            margin: 10px;
            height: 290px;
            width: 240px;
            background-color: #E1E4E5;
        }
        
        .image{
            background-size: cover;
            height: 150px;
            width: 100%;
        }
        
        .image-ket{
            padding-top: 4px;
            padding-left: 10px;
        }
        
        .send{
            padding: 10px;
            background-color: #1AB0D5;
            margin-top: -150px;
            margin-right: 20px;
            float: right;
        }
        
        .detail{
            float: right;
            margin-right: 20px;
        }

        .footer{
            font-family: 'Josefin Sans';
            background-color: #DCD9D9;
            text-align: center;
            width: 100%px;
            padding: 18px;
            color: black;
        }
        
        .container{
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        
        .keranjang{
            padding: 15px;
            position: absolute;
            z-index: 1;
            right: 0px;
            top: 0px;
            width: 300px;
            background: white;
            display: none;
        }
        
        .main-one{
    
        }
        
        .main-fitur{
            display: none;
        }
        
        table{
            border-collapse: collapse;
            width: 100%
        }
        
        table, th, td{
            border: 1px solid gray;
        }
        
        table td input{
            border: none;
        }
        
        .aktif{
            border-left: 4px solid #F8B510;
            background: rgba(203, 228, 235, 0.3);
        }
    </style>
    <body>
        <script>
            function hitung(id){
                var jumlah = $('#'+id).val();
                var harga = $('#'+id).parent().prev().children().val();
                var total = jumlah * harga;
                $('#'+id).parent().next().children().val(total);
                sum();
            }
            
            function sum(){
                var total=0;
                
                $('input[name^="jml"]').each(function() {
				    total = total + parseInt($(this).val());
			    });
                
                $('#total-harga').val(total);
                
            }
            function view(){  
                var target = $('.coba').attr('id');
                $('#main-menu > div').not(target).hide();
            }
            
            function load(){
                $('#main-daging').load('load_daging.php');
                $('#main-sayur').load('load_sayur.php');
                $('#main-rempah').load('load_rempah.php');
                $('#main-lainnya').load('load_lainnya.php');
            }
            
            setInterval(load, 2000);
            
            function send(){
                var formData = $('#orderan').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'send_order.php',
                    data:formData,
                    success: function(result) {
                        if(result=="yes"){
                            alert(result);
                            var print =$('#tabel').html();
                            $('#print').html(print);
                            printDiv('print');
                            document.location='index.php';
                        }else{
                            alert(result);
                        }
                    }   
                });
            }
            
            printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
            function printDiv(divId) {
                window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
                window.frames["print_frame"].window.focus();
                window.frames["print_frame"].window.print();
            }
        </script>
        
        
        <div class="header">
            <div class="title">
                <label>Setui Traditional Market</label>
            </div>
            <div class="shop">
                <button id="#keranjang"><i class="fa fa-shopping-basket"></i></button>
            </div>
        </div>
        <div class="container">
            <div class="keranjang" id="keranjang">
            <div><a id="keranjang-close" href="#"><i class="fa fa-close" style="float:right;"></i></a></div><br>
            <form action="" method="post">
                <table id="pilihan-menu">
                    <tr>
                        <th>Nama</th>
                        <th>Toko</th>
                        <th>Harga</th>
                        <th>Tools</th>
                    </tr>
                    <span class="push"></span>
                </table>
                <button id="submit-order" onclick="view()" name="submit-order" type="submit">Submit</button>
            </form>
            </div>
            <div class="header-wrap">
                <div class="header-title">
                    <a href="index.php"><i class="fa fa-building" style="color:#D38E0D;"></i>Pasar Tradisional Setui</a>
                </div>
                <div class="search">
                    <input type="search" id="search-box" name="search" placeholder="Search you want !">
                    <button id="search" type="submit"><i class="fa fa-search"></i>Search</button>
                </div>
                <div class="fitur">
                    <ul>
                        <li class="aktif"><a id="daging" href="#main-daging">Daging</a></li>
                        <li><a id="sayur" href="#main-sayur">Sayur-Sayuran</a></li>
                        <li><a id="rempah" href="#main-rempah">Rempah-Rempah</a></li>
                        <li><a id="lainnya" href="#main-lainnya">Lain-Lainnya</a></li>
                    </ul>
                </div>
            </div>
            <div id="main-menu">
                <div class="main-one" id="main-daging">
                    <?php include'load_daging.php';?>
                </div>
                <div class="main-fitur" id="main-sayur">
                    <?php include'load_sayur.php';?>
                </div>
                <div class="main-fitur" id="main-rempah">
                    <?php include'load_rempah.php';?>
                </div>
                <div class="main-fitur" id="main-lainnya">
                    <?php include'load_lainnya.php';?>
                </div>
                <?php include'show_pilih.php';?>
                <div id="search-view"></div>
            </div>
        </div>
        <div class="footer">
            2017 &copy; all right reserved || RPL-DY-KELOMPOK 5
        </div>
        <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank" style="display:none;"></iframe>
        <div id="print" style="display:none;"></div>
    </body>
</html>