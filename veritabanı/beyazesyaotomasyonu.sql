-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 May 2019, 02:04:57
-- Sunucu sürümü: 5.5.24-log
-- PHP Sürümü: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `beyazesyaotomasyonu`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `MUSTERIHAREKETLER`()
    NO SQL
SELECT HAREKETID,URUNAD,tbl_hareketler.ADET,(tbl_personeller.AD + ' ' + tbl_personeller.SOYAD) AS 'PERSONEL' , (tbl_musteriler.AD + ' ' + tbl_musteriler.SOYAD) AS 'ALICI', FIYAT,TOPLAM,FATURAID,TARIH,NOTLAR FROM tbl_hareketler INNER JOIN tbl_urunler ON tbl_hareketler.URUNID=tbl_urunler.ID INNER JOIN tbl_personeller ON tbl_hareketler.PERSONEL=tbl_personeller.ID INNER JOIN tbl_musteriler ON tbl_hareketler.ALICI=tbl_musteriler.ID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `KULLANICIAD` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `SIFRE` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `KULLANICIAD`, `SIFRE`) VALUES
(1, 'ato', '123'),
(15, 'ismail', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_giderler`
--

CREATE TABLE IF NOT EXISTS `tbl_giderler` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AY` varchar(7) COLLATE utf8_turkish_ci NOT NULL,
  `YIL` char(4) COLLATE utf8_turkish_ci NOT NULL,
  `ELEKTRIK` decimal(18,2) NOT NULL,
  `SU` decimal(18,2) NOT NULL,
  `DOGALGAZ` decimal(18,2) NOT NULL,
  `INTERNET` decimal(18,2) NOT NULL,
  `MAASLAR` decimal(18,2) NOT NULL,
  `EKSTRA` decimal(18,2) NOT NULL,
  `NOTLAR` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=14 ;

--
-- Tablo döküm verisi `tbl_giderler`
--

INSERT INTO `tbl_giderler` (`ID`, `AY`, `YIL`, `ELEKTRIK`, `SU`, `DOGALGAZ`, `INTERNET`, `MAASLAR`, `EKSTRA`, `NOTLAR`) VALUES
(1, 'Ocak', '2018', '85.00', '73.00', '80.00', '70.00', '30000.00', '450.00', 'Personellere yeni kiyafetler alindi.'),
(2, 'Subat', '2018', '83.00', '72.00', '145.00', '70.00', '30000.00', '120.00', 'Kombi bakimlari yapildi.'),
(3, 'Mart', '2018', '95.00', '63.20', '223.00', '70.00', '30000.00', '120.00', 'Personel için su sebili satin alindi.'),
(5, 'Nisan', '2018', '91.00', '80.00', '130.00', '70.00', '30000.00', '0.00', 'Yok'),
(6, 'Mayis', '2018', '95.00', '63.20', '110.00', '70.00', '30000.00', '100.00', 'Temizlikçi Tutuldu.'),
(7, 'Haziran', '2018', '80.00', '82.00', '65.00', '70.00', '32000.00', '280.00', 'Klima bakimi yapildi.Maaslara Zam geldi.'),
(8, 'Temmuz', '2018', '64.95', '83.50', '60.00', '70.00', '32000.00', '0.00', 'Yok'),
(9, 'Agustos', '2018', '64.00', '84.00', '50.00', '70.00', '32000.00', '450.00', 'Personeller için yeni kiyafetler alindi.'),
(10, 'Eylül', '2018', '69.00', '86.40', '75.00', '70.00', '32000.00', '0.00', 'Yok'),
(11, 'Ekim', '2018', '69.50', '85.40', '81.50', '70.00', '32000.00', '140.00', 'Kombi bakimlari yapildi.'),
(12, 'Kasim', '2018', '74.50', '87.00', '95.00', '70.00', '32000.00', '0.00', 'Yok'),
(13, 'Aralik', '2018', '78.80', '88.70', '113.20', '70.00', '30000.00', '0.00', 'Yok.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ilceler`
--

CREATE TABLE IF NOT EXISTS `tbl_ilceler` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ILCE` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `tbl_ilceler`
--

INSERT INTO `tbl_ilceler` (`ID`, `ILCE`) VALUES
(1, 'Merkez');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_iller`
--

CREATE TABLE IF NOT EXISTS `tbl_iller` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SEHIR` varchar(13) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=82 ;

--
-- Tablo döküm verisi `tbl_iller`
--

INSERT INTO `tbl_iller` (`ID`, `SEHIR`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyon'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `KATEGORI_ID` int(3) NOT NULL AUTO_INCREMENT,
  `KATEGORIAD` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`KATEGORI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`KATEGORI_ID`, `KATEGORIAD`) VALUES
(1, 'BUZDOLABI'),
(2, 'MIKRODALGA FIRIN'),
(3, 'BULASIK MAKINESI'),
(4, 'DERIN DONDURUCU'),
(5, 'CAMASIR MAKINESI'),
(6, 'KURUTMA MAKINESI'),
(7, 'FIRIN'),
(8, 'SET USTU OCAK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_mesaj`
--

CREATE TABLE IF NOT EXISTS `tbl_mesaj` (
  `msjid` int(5) NOT NULL AUTO_INCREMENT,
  `msjad` varchar(35) COLLATE utf8_turkish_ci NOT NULL,
  `msj` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`msjid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `tbl_mesaj`
--

INSERT INTO `tbl_mesaj` (`msjid`, `msjad`, `msj`) VALUES
(1, 'ismail saÄŸdÄ±Ã§', 'ismail deneme mesaj');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_musteriler`
--

CREATE TABLE IF NOT EXISTS `tbl_musteriler` (
  `ID` smallint(6) NOT NULL AUTO_INCREMENT,
  `AD` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `SOYAD` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `TELEFON` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `TELEFON2` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `TC` char(11) COLLATE utf8_turkish_ci NOT NULL,
  `MAIL` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `IL` varchar(14) COLLATE utf8_turkish_ci NOT NULL,
  `ILCE` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `ADRES` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=17 ;

--
-- Tablo döküm verisi `tbl_musteriler`
--

INSERT INTO `tbl_musteriler` (`ID`, `AD`, `SOYAD`, `TELEFON`, `TELEFON2`, `TC`, `MAIL`, `IL`, `ILCE`, `ADRES`) VALUES
(5, 'Ahmet', 'Gezer', '(564) 564-8789', '(564) 654-2121', '56485132164', 'ahmetgezer@hotmail.com', 'Amasya', 'Merkez', 'Merkez'),
(7, 'Sinan', 'Degirmen', '(123) 412-5123', '(123) 412-3512', '51623551263', 'snndgrmn@hotmail.com', 'Çorum', 'Merkez', 'Deneme'),
(9, 'Zafer', 'Bayrak', '(151) 235-1234', '(156) 484-4878', '79412318978', 'zafer@hotmail.com', 'Istanbul', 'Gaziosmanpasa', 'GOPLU'),
(12, 'Ismail', 'Mankal', '(564) 954-9700', '(159) 456-1514', '35123412341', 'iso@hotmail.com', 'Samsun', 'Merkez', ''),
(13, 'Medbaha', 'Bosudbsunsdni', '(514) 567-4894', '(564) 564-6548', '54895123189', 'tunuslu@hotmail.com', 'Hakkari', 'Merkez', 'Tunusian Mahallesi.'),
(15, 'Resul ', 'Tuna', '(567) 897-8452', '(465) 456-4651', '54867333549', 'tunaresul@gmail.com', 'Ankara', 'Merkez', ''),
(16, 'Habib', 'Habib', '(549) 871-3248', '(645) 646-5123', '51564897879', 'habib@hotmail.com', 'Sinop', 'Merkez', 'Cibuti kardesim ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_notlar`
--

CREATE TABLE IF NOT EXISTS `tbl_notlar` (
  `NOTID` int(11) NOT NULL AUTO_INCREMENT,
  `NOTTARIH` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `NOTSAAT` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `NOTBASLIK` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `NOTDETAY` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `NOTOLUSTURAN` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `NOTHITAP` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`NOTID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `tbl_notlar`
--

INSERT INTO `tbl_notlar` (`NOTID`, `NOTTARIH`, `NOTSAAT`, `NOTBASLIK`, `NOTDETAY`, `NOTOLUSTURAN`, `NOTHITAP`) VALUES
(1, '04.05.2018', '16:00', 'Toplantı', 'Bugün 3.katta toplantı olacaktır.Herkesin katılması zorunludur.İşten erken çıkılacaktır.', 'Atalay Kurt', 'Herkes'),
(2, '14:00', '14:00', 'Telefon Görüsmesi', 'Bugün saat 15''te x firmasi ile görüsme yapilacaktir.Ödemeler gecikti.', 'Ismail Sagdiç', 'Beko firmasi'),
(3, '09.05.2018', '13:00', 'Temizlik Sirketi Görüsmesi', 'Saat 13:00 de temizlik sirketi yeni temizlik malzemeleri getirecek ve haftada kaç gün temizlik olmasi...', 'Atalay Kurt', 'Müdür');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_personeller`
--

CREATE TABLE IF NOT EXISTS `tbl_personeller` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `AD` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `SOYAD` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `TELEFON` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `TC` char(11) COLLATE utf8_turkish_ci NOT NULL,
  `MAIL` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `IL` varchar(14) COLLATE utf8_turkish_ci NOT NULL,
  `ILCE` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `ADRES` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `GOREV` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `tbl_personeller`
--

INSERT INTO `tbl_personeller` (`ID`, `AD`, `SOYAD`, `TELEFON`, `TC`, `MAIL`, `IL`, `ILCE`, `ADRES`, `GOREV`) VALUES
(1, 'Sinan', 'Degirmen', '(531) 453-9861', '12345678902', 'snndgrmn@hotmail.com', 'Çorum', 'Merkez', 'Deneme', 'Muhasebe'),
(2, 'Mert Ramazan', 'Altin', '(545) 512-3214', '21345687912', 'mertramazn@hotmail.com', 'Sinop', 'Merkez', 'Ne bileyim', 'Satis Elemani'),
(3, 'Hasan Atalay', 'Kurt', '(545) 518-5731', '66742120154', 'atolaykurt@hotmail.com', 'Sinop', 'Merkez', 'Gelincik Mahallesi Açelya Sokak No:1 Daire:1', 'Müdür'),
(5, 'Ismail', 'Sagdiç', '(548) 979-8456', '65489721349', 'ismail@hotmail.com', 'Kocaeli', 'Merkez', 'Kardes Kocaeli diyoz ya.', 'Müdür');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_siparis`
--

CREATE TABLE IF NOT EXISTS `tbl_siparis` (
  `SPID` int(11) NOT NULL AUTO_INCREMENT,
  `SPAD` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SPSOYAD` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SPTEL` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SPTC` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SPMAIL` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SPURUN` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SPADRES` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`SPID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_stoklar`
--

CREATE TABLE IF NOT EXISTS `tbl_stoklar` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `STOKTUR` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `STOKADET` smallint(6) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_urunler`
--

CREATE TABLE IF NOT EXISTS `tbl_urunler` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `URUNAD` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `KATEGORI` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `MARKA` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `MODEL` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `YIL` char(4) COLLATE utf8_turkish_ci NOT NULL,
  `ADET` smallint(6) NOT NULL,
  `ALISFIYAT` decimal(18,2) NOT NULL,
  `SATISFIYAT` decimal(18,2) NOT NULL,
  `DETAY` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `FOTO` blob NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `KATEGORI` (`KATEGORI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=115 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
