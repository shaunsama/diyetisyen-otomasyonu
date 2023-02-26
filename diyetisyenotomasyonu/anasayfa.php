<head>
    <?php require_once 'header.php' ?>
</head>

<body>

</body>

<div class="app d-flex vh-100">
    <div class="header">
        <div class="d-inline-flex px-0 w-25"><a href="anasayfa" class="text-white fs-4">Diyetisyen Oto.</a></div>
        <div class="header-menu w-100">

            <a class="menu-link is-active" href="anasayfa">Doktorlar</a>
            <a class="menu-link " href="hastalar">Hastalar</a>


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


    <div class="wrapper">
        <?php require_once 'left-sidebar.php' ?>
        <div class="main-container">
            <div class="content-wrapper">
                <div class="content-section">
                    <div class="row justify-content-between mb-0 ">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ">

                            <div class="tab-content" id="v-tabs-tabContent">
                            
                                
                                <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-list">
                                    <?php require_once 'dashboard.php' ?>
                                </div>

                                <div class="tab-pane fade" id="doktor-list-tab" role="tabpanel" aria-labelledby="doktor-list">
                                    <?php require_once 'doktorlar.php' ?>
                                </div>


                                <?php
                                if ($doktor_tipi_cek['kullanici_tipi'] == 1) { ?>
                                    <div class="tab-pane fade" id="doktor-ekle-tab" role="tabpanel" aria-labelledby="doktor-ekle">
                                        <?php require_once 'doktor-ekle.php' ?>
                                    </div>
                                <?php } ?>

                                



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <?php require_once 'footer.php' ?>
</footer>