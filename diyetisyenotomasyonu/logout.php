<?php 
session_start();
ob_start();
require_once 'veritabani_islemleri/diyetisyen_DB_baglanti.php';
$zamanguncelle=$db->prepare("UPDATE personeltablosu SET

doktor_son_giris_zamani=:doktor_son_giris_zamani

	WHERE doktorID={$_SESSION['userkullanici_id']}");


$update=$zamanguncelle->execute(array(

	'doktor_son_giris_zamani' => date("Y-m-d H:i:s")

));

$kullanici_sonzaman = $_SESSION['userkullanici_sonzaman'];

session_destroy();
header("Location:login?durum=exit");
exit;
?>