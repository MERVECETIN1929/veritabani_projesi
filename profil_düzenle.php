<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFİL DÜZENLE</title>
</head>
<body>
<?php
include("baglanti2.php");
$hid=$_GET["hduz"];
$sorgu=$conn->prepare("SELECT * FROM `freelancer` where `freelancer`.`freelancer_id`=:hid");
$sorgu->execute(array(":hid"=>$hid));
$satır=$sorgu->fetch(PDO::FETCH_ASSOC);

?>
<div class="login">
    <div class ="login-screen">
    <div class="app-title">
         
 
        </div>
<form class="modal-content" action="#" method="post" >
    <div class="container">
      <h1>HESABIMI DÜZENLE</h1>
     
      <hr>
      <div class ="control-group">
      <input type="text" placeholder="telefon" name="telefon" value="<?php echo $satır["telefon"];?>" >
      </div>
      <div class ="control-group">
      <input type="text" placeholder="email" name="email" value="<?php echo $satır["fmail_adres"];?>" >
      </div>
      <div class ="control-group">
      <input type="password" placeholder="ŞİFRE" name="ŞİFRE" value="<?php echo $satır["f_sifre"];?>">
      </div>
      <div class ="control-group">
      <input type="text" placeholder="uzmanlıkalanı" name="uzmanlıkalanı" value="<?php echo $satır["uzmanlık_alan"];?>" >
      </div>
    
      <div class="clearfix">
        <button type="submit" class="signupbtn" style="color:white; text-decoration:none">DÜZENLE</button>
      
    </div>
  </form>
</div>
</div>
<?php



if($_POST){
  if(strlen($_POST["telefon"])!=11){
    echo "<center>lütfen 11 haneli telefon numarasını giriniz.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
  }
  elseif(strlen($_POST["ŞİFRE"])<=6){
    echo "<center>lütfen 6 haneden büyük bir şifre giriniz.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
  }
  else{
     $hid=$_GET["hduz"];
    $telefon=$_POST["telefon"];
    $email=$_POST["email"];
    $sıfre=$_POST["ŞİFRE"];
    $uzmanlık_alanı=$_POST["uzmanlıkalanı"];
    $sql="UPDATE `freelancer` SET  `telefon`=?, `uzmanlık_alan`=?, `fmail_adres`=?, `f_sifre`=?
    where `freelancer`.`freelancer_id`=?
     ";
    // $güncelle=$conn->prepare("UPDATE `freelancer` SET  `fkullanıcı_adı`=?, `telefon`=?, `uzmanlık_alan`=?, `fmail_adres`=?, `f_sifre`=?
    // where `freelancer`.`freelancer_id`=?
    //  ");
    $güncelle=$conn->prepare($sql);
    $dizi=array($telefon, $uzmanlık_alanı,$email,$sıfre,$hid);
    $güncelle->execute($dizi);
  }
  
    if(@$güncelle){
     
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
    
    
  
}  button{
    background-color: rgb(25, 27, 52);
    width: 250px;
    height:50px;
        margin: 0 auto;
        
}
</style>

    


