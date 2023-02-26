<?php require_once 'header.php';

$doktor_sor = $db->prepare("SELECT * FROM personeltablosu where doktorID=:doktorID");
$doktor_sor->execute(array(
    'doktorID' => intval($_GET['doktorID'])
));

$doktor_cek = $doktor_sor->fetch(PDO::FETCH_ASSOC);
?>

<div class="app d-flex vh-100">
    <div class="header">

        <div class="d-inline-flex px-0 w-25"><a href="anasayfa" class="text-white fs-4">Diyetisyen Oto</a></div>
        <div class="header-menu w-100">

            <a class="menu-link" href="anasayfa">Doktorlar</a>
            <a class="menu-link" href="hastalar">Hastalar</a>


        </div>

        <div class="d-flex align-items-center">

            <!-- Avatar -->
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">

            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="ayarlar">Ayarlar</a>
                </li>
                <li>
                    <a class="dropdown-item" href="logout">Çıkış Yap</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="wrapper">
        <?php require_once 'left-sidebar.php' ?>
        <div class="main-container">
            <div class="content-wrapper">
                <div class="content-section">


                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">

                        <?php if ($_GET['d'] == "duzenlendi") { ?>
                            <div class="alert alert-success d-flex justify-content-between mt-3">
                                <strong>Doktor başarıyla Eklendi.</strong>
                                <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                            </div>
                        <?php } else if ($_GET['d'] == "duzenlenemedi") { ?>
                            <div class="alert alert-danger d-flex justify-content-between mt-3">
                                <strong>Doktor eklenirken bir hata oluştu.</strong>
                                <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                            </div>
                        <?php } else if ($_GET['d'] == "add") { ?>
                            <div class="alert alert-danger d-flex justify-content-between mt-3">
                                <strong>Doktor Ad kısmı boş bıraklımaz.</strong>
                                <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                            </div>
                        <?php } ?>

                        <div class="card h-100 border-0 shadow-0 bg-transparent">
                            <div class="card-header fs-5"><b class="text-success"><?php echo $doktor_cek['doktor_adi'] . " " . $doktor_cek['doktor_soyadi'] ?></b> Adlı Doktorun Bilgilerini Düzenle</div>
                            <div class="card-body p-4">



                                <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="post">

                                    <div class="row">

                                        <div class="mb-3 col-126">
                                            <label for="doktor_kimlik" class="form-label">Doktor Kimlik</label>
                                            <input disabled class="form-control form-control-lg bg-dark" id="doktor_kimlik" name="" value="<?php echo $doktor_cek['doktor_kimlik'] ?>" type="text" placeholder="T.C Kimlik Numarası">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_adi" class="form-label">Doktor Adı</label>
                                            <input required class="form-control form-control-lg" id="doktor_adi" name="doktor_adi" value="<?php echo $doktor_cek['doktor_adi'] ?>" type="text" placeholder="Ad">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_soyadi" class="form-label">Doktor Soyad</label>
                                            <input required class="form-control form-control-lg" id="doktor_soyadi" name="doktor_soyadi" value="<?php echo $doktor_cek['doktor_soyadi'] ?>" type="text" placeholder="Soyad">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_soyadi" class="form-label">Doktor Kullanıcı Adı</label>
                                            <input required class="form-control form-control-lg" id="doktor_kullanici_adi" name="doktor_kullanici_adi" value="<?php echo $doktor_cek['doktor_kullanici_adi'] ?>" type="text" placeholder="Kullanıcı Adı">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_soyadi" class="form-label">Doktor Şifre</label>
                                            <div class="d-flex align-items-center justify-content-end">

                                                <input required class="form-control form-control-lg" id="passwordone" name="doktor_sifre" value="<?php echo $doktor_cek['doktor_sifre'] ?>" type="password" placeholder="Şifre">
                                                <i class="uil uil-eye-slash position-absolute me-2 fs-5 pointer text-white" id="showPassword"></i>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_il" class="form-label">Doktor İl</label>
                                            <input required class="form-control form-control-lg" id="doktor_il" name="doktor_il" value="<?php echo $doktor_cek['doktor_il'] ?>" type="text" placeholder="İl">


                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_ilce" class="form-label">Doktor İlçe</label>
                                            <input required class="form-control form-control-lg" id="doktor_ilce" name="doktor_ilce" value="<?php echo $doktor_cek['doktor_ilce'] ?>" type="text" placeholder="İlçe">


                                        </div>

                                        <div class="mb-4 col-12">
                                            <label for="doktor_adres" class="form-label">Doktor Adres</label>
                                            <textarea required class="form-control form-control-lg" id="doktor_adres" name="doktor_adres" type="text" maxlength="255" placeholder="Adres"><?php echo $doktor_cek['doktor_adres'] ?></textarea>

                                        </div>


                                        <div class="mb-3 col-6">
                                            <label for="doktor_telefon" class="form-label">Doktor Telefon Numarası</label>
                                            <input required minlength="11" maxlength="11" class="form-control form-control-lg" id="doktor_telefon" name="doktor_telefon" value="<?php echo $doktor_cek['doktor_telefon'] ?>" type="text" placeholder="Telefon Numarası">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_mail" class="form-label">Doktor Mail</label>
                                            <input required class="form-control form-control-lg" id="doktor_mail" name="doktor_mail" value="<?php echo $doktor_cek['doktor_mail'] ?>" type="mail" placeholder="E-mail">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="doktor_dogumtarihi" class="form-label">Doktor Doğum Tarihi</label>

                                            <input required class="form-control form-control-lg" id="doktor_dogumtarihi" name="doktor_dogumtarihi" value="<?php echo $doktor_cek['doktor_dogumtarihi'] ?>" type="date" placeholder="Doğum Tarihi">
                                        </div>

                                        <div class="mb-3 col-6">
                                        <label for="doktor_dogumtarihi" class="form-label">Kullanici Tipi</label>
                                            <select class="form-select form-control-lg bg-transparent text-white" id="kullanici_tipi" name="kullanici_tipi" required>
                                                

                                            <?php if ($doktor_cek['kullanici_tipi'] != 1) { ?>
                                                    <option selected class="text-dark" value="0">User</option>
                                                    <option class="text-dark" value="1">Admin</option>
                                                <?php }
                                                
                                                else { ?>
                                                    <option class="text-dark" value="0">User</option>
                                                    <option selected class="text-dark" value="1">Admin</option>
                                                <?php } ?>


                                            </select>
                                        </div>
                                        <input type="hidden" name="doktorID" value="<?php echo $_GET['doktorID'] ?>">
                                    </div>
                                    <div class="mt-2 ">
                                        <button class="btn btn-primary btn-lg form-control-lg shadow-lg hover-shadow shadow-danger rounded px-5 py-2 text-capitalize col-xl-5 col-lg-6 col-xl-3 col-12" name="dk_doktor_duzenle">Doktoru Düzenle</button>
                                    </div>
                            </div>
                        </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php require_once 'footer.php' ?>