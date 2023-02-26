<?php
ob_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

include 'veritabani_islemleri/diyetisyen_DB_baglanti.php';
include 'fonksiyon/diyetisyen_Fonksiyon.php';



if (isset($_REQUEST['term'])) {

    $term = $_REQUEST['term'];

    $hasta_ilce_sor = $db->prepare("SELECT * from ilceler where sehirid=:sehirid");
    $hasta_ilce_sor->execute(array(
        'sehirid' => $term
    ));

    $il_say = 1;
    while ($hasta_ilce_cek = $hasta_ilce_sor->fetch(PDO::FETCH_ASSOC)) {
        $il_say++;
?>

        <option class="text-dark" value="<?php echo $hasta_ilce_cek['ilceadi'] ?>"><?php echo $hasta_ilce_cek['ilceadi'] ?></option>


    <?php } ?>


<?php } ?>