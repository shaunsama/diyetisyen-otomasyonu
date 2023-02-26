<div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 mt-4">
    <?php

    if ($_GET['durumsifre'] == "hata") { ?>

        <div class="alert alert-danger">
            <strong>Hata!</strong> İşlem Başarısız.
            <button class="btn-close float-end close-settings-alert" aria-labelledby="close"></button>

        </div>

    <?php } else if ($_GET['durumsifre'] == "ok") { ?>

        <div class="alert alert-success">
            <strong>Bilgi!</strong> İşlem Başarılı.
            <button class="btn-close float-end close-settings-alert" aria-labelledby="close"></button>

        </div>

    <?php } else if ($_GET['durumsifre'] == "eskisifrehata") { ?>

        <div class="alert alert-danger">
            <strong>Bilgi!</strong> Eski Şifreniz Hatalı.
            <button class="btn-close float-end close-settings-alert" aria-labelledby="close"></button>

        </div>

    <?php } else if ($_GET['durumsifre'] == "sifreleruyusmuyor") { ?>

        <div class="alert alert-danger">
            <strong>Bilgi!</strong> Şifreler Uyuşmuyor.
            <button class="btn-close float-end close-settings-alert" aria-labelledby="close"></button>

        </div>

    <?php } else if ($_GET['durumsifre'] == "eksiksifre") { ?>

        <div class="alert alert-danger">
            <strong>Bilgi!</strong> Şifreniz En Az 6 Karakter Olmalı!
            <button class="btn-close float-end close-settings-alert" aria-labelledby="close"></button>

        </div>

    <?php }
    ?>
    <?php if ($_GET['d'] == "y") { ?>
        <div class="alert alert-success d-flex justify-content-between mt-3">
            <strong>Bilgileriniz başarıyla güncellendi.</strong>
            <button class="btn-close close-settings-alert" aria-labelledby="close"></button>
        </div>
    <?php } else if ($_GET['d'] == "n") { ?>
        <div class="alert alert-danger d-flex justify-content-between mt-3">
            <strong>Bilgileriniz güncellenirken bir hata oluştu.</strong>
            <button class="btn-close close-settings-alert" aria-labelledby="close"></button>
        </div>
    <?php } ?>

    <style>
        #pp {
            position: relative;
            top: -20px;
        }
    </style>

    <div class="card h-100 border-0 shadow-0 bg-transparent">
        <div class="card-body p-4">
            <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="geri_donus" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <div class="row justify-content-between">

                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-4">

                        <div id="uploaded_image" style="border-radius: 50%; width: 175px!important; height: 175px!important; object-fit: cover;">

                            <div id="pp" class="bg-image hover-overlay pointer rounded-circle" style="max-height: 175px!important;">
                                <img style="border-radius: 50%; width: 175px!important; height: 175px!important; object-fit: cover;" src="<?php echo $doktor_kullanici_cek['doktor_avatar']; ?>" alt="product" class="img-responsive img-fluid border border-2 rounded-circle w-100 h-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-6 col-6">
                        <div class="h1 cf fw-bold text-white"><?php echo $doktor_kullanici_cek['doktor_adi'] . " " . $doktor_kullanici_cek['doktor_soyadi'] ?></div>
                        <div class="h2 text-muted fw-normal"><?php echo $doktor_kullanici_cek['doktor_kullanici_adi'] ?></div>

                    </div>
                </div>



            </form>
            <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="post" enctype="multipart/form-data">

                <div class="row">

                    <input type="hidden" name="doktorID" value="<?php echo $doktor_kullanici_cek['doktorID'] ?>">
                    <div class="mb-3 col-6">
                        <label for="mail" class="form-label">T.C. Kimlik No. (Değiştiremezsiniz)</label>
                        <input required class="form-control form-control-lg bg-dark" disabled="" id="mail" value="<?php echo $doktor_kullanici_cek['doktor_kimlik'] ?>" type="text">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_kullanici_adi" class="form-label">Kullanıcı Adı (Değiştiremezsiniz)</label>
                        <input required class="form-control form-control-lg bg-dark" id="doktor_kullanici_adi" disabled value="<?php echo $doktor_kullanici_cek['doktor_kullanici_adi']  ?>">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_adi" class="form-label">Ad</label>

                        <input required class="form-control form-control-lg" id="doktor_adi" name="doktor_adi" value="<?php echo $doktor_kullanici_cek['doktor_adi'] ?>" type="text">
                    </div>


                    <div class="mb-3 col-6">
                        <label for="doktor_soyadi" class="form-label">Soyad</label>

                        <input required class="form-control form-control-lg" id="doktor_soyadi" name="doktor_soyadi" value="<?php echo $doktor_kullanici_cek['doktor_soyadi'] ?>" type="text">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_telefon" class="form-label">Doktor Telefon Numarası</label>
                        <input required minlength="11" maxlength="11" class="form-control form-control-lg" id="doktor_telefon" name="doktor_telefon" value="<?php echo $doktor_kullanici_cek['doktor_telefon'] ?>" type="text" placeholder="Telefon Numarası">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_mail" class="form-label">Doktor Mail</label>
                        <input required class="form-control form-control-lg" id="doktor_mail" name="doktor_mail" value="<?php echo $doktor_kullanici_cek['doktor_mail'] ?>" type="mail" placeholder="E-mail">
                    </div>

                    <div class="mb-3 col-6">
                        <label for="doktor_dogumtarihi" class="form-label">Doktor Doğum Tarihi</label>

                        <input required class="form-control form-control-lg" id="doktor_dogumtarihi" name="doktor_dogumtarihi" value="<?php echo $doktor_kullanici_cek['doktor_dogumtarihi'] ?>" type="date" placeholder="Doğum Tarihi">
                    </div>

                    <div class="mt-2 ">
                        <button class="btn btn-primary btn-lg form-control-lg shadow-lg hover-shadow shadow-danger rounded  py-2 text-capitalize col-xl-5 col-lg-6 col-xl-3 col-12" name="doktor_kullanici_guncelle">Hesap Bilgilerimi Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>