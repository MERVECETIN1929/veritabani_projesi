<?php
include ("baglanti2.php");
 
$urun_ıd= $_GET["sil"];
$sorgu=$conn->prepare("DELETE FROM satın_al where `satın_al`.`urunler_id3`=?");
$sorgu->execute(array($urun_ıd)); 

$u_sil = $conn->prepare("DELETE FROM products WHERE  urun_id=:id");
$u_sil->execute(array(":id"=>$urun_ıd));


if ($u_sil)
{
    header('Location: profil.php');
}
else
{
    echo "Hata";
}
?>