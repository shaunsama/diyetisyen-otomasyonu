<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

    header("location:/diyetisyenotomasyonu/404");
    exit;
}
?>


<div class="container-fluid" id="sa">
    <h5 class="ms-2">Doktor Listesi</h5>
    <hr class="text-dark mx-1">

    <div class="row">
        <?php

        $doktor_sor = $db->prepare("SELECT * FROM personeltablosu");
        $doktor_sor->execute();

        $doktor_say = 0;

        while ($doktor_cek = $doktor_sor->fetch(PDO::FETCH_ASSOC)) {
            $doktor_say++;

        ?>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="app-card w-100">
                    <div class="row">

                        <div class="col-4">

                            <div class="bg-image hover-overlay ripple mb-3" data-mdb-ripple-color="light">
                                <img src="<?php echo $doktor_cek['doktor_avatar'] ?>" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body pt-2 ps-0">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title"><?php echo $doktor_cek['doktor_adi'] . " " . $doktor_cek['doktor_soyadi'] ?></h6>

                                </div>
                                <div class="card-text" style="font-size: 12px!important;"><?php echo $doktor_cek['doktor_mail'] ?></div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer ps-0">
                        <div class="mt-2" style="font-size: 13px!important;">
                            Son Giriş Tarihi:
                            <?php

                            if ($doktor_cek['doktor_son_giris_zamani'] == null) {
                                echo ' Bilinmiyor';
                            } else { ?>
                                <?php echo date('d.m.Y H:i:s', strtotime($doktor_cek['doktor_son_giris_zamani'])) ?>
                            <?php  } ?>

                        </div>


                    </div>
                    <?php
                    if ($doktor_tipi_cek['kullanici_tipi'] == 1) { ?>
                        <div class="button-group d-flex justify-content-between w-100 ">
                            <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="POST" onsubmit="return confirm('&quot;<?php echo $doktor_cek['doktor_adi'] . ' ' . $doktor_cek['doktor_soyadi'] ?>&quot; adlı doktoru silmek istediğinize emin misiniz?');">


                                <input type="hidden" name="sdoktor_kimlik" value="<?php echo $doktor_cek['doktor_kimlik'] ?>">
                                <input type="hidden" name="sdoktor_adi" value="<?php echo $doktor_cek['doktor_adi'] ?>">
                                <input type="hidden" name="sdoktor_soyadi" value="<?php echo $doktor_cek['doktor_soyadi'] ?>">
                                <input type="hidden" name="sdoktor_kullanici_adi" value="<?php echo $doktor_cek['doktor_kullanici_adi'] ?>">
                                <input type="hidden" name="sdoktor_sifre" value="<?php echo $doktor_cek['doktor_sifre'] ?>">
                                <input type="hidden" name="sdoktor_il" value="<?php echo $doktor_cek['doktor_il'] ?>">
                                <input type="hidden" name="sdoktor_ilce" value="<?php echo $doktor_cek['doktor_ilce'] ?>">
                                <input type="hidden" name="sdoktor_adres" value="<?php echo $doktor_cek['doktor_adres'] ?>">
                                <input type="hidden" name="sdoktor_mail" value="<?php echo $doktor_cek['doktor_mail'] ?>">
                                <input type="hidden" name="sdoktor_telefon" value="<?php echo $doktor_cek['doktor_telefon'] ?>">
                                <input type="hidden" name="sdoktor_dogumtarihi" value="<?php echo $doktor_cek['doktor_dogumtarihi'] ?>">
                                <input type="hidden" name="sdoktor_kayit_tarihi" value="<?php echo $doktor_cek['doktor_kayit_tarihi'] ?>">
                                <input type="hidden" name="sdoktor_son_giris_zamani" value="<?php echo $doktor_cek['doktor_son_giris_zamani'] ?>">
                                <input type="hidden" name="skullanici_tipi" value="<?php echo $doktor_cek['kullanici_tipi'] ?>">
                                <input type="hidden" name="doktorID" value="<?php echo $doktor_cek['doktorID'] ?>">
                                <input type="hidden" name="sdoktor_avatar" value="<?php echo $doktor_cek['doktor_avatar'] ?>">
                                <button class="btn btn-primary" name="dk_doktor_sil" type="submit">Sil</button>

                            </form>





                        
                            <a href="doktor-duzenle?doktorID=<?php echo $doktor_cek['doktorID'] ?>">
                                <button class="btn btn-primary" name="dk_doktor_duzenle" type="submit">Düzenle</button>
                            </a>




                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>