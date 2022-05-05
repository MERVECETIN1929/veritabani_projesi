<?php


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
    <title>GİRİŞ YAP</title>
</head>
<body>
<section id="menu">
        <a href="#"><div id="logo">bigell</div></a> 
</section>
   <div class="login">
    <div class ="login-screen">
    <div class="app-title">
          <b> <h1>GİRİŞ YAP</h1></b>
 
        </div>
     <form action="#" method="post">
        <div class ="login-form">
            <div class ="control-group">
                <input type="text" name="kullanıcı_adı" class="login-field" placeholder="Kullanıcı Adı" id="login-name">
                <label class="login-field-icn fui-user" for="login-name"></label>
            </div>
            <div class="control-group">
                <input type="password" name="sifre" class="login-field" placeholder="şifre" id="login-pass">
                <label class="login-field-icn fui-user" for="login-pass"></label>
            </div>
            <button href="giris_yap.php" name="login" class="btn btn-primary btn-large btn-block">GİRİŞ YAP</button>
            
        </div>
       
    </form>
        </div>
            </div>
           

</body>
</html>
<?php
 
if($_POST){
ob_start();
session_start();
include("ayar.php");
$kadi=$_POST["kullanıcı_adı"];
$ksifre=$_POST["sifre"];



if($vtys_isim==$kadi && $vtys_sifre==$ksifre)  {
    $_SESSION["giriş"] = "true";
    $_SESSION["vtys_ismi"]=$vtys_isim;
    header("Location:hesap.php");
}
else {
    if($kadi=="" or $ksifre=="") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}
 
}


?>
<style>

*{
    box-sizing: border-box;
 
}
*:focus{
    outline: none;
}

body{
    font-family: Arial, Helvetica, sans-serif;
    background: rgb(185, 213, 231);
    padding: 50px;
}
.login{
    margin: 20px auto;
    width: 300px;
    }
.login-screen{
    background-color: rgb(245, 253, 253);
    padding: 20px;
    border-radius: 5px;
    

}
.app-title{
    text-align: center;
    color: black;
    margin: 10px;
    padding: 0;
}
.login-form{
    text-align: center;
  }
  .control-group{
      margin-bottom: 10px;
      

  }
  input{
      text-align: center;
      background-color: darkgrey;
      border: 2px solid transparent;
      border-radius: 2px;
      font-size: 16px;
      font-weight: 200;
      padding: 10px 0;
      width: 250px;
      transition: border .5s;
    
  }
 input:focus{
    border: 2px solid black;
    box-shadow: none;
 }
 .btn{
        border: 2px solid transparent;
        background: rgb(25, 27, 52);
        color: white;
        font-size: 16px;
        line-height: 25px;
        padding: 10px 0;
        text-decoration: none;
        text-shadow: none ;
        border-radius: 3px;
        transition: 0.25s;
        display: block;
        width: 250px;
        margin: 0 auto;
        margin-top: 5px;
    }
    .btn :hover{
        background-color: tomato;
    }
    
    h1{
        font-size: 25px;
    }
    .düzenle{
        top:20px;
        color: black;
        margin: 10px;
        text-align: center;
        font-size: 15px;
        width: 250px;
        padding: 10px;
         border-radius: 2px;  
        border: 5px solid gray;
        margin: 10px;
    }
    #menu{
    height: 10px;
    margin: 0;
    padding-bottom: 30px;
    padding-top: 5px;
    margin-bottom: 50px;
    background-color: rgb(185, 213, 231);
    position: sticky;
    top:0; 

}
#logo{
    font-size: 80px;
    float: left;
    line-height: 10px;
    padding : 5px;
    
    font-family: 'Cookie', cursive;
    color:rgb(8, 8, 119);
    
    
}
</style>