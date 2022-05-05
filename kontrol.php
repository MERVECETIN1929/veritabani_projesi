<?php
  include("baglanti2.php");

ob_start();
session_start();

$kadi=$_POST["kullanıcı_adı"];
$ksifre=$_POST["sifre"];

$sorgu = $conn->query("SELECT* from freelancer where fkullanıcı_adı='$kadi'and f_sifre='$ksifre' ") ;
$satır=$sorgu->fetchALL(PDO::FETCH_ASSOC);

if(count($satır)==1)  {
    $_SESSION["giriş"] = "true";
    $_SESSION["kullanıcı_adı"] = $kadi;
    header("Location:ganasayfa.php");
}
else {
    if($kadi=="" or $ksifre=="") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}
 

?>