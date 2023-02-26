<?php require_once 'header.php';

$hasta_sor = $db->prepare("SELECT * FROM hastatablosu where hastaID=:hastaID");
$hasta_sor->execute(array(
    'hastaID' => intval($_GET['hastaID'])
));

$hasta_cek = $hasta_sor->fetch(PDO::FETCH_ASSOC);
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
        <?php require_once 'left-sidebar2.php' ?>
        <div class="main-container">
            <div class="content-wrapper">
                <div class="content-section">


                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">

                        <?php if ($_GET['d'] == "duzenlendi") { ?>
                            <div class="alert alert-success d-flex justify-content-between mt-3">
                                <strong>Hasta başarıyla Eklendi.</strong>
                                <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                            </div>
                        <?php } else if ($_GET['d'] == "duzenlenemedi") { ?>
                            <div class="alert alert-danger d-flex justify-content-between mt-3">
                                <strong>Hasta eklenirken bir hata oluştu.</strong>
                                <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                            </div>
                        <?php } else if ($_GET['d'] == "add") { ?>
                            <div class="alert alert-danger d-flex justify-content-between mt-3">
                                <strong>Hasta Ad kısmı boş bıraklımaz.</strong>
                                <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                            </div>
                        <?php } ?>

                        <div class="card h-100 border-0 shadow-0 bg-transparent">
                            <div class="card-header fs-5"><b class="text-success"><?php echo $hasta_cek['hasta_adi'] . " " . $hasta_cek['hasta_soyadi'] ?></b> Adlı Hastanın Bilgilerini Düzenle</div>
                            <div class="card-body p-4">



                                <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="post">

                                    <div class="row">

                                        <div class="mb-3 col-6">
                                            <label for="hasta_kimlik" class="form-label">Hasta Kimlik</label>
                                            <input disabled class="form-control form-control-lg bg-dark" id="hasta_kimlik" name="" value="<?php echo $hasta_cek['hasta_kimlik'] ?>" type="text" placeholder="Hasta Kimlik">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_adi" class="form-label">Hasta Adı</label>
                                            <input required class="form-control form-control-lg" id="hasta_adi" name="hasta_adi" value="<?php echo $hasta_cek['hasta_adi'] ?>" type="text" placeholder="Hasta Ad">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_soyadi" class="form-label">Hasta Soyad</label>
                                            <input required class="form-control form-control-lg" id="hasta_soyadi" name="hasta_soyadi" value="<?php echo $hasta_cek['hasta_soyadi'] ?>" type="text" placeholder="Hasta Soyad">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_boy" class="form-label">Hasta Boy</label>
                                            <input required class="form-control form-control-lg" id="hasta_boy" name="hasta_boy" value="<?php echo $hasta_cek['hasta_boy'] ?>" type="text" placeholder="Hasta Boy">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_kilo" class="form-label">Hasta Kilo</label>
                                            <input required class="form-control form-control-lg" id="hasta_kilo" name="hasta_kilo" value="<?php echo $hasta_cek['hasta_kilo'] ?>" type="text" placeholder="Hasta Kilo">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_hedef" class="form-label">Hasta Hedef</label>
                                            <input required class="form-control form-control-lg" id="hasta_hedef" name="hasta_hedef" value="<?php echo $hasta_cek['hasta_hedef'] ?>" type="text" placeholder="Hasta Hedef">
                                        </div>



                                        <div class="mb-3 col-6">
                                            <label for="hasta_il" class="form-label">Hasta İl</label>
                                            <input required class="form-control form-control-lg" id="hasta_il" name="hasta_il" value="<?php echo $hasta_cek['hasta_il'] ?>" type="text" placeholder="Hasta İl">


                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_ilce" class="form-label">Hasta İlçe</label>
                                            <input required class="form-control form-control-lg" id="hasta_ilce" name="hasta_ilce" value="<?php echo $hasta_cek['hasta_ilce'] ?>" type="text" placeholder="Hasta İlçe">


                                        </div>

                                        <div class="mb-4 col-12">
                                            <label for="hasta_adres" class="form-label">Hasta Adres</label>
                                            <textarea required class="form-control form-control-lg" id="hasta_adres" name="hasta_adres" type="text" maxlength="255" placeholder="Hasta Adresi"><?php echo $hasta_cek['hasta_adres'] ?></textarea>

                                        </div>


                                        <div class="mb-3 col-6">
                                            <label for="hasta_telefon" class="form-label">Hasta Telefon Numarası</label>
                                            <input required minlength="11" maxlength="11" class="form-control form-control-lg" id="hasta_telefon" name="hasta_telefon" value="<?php echo $hasta_cek['hasta_telefon'] ?>" type="text" placeholder="Hasta Telefon Numarası">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_mail" class="form-label">Hasta Mail</label>
                                            <input class="form-control form-control-lg" id="hasta_mail" name="hasta_mail" value="<?php echo $hasta_cek['hasta_mail'] ?>" type="mail" placeholder="Hasta E-mail">
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label for="hasta_dogumtarihi" class="form-label">Hasta Doğum Tarihi</label>

                                            <input required class="form-control form-control-lg" id="hasta_dogumtarihi" name="hasta_dogumtarihi" value="<?php echo $hasta_cek['hasta_dogumtarihi'] ?>" type="date" placeholder="Hasta Doğum Tarihi">
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
                                                    <option class="text-dark" value="<?php echo $doktor_cek['doktor_adi'] . ' ' . $doktor_cek['doktor_soyadi'] ?>"><?php echo $doktor_cek['doktor_adi'] . ' ' . $doktor_cek['doktor_soyadi'] ?></option>
                                                <?php } ?>

                                            </select>

                                        </div>

                                        <input type="hidden" name="hastaID" value="<?php echo $_GET['hastaID'] ?>">
                                        <div class="mt-2 ">
                                            <button class="btn btn-primary btn-lg form-control-lg shadow-lg hover-shadow shadow-danger rounded px-5 py-2 text-capitalize col-xl-5 col-lg-6 col-xl-3 col-12" name="dk_hasta_duzenle">Hastayı Düzenle</button>
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