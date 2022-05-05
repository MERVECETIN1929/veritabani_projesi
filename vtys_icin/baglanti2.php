
<?php 
 
 try {
   $yol      = "mysql:host=localhost;dbname=proje";
   $kullanıcı = "root";
   $sıfre = "";
   $seçenek = array(
    
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
   );

   $conn = new PDO($yol, $kullanıcı, $sıfre, $seçenek);

 } catch (PDOException $ex) {
   echo "Hata kodu " . $ex->getMessage();
 }?>