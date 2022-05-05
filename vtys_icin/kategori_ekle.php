<?php
include("baglanti2.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KATEGORİ EKLE</title>
</head>
<body>
<div class="login">
    <div class ="login-screen">
    <div class="app-title">
     
    <b> <h1>KATEGORİ EKLE</h1></b>
        </div>
    <form action="#" method="POST">
        
    <input type="text" name="kategori_isim" class="login-field" id="login-name" required>
    <button type="submit" name="login" class="btn btn-primary btn-large btn-block">EKLE</button>
</form>
</div>
            </div>
 
</body>
</html>
<?php
if($_POST){
    $kadi=$_POST["kategori_isim"];
    
    $sorgu=$conn->prepare("INSERT INTO `kategoriler`( `kategori_isim`) VALUES (?)");
    $ekle=$sorgu->execute(array( $kadi));
    if($ekle){
        header("location:hesap.php");
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
      padding: 10px 2px;
      width: 250px;
  
    
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
</style>