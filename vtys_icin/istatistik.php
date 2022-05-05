<?php
include("baglanti2.php");

$sorgu=$conn->query("SELECT*FROM freelancer");
$satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İSTATİSTİK</title>
</head>
<body><table class="deneme">
    <tr>
        <th style="margin-right:25px;  font-size:25px;">KATEGORİ İSİM</th>
        <th style="margin-right:25px;  font-size:25px;">OLUŞTURULAN HİZMET SAYISI</th>
    </tr>
    <?php
    $sorgu2=$conn->query("SELECT * FROM kategoriler");
    $satırlar2=$sorgu2->fetchALL(PDO::FETCH_ASSOC);
    foreach($satırlar2 as $satır2){
    $sorgu3=$conn->query("SELECT*FROM products where kategori_id2='".$satır2["kategori_id"]."'");
    $satırlar3=$sorgu3->fetchAll(PDO::FETCH_ASSOC);?>

    
        <tr >
            <td style="text-align:center; line-height:30px;  font-size:20px;"><?php echo $satır2["kategori_isim"];  ?>     </td> 
            <td style="text-align:center; line-height:30px;  font-size:20px;"><?php echo count($satırlar3);   ?></td>
            </tr>
        
<?php }
    ?>
   </table> 

   <table class="deneme2">
    <tr>
        <th style="text-align:center; line-height:30px;  font-size:25px; color:rgb(25,27,52)" >GÜNCEL KULLANICI SAYISI</th>
    </tr>
    <?php
     $sorgu=$conn->query("SELECT*FROM freelancer");
     $satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);
    ?>
    <tr>
        <td style="text-align:center; line-height:30px; font-size:20px;">
            <?php echo count($satırlar);?>
        </td>
    </tr>
   </table>
</body>
</html>
<style>
    
    .deneme{
      border-radius: 5px;
      display: inline-block;
      margin-left:320px;
    margin-top:85px;
      color:rgb(25, 27, 52);
      height:550px;
      width: 550px;
      background:rgb(185, 213, 231);
  }
  .deneme2{
      border-radius: 5px;
      display: inline-block;
      margin-left:0px;
     
      color:rgb(25, 27, 52);
      height:550px;
      width: 350px;
      background:rgb(185, 213, 231);
  }
  body{
    background:rgb(185, 213, 231);
  }
</style>