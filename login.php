<!DOCTYPE html>

<html>
    <head>
        <title>Login</title>
        <link href='//fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Secular One' rel='stylesheet'>
        <link href='//fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
        <link href="font-awesome/css/font-awesome.min.css" rel='stylesheet'>
        <script src="asset/jquery-3.2.1.min.js"></script>
    </head>
    <script>
        $(document).ready(function(){
            $(".button").mousedown(function(){
				$(this).css("transform","scale(0.95)");
            });
            $(".button").mouseup(function(){
				$(this).css("transform","scale(1)");
            });
            $(".konten-form").mousedown(function(){
				$(this).css("transform","scale(0.95)");
            });
            $(".konten-form").mouseup(function(){
				$(this).css("transform","scale(1)");
            });
            
            $(".konten-form").click(function(){
				$(this).parent().hide();
                $(this).parent().siblings().slideDown(500);
            });
        });
    </script>
    <style>
        body{
            margin: 0px;
            background-size: cover;
            background-attachment: fixed;
            background-image: url(image/wdaw.jpg);
        }
        
        .body-konten{
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            z-index: -1;
            position: absolute;
            background-image: url(image/pattern1.png);
        }
        
        .title{
            font-family: 'Kavoon';
            color: black;
            font-size: 50px;
            text-align: center;
        }
        
        .login{
            width: 350px;
            margin: 0px auto;
            padding: 20px 0px;
            background-color: rgba(235, 236, 236, 0.8);
        }
        
        .login-admin{
            display: none;
            width: 350px;
            margin: 0px auto;
            padding: 20px 0px;
            background-color: rgba(235, 236, 236, 0.8);
        }
        
        .header-login{
            font-family: 'Secular One';
            font-size: 25px;
            color: #FABA1C;
            border-left: 5px solid #FAAD1D;
            padding: 0px 20px;
        }
        
        .input-form{
            position: relative;
            margin: 30px 50px;
        }
        
        .input-form input{
            font-family: 'Secular One';
            color: black;
            background-color: transparent;
            width: 100%;
            font-size: 25px;
            border: none;
            border-bottom: 1px solid white;
        }
        
        .label-text{
            font-family: 'Secular One';
            color: black;
            font-size: 18px;
            font-weight: normal;
            position: absolute;
            pointer-events: none;
            left: 0px;
            top: 5px;
            transition: 0.2s ease all;
        }
        
        .input-form input:focus ~ label, .input-form input:valid ~ label{
            top: -20px;
            font-size: 14px;
            color: #FABA1C;
        }
        
        .bar{
            position: relative;
            display: block;
        }
        
        .bar:before,
        .bar:after{
            content:'';
            height: 3px;
            width: 0;
            bottom: 1px;
            position: absolute;
            background: #FABA1C;
            transition: 0.2s ease all;
        }
        
        .bar:before{
            left: 50%;
        }
        
        .bar:after{
            right: 50%;
        }
        
        .input-form input:focus{
            border-color:transparent;
            outline: none;
        }
        
        .input-form input:focus ~ .bar:before,
        .input-form input:focus ~ .bar:after{
            width: 50%;
        }
        
        .btn{
            text-align: center;
        }
        
        .button{
            -webkit-box-shadow: 1px 0 5px 0.1px rgba(1,2,12,12);
            box-shadow: 1px 0 5px 0.1px rgba(1,2,12,12);
            display: inline-block;
        }
        
        .button button{
            color: white;
            font-size: 18px;
            background-color: #F2B623;
            border: none;
            padding: 15px 25px;
        }
        
        .konten-form{
            -webkit-box-shadow: 1px 0 5px 0.1px rgba(1,2,12,12);
            box-shadow: 1px 0 5px 0.1px rgba(1,2,12,12);
            font-size: 50px;
            background-color: rgba(28, 176, 231, 0.9);
            color: white;
            padding: 20px 25px;
            border-radius: 200px;
            position: absolute;
            z-index: 999;
            left: 59%;
            top: 22%;
            cursor: pointer;
        }
    </style>
    <script>
         function signinadmin(){
            var formData = $('#login-admin').serialize();
            $.ajax({
                type: 'POST',
                url: 'login_admin.php',
                data:formData,
                success: function(result) {
                    if(result=='yes'){
                        document.location='admin.php';
                    }else{
                        alert("password atau id anda salah");
                    }
                }
            });
        }
        
        function signinmember(){
            var formData = $('#login-member').serialize();
            $.ajax({
                type: 'POST',
                url: 'login_member.php',
                data:formData,
                success: function(result) {
                    if(result=='yes'){
                        document.location='index.php';
                    }else{
                        alert("password atau id anda salah");
                    }
                }
            });
        }
    </script>
    <body>
        <div class="body-konten"></div>
        <h1 class="title">Pasar Tradisional Setui</h1>
        <div>
            <div class="login">
                <div class="konten-form"><i class="fa fa-rocket"></i></div>
                <div class="header-login">
                    <h3>LOGIN PEMBELI</h3>
                </div>
                <form id="login-member" method="post" onsubmit="signinmember(); return false;">
                    <div class="input-form">
                        <input type="text" name="id_pembeli" required/><br>
                        <label class="label-text"><i class="fa fa-user"></i> ID PEMBELI</label>
                        <span class="bar"></span>
                    </div>
                    <div class="input-form">
                        <input type="password" name="password" required/><br>
                        <label class="label-text"><i class="fa fa-key"></i> PASSWORD</label>
                        <span class="bar"></span>
                    </div>
                    <div class="input-form btn">
                        <div class="button">
                            <button type="submit"><i class="fa fa-sign-in"></i> login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="login-admin">
                <div class="konten-form"><i class="fa fa-rocket"></i></div>
                <div class="header-login">
                    <h3>LOGIN PENJUAL</h3>
                </div>
                <form id="login-admin" method="post" onsubmit="signinadmin(); return false;">
                    <div class="input-form">
                        <input type="text" name="id_penjual" required/><br>
                        <label class="label-text"><i class="fa fa-user"></i> ID PENJUAL</label>
                        <span class="bar"></span>
                    </div>
                    <div class="input-form">
                        <input type="password" name="password" required/><br>
                        <label class="label-text"><i class="fa fa-key"></i> PASSWORD</label>
                        <span class="bar"></span>
                    </div>
                    <div class="input-form btn">
                        <div class="button">
                            <button type="submit"><i class="fa fa-sign-in"></i> login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>