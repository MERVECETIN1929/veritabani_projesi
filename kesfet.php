<!DOCTYPE html>
<html lang="tr">
<head>
<?php

include("baglanti2.php");
?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> KEŞFET  </title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
</head>

<body>
 
<?php
        session_start();
       
        if(@$_SESSION["giriş"]=="true"){ ?>
<section id="menu">
 <a href="ganasayfa.php"><div id="logo">bigell</div></a> 
         <nav>
             <a href="kesfet.php"><i class="fas fa-search ikon"></i>KEŞFET</a>
             <a href="profil.php"><i class="fas fa-user-alt"></i>PROFİL</a>
            
         </nav>
     </section>
     <?php   }
     else{
 ?>

       
<section id="menu">
 <a href="anasayfa.php"><div id="logo">bigell</div></a> 
         <nav>
             <a href="kesfet.php"><i class="fas fa-search ikon"></i>KEŞFET</a>
             <a href="login.php"><i class="fas fa-sign-in-alt ikon"></i>GİRİŞ YAP</a>
            <a href="kayit.php"><i class="fas fa-user-plus ikon"></i>KAYIT OL</a>
         </nav>
     </section>

<?php }
    ?>
    <section class="kategoriler" >
    <?php
$sorgu=$conn->query("select*from kategoriler");
$satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);
foreach($satırlar as $satır){
?>
<tr>
   <li><th><a href="kategoriler.php?k_id=<?php echo $satır["kategori_id"]; ?>"><?php echo $satır["kategori_isim"];?></a></th></li> 
   
</tr>
<?php } ?>
     
    </section>


     <?php
    $sorgu=$conn->query("SELECT*FROM products");
    $satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);
    

        ?>
        <?php
  
 
  
 
  foreach($satırlar as $satır2){
        $sorgu2=$conn->query("SELECT kategori_isim FROM kategoriler where kategori_id='".$satır2["kategori_id2"]."'");
        $satır=$sorgu2->fetch(PDO::FETCH_ASSOC);
        
      ?>
  <table class="deneme">

 <tr>
   <td style="text-align:left ; font-size:17px ; line-height:30px; "><?php 
   echo "Ürün ismi: ";
   echo $satır2["isim"];
   echo "<br>";
   echo "Ürün açıklaması: ";
   echo $satır2["acıklama"];
   echo "<br>";
   echo "Fiyat: ";
   echo $satır2["fiyat"];
   echo " tl";
   echo "<br>";
   echo "Kategorisi: ";
   echo $satır["kategori_isim"];
   echo "<br>";
   ?>
   <button><a href="profil_incele.php?u_id=<?php echo $satır2["urun_id"] ; ?>
   " style="color:white; text-decoration:none">PROFİL İNCELE</a></button>
   
  
    <button ><a href="satın_al.php?u_id=<?php echo $satır2["urun_id"] ; ?>
   " style="color:white; text-decoration:none">SATIN AL</a></button>
</td>
  
    
  
 </tr>
 </table>
<?php  }

?>

   

</body>
</html>




<style>
   
  .deneme{
      border-radius: 5px;
      display: inline-block;
      margin:25px;
    
      height:350px;
      width: 350px;
      background-color:rgb(245, 253, 253);
      /* rgb(185, 213, 231) */
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
#menu{
    height: 120px;
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
   
 
}
nav a:hover{
    border-bottom: 2px solid rgb(8, 8, 119) ;
}
nav a:visited{
    text-decoration: none;
    color:rgb(8, 8, 119); 
}

.ikon{
    margin-left: 8px;
    margin-right: 4px;
}

button{
    background-color: rgb(25, 27, 52);

   
}



.kategoriler{
    height:62px;
   background-color:rgb(25,27,52);  


}
.kategoriler li{
    float: left;
    list-style-type: none ;
    background-color:rgb(25, 27, 52);
}
.kategoriler li a{
    background-color: rgb(25, 27, 52);
    color:white;
    display: inline-block;
    padding: 20px 35px;
    
    text-decoration:none;
}
.kategoriler li a:hover{
    background-color:  rgb(40, 42, 67);
}
</style>