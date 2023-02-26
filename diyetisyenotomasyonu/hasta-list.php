<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

    header("location:/diyetisyenotomasyonu/404");
    exit;
}
?>
<div class="container">
    <div class="row">


        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
            <?php if ($_GET['d'] == "silindi") { ?>
                <div class="col-11">
                    <div class="alert alert-success d-flex justify-content-between mt-3">
                        <strong>Hasta başarıyla silindi.</strong>
                        <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                    </div>
                </div>
            <?php } else if ($_GET['d'] == "silinemedi") { ?>
                <div class="col-11">
                    <div class="alert alert-danger d-flex justify-content-between mt-3">
                        <strong>Hasta silinirken bir hata oluştu.</strong>
                        <button class="btn-close close-home-alert" aria-labelledby="close"></button>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-11 col-12 mb-4">
                    <input type="text" class="form-control form-control-lg col-6" id="myInput" onkeyup="myFunction()" placeholder="Hasta Ara">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11">



                    <div class="container table-responsive mx-0 px-0 pe-5 " id="sa">
                        <table class="table text-white table-borderless table-hover w-100" id="myTable">
                            <thead>
                                <tr class="bg-dark">
                                    <th scope="col" class="pointer" onclick="sortTable(0)">#</th>
                                    <th scope="col" class="pointer" onclick="sortTable(1)">Kimlik No.</th>
                                    <th scope="col" class="pointer" onclick="sortTable(2)">Ad</th>
                                    <th scope="col" class="pointer" onclick="sortTable(3)">Soyad</th>
                                    <th scope="col" class="pointer" onclick="sortTable(4)">Doktoru</th>
                                    <th scope="col" class="pointer" onclick="sortTable(5)">Boy</th>
                                    <th scope="col" class="pointer" onclick="sortTable(6)">Kilo</th>
                                    <th scope="col" class="pointer" onclick="sortTable(7)">Hedef</th>
                                    <th scope="col" class="pointer" onclick="sortTable(8)">İl</th>
                                    <th scope="col" class="pointer" onclick="sortTable(9)">İlce</th>
                                    <th scope="col" class="pointer" onclick="sortTable(10)">Adres</th>
                                    <th scope="col" class="pointer" onclick="sortTable(11)">Mail</th>
                                    <th scope="col" class="pointer" onclick="sortTable(12)">Telefon</th>
                                    <th scope="col" class="pointer" onclick="sortTable(13)">Doğum Tarihi</th>
                                    <th scope="col" class="pointer fs-13" onclick="sortTable(14)">Kayıt Zamanı</th>
                                    <th scope="col">Sil</th>
                                    <th scope="col">Düzenle</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $hasta_sor = $db->prepare("SELECT * FROM hastatablosu");
                                $hasta_sor->execute();

                                $hasta_say = 0;

                                while ($hasta_cek = $hasta_sor->fetch(PDO::FETCH_ASSOC)) {
                                    $hasta_say++;
                                ?>
                                    <tr class="bg-custom mb-4 pb-4 border-bottom border-dark students">
                                        <td><?php echo $hasta_say ?></td>

                                        <td><?php echo $hasta_cek['hasta_kimlik'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_adi'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_soyadi'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_doktoru'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_boy'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_kilo'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_hedef'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_il'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_ilce'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_adres'] ?></td>

                                        <td><?php echo $hasta_cek['hasta_mail'] ?></td>
                                        <td><?php echo $hasta_cek['hasta_telefon'] ?></td>


                                        <td class="fs-13"><?php echo date("d.m.Y", strtotime($hasta_cek['hasta_dogumtarihi'])) ?></td>


                                        <td class="fs-13"><?php echo convertMonthToTurkishCharacter(date("d F Y D", strtotime($hasta_cek['hasta_kayit_tarihi']))) ?></td>

                                        <td>
                                            <form action="veritabani_islemleri/diyetisyen_kullanici.php" method="POST" onsubmit="return confirm('&quot;<?php echo $hasta_cek['hasta_adi'] . ' ' . $hasta_cek['hasta_soyadi'] ?>&quot; adlı hastayı silmek istediğinize emin misiniz?');">

                                                <!--yedekleme kodlari-->
                                                <input type="hidden" name="shasta_kimlik" value="<?php echo $hasta_cek['hasta_kimlik'] ?>">
                                                <input type="hidden" name="shasta_adi" value="<?php echo $hasta_cek['hasta_adi'] ?>">
                                                <input type="hidden" name="shasta_soyadi" value="<?php echo $hasta_cek['hasta_soyadi'] ?>">
                                                <input type="hidden" name="shasta_doktoru" value="<?php echo $hasta_cek['hasta_doktoru'] ?>">
                                                <input type="hidden" name="shasta_boy" value="<?php echo $hasta_cek['hasta_boy'] ?>">
                                                <input type="hidden" name="shasta_kilo" value="<?php echo $hasta_cek['hasta_kilo'] ?>">
                                                <input type="hidden" name="shasta_hedef" value="<?php echo $hasta_cek['hasta_hedef'] ?>">
                                                <input type="hidden" name="shasta_il" value="<?php echo $hasta_cek['hasta_il'] ?>">
                                                <input type="hidden" name="shasta_ilce" value="<?php echo $hasta_cek['hasta_ilce'] ?>">
                                                <input type="hidden" name="shasta_adres" value="<?php echo $hasta_cek['hasta_adres'] ?>">
                                                <input type="hidden" name="shasta_mail" value="<?php echo $hasta_cek['hasta_mail'] ?>">
                                                <input type="hidden" name="shasta_telefon" value="<?php echo $hasta_cek['hasta_telefon'] ?>">
                                                <input type="hidden" name="shasta_dogumtarihi" value="<?php echo $hasta_cek['hasta_dogumtarihi'] ?>">
                                                <input type="hidden" name="shasta_kayit_tarihi" value="<?php echo $hasta_cek['hasta_kayit_tarihi'] ?>">



                                                <button type="submit" name="dk_hasta_sil" class="btn btn-danger btn-sm px-3">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input type="hidden" name="hastaID" value="<?php echo $hasta_cek['hastaID'] ?>">

                                            </form>

                                        </td>
                                        <td>
                                            <a href="hasta-duzenle?hastaID=<?php echo $hasta_cek['hastaID'] ?>" type="button" class="btn btn-primary btn-sm px-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>


                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
function convertMonthToTurkishCharacter($date)
{
    $aylar = array(
        'January'    =>    'Ocak',
        'February'    =>    'Şubat',
        'March'        =>    'Mart',
        'April'        =>    'Nisan',
        'May'        =>    'Mayıs',
        'June'        =>    'Haziran',
        'July'        =>    'Temmuz',
        'August'    =>    'Ağustos',
        'September'    =>    'Eylül',
        'October'    =>    'Ekim',
        'November'    =>    'Kasım',
        'December'    =>    'Aralık',

        'Monday'    =>    'Pazartesi',
        'Tuesday'    =>    'Salı',
        'Wednesday'    =>    'Çarşamba',
        'Thursday'    =>    'Perşembe',
        'Friday'    =>    'Cuma',
        'Saturday'    =>    'Cumartesi',
        'Sunday'    =>    'Pazar',
        'Second' => 'Saniye',

        // Günler //
        'Sunday' => 'Pazar',
        'Saturday' => 'Cumartesi',
        'Friday' => 'Cuma',
        'Thursday' => 'Perşembe',
        'Wednesday' => 'Çarşamba',
        'Tuesday' => 'Salı',
        'Monday' => 'Pazartesi',

        'Sun' => 'Pazar',
        'Sat' => 'Cumartesi',
        'Fri' => 'Cuma',
        'Thu' => 'Perşembe',
        'Wed' => 'Çarşamba',
        'Tue' => 'Salı',
        'Mon' => 'Pazartesi',
        // Günler //


        'Sec' => 'Saniye'

    );
    return  strtr($date, $aylar);
} ?>