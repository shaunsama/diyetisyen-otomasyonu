<?php
require_once 'header.php';
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

    header("location:/diyetisyenotomasyonu/404");
    exit;
}

?>
<div class="app d-flex vh-100">
    <div class="container-fluid">
        <div class="container">


            <div class="header">
                <div class="d-inline-flex px-0 w-25"><a href="anasayfa" class="text-white fs-4">Diyetisyen Oto.</a></div>
                <div class="header-menu w-100">

                <a class="menu-link" href="anasayfa">Doktorlar</a>
                <a class="menu-link" href="hastalar">Hastalar</a>
                    

                </div>

                <div class="d-flex align-items-center">

                    <!-- Avatar -->
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo $doktor_kullanici_cek['doktor_avatar'] ?>" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        
                        <li>
                            <a class="dropdown-item" href="ayarlar">Profilim</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="logout">Çıkış Yap</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="main-container">
            <div class="content-wrapper">
                <div class="content-section">
                    <div class="container h-100 mt-5 align-items-center">
                        <div class="row justify-content-between mb-0 ">
                            <div class="left-side col-xl-3 col-md-4 col-sm-12 col-lg-3 col-12" id="left-side">
                                <div class="side-wrapper ">
                                    <div class="nav flex-column nav-tabs nav-fill border-grad side-menu p-3" id="v-tabs-tab" role="tablist" aria-orientation="vertical">

                                        <a class="text-start active mb-3" id="hesabim" data-mdb-toggle="tab" href="#hesabim-tab" role="tab" aria-controls="hesabim-tab" aria-selected="true"><i class="uil uil-user fs-5 me-2"></i>Hesap Bilgileri</a>
                                        <a class="text-start mb-3" id="sifre-guncelle" data-mdb-toggle="tab" href="#sifre-guncelle-tab" role="tab" aria-controls="sifre-guncelle-tab" aria-selected="false"><i class="uil uil-lock fs-5 me-2"></i>Şifre Güncelle</a>
                                        <a class="text-start mb-3" id="resim_guncelle" data-mdb-toggle="tab" href="#resim-guncelle-tab" role="tab" aria-controls="resim-guncelle-tab" aria-selected="false"><i class="uil uil-user fs-5 me-2"></i>Resim Güncelle</a>

                                        <hr>

                                        <div class="mt-3 mb-2 text-muted text-center fw-normal cf m-0 mx-0 " style="font-size: 13px;">Diyetisyen Otomasyonu</div>
                                        <div class="text-center text-muted" style="font-size: 13px;"> © 2022</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12 ">
                                <div class="tab-content" id="v-tabs-tabContent">

                                    <div class="tab-pane fade show active" id="hesabim-tab" role="tabpanel" aria-labelledby="hesabim">
                                        <?php require_once 'hesabim.php' ?>
                                    </div>
                                    <div class="tab-pane fade" id="sifre-guncelle-tab" role="tabpanel" aria-labelledby="sifre-guncelle">
                                        <?php require_once 'sifre-guncelle.php' ?>
                                    </div>
                                    <div class="tab-pane fade" id="resim-guncelle-tab" role="tabpanel" aria-labelledby="resim_guncelle">
                                        <?php require_once 'profil_resmi_guncelle.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>