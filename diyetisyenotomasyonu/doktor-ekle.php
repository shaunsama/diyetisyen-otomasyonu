<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">

    <?php if ($_GET['d'] == "eklendi") { ?>
        <div class="alert alert-success d-flex justify-content-between mt-3">
            <strong>Doktor başarıyla Eklendi.</strong>
            <button class="btn-close close-home-alert" aria-labelledby="close"></button>
        </div>
    <?php } else if ($_GET['d'] == "eklenemedi") { ?>
        <div class="alert alert-danger d-flex justify-content-between mt-3">
            <strong>Doktor eklenirken bir hata oluştu.</strong>
            <button class="btn-close close-home-alert" aria-labelledby="close"></button>
        </div>
    <?php } else if ($_GET['d'] == "ad") { ?>
        <div class="alert alert-danger d-flex justify-content-between mt-3">
            <strong>Doktor Ad kısmı boş bıraklımaz.</strong>
            <button class="btn-close close-home-alert" aria-labelledby="close"></button>
        </div>
    <?php } ?>

    <div class="card h-100 border-0 shadow-0 bg-transparent">
        <div class="card-header fs-5">Doktor Ekle</div>
        <div class="card-body p-4">



            <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="POST">

                <div class="row">

                    <div class="mb-3 col-12">
                        <label for="doktor_kimlik" class="form-label">Kimlik Numarası</label>
                        <input required class="form-control form-control-lg" id="doktor_kimlik" minlength="11" maxlength="11" name="doktor_kimlik" type="text" placeholder="T.C. Kimlik Numarası">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_adi" class="form-label">Doktor Adı</label>
                        <input required class="form-control form-control-lg" id="doktor_adi" name="doktor_adi" type="text" placeholder="Ad">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_soyadi" class="form-label">Doktor Soyadı</label>
                        <input required class="form-control form-control-lg" id="doktor_soyadi" name="doktor_soyadi" type="text" placeholder="Soyadı">
                    </div>
                 
                    <div class="mb-3 col-6">
                        <label for="doktor_soyadi" class="form-label">Kullanıcı Adı</label>
                        <input required class="form-control form-control-lg" id="doktor_kullanici_adi" style="text-transform:lowercase" name="doktor_kullanici_adi" type="text" placeholder="Kullanıcı Adı">
                    </div>

                    <div class="mb-3 col-6">
                    
                        <label for="doktor_soyadi" class="form-label">Şifre</label>
                        <div class="d-flex align-items-center justify-content-end">
                        <input required class="form-control form-control-lg" id="passwordone" minlength="6" name="doktor_sifre" type="password" placeholder="Şifre">
                        <i class="uil uil-eye-slash position-absolute me-2 fs-5 pointer text-white" id="showPassword"></i>
                        </div></div>

                    <div class="mb-3 col-6">
                        <label for="doktor_il" class="form-label">Doktor İl</label>

                        <select class="form-select form-control-lg bg-transparent text-white" id="doktor_il_sec" name="doktor_il">
                        <option value="" class="text-dark">Bir Şehir Seçiniz</option>
                            <?php


                            $dk_il_sor = $db->prepare("SELECT * from iller");
                            $dk_il_sor->execute();
                            $il_say = 1;
                            while ($dk_il_cek = $dk_il_sor->fetch(PDO::FETCH_ASSOC)) {
                                $il_say++;
                            ?>
                                <option class="text-dark" sehirno_cek="<?php echo $dk_il_cek['id'] ?>" value="<?php echo $dk_il_cek['sehiradi'] ?>"><?php echo $dk_il_cek['sehiradi'] ?></option>
                            <?php } ?>

                        </select>

                    </div>


                    <div class="mb-3 col-6">
                        <label for="doktor_ilce" class="form-label">Doktor İlçe</label>
                        <div id="ilce"></div>
                        <select class="form-select form-control-lg bg-transparent text-white result" id="doktor_ilce_cek" name="doktor_ilce">

                        </select>

                    </div>

                    <div class="mb-4 col-12">
                        <label for="doktor_adres" class="form-label">Doktor Adres</label>
                        <textarea required class="form-control form-control-lg" id="doktor_adres" name="doktor_adres" type="text" maxlength="255" placeholder="Adres"></textarea>

                    </div>


                    <div class="mb-3 col-6">
                        <label for="doktor_telefon" class="form-label">Doktor Telefon Numarası</label>
                        <input required class="form-control form-control-lg" id="doktor_telefon" name="doktor_telefon" minlength="11" maxlength="11" type="text" placeholder="Telefon Numarası">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_mail" class="form-label">Doktor Mail</label>
                        <input class="form-control form-control-lg" id="doktor_mail" name="doktor_mail" type="mail" placeholder="E-mail">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_dogumtarihi" class="form-label">Doktor Doğum Tarihi</label>
                        <input required class="form-control form-control-lg" id="doktor_dogumtarihi" name="doktor_dogumtarihi" type="date" placeholder="Doğum Tarihi">
                    </div>
                   
                    <div class="mb-3 col-6">
                        <label for="doktor_doktoru" class="form-label">Kullanıcı Tipi</label>

                        <select class="form-select form-control-lg bg-transparent text-white" id="kullanici_tipi" name="kullanici_tipi" required>
 
                                <option class="text-dark" value="0">User</option>
                                <option class="text-dark" value="1">Admin</option>
                            

                        </select>

                    </div>


                    <div class="mt-2 ">
                        <button class="btn btn-primary btn-lg form-control-lg shadow-lg hover-shadow shadow-danger rounded px-5 py-2 text-capitalize col-xl-5 col-lg-6 col-xl-3 col-12" name="dk_doktor_ekle">Doktor Ekle</button>
                    </div>
                </div>
            </form>

        </div>

    </div>  

</div>
<script>
    $(document).ready(function() {
        $(document).on("change", '#doktor_il_sec', function() {
            /* Get input required value on change */
            var inputVal = $('option:selected', this).attr('sehirno_cek');
           
            var resultDropdown = $("#doktor_ilce_cek").after();
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
