
<?php
//profil incele
include("baglanti2.php");

$id=$_GET["u_id"];

$sorgu=$conn->query("SELECT * FROM products where urun_id=$id");
$satır=$sorgu->fetch(PDO::FETCH_ASSOC);
$sor=$conn->query("SELECT*FROM freelancer where freelancer_id='".$satır["freelancer_id2"]."'");
$satır1=$sor->fetch(PDO::FETCH_ASSOC);
$sorgu2=$conn->query("SELECT * FROM products where freelancer_id2='".$satır["freelancer_id2"]."'");
$satırlar2=$sorgu2->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>



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
       
 <div class="sag" style="background-color:rgb(185, 213, 231);">

<p class="sag">
                   <?php echo "<b>Kullanıcı İsmi: </b>";echo"<b>".$satır1["fkullanıcı_adı"]."</b>" ;?>
 
    <br>
      <?php echo "<b>Uzmanlık Alan: </b>";echo "<b>".$satır1["uzmanlık_alan"]."</b>";?>
    <br>
    <i class='fas fa-mobile'></i>                     <?php echo "<b>".$satır1["telefon"]."</b>";?>
    <br> 
    <i class="fas fa-envelope-square"></i>            <?php echo "<b>".$satır1["fmail_adres"]."</b>";?>
  </p>
     
<?php foreach($satırlar2 as $satır2){ ?>
    <table class ="deneme">

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
    
    ?>
  <button><a href="satın_al.php?u_id=<?php echo $satır2["urun_id"] ; ?>
   "style="color:white; text-decoration:none">SATIN AL</a></button>  

</td>
    
    
</tr>
</table>


    <?php  }?> 
 </div>   

   

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
.sag {

flex: 100%;
padding: 25px;
font-size:20px
}

body{
    background:rgb(185, 213, 231);
    font-family: 'Merriweather', serif;
    margin: 0;
    padding: 0;
  
    /* burada sayfada hıc bosluk bırakmadan ıcerıgı yapıstırdı*/
   
}
p{
    text-align:center;
    line-height:40px;   
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




</style>