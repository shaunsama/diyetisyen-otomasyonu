<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

    header("location:/diyetisyenotomasyonu/404");
    exit;
}
?>

<div class="left-side">
    <div class="side-wrapper">
        <div class="side-title">Genel</div>
        <div class="side-menu ">
            <?php if (!$_GET['hastaID']) { ?>
                <div class="nav  nav-tabs nav-fill border-grad side-menu " id="v-tabs-tab" role="tablist" aria-orientation="vertical">

                    <a class="text-start active mb-3" id="dashboard" data-mdb-toggle="tab" href="#dashboard-tab" role="tab" aria-controls="dashboard-tab" aria-selected="true"><i class="uil uil-server-alt fs-5 me-2"></i></i>Hasta Verileri</a>
                    <a class="text-start mb-3" id="hasta-ekle" data-mdb-toggle="tab" href="#hasta-ekle-tab" role="tab" aria-controls="hasta-ekle-tab" aria-selected="true"><i class="uil uil-user-plus fs-5 me-2"></i>Hasta Ekle</a>
                    <a class="text-start mb-3" id="hasta-list" data-mdb-toggle="tab" href="#hasta-list-tab" role="tab" aria-controls="hasta-list-tab" aria-selected="false"><i class="uil uil-list-ul fs-5 me-2"></i>Hasta Listesi</a>


                </div>
            <?php } else { ?>
                <a class="text-start mb-3" href="anasayfa"><i class="uil uil-user fs-5 me-2"></i>Doktorlar</a>
                <a class="text-start mb-3" href="hastalar"><i class="uil uil-users-alt fs-5 me-2"></i>Hastalar</a>

            <?php } ?>
        </div>
    </div>


</div>