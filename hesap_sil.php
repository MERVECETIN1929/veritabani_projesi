<?php
include("baglanti2.php");
//hesap sil
$hs=$_GET["hsil"];


//DELETE FROM `freelancer` WHERE `freelancer`.`freelancer_id` = 15
$sorgu3=$conn->prepare("DELETE FROM satın_al where `satın_al`.`satıcı_id3`=?");
$sorgu3->execute(array($hs));      
$sorgu4=$conn->prepare("DELETE FROM satın_al where `satın_al`.`alıcı_id`=?");
$sorgu4->execute(array($hs));     


$sorgu2=$conn->prepare("DELETE from products where `products`.`freelancer_id2`=:hid2");
$sorgu2->execute(array(":hid2"=>$hs));
$sorgu=$conn->prepare("DELETE from freelancer where `freelancer`.`freelancer_id`=?");
$sorgu->execute(array($_GET["hsil"]));
session_start();
session_destroy();

if($sorgu){
    header("Location:anasayfa.php");
}
?>