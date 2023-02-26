<head>
    <?php
    require_once 'get-header.php';
    session_start();
    ob_start();
    error_reporting(0);
    if (isset($_SESSION['userkullanici_nickname'])) {
        header("location:anasayfa");
        exit;
    }
    ?>
<title>Diyetisyen Oto. - Giriş Yap</title>

</head>
<body>
    <div class="video-bg">
        <video width="320" height="240" autoplay loop muted>
            <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card shadow hover-overlay pt-3">
                    <div class="card-header border-0 fs-3 text-center">Otomasyon Giriş</div>

                    <div class="card-body">
                        <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="post">
                            <div class="mb-3">
                                <label for="k_nickname" class="mb-1">Kullanıcı Adı</label>
                                <input type="text" style="text-transform:lowercase" class="form-control form-control-lg text-dark" required name="doktor_kullanici_adi" placeholder="Kullanıcı Adı">
                            </div>

                            <div class="mb-3">
                                <label for="k_password" class="mb-1">Şifre</label>
                                <div class="d-flex align-items-center justify-content-end">
                                <input type="password" class="form-control form-control-lg text-dark" required id="passwordone" name="doktor_sifre" placeholder="Şifre">
                                <i class="uil uil-eye-slash position-absolute me-2 fs-5 pointer text-dark" id="showPassword"></i>
                                </div>  
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary btn-lg text-capitalize btn-block" name="doktor_login">Giriş Yap</button>
                            </div>



                        </form>
                       
                        <?php if ($_GET['d'] == "error") { ?>
                            <div class="alert alert-danger d-flex justify-content-between mt-3">
                                <strong>Bilgilerinizi kontrol ediniz.</strong>
                                <button class="btn-close close-login-alert" aria-labelledby="close"></button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <?php require_once 'footer.php' ?>
</footer>