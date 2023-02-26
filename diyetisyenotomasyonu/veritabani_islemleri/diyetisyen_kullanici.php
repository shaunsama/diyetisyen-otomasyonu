<?php
ob_start();
session_start();
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

include 'diyetisyen_DB_baglanti.php';
include '../fonksiyon/diyetisyen_Fonksiyon.php';


if (isset($_POST['doktor_login'])) {

	$doktor_kullanici_adi = strip_tags($_POST['doktor_kullanici_adi']);

	$password = $_POST['doktor_sifre'];

	$doktor_kullanici_sor = $db->prepare("SELECT * FROM personeltablosu where doktor_kullanici_adi=:doktor_kullanici_adi and doktor_sifre=:doktor_sifre");
	$doktor_kullanici_sor->execute(array(
		'doktor_kullanici_adi' => $doktor_kullanici_adi,
		'doktor_sifre' => $password
	));
	$d_ksay = $doktor_kullanici_sor->rowCount();

	$doktor_kullanici_cek = $doktor_kullanici_sor->fetch(PDO::FETCH_ASSOC);

	if ($d_ksay == 1) {
		header("Location:../anasayfa?d=success");
		$_SESSION['userkullanici_nickname'] = $doktor_kullanici_adi;
		$_SESSION['userkullanici_id'] = $doktor_kullanici_cek['doktorID'];

		exit;
	} else {
		header("Location:../login?d=error");
		exit;
	}
}

if (isset($_POST['doktor_kullanici_guncelle'])) {

	$doktorID = $_POST['doktorID'];

	$doktor_adi = $_POST['doktor_adi'];
	$doktor_soyadi = $_POST['doktor_soyadi'];
	$doktor_telefon = $_POST['doktor_telefon'];
	$doktor_mail = $_POST['doktor_mail'];
	$doktor_dogumtarihi = $_POST['doktor_dogumtarihi'];




	$doktor_kullanici_guncelle = $db->prepare("UPDATE personeltablosu set 
	
    doktor_adi=:doktor_adi,
    doktor_soyadi=:doktor_soyadi,
	doktor_telefon=:doktor_telefon,
	doktor_mail=:doktor_mail,
	doktor_dogumtarihi=:doktor_dogumtarihi

	where doktorID=:doktorID
	");

	$update = $doktor_kullanici_guncelle->execute(array(
		'doktor_adi' => $doktor_adi,
		'doktor_soyadi' => $doktor_soyadi,
		'doktor_telefon' => $doktor_telefon,
		'doktor_mail' => $doktor_mail,
		'doktor_dogumtarihi' => $doktor_dogumtarihi,
		'doktorID' => $doktorID

	));








	if ($update) {
		Header("Location:../ayarlar?d=y");
		exit;
	} else {
		Header("Location:../ayarlar?d=n");
		exit;
	}
}

if (isset($_POST['doktor_sifre_guncelle'])) {

	$doktor_eskisifre = $_POST['doktor_eskisifre'];
	$doktor_sifre_bir = $_POST['doktor_sifre_bir'];
	$doktor_sifre_iki = $_POST['doktor_sifre_iki'];

	$doktor_sifre = $doktor_eskisifre;

	$doktor_sor = $db->prepare("SELECT * from personeltablosu where doktor_sifre=:doktor_sifre");
	$doktor_sor->execute(array(
		'doktor_sifre' => $doktor_sifre
	));

	$say = $doktor_sor->rowCount();

	if ($say == 0) {

		Header("Location:../ayarlar?durumsifre=eskisifrehata");
		exit;
	}



	if ($doktor_sifre_bir == $doktor_sifre_iki) {


		if (strlen($doktor_sifre_bir) >= 6) {


			$sifre = $doktor_sifre_bir;


			$doktor_guncelle = $db->prepare("UPDATE personeltablosu SET

				doktor_sifre=:doktor_sifre
				WHERE doktorID=:doktorID");


			$update_password = $doktor_guncelle->execute(array(
				'doktor_sifre' => $sifre,
				'doktorID' => $_SESSION['userkullanici_id']

			));

			if ($update_password) {

				Header("Location:../ayarlar?durumsifre=ok");
				exit;
			} else {


				Header("Location:../ayarlar?durumsifre=hata");
				exit;
			}
		} else {

			Header("Location:../ayarlar?durumsifre=eksiksifre");
			exit;
		}
	} else {


		Header("Location:../ayarlar?durumsifre=sifreleruyusmuyor");
		exit;
	}
}

if (isset($_POST['dk_hasta_ekle'])) {
	$hasta_kimlik = $_POST['hasta_kimlik'];
	$hasta_adi = $_POST['hasta_adi'];
	$hasta_soyadi = $_POST['hasta_soyadi'];
	$hasta_boy = $_POST['hasta_boy'];
	$hasta_kilo = $_POST['hasta_kilo'];
	$hasta_hedef = $_POST['hasta_hedef'];
	$hasta_il = $_POST['hasta_il'];
	$hasta_ilce = $_POST['hasta_ilce'];
	$hasta_adres = $_POST['hasta_adres'];
	$hasta_telefon = $_POST['hasta_telefon'];
	$hasta_mail = $_POST['hasta_mail'];
	$hasta_dogumtarihi = $_POST['hasta_dogumtarihi'];
	$hasta_doktoru = $_POST['hasta_doktoru'];





	if (strlen($hasta_adi) != 0) {
		$hasta_ekle = $db->prepare(
			"INSERT INTO hastatablosu set
		hasta_kimlik=:hasta_kimlik,
		hasta_adi=:hasta_adi,
		hasta_soyadi=:hasta_soyadi,
		hasta_boy=:hasta_boy,
		hasta_kilo=:hasta_kilo,
		hasta_hedef=:hasta_hedef,
		hasta_il=:hasta_il,
		hasta_ilce=:hasta_ilce,
		hasta_adres=:hasta_adres,
		hasta_telefon=:hasta_telefon,
		hasta_mail=:hasta_mail,
		hasta_dogumtarihi=:hasta_dogumtarihi,
		hasta_doktoru=:hasta_doktoru"


		);


		$hasta_eklendi = $hasta_ekle->execute(array(
			'hasta_kimlik' => $hasta_kimlik,
			'hasta_adi' => $hasta_adi,
			'hasta_soyadi' => $hasta_soyadi,
			'hasta_boy' => $hasta_boy,
			'hasta_kilo' => $hasta_kilo,
			'hasta_hedef' => $hasta_hedef,
			'hasta_il' => $hasta_il,
			'hasta_ilce' => $hasta_ilce,
			'hasta_adres' => $hasta_adres,
			'hasta_telefon' => $hasta_telefon,
			'hasta_mail' => $hasta_mail,
			'hasta_dogumtarihi' => $hasta_dogumtarihi,
			'hasta_doktoru' => $hasta_doktoru

		));

		if ($hasta_eklendi) {
			Header("Location:../hastalar?d=eklendi");
			exit;
		} else {
			Header("Location:../hastalar?d=eklenemedi");
			exit;
		}
	} else {
		Header("Location:../hastalar?d=ad");
		exit;
	}
	echo "yes";
}

if (isset($_POST['dk_hasta_duzenle'])) {

	$hastaID = intval($_POST['hastaID']);
	$hasta_adi = $_POST['hasta_adi'];
	$hasta_soyadi = $_POST['hasta_soyadi'];
	$hasta_boy = $_POST['hasta_boy'];
	$hasta_kilo = $_POST['hasta_kilo'];
	$hasta_hedef = $_POST['hasta_hedef'];
	$hasta_il = $_POST['hasta_il'];
	$hasta_ilce = $_POST['hasta_ilce'];
	$hasta_adres = $_POST['hasta_adres'];
	$hasta_telefon = $_POST['hasta_telefon'];
	$hasta_mail = $_POST['hasta_mail'];
	$hasta_dogumtarihi = $_POST['hasta_dogumtarihi'];
	$hasta_doktoru = $_POST['hasta_doktoru'];

	if (strlen($hasta_adi) != 0) {
		$hasta_guncelle = $db->prepare("UPDATE hastatablosu set
		hasta_adi=:hasta_adi,
		hasta_soyadi=:hasta_soyadi,
		hasta_boy=:hasta_boy,
		hasta_kilo=:hasta_kilo,
		hasta_hedef=:hasta_hedef,
		hasta_il=:hasta_il,
		hasta_ilce=:hasta_ilce,
		hasta_adres=:hasta_adres,
		hasta_telefon=:hasta_telefon,
		hasta_mail=:hasta_mail,
		hasta_doktoru=:hasta_doktoru,
		hasta_dogumtarihi=:hasta_dogumtarihi where hastaID=:hastaID
		");

		$hasta_guncellendi = $hasta_guncelle->execute(array(

			'hasta_adi' => $hasta_adi,
			'hasta_soyadi' => $hasta_soyadi,
			'hasta_boy' => $hasta_boy,
			'hasta_kilo' => $hasta_kilo,
			'hasta_hedef' => $hasta_hedef,
			'hasta_il' => $hasta_il,
			'hasta_ilce' => $hasta_ilce,
			'hasta_adres' => $hasta_adres,
			'hasta_telefon' => $hasta_telefon,
			'hasta_mail' => $hasta_mail,
			'hasta_dogumtarihi' => $hasta_dogumtarihi,
			'hastaID' => $hastaID,
			'hasta_doktoru' => $hasta_doktoru
		));

		if ($hasta_guncellendi) {
			Header("Location:../hastalar?d=duzenlendi");
			exit;
		} else {
			Header("Location:../hastalar?d=duzenlenemedi");
			exit;
		}
	} else {
		Header("Location:../hastalar?d=add");
		exit;
	}
}

if (isset($_POST['dk_hasta_sil'])) {
	$hasta_id = $_POST['hastaID'];


	$shasta_kimlik = $_POST['shasta_kimlik'];
	$shasta_adi = $_POST['shasta_adi'];
	$shasta_soyadi = $_POST['shasta_soyadi'];
	$shasta_boy = $_POST['shasta_boy'];
	$shasta_kilo = $_POST['shasta_kilo'];
	$shasta_hedef = $_POST['shasta_hedef'];
	$shasta_il = $_POST['shasta_il'];
	$shasta_ilce = $_POST['shasta_ilce'];
	$shasta_adres = $_POST['shasta_adres'];
	$shasta_telefon = $_POST['shasta_telefon'];
	$shasta_mail = $_POST['shasta_mail'];
	$shasta_dogumtarihi = $_POST['shasta_dogumtarihi'];
	$shasta_kayit_tarihi = $_POST['shasta_kayit_tarihi'];
	$shasta_doktoru = $_POST['shasta_doktoru'];


	$shasta_ekle = $db->prepare("INSERT INTO silinen_hastatablosu SET
										shasta_kimlik=:shasta_kimlik,
										shasta_adi=:shasta_adi,
										shasta_soyadi=:shasta_soyadi,
										shasta_boy=:shasta_boy,
										shasta_kilo=:shasta_kilo,
										shasta_hedef=:shasta_hedef,
										shasta_il=:shasta_il,
										shasta_ilce=:shasta_ilce,
										shasta_adres=:shasta_adres,
										shasta_telefon=:shasta_telefon,
										shasta_mail=:shasta_mail,
										shasta_dogumtarihi=:shasta_dogumtarihi,
										shasta_kayit_tarihi=:shasta_kayit_tarihi,
										shasta_doktoru=:shasta_doktoru
										");

	$shasta_eklendi = $shasta_ekle->execute(array(
		'shasta_kimlik' => $shasta_kimlik,
		'shasta_adi' => $shasta_adi,
		'shasta_soyadi' => $shasta_soyadi,
		'shasta_boy' => $shasta_boy,
		'shasta_kilo' => $shasta_kilo,
		'shasta_hedef' => $shasta_hedef,
		'shasta_il' => $shasta_il,
		'shasta_ilce' => $shasta_ilce,
		'shasta_adres' => $shasta_adres,
		'shasta_telefon' => $shasta_telefon,
		'shasta_mail' => $shasta_mail,
		'shasta_dogumtarihi' => $shasta_dogumtarihi,
		'shasta_kayit_tarihi' => $shasta_kayit_tarihi,
		'shasta_doktoru' => $shasta_doktoru,
	));

	$hasta_sil = $db->prepare("DELETE FROM hastatablosu where hastaID=:hastaID");
	$hasta_silindi = $hasta_sil->execute(array(
		'hastaID' => $hasta_id
	));


	if ($hasta_silindi) {
		Header("Location:../hastalar?d=silindi");
		exit;
	} else {
		Header("Location:../hastalar?d=silinemedi");
		exit;
	}
}

if (isset($_FILES['doktor_avatar'])) {
	$geri_donus = htmlspecialchars($_POST['geri_donus']);
	if ($_FILES['doktor_avatar']['size'] > 1048576) {

		echo "Bu dosya boyutu çok büyük";

		Header("Location:{$geri_donus}?durum=dosyabuyuk");
	}


	$izinli_uzantilar = array('jpg', 'png', 'jpeg', 'gif');

	//echo $_FILES['ayar_logo']["name"];

	$ext = strtolower(substr($_FILES['doktor_avatar']["name"], strpos($_FILES['file']["name"], '.') + 1));



	@$tmp_name = $_FILES['doktor_avatar']["tmp_name"];
	@$name = $_FILES['doktor_avatar']["name"];

	//İmage Resize İşlemleri
	/*include('SimpleImage');
    $image = new SimpleImage();
    $image->load($tmp_name);
    $image->resize(128,128);
    $image->save($tmp_name);*/

	$uploads_dir = '../img';


	$uniq = uniqid();
	$refimgyol = substr($uploads_dir, 3) . "/" . $uniq . "." . $ext;

	@move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");


	$duzenle = $db->prepare("UPDATE personeltablosu SET
        
        doktor_avatar=:doktor_avatar

        WHERE doktorID={$_SESSION['userkullanici_id']}");

	$update = $duzenle->execute(array(

		'doktor_avatar' => $refimgyol
	));



	if ($update) {

		Header("Location:{$geri_donus}?durum=ok");
	} else {

		Header("Location:{$geri_donus}?durum=hata");
	}
}

if (isset($_POST['dk_doktor_ekle'])) {
	$doktor_kimlik = $_POST['doktor_kimlik'];
	$doktor_adi = $_POST['doktor_adi'];
	$doktor_soyadi = $_POST['doktor_soyadi'];

	$doktor_kullanici_adi = $_POST['doktor_kullanici_adi'];
	$doktor_sifre = $_POST['doktor_sifre'];

	$doktor_il = $_POST['doktor_il'];
	$doktor_ilce = $_POST['doktor_ilce'];
	$doktor_adres = $_POST['doktor_adres'];
	$doktor_telefon = $_POST['doktor_telefon'];
	$doktor_mail = $_POST['doktor_mail'];
	$doktor_dogumtarihi = $_POST['doktor_dogumtarihi'];

	$kullanici_tipi = $_POST['kullanici_tipi'];




	if (strlen($doktor_adi) != 0) {
		$doktor_ekle = $db->prepare(
			"INSERT INTO personeltablosu set
		doktor_kimlik=:doktor_kimlik,
		doktor_adi=:doktor_adi,
		doktor_soyadi=:doktor_soyadi,

        doktor_kullanici_adi=:doktor_kullanici_adi,
        doktor_sifre=:doktor_sifre,

		doktor_il=:doktor_il,
		doktor_ilce=:doktor_ilce,
		doktor_adres=:doktor_adres,
		doktor_telefon=:doktor_telefon,
		doktor_mail=:doktor_mail,
		doktor_dogumtarihi=:doktor_dogumtarihi,

        kullanici_tipi=:kullanici_tipi
		"


		);


		$doktor_eklendi = $doktor_ekle->execute(array(
			'doktor_kimlik' => $doktor_kimlik,
			'doktor_adi' => $doktor_adi,
			'doktor_soyadi' => $doktor_soyadi,

			'doktor_kullanici_adi' => $doktor_kullanici_adi,
			'doktor_sifre' => $doktor_sifre,

			'doktor_il' => $doktor_il,
			'doktor_ilce' => $doktor_ilce,
			'doktor_adres' => $doktor_adres,
			'doktor_telefon' => $doktor_telefon,
			'doktor_mail' => $doktor_mail,
			'doktor_dogumtarihi' => $doktor_dogumtarihi,

			'kullanici_tipi' => $kullanici_tipi

		));

		if ($doktor_eklendi) {
			Header("Location:../anasayfa?d=eklendi");
			exit;
		} else {
			Header("Location:../anasayfa?d=eklenemedi");
			exit;
		}
	} else {
		Header("Location:../anasayfa?d=ad");
		exit;
	}
	echo "yes";
}

if (isset($_POST['dk_doktor_sil'])) {
	$doktor_id = $_POST['doktorID'];

	$sdoktor_kimlik = $_POST['sdoktor_kimlik'];
	$sdoktor_adi = $_POST['sdoktor_adi'];
	$sdoktor_soyadi = $_POST['sdoktor_soyadi'];
	$sdoktor_kullanici_adi = $_POST['sdoktor_kullanici_adi'];
	$sdoktor_sifre = $_POST['sdoktor_sifre'];
	$sdoktor_il = $_POST['sdoktor_il'];
	$sdoktor_ilce = $_POST['sdoktor_ilce'];
	$sdoktor_adres = $_POST['sdoktor_adres'];
	$sdoktor_telefon = $_POST['sdoktor_telefon'];
	$sdoktor_mail = $_POST['sdoktor_mail'];
	$sdoktor_dogumtarihi = $_POST['sdoktor_dogumtarihi'];
	$sdoktor_kayit_tarihi = $_POST['sdoktor_kayit_tarihi'];
	$sdoktor_son_giris_zamani = $_POST['sdoktor_son_giris_zamani'];
	$skullanici_tipi = $_POST['skullanici_tipi'];
	$sdoktor_avatar = $_POST['sdoktor_avatar'];

	
	$sdoktor_ekle = $db->prepare("INSERT INTO silinen_personeltablosu SET
									sdoktor_kimlik=:sdoktor_kimlik,
									sdoktor_adi=:sdoktor_adi,
									sdoktor_soyadi=:sdoktor_soyadi,
                                    sdoktor_kullanici_adi=:sdoktor_kullanici_adi,
                                    sdoktor_sifre=:sdoktor_sifre,
									sdoktor_il=:sdoktor_il,
									sdoktor_ilce=:sdoktor_ilce,
									sdoktor_adres=:sdoktor_adres,
									sdoktor_telefon=:sdoktor_telefon,
									sdoktor_mail=:sdoktor_mail,
									sdoktor_dogumtarihi=:sdoktor_dogumtarihi,
									sdoktor_kayit_tarihi=:sdoktor_kayit_tarihi,
                                    sdoktor_son_giris_zamani=:sdoktor_son_giris_zamani,
									skullanici_tipi=:skullanici_tipi,
									sdoktor_avatar=:sdoktor_avatar");

	$sdoktor_eklendi = $sdoktor_ekle->execute(array(
		'sdoktor_kimlik' => $sdoktor_kimlik,
		'sdoktor_adi' => $sdoktor_adi,
		'sdoktor_soyadi' => $sdoktor_soyadi,
		'sdoktor_kullanici_adi' => $sdoktor_kullanici_adi,
		'sdoktor_sifre' => $sdoktor_sifre,
		'sdoktor_il' => $sdoktor_il,
		'sdoktor_ilce' => $sdoktor_ilce,
		'sdoktor_adres' => $sdoktor_adres,
		'sdoktor_telefon' => $sdoktor_telefon,
		'sdoktor_mail' => $sdoktor_mail,
		'sdoktor_dogumtarihi' => $sdoktor_dogumtarihi,
		'sdoktor_kayit_tarihi' => $sdoktor_kayit_tarihi,
		'sdoktor_son_giris_zamani' => $sdoktor_son_giris_zamani,
		'skullanici_tipi' => $skullanici_tipi,
		'sdoktor_avatar' => $sdoktor_avatar
	));

	$doktor_sil = $db->prepare("DELETE FROM personeltablosu where doktorID=:doktorID");
	$doktor_silindi = $doktor_sil->execute(array(
		'doktorID' => $doktor_id
	));


	if ($doktor_silindi) {
		Header("Location:../anasayfa?d=silindi");
		exit;
	} else {
		Header("Location:../anasayfa?d=silinemedi");
		exit;
	}
}

if (isset($_POST['dk_doktor_duzenle'])) {

	$doktorID = intval($_POST['doktorID']);
	$doktor_adi = $_POST['doktor_adi'];
	$doktor_soyadi = $_POST['doktor_soyadi'];
	$doktor_kullanici_adi = $_POST['doktor_kullanici_adi'];
	$doktor_sifre = $_POST['doktor_sifre'];
	$doktor_il = $_POST['doktor_il'];
	$doktor_ilce = $_POST['doktor_ilce'];
	$doktor_adres = $_POST['doktor_adres'];
	$doktor_telefon = $_POST['doktor_telefon'];
	$doktor_mail = $_POST['doktor_mail'];
	$doktor_dogumtarihi = $_POST['doktor_dogumtarihi'];
	$kullanici_tipi = $_POST['kullanici_tipi'];


	if (strlen($doktor_adi) != 0) {
		$doktor_guncelle = $db->prepare("UPDATE personeltablosu set

		doktor_adi=:doktor_adi,
		doktor_soyadi=:doktor_soyadi,
		doktor_kullanici_adi=:doktor_kullanici_adi,
        doktor_sifre=:doktor_sifre,
		doktor_il=:doktor_il,
		doktor_ilce=:doktor_ilce,
		doktor_adres=:doktor_adres,
		doktor_telefon=:doktor_telefon,
		doktor_mail=:doktor_mail,
		doktor_dogumtarihi=:doktor_dogumtarihi,
        kullanici_tipi=:kullanici_tipi where doktorID=:doktorID");

		$doktor_guncellendi = $doktor_guncelle->execute(array(

			'doktor_adi' => $doktor_adi,
			'doktor_soyadi' => $doktor_soyadi,
			'doktor_kullanici_adi' => $doktor_kullanici_adi,
			'doktor_sifre' => $doktor_sifre,
			'doktor_il' => $doktor_il,
			'doktor_ilce' => $doktor_ilce,
			'doktor_adres' => $doktor_adres,
			'doktor_telefon' => $doktor_telefon,
			'doktor_mail' => $doktor_mail,
			'doktor_dogumtarihi' => $doktor_dogumtarihi,
			'kullanici_tipi' => $kullanici_tipi,
			'doktorID' => $doktorID

		));

		if ($doktor_guncellendi) {
			Header("Location:../anasayfa?d=duzenlendi");
			exit;
		} else {
			Header("Location:../anasayfa?d=duzenlenemedi");
			exit;
		}
	} else {
		Header("Location:../anasayfa?d=add");
		exit;
	}
}
