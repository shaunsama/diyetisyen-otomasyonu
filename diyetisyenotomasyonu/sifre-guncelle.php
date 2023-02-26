<div class="container">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">




            <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="POST" class="form-horizontal">
                <div class="card shadow-0 bg-transparent">
                    <div class="card-header pt-2 pb-0 p-4 border-0">
                        <h3 class="fw-bold ">Şifre Güncelle</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row text-white">
                            <div class="col-7 mb-3">
                                <label for="oldpass" class="form-label text-white">Eski Şifrenizi Giriniz</label>

                                <input class="form-control form-control-lg" required id="oldpass" name="doktor_eskisifre" placeholder="Eski Şifrenizi Giriniz" type="password">
                            </div>


                            <div class="col-7 mb-3 ">
                                <label for="passwordone" class="form-label text-white">Şifreniz</label>
                                <div class="d-flex align-items-center justify-content-end">
                                    <input class="form-control form-control-lg" required id="passwordone" name="doktor_sifre_bir" placeholder="Şifrenizi Giriniz" type="password">
                                    <i class="uil uil-eye-slash position-absolute me-2 fs-5 pointer text-white" id="showPassword"></i>
                                </div>
                            </div>

                            <div class="col-7 mb-4">
                                <label for="passwordtwo" class="form-label text-white">Şifreniz Tekrar</label>

                                <input class="form-control form-control-lg" required id="passwordtwo" name="doktor_sifre_iki" placeholder="Şifrenizi Tekrar Giriniz" type="password">
                            </div>

                        </div>
                        <div class="pt-2">

                            <div class="col-sm-12">
                                <button class="btn btn-primary btn-lg form-control-lg shadow-lg hover-shadow rounded px-5 py-2 text-capitalize col-xl-4 col-lg-4 col-xl-3 col-12 " name="doktor_sifre_guncelle">Şifremi Güncelle</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>