<?php


include("baglanti2.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÜRÜN_GÜNCELLE</title>
</head>
<body>
<?php
    $id=$_GET["düzenle"];
    $sorgu=$conn->prepare("SELECT * FROM products where urun_id=:id");
    $sorgu->execute(array(":id"=>$id));
    $satır1=$sorgu->fetch(PDO::FETCH_ASSOC);
   
?>
<div class="login">
    <div class ="login-screen">
    <div class="app-title">
          <b> <h1>ÜRÜN GÜNCELLE</h1></b>

        </div>
     <form action="#" method="POST">
        <div class ="login-form">
            <div class ="control-group">
                <input type="text" name="ürün_name" class="login-field" placeholder="Ürün İsmi" id="login-üname"
                value="<?php echo $satır1["isim"];?>"
                 >
                
                <label class="login-field-icn fui-user" for="login-name"></label>
            </div>
            <div class="control-group">
                <input type="text" name="acıklama" class="login-field" placeholder="Acıklama" id="login-ac" 
                value="<?php echo $satır1["acıklama"];?>"
                 >
                <label class="login-field-icn fui-user" for="login-pass"></label>
            </div>
            <div class="control-group">
                <input type="int" name="fiyat" class="login-field" placeholder="Fiyat" id="login-f"   
                value="<?php echo $satır1["fiyat"];?>"
                 >
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
            <button type="submit" class="signupbtn">GÜNCELLE</button>
            
        </div>
       
    </form>
        </div>
            </div>
              <?php
              if(strlen(@$_POST["acıklama"])>200){
                echo "200 karakterden fazla açıklama giremezsiniz";
           
              }
        elseif($_POST){
           
               
            $isim=$_POST["ürün_name"];
            $acıklama=$_POST["acıklama"];
            $fiyat=$_POST["fiyat"];
            $id1=$_GET["düzenle"];
            $kategorı=$_POST["kategoriler"];
            $sql="UPDATE `products` SET `acıklama` = ?, `fiyat` = ?, `isim` = ?, `kategori_id2` = ?
            WHERE `products`.`urun_id` =?";
            $guncelle=$conn->prepare($sql);
            $dizi=array($acıklama,$fiyat,$isim,$kategorı,$id1);

             $guncelle->execute($dizi);
            
            
            

    if($guncelle){
        echo "basarılı";
        header("Location:profil.php");
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
    background-color:rgb(185,213,231);
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
        background: rgb(154, 163, 162);
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
    
</style>
