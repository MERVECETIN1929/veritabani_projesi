<?php


include("baglanti2.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÜRÜN_KAYIT</title>
</head>
<body>
<section id="menu">
        <a href="ganasayfa.php"><div id="logo">bigell</div></a> 
</section>
   
         
<div class="login">
    <div class ="login-screen">
    <div class="app-title">
          <b> <h1>ÜRÜN EKLE</h1></b>
 
        </div>
     <form action="ürün_kayıt.php" method="post">
        <div class ="login-form">
            <div class ="control-group">
                <input type="text" name="ürün_isim" class="login-field" placeholder="Ürün İsmi" id="login-üname" required>
                <label class="login-field-icn fui-user" for="login-name"></label>
            </div>
            <div class="control-group">
                <input type="text" name="acıklama" class="login-field" placeholder="Acıklama" id="login-ac" required>
                <label class="login-field-icn fui-user" for="login-pass"></label>
            </div>
            <div class="control-group">
                <input type="int" name="fiyat" class="login-field" placeholder="Fiyat" id="login-f" required>
                <label class="login-field-icn fui-user" for="login-pass"></label>
            </div>
            <?php
            $sorgu=$conn->query("SELECT*FROM kategoriler");
            $satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);
            ?>
            <select name="kategoriler" id="sel">
  <?php foreach ($satırlar as $satır) {?>
    <option value="<?php echo $satır["kategori_id"];?>"><?php echo  $satır["kategori_isim"]?></option>
     <?php } ?>
    </select>
            <button type="submit" class="signupbtn">EKLE</button>
            
        </div>
       
    </form>
        </div>
            </div>

</body>
</html>

<?php
session_start();
ob_start();
include("baglanti2.php");

$sorgu=$conn->query("SELECT * FROM freelancer where fkullanıcı_adı='".$_SESSION["kullanıcı_adı"]."'");
$row=$sorgu->fetch(PDO::FETCH_ASSOC);
$sor=$conn->query("SELECT * FROM kategoriler where kategori_id='".@$_POST["kategoriler"]."'");
$satır=$sor->fetch(PDO::FETCH_ASSOC);

if(strlen(@$_POST["acıklama"])>200){
    echo "200 karakterden fazla açıklama giremezsiniz";

  }
    elseif(isset($_POST["ürün_isim"],$_POST["acıklama"],$_POST["fiyat"],$_POST["kategoriler"])){
        
     $product=$_POST["ürün_isim"];
     $acıklama=$_POST["acıklama"];
    $fiyat=$_POST["fiyat"];
   
  $ekle=$conn-> prepare("insert into products(acıklama,fiyat,isim,kategori_id2,freelancer_id2)
  values (?,?,?,?,?)");
  $ekle->execute(array($acıklama, $fiyat,$product,$satır["kategori_id"],$row["freelancer_id"]));
      
 

    if($_POST){
        header('Location: profil.php');
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