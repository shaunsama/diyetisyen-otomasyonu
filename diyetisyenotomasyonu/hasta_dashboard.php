
    
<div class="row">

    <div class="col-lg-6 col-md-6 col-12 mb-3">
        <div class="app-card w-100 mb-3">
            <?php

            $hasta_sor = $db->prepare("SELECT * FROM hastatablosu");
            $hasta_sor->execute();

            $hasta_say = $hasta_sor->rowCount();


            ?>

            <div class="card-title border-bottom pb-2">Hasta Sayısı</div>

            <div class="card-text text-muted">Toplam Hasta Sayısı : <b class="text-white fw-normal"><?php echo $hasta_say ?></b></div>
        </div>
        <div class="col-lg-12 col-md-6 col-12 mb-3">
            <div class="app-card w-100">

                <?php
                $shasta_sor = $db->prepare("SELECT * FROM silinen_hastatablosu");
                $shasta_sor->execute();

                $shasta_say = $shasta_sor->rowCount();


                ?>


                <div class="card-title border-bottom pb-2">Silinen Hasta Sayısı</div>

                <div class="card-text text-muted">Toplam Silinen Hasta Sayısı : <b class="text-white fw-normal"><?php echo $shasta_say ?></b></div>
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