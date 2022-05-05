<?php


include("baglanti2.php");

ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PROFİL </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
</head>

<body>
 
    <section id="menu">
       <a href="ganasayfa.php"><div id="logo">bigell</div></a> 
        <nav>
            <a href="kesfet.php"><i class="fas fa-search ikon"></i>KEŞFET</a>

        </nav>
    </section>


<?php
  $sorgu=$conn->query("SELECT * FROM freelancer where fkullanıcı_adı='".$_SESSION["kullanıcı_adı"]."'");
  $satır1=$sorgu->fetch(PDO::FETCH_ASSOC);
  $sorgu2="SELECT*FROM products where freelancer_id2='".$satır1["freelancer_id"]."'";
  $deg=$conn-> query($sorgu2);
  $satırlar=$deg->fetchALL(PDO::FETCH_ASSOC);
 

?>
<div class="sıra">
  <div class="sol" style="background-color:rgb(245, 253, 253)">
    <h3>Menü</h3>
    <ul id="Menu2">

      <li> <b><a href="ürün_kayıt.php"> ÜRÜN KAYIT</a></b></li>
      <li><b><a href="sattıklarım.php">SİPARİŞ VERİLEN ÜRÜNLERİM</a></b></li>
      <li><b><a href="aldıklarım.php">SİPARİŞLERİM</a></b></li>
      <li><b><a href="cikisyap.php"> ÇIKIŞ YAP</a></b></li>
      <li><b><a href="profil_düzenle.php?hduz=<?php echo $satır1["freelancer_id"];?>"> HESABIMI DÜZENLE </a></b></li>
      <li><b><a href="hesap_sil.php?hsil=<?php echo $satır1["freelancer_id"];?>">HESABIMI SİL</a></b></li>
 
    </ul>
  </div>
  
  <div class="sag" style="background-color:rgb(185, 213, 231);">
    
  <p class="sag">
                   <?php echo "<b>Kullanıcı İsmi: </b>";echo"<b>".$_SESSION["kullanıcı_adı"]."</b>" ;?>
 
    <br>
      <?php echo "<b>Uzmanlık Alan: </b>";echo "<b>".$satır1["uzmanlık_alan"]."</b>";?>
    <br>
    <i class='fas fa-mobile'></i>                     <?php echo "<b>".$satır1["telefon"]."</b>";?>
    <br> 
    <i class="fas fa-envelope-square"></i>            <?php echo "<b>".$satır1["fmail_adres"]."</b>";?>
  </p>
     
  <?php
  foreach($satırlar as $satır2){?>
 <table class="deneme">

 <tr>
   <td style="line-height:25px;font-size:17px"><?php 
      echo "Ürün ismi: ";
      echo $satır2["isim"];
      echo "<br>";
      echo "Ürün açıklaması: ";
      echo $satır2["acıklama"];
      echo "<br>";
      echo "Fiyat: ";
      echo $satır2["fiyat"];
      echo " tl";
      echo "<br>";?>
    <button> <a href="sil.php?sil=<?php echo $satır2["urun_id"]; ?>" style="color:white; text-decoration:none">sil</a> </button> 
    
    <button><a href="ürün_düzenle.php?düzenle=<?php echo $satır2["urun_id"]; ?>"style="color:white; text-decoration:none">güncelle</a> </button>
 </td>
 </tr>
 </table>
<?php  } ?>
</div>
</div>

</body>
</html>
<style>
  .deneme{
      border-radius: 5px;
      display: inline-block;
      margin:25px;
      color:rgb(25, 27, 52);
      height:350px;
      width: 350px;
      background-color: rgb(245, 253, 253);
  }
  h3{
     
      font-size:30px;
      text-align:center;
  }
 
  #menu{
    height: 80px;
    margin: 0;
    padding-bottom: 30px;
    padding-top: 5px;
    margin-bottom: 50px;
    background-color: white;
    position: sticky;
    top:0; 

}
#logo{
    font-size: 80px;
    float: left;
    line-height: 80px;
    padding : 20px;
    font-family: 'Cookie', cursive;
    color:rgb(8, 8, 119);
    
    
}
nav{
    float: right;
    line-height: 80px;
    padding: 10px;
}
nav a:link{
    text-decoration: none;
    color:rgb(8, 8, 119);
 
}
nav a:hover{
    border-bottom: 2px solid rgb(8, 8, 119) ;
}
nav a:visited{
    text-decoration: none;
    color:rgb(8, 8, 119); 
}
body {
  font-family: 'Merriweather', serif;
}

* {
  box-sizing: border-box;
}
.sıra {
  display: flex;
}
.sol {
  flex: 15%;
  padding: 15px 0;
  
}
.sag {

  flex: 100%;
  padding: 25px;
  font-size:20px
}
p{
    text-align:center;
    line-height:40px;   
}

#den{
    display:inline-block;
}
#Menu2 {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#Menu2 li a {
  padding: 12px;
  text-decoration: none;
  color: black;
  display: block
}
#Menu2 li a:hover {
  background-color: #eee;
}
button{
    background-color: rgb(25, 27, 52);
   
}

</style>