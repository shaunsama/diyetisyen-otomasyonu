<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">

    <?php if ($_GET['d'] == "eklendi") { ?>
        <div class="alert alert-success d-flex justify-content-between mt-3">
            <strong>Hasta başarıyla Eklendi.</strong>
            <button class="btn-close close-home-alert" aria-labelledby="close"></button>
        </div>
    <?php } else if ($_GET['d'] == "eklenemedi") { ?>
        <div class="alert alert-danger d-flex justify-content-between mt-3">
            <strong>Hasta eklenirken bir hata oluştu.</strong>
            <button class="btn-close close-home-alert" aria-labelledby="close"></button>
        </div>
    <?php } else if ($_GET['d'] == "ad") { ?>
        <div class="alert alert-danger d-flex justify-content-between mt-3">
            <strong>Hasta Ad kısmı boş bıraklımaz.</strong>
            <button class="btn-close close-home-alert" aria-labelledby="close"></button>
        </div>
    <?php } ?>

    <div class="card h-100 border-0 shadow-0 bg-transparent">
        <div class="card-header fs-5">Hasta Ekle</div>
        <div class="card-body p-4">



            <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="POST">

                <div class="row">

                    <div class="mb-3 col-6">
                        <label for="hasta_kimlik" class="form-label">Kimlik Numarası</label>
                        <input required class="form-control form-control-lg" id="hasta_kimlik" minlength="11" maxlength="11" name="hasta_kimlik" type="text" placeholder="T.C. Kimlik Numarası">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="hasta_adi" class="form-label">Hasta Adı</label>
                        <input required class="form-control form-control-lg" id="hasta_adi" name="hasta_adi" type="text" placeholder="Ad">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="hasta_soyadi" class="form-label">Hasta Soyadı</label>
                        <input required class="form-control form-control-lg" id="hasta_soyadi" name="hasta_soyadi" type="text" placeholder="Soyadı">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="hasta_boy" class="form-label">Hasta Boy</label>
                        <input required class="form-control form-control-lg" id="hasta_boy" name="hasta_boy" type="text" placeholder="Boy">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="hasta_kilo" class="form-label">Hasta Kilo</label>
                        <input required class="form-control form-control-lg" id="hasta_kilo" name="hasta_kilo" type="text" placeholder="Kilo">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="hasta_hedef" class="form-label">Hasta Hedef</label>
                        <input required class="form-control form-control-lg" id="hasta_hedef" name="hasta_hedef" type="text" placeholder="Hedef">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="hasta_il" class="form-label">Hasta İl</label>

                        <select required class="form-select form-control-lg bg-transparent text-white" id="hasta_il" name="hasta_il" required>
                            <option value="">Bir Şehir Seçiniz</option>
                            <?php


                            $dk_il_sor = $db->prepare("SELECT * from iller");
                            $dk_il_sor->execute();
                            $il_say = 1;
                            while ($dk_il_cek = $dk_il_sor->fetch(PDO::FETCH_ASSOC)) {
                                $il_say++;
                            ?>
                                <option class="text-dark" sehirno="<?php echo $dk_il_cek['id'] ?>" value="<?php echo $dk_il_cek['sehiradi'] ?>"><?php echo $dk_il_cek['sehiradi'] ?></option>
                            <?php } ?>

                        </select>

                    </div>


                    <div class="mb-3 col-6">
                        <label for="hasta_ilce" class="form-label">Hasta İlçe</label>
                        <div id="ilce"></div>
                        <select required class="form-select form-control-lg bg-transparent text-white result" id="hasta_ilce" name="hasta_ilce" required>

                        </select>

                    </div>

                    <div class="mb-4 col-12">
                        <label for="hasta_adres" class="form-label">Hasta Adres</label>
                        <textarea required class="form-control form-control-lg" id="hasta_adres" name="hasta_adres" type="text" maxlength="255" placeholder="Adres"></textarea>

                    </div>


                    <div class="mb-3 col-6">
                        <label for="hasta_telefon" class="form-label">Hasta Telefon Numarası</label>
                        <input required class="form-control form-control-lg" id="hasta_telefon" name="hasta_telefon" minlength="11" maxlength="11" type="text" placeholder="Telefon Numarası">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="hasta_mail" class="form-label">Hasta Mail</label>
                        <input class="form-control form-control-lg" id="hasta_mail" name="hasta_mail" type="mail" placeholder="E-mail">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="hasta_dogumtarihi" class="form-label">Hasta Doğum Tarihi</label>
                        <input required class="form-control form-control-lg" id="hasta_dogumtarihi" name="hasta_dogumtarihi" type="date" placeholder="Doğum Tarihi">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="hasta_doktoru" class="form-label">Hasta'nın Doktoru</label>

                        <select class="form-select form-control-lg bg-transparent text-white" id="hasta_doktoru" name="hasta_doktoru" required>
                           
                            <?php


                            $doktor_sor = $db->prepare("SELECT * from personeltablosu");
                            $doktor_sor->execute();
                            $ddddddd_say = 1;
                            while ($doktor_cek = $doktor_sor->fetch(PDO::FETCH_ASSOC)) {
                                $ddddddd_say++;
                            ?>
                                <option class="text-dark" value="<?php echo $doktor_cek['doktor_adi'].' '.$doktor_cek['doktor_soyadi']?>"><?php echo $doktor_cek['doktor_adi'].' '.$doktor_cek['doktor_soyadi']?></option>
                            <?php } ?>

                        </select>

                    </div>


                    <div class="mt-2 ">
                        <button class="btn btn-primary btn-lg form-control-lg shadow-lg hover-shadow shadow-danger rounded px-5 py-2 text-capitalize col-xl-5 col-lg-6 col-xl-3 col-12" name="dk_hasta_ekle">Hasta Ekle</button>
                    </div>
                </div>
            </form>

        </div>

    </div>  

</div>
<script>
    $(document).ready(function() {
        $(document).on("change", '#hasta_il', function() {
            /* Get input required value on change */
            var inputVal = $('option:selected', this).attr('sehirno');


           
            var resultDropdown = $("#hasta_ilce").after();
            if (inputVal.length) {
                $.get("hasta_il_ilce.php", {
                    term: inputVal
                }).done(function(data) {
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();

            }
        });
    });
</script>