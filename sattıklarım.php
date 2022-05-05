<?php
//sattıklarım ekleme
    include("baglanti2.php");   
    session_start();

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SATIN ALINAN HİZMETLERİM  </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
</head>

<body>
 
    <section id="menui">
      <a href="ganasayfa.php"><div id="logo">bigell</div></a>  
        <nav>
            <a href="kesfet.php" ><i class="fas fa-search ikon"></i>KEŞFET</a>
            <a href="profil.php"><i class="fas fa-user-alt"></i>PROFİL</a>
            
        </nav>
    </section>
<?php
        
      
        $kul_isim=$_SESSION["kullanıcı_adı"];
        $sorgu2=$conn->query("SELECT * FROM freelancer where fkullanıcı_adı='$kul_isim'");
        $satır2=$sorgu2->fetch(PDO::FETCH_ASSOC);
       
        // giriş yapan kişinin kullanıcı adından id bulundu
        // freelancer idden de satın al tablosundaki satırlar çekilecek
       
  
        $sorgu=$conn->query("SELECT*FROM satın_al where satıcı_id3='".$satır2["freelancer_id"]."'");
        $satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);
        
        // satın aldan gelen urun idsinden products tablosundan ürün ilgili verileri çekme
       
        if(count($satırlar)==0){
            ?><b style="text-align:center"><h5 style="font-size:30px">Sipariş oluşturulan bir hizmetiniz bulunamamaktadır.</h5></b> 
          <?php }  
          else{
     
  foreach($satırlar as $satır){
      
    $sorgu3=$conn->query("SELECT * FROM products where urun_id='".$satır["urunler_id3"]."'");
    $satır3=$sorgu3->fetch(PDO::FETCH_ASSOC);
    $sorgu4=$conn->query("SELECT*FROM freelancer where freelancer_id='".$satır["alıcı_id"]."'");
    $satır4=$sorgu4->fetch(PDO::FETCH_ASSOC);
    ?>
 <table class="deneme">

 <tr>
   <td style="line-height:25px;font-size:17px"><?php   
   echo "Ürün ismi: ";
   echo $satır3["isim"];
   echo "<br>";
   echo "Ürün açıklaması: ";
   echo $satır3["acıklama"];
   echo "<br>";
   echo "Fiyat: ";
   echo $satır3["fiyat"];
   echo " tl";
   echo "<br>";
   echo "<hr>";
   echo "<b> alıcının ismi: </b>";
   echo $satır4["fkullanıcı_adı"];
   echo "<br>";
   echo "<hr>";
   echo "<b> alıcının telefonu: </b>";
   echo $satır4["telefon"];
   echo "<br>";
   echo "<hr>";
   echo "<b> alıcının maili: </b>";
   echo $satır4["fmail_adres"];
   echo "<br>";

   ?></td>
  
  
  
 </tr>
 </table>
<?php  }}

?>     
</body>
</html>
<style>
    .deneme{
        border-radius: 5px;
        display: inline-block;
        margin:65px;
     
        height:350px;
      width: 350px;
      background-color:rgb(245, 253, 253);
        
    }
    *{
    box-sizing: border-box;
 
}
body{
  background:rgb(185, 213, 231);
    font-family: 'Merriweather', serif;
    margin: 0;
    padding: 0;
    /* burada sayfada hıc bosluk bırakmadan ıcerıgı yapıstırdı*/
   
}
#menui{
    height: 120px;
    margin: 0;
    padding-bottom: 30px;
    padding-top: 5px;
    margin-bottom: 50px;
    background-color: white;
    position: sticky;
    top:0; /*barın kaymasını engellıyor*/

}
#logo{
    font-size: 80px;
    float: left;
    line-height: 80px;
    padding : 20px;
    font-family: 'Cookie', cursive;
    color:rgb(8, 8, 119);
    
    
}
</style>