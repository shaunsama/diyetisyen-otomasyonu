<div class="container">

    <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="geri_donus" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
        <div class="card shadow-0 bg-transparent">
            <div class="row">

                <div class="col-xl-3 col-lg-5 col-md-5 col-sm-6 col-6 mb-3">

                    <div id="uploaded_image" style="border-radius: 50%; width: 175px!important; height: 175px!important; object-fit: cover;">

                        <div class="bg-image hover-overlay pointer rounded-circle" style="max-height: 175px!important;">

                            <img style="border-radius: 50%; width: 175px!important; height: 175px!important; object-fit: cover;" src="<?php echo $doktor_kullanici_cek['doktor_avatar']; ?>" alt="product" class="img-responsive img-fluid border border-2 rounded-circle w-100 h-100">

                        </div>
                    </div>

                </div>
                <div class="col-9">
                    <div class="row mt-5">
                        <div class="col-12 mb-3">
                            <input type="file" class="form-control form-control-lg" name="doktor_avatar" id="img">

                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-lg">Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>