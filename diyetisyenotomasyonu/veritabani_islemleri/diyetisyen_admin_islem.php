<?php 

ob_start();
session_start();

include 'diyetisyen_DB_baglanti.php';
include '../fonksiyon/diyetisyen_Fonksiyon.php';

if (basename($_SERVER['PHP_SELF'])==basename(__FILE__))

{
    header("location:anasayfa");
    exit;
}

?>
