<?php

//ob_start();
//session_start();
//error_reporting(0);
//date_default_timezone_set('Europe/Istanbul');

try 

{
    $db = new PDO("mysql:host=localhost;dbname=diyetisyenotomasyon;charset=utf8",'root','');
    //echo "Veritabanı Bağlantısı Başarılı.";
} 

catch (PDOException $e) 

{
    echo $e->getMessage();
}



if (basename($_SERVER['PHP_SELF'])==basename(__FILE__))

{
    header("location:anasayfa");
    exit;
}

?>