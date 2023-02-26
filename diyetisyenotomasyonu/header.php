<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

    header("location:/krix/404");
    exit;
}
ob_start();
session_start();
//error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

require_once 'veritabani_islemleri/diyetisyen_DB_baglanti.php';
require_once 'fonksiyon/diyetisyen_Fonksiyon.php';


if (isset($_SESSION['userkullanici_nickname'])) {


    $doktor_kullanici_sor = $db->prepare("SELECT * FROM personeltablosu where doktor_kullanici_adi=:doktor_kullanici_adi");
    $doktor_kullanici_sor->execute(array(
        'doktor_kullanici_adi' => strip_tags($_SESSION['userkullanici_nickname'])
    ));
    $say = $doktor_kullanici_sor->rowCount();
    $doktor_kullanici_cek = $doktor_kullanici_sor->fetch(PDO::FETCH_ASSOC);

    if (!isset($_SESSION['userkullanici_nickname'])) {
        $_SESSION['userkullanici_nickname'] = $doktor_kullanici_cek['doktor_kullanici_adi'];
        $_SESSION['userkullanici_id'] = $doktor_kullanici_cek['doktorID'];
        $_SESSION['userkullanici_adsoyad'] = $doktor_kullanici_cek['doktor_adi'] . " " . $doktor_kullanici_cek['doktor_soyadi'];
    }
}



if (empty($_SESSION['userkullanici_nickname'])) {
    header("Location:login");
    exit;
}
?>

<?php

$doktor_tipi_sor = $db->prepare("SELECT * FROM personeltablosu where doktorID=:doktorID");
$doktor_tipi_sor->execute(array(
    'doktorID' => intval($_SESSION['userkullanici_id'])
));

$doktor_tipi_cek = $doktor_tipi_sor->fetch(PDO::FETCH_ASSOC);



?>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="diyetisyenotomasyonu">
    <meta name="keywords" content="dk,diyetisyenotomasyonu">
    <link rel="shortcut icon" href="favicon/fav.png" type="image/x-icon">
    <title>Diyetisyen Otomasyonu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/style.css">
<!-- MDB -->

    <script src="js/dk_script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
-->
</head>

<body>

    <!-- Navbar -->
</body>

