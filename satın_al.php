<?php
include("baglanti2.php");
session_start();
ob_start();
$id=$_GET["u_id"];
$karar=true;
$sorgu=$conn->query("SELECT*FROM products where urun_id='$id'");
$satır=$sorgu->fetch(PDO::FETCH_ASSOC);
$kul_isim=@$_SESSION["kullanıcı_adı"];
$sorgu2=$conn->query("SELECT * FROM freelancer where fkullanıcı_adı='$kul_isim'");
//satır2 giriş yapan kişi
$satır2=$sorgu2->fetch(PDO::FETCH_ASSOC);

$karar2=@$_SESSION["giriş"];


if(@$satır["freelancer_id2"]==@$satır2["freelancer_id"]){
    $karar=false;
}
if($karar2=="false"){
    echo "<center>ürün satın almak için giriş yapmanız gerekmektedir.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
}
elseif($karar==false){
   
    echo "<center>kendi ürününüzü satın alamazsınız.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
}
else{
  $sorgu3=$conn->prepare("INSERT INTO `satın_al`(`satıcı_id3`, `urunler_id3`, `alıcı_id`) 
    VALUES (?,?,?)");
    $sorgu3->execute(array($satır["freelancer_id2"],$id,$satır2["freelancer_id"]));
if($sorgu3){

    
    header("location:aldıklarım.php");
} 
 

}



?>