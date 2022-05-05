<style>
    body{
        background:rgb(185, 213, 231);
    }
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left; 
  background-color: rgb(25,27,52);
  color: white;
}
#h12{
    margin-left=250px;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    
    
    <button style="width:170px; height:50px; background-color:rgb(25,27,52);margin-left:500px; "> 
    <a style="text-decoration:none;color:white"href="kategori_ekle.php">KATEGORİ EKLE</a></button>

    <button style="width:170px; height:50px; background-color:rgb(25,27,52); "> 
    <a style="text-decoration:none;color:white"href="istatistik.php">İSTATİSTİKLERİ İNCELE</a></button>
    
    <button style="width:170px; height:50px; background-color:rgb(25,27,52);"> 
    <a style="text-decoration:none;color:white"href="cıkıs_yap.php">ÇIKIŞ YAP</a></button>
    <h1 id="h12">KATEGORİLER</h1>
<?php
include("baglanti2.php");
$sorgu=$conn->query("SELECT*FROM kategoriler");
$satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);
?>
<table id="customers">
 <tr>
    <th>KATEGORİ İD</th>
     <th>KATEGORİ İSMİ</th>
     <th>İŞLEM</th>
 </tr>
   
<?php foreach($satırlar as $satır) {?>
  <tr>

<td><?php echo $satır["kategori_id"]; ?></td>
<td><?php echo $satır["kategori_isim"];?></td>
<td> 
<a style="text-decoration:none ; color:rgb(25,27,52)" href="kategori_düzenle.php?kdüz=<?php echo $satır["kategori_id"];?>">DÜZENLE</a></td>
</tr>
 <?php };?>
</table>
<h1 id="h12">KULLANICILAR</h1>
<?php

$sorgu=$conn->query("SELECT*FROM freelancer");
$satırlar=$sorgu->fetchALL(PDO::FETCH_ASSOC);
?>
<table id="customers">
 <tr>
    <th>KULLANICI İD </th>
     <th>KULLANICI İSMİ </th>
     <th>KULLANICI TELEFONU </th>
     <th>KULLANICI UZMANLIK ALANI </th>
     <th>KULLANICI MAİL ADRESİ </th>
     <th>KULLANICI ŞİFRE </th>
 </tr>
   
<?php foreach($satırlar as $satır) {?>
  <tr>

<td><?php echo $satır["freelancer_id"]; ?></td>
<td><?php echo $satır["fkullanıcı_adı"]; ?></td>
<td><?php echo $satır["telefon"]; ?></td>
<td><?php echo $satır["uzmanlık_alan"];?></td>
<td><?php echo $satır["fmail_adres"]; ?></td>
<td><?php echo $satır["f_sifre"]; ?></td>
<td> 

</tr>
 <?php };?>
</table>

</body>
</html>