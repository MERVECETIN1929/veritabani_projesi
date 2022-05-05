
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ANASAYFA  </title>
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
<?php
session_start();
$_SESSION["giriş"]="false";
?>
    <section id="menui">
      <a href="anasayfa.php"><div id="logo">bigell</div></a>  
        <nav>
            <a href="kesfet.php" ><i class="fas fa-search ikon"></i>KEŞFET</a>
            <a href="login.php"><i class="fas fa-sign-in-alt ikon"></i>GİRİŞ YAP</a>
            <a href="kayit.php"><i class="fas fa-user-plus ikon"></i>KAYIT OL</a>
        </nav>
    </section>

    <section id="bunner">
        <div id="black"></div>
         <div id="icerik">

            <h2>bigell</h2>

            <hr width="925",align="left">
            <p >
                bigell, yetenekli kişilerden oluşan bir freelancer çalışma topluluğudur.
                Senin de böyle bir platforma ihtiyacın varsa, <h5 style="font-size:18px" > ' hele bigell '  </h5>
            </p>
            
        </div> 
    </section>
        
 
</body>
</html>


