<?php
$doktor_sor = $db->prepare("SELECT * FROM personeltablosu");
$doktor_sor->execute();

$doktor_say = $doktor_sor->rowCount();


?>


<div class="row">
    <div class="col-lg-6 col-md-6 col-12 mb-3">
        <div class="app-card w-100 mb-3">

            <div class="card-title border-bottom pb-2">Doktor Sayısı</div>

            <div class="card-text text-muted">Toplam Doktor Sayısı : <b class="text-white fw-normal"><?php echo $doktor_say ?></b></div>
        </div>
    
        <div class="col-lg-12 col-md-6 col-12 mb-3">
            <div class="app-card w-100">

                <?php
                $sdoktor_sor = $db->prepare("SELECT * FROM silinen_personeltablosu");
                $sdoktor_sor->execute();

                $sdoktor_say = $sdoktor_sor->rowCount();


                ?>


                <div class="card-title border-bottom pb-2">Silinen Doktor Sayısı</div>

                <div class="card-text text-muted">Toplam Silinen Doktor Sayısı : <b class="text-white fw-normal"><?php echo $sdoktor_say ?></b></div>
            </div>
        </div>
    </div>



   
</div>



<!-- 
    $shasta_sor = $db->prepare("SELECT * FROM silinen_hastatablosu");
$shasta_sor->execute();

$shasta_say = 0;

while ($hasta_cek = $shasta_sor->fetch(PDO::FETCH_ASSOC)) {
    $shasta_say++;
}
-->

<!-- while ($hasta_cek = $hasta_sor->fetch(PDO::FETCH_ASSOC)) {
    $hasta_say++;
}-->