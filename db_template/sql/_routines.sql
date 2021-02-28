
DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `delete_dt_layanan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_dt_layanan` (IN `id_layanan` INT, IN `id_user` INT, IN `status_aktif` INT)  BEGIN
UPDATE dt_layanan SET
dt_layanan.id_stat = 4,
dt_layanan.stat = status_aktif,
dt_layanan.sysdeleteuser = id_user,
dt_layanan.sysdeletedate = NOW()
WHERE dt_layanan.id = id_layanan;
END$$

DROP PROCEDURE IF EXISTS `insert_ceramah_kegiatan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_ceramah_kegiatan` (IN `layanan_id` INT, IN `penceramah` VARCHAR(50))  BEGIN
INSERT INTO `dt_penceramah`(
`id_layanan`,
`narsum`
)
VALUES (
layanan_id,
penceramah
);
END$$

DROP PROCEDURE IF EXISTS `insert_ceramah_keluar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_ceramah_keluar` (IN `layanan_id` INT, IN `narasumber` VARCHAR(50), IN `tempat_lahir` VARCHAR(50), IN `tanggal_lahir` DATE, IN `jenis_kelamin` TINYINT, IN `nomer_paspor` VARCHAR(50), IN `provinsi` INT, IN `kabupaten` INT, IN `kecamatan` INT, IN `kelurahan` CHAR(10), IN `alamat_penceramah` TEXT, IN `cv_penceramah` VARCHAR(100), IN `fotocopy_paspor` VARCHAR(100), IN `foto_penceramah` VARCHAR(100))  BEGIN
INSERT INTO `dt_penceramah`(
`id_layanan`,
`narsum`,
`tmp_lhr`,
`tgl_lhr`,
`jns_kelamin`,
`no_paspor`,
`id_provinsi`,
`id_kabupaten`,
`id_kecamatan`,
`id_kelurahan`,
`almt_penceramah`,
`cv`,
`fc_passport`,
`pas_foto`
)VALUES(
layanan_id,
narasumber,
tempat_lahir,
tanggal_lahir,
jenis_kelamin,
nomer_paspor,
provinsi,
kabupaten,
kecamatan,
kelurahan,
alamat_penceramah,
cv_penceramah,
fotocopy_paspor,
foto_penceramah
);
END$$

DROP PROCEDURE IF EXISTS `insert_dai_keluar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_dai_keluar` (IN `layanan_id` INT, IN `nama_kegiatan` VARCHAR(50), IN `jumlah_peserta` INT, IN `lembaga` VARCHAR(50), IN `tmt_awal` DATE, IN `tmt_akhir` DATE, IN `alamat_kegiatan` TEXT, IN `negara_tujuan` INT)  BEGIN
INSERT INTO `db_adminskelethon`.`dt_kegiatan`(
`id_layanan`, 
`nm_keg`, 
`esti_keg`, 
`lemb_keg`,
`tgl_awal_keg`,
`tgl_akhir_keg`, 
`alamat_keg`, 
`code_negara`
)
VALUES (
layanan_id,
nama_kegiatan,
jumlah_peserta,
lembaga,
tmt_awal,
tmt_akhir,
alamat_kegiatan,
negara_tujuan
);
END$$

DROP PROCEDURE IF EXISTS `insert_dokmohon_keg`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_dokmohon_keg` (IN `layanan_id` INT, IN `ktp_kegiatan` VARCHAR(100), IN `proposal_kegiatan` VARCHAR(100), IN `sp_keg` VARCHAR(100))  BEGIN
INSERT INTO `dt_layanan_dokumen`(
`id_layanan`,
`ktp_keg`,
`proposal_keg`,
`surat_permohonan_keg`
)
VALUES (
layanan_id,
ktp_kegiatan,
proposal_kegiatan,
sp_keg
);
END$$

DROP PROCEDURE IF EXISTS `insert_dokmohon_keluar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_dokmohon_keluar` (IN `layanan_id` INT, IN `sp_keg` VARCHAR(100), IN `proposal` VARCHAR(100))  BEGIN
INSERT INTO `dt_layanan_dokumen`(
`id_layanan`,
`surat_permohonan_luar`,
`proposal_luar`
)VALUES(
layanan_id,
sp_keg,
proposal
);
END$$

DROP PROCEDURE IF EXISTS `Insert_dokmohon_lkspwu`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_dokmohon_lkspwu` (IN `layanan_id` INT, IN `sp_1` VARCHAR(100), IN `anggaran_dasar` VARCHAR(100), IN `sk_hukum` VARCHAR(100), IN `skdutxt` VARCHAR(100), IN `lapkeu` VARCHAR(100))  NO SQL
BEGIN INSERT INTO `dt_layanan_dokumen`(
  `dt_layanan_dokumen`.`id_layanan`, 
  `dt_layanan_dokumen`.`srt_prmhn_kementri_lkspwu`, 
  `dt_layanan_dokumen`.`agrn_dsr_lkspwu`, 
  `dt_layanan_dokumen`.`sk_hkm_lkspwu`, 
  `dt_layanan_dokumen`.`skdu`, `dt_layanan_dokumen`.`lapkeu_lkspwu`
) 
VALUES 
  (
    layanan_id, sp_1, anggaran_dasar, 
    sk_hukum, skdutxt, lapkeu
  );
END$$

DROP PROCEDURE IF EXISTS `insert_dt_kegiatan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_dt_kegiatan` (IN `layanan_id` INT, IN `nama_kegiatan` VARCHAR(50), IN `jumlah_peserta` INT, IN `lembaga` VARCHAR(50), IN `tmt_awal` DATE, IN `tmt_akhir` DATE, IN `alamat_kegiatan` TEXT)  BEGIN
INSERT INTO `db_adminskelethon`.`dt_kegiatan`(
`id_layanan`, 
`nm_keg`, 
`esti_keg`, 
`lemb_keg`,
`tgl_awal_keg`,
`tgl_akhir_keg`, 
`alamat_keg`, 
`code_negara`
)
VALUES (
layanan_id,
nama_kegiatan,
jumlah_peserta,
lembaga,
tmt_awal,
tmt_akhir,
alamat_kegiatan,
101
);
END$$

DROP PROCEDURE IF EXISTS `insert_dt_layanan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_dt_layanan` (IN `user_id` INT, IN `provinsi` INT, IN `kabupaten` INT, IN `kecamatan` INT, IN `kelurahan` CHAR(10), IN `keterangan_kegiatan` TEXT, IN `mt_layanan` INT, OUT `id_layanan` INT)  BEGIN
INSERT INTO `db_adminskelethon`.`dt_layanan`(
`id_user`,
`id_stat`,
`id_provinsi`,
`id_kabupaten`,
`id_kecamatan`,
`id_kelurahan`,
`keterangan`,
`jenis_layanan`,
`alasan_tolak`,
`stat`,
`syscreateuser`,
`syscreatedate`
) 
VALUES (
user_id,
1,
provinsi,
kabupaten,
kecamatan,
kelurahan,
keterangan_kegiatan,
mt_layanan,
NULL,
1,
user_id,
NOW()
);
SET id_layanan = LAST_INSERT_ID();
SELECT id_layanan AS layanan_id;
END$$

DROP PROCEDURE IF EXISTS `Insert_instansi`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_instansi` (IN `layanan_id` INT, IN `nama_instansi` VARCHAR(150), IN `provinsi` INT, IN `kabupaten` INT, IN `kecamatan` INT, IN `kelurahan` CHAR(10), IN `alamat_instansi` TEXT, IN `telepon` VARCHAR(20), IN `mail` VARCHAR(50), IN `sk_keu` INT, IN `titiapn` INT, IN `user_input` INT)  BEGIN
INSERT INTO `dt_instansi`(
  `dt_instansi`.`id_layanan`, `dt_instansi`.`nm_instansi`, 
  `dt_instansi`.`id_provinsi`, `dt_instansi`.`id_kabupaten`, 
  `dt_instansi`.`id_kecamatan`, `dt_instansi`.`id_kelurahan`, 
  `dt_instansi`.`almt_instansi`, 
  `dt_instansi`.`telp_instansi`, 
  `dt_instansi`.`email_instansi`, 
  `dt_instansi`.`sk_keu_syariah`, 
  `dt_instansi`.`fungsi_titipan`, 
  `dt_instansi`.`syscreateuser`, 
  `dt_instansi`.`syscreatedate`
) 
VALUES 
  (
    layanan_id, nama_instansi, provinsi, 
    kabupaten, kecamatan, kelurahan, 
    alamat_instansi, telepon, mail, sk_keu, 
    titiapn, user_input, NOW()
  );
END$$

DROP PROCEDURE IF EXISTS `insert_user`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_user` (IN `no_ktp` BIGINT, IN `tanggal_lahir` DATE, IN `uname` VARCHAR(25), IN `nama_lengkap` VARCHAR(64), IN `mail_user` VARCHAR(100), IN `telepon` VARCHAR(20), OUT `user_id` INT)  BEGIN
INSERT INTO `sys_users`(
`role_id`,
`nik`,
`tgl_lhr`,
`username`,
`fullname`,
`password`,
`email`,
`telp`,
`banned`,
`last_ip`,
`last_login`,
`created`,
`modified`,
`created_by`,
`modified_by`
)
VALUES (
6,
no_ktp,
tanggal_lahir,
uname,
nama_lengkap,
"$1$TQTorTZU$y.D3OouqxhM8pPKQE0w51/",
mail_user,
telepon,
0,
"127.0.0.1",
NOW(),
NOW(),
CURRENT_TIME(),
"sysadmin",
"sysadmin"
);
SET user_id = LAST_INSERT_ID();
SELECT user_id AS id_user;
END$$

DROP PROCEDURE IF EXISTS `update_ceramah_kegiatan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_ceramah_kegiatan` (IN `id_penceramah` INT, IN `layanan_id` INT, IN `penceramah` VARCHAR(50))  BEGIN
UPDATE `dt_penceramah` SET
`narsum` = penceramah
WHERE `id_layanan` = layanan_id AND `id` = id_penceramah;
END$$

DROP PROCEDURE IF EXISTS `update_cv_penceramah`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cv_penceramah` (IN `layanan_id` INT, IN `penceramah_id` INT, IN `nama_cv` VARCHAR(100), OUT `old_cv` VARCHAR(100))  BEGIN
SELECT `dt_penceramah`.`cv` AS cv_penceramah
INTO old_cv
FROM `dt_penceramah` 
WHERE `dt_penceramah`.`id_layanan`=layanan_id AND `dt_penceramah`.`id`=penceramah_id;

UPDATE `dt_penceramah` 
SET `dt_penceramah`.`cv`=nama_cv 
WHERE `dt_penceramah`.`id_layanan`=layanan_id AND `dt_penceramah`.`id`=penceramah_id;
SELECT old_cv;
END$$

DROP PROCEDURE IF EXISTS `update_dt_kegiatan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_dt_kegiatan` (IN `layanan_id` INT, IN `nama_kegiatan` VARCHAR(50), IN `jumlah_peserta` INT, IN `lembaga` VARCHAR(50), IN `tmt_awal` DATE, IN `tmt_akhir` DATE, IN `alamat_kegiatan` TEXT)  BEGIN
UPDATE `dt_kegiatan` SET
`nm_keg` = nama_kegiatan,
`esti_keg` = jumlah_peserta,
`lemb_keg` = lembaga,
`tgl_awal_keg` = tmt_awal,
`tgl_akhir_keg` = tmt_akhir,
`alamat_keg` = alamat_kegiatan
WHERE `id_layanan` = layanan_id;
END$$

DROP PROCEDURE IF EXISTS `update_dt_layanan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_dt_layanan` (IN `id_layanan` INT, IN `provinsi` INT, IN `kabupaten` INT, IN `kecamatan` INT, IN `kelurahan` CHAR(10), IN `keterangan_kegiatan` TEXT, IN `user_update` INT)  BEGIN
UPDATE `dt_layanan` SET `id_provinsi` = provinsi,
`id_kabupaten` = kabupaten,
`id_kecamatan` = kecamatan,
`id_kelurahan` = kelurahan,
`keterangan` = keterangan_kegiatan,
`sysupdateuser` = user_update,
`sysupdatedate` = NOW()
WHERE `id` = id_layanan;
END$$

DROP PROCEDURE IF EXISTS `update_foto_penceramah`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_foto_penceramah` (IN `layanan_id` INT, IN `penceramah_id` INT, IN `nama_foto` VARCHAR(100), OUT `old_foto` VARCHAR(100))  BEGIN
SELECT `dt_penceramah`.`pas_foto` AS foto_penceramah
INTO old_foto
FROM `dt_penceramah` 
WHERE `dt_penceramah`.`id_layanan`=layanan_id AND `dt_penceramah`.`id`=penceramah_id;

UPDATE `dt_penceramah` 
SET `dt_penceramah`.`pas_foto`=nama_foto 
WHERE `dt_penceramah`.`id_layanan`=layanan_id AND `dt_penceramah`.`id`=penceramah_id;
SELECT old_foto;
END$$

DROP PROCEDURE IF EXISTS `update_instansi_lkspwu`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_instansi_lkspwu` (IN `nama_instansi` VARCHAR(225), IN `provinsi` INT, IN `kabupaten` INT, IN `kecamatan` INT, IN `kelurahan` CHAR(10), IN `alamat` TEXT, IN `telepon` VARCHAR(20), IN `mail` VARCHAR(50), IN `sk` INT, IN `titipan` INT, IN `user_login` INT, IN `layanan_id` INT, IN `id_instansi` INT)  BEGIN

DECLARE track_no INT DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, NOT FOUND, SQLWARNING
    
    BEGIN
    
        ROLLBACK;
        GET DIAGNOSTICS CONDITION 1 @`errno` = MYSQL_ERRNO, @`sqlstate` = RETURNED_SQLSTATE, @`text` = MESSAGE_TEXT;
        SET @full_error = CONCAT('ERROR ', @`errno`, ' (', @`sqlstate`, '): ', @`text`);
        SELECT track_no, @full_error AS pesan_eror;
    
    END;

START TRANSACTION;

UPDATE dt_instansi SET
	dt_instansi.nm_instansi = nama_instansi, 
	dt_instansi.id_provinsi = provinsi, 
	dt_instansi.id_kabupaten = kabupaten, 
	dt_instansi.id_kecamatan = kecamatan, 
	dt_instansi.id_kelurahan = kelurahan, 
	dt_instansi.almt_instansi = alamat, 
	dt_instansi.telp_instansi = telepon, 
	dt_instansi.email_instansi = mail, 
	dt_instansi.sk_keu_syariah = sk, 
	dt_instansi.fungsi_titipan = titipan, 
	dt_instansi.sysupdateuser = user_login, 
	dt_instansi.sysupdatedate = NOW()
WHERE dt_instansi.id_layanan = layanan_id AND
	dt_instansi.id = id_instansi;

SET 
 track_no = 3;
SELECT track_no;
COMMIT;
END$$

DROP PROCEDURE IF EXISTS `update_narsum`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_narsum` (IN `id_penceramah` INT, IN `layanan_id` INT, IN `nama` VARCHAR(50), IN `tempat_lahir` VARCHAR(20), IN `tanggal_lahir` DATE, IN `kelamin` TINYINT, IN `nomer_paspor` VARCHAR(50), IN `id_prov` INT, IN `id_kab` INT, IN `id_kec` INT, IN `id_kel` CHAR(10), IN `alamat_penceramah` TEXT)  BEGIN
UPDATE `dt_penceramah`
SET `dt_penceramah`.`narsum`=nama,
`dt_penceramah`.`tmp_lhr`=tempat_lahir,
`dt_penceramah`.`tgl_lhr`=tanggal_lahir,
`dt_penceramah`.`jns_kelamin`=kelamin,
`dt_penceramah`.`no_paspor`=nomer_paspor,
`dt_penceramah`.`id_provinsi`=id_prov,
`dt_penceramah`.`id_kabupaten`=id_kab,
`dt_penceramah`.`id_kecamatan`=id_kec,
`dt_penceramah`.`id_kelurahan`=id_kel,
`dt_penceramah`.`almt_penceramah`=alamat_penceramah
WHERE `dt_penceramah`.`id`=id_penceramah AND `dt_penceramah`.`id_layanan`=layanan_id;
END$$

DROP PROCEDURE IF EXISTS `update_paspor_penceramah`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_paspor_penceramah` (IN `layanan_id` INT, IN `penceramah_id` INT, IN `nama_paspor` VARCHAR(100), OUT `old_paspor` VARCHAR(100))  BEGIN
SELECT `dt_penceramah`.`fc_passport` AS paspor_penceramah
INTO old_paspor
FROM `dt_penceramah` 
WHERE `dt_penceramah`.`id_layanan`=layanan_id AND `dt_penceramah`.`id`=penceramah_id;

UPDATE `dt_penceramah` 
SET `dt_penceramah`.`fc_passport`=nama_paspor 
WHERE `dt_penceramah`.`id_layanan`=layanan_id AND `dt_penceramah`.`id`=penceramah_id;
SELECT old_paspor;
END$$

DROP PROCEDURE IF EXISTS `update_proses_layanan`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_proses_layanan` (IN `id_layanan` INT, IN `user_id` INT, IN `status_id` INT)  BEGIN
UPDATE `dt_layanan` SET
`id_stat` = status_id,
`sysupdateuser` = user_id, 
`sysupdatedate` = NOW()
WHERE `id` = id_layanan;
END$$

DROP PROCEDURE IF EXISTS `update_user`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user` (IN `id_user` INT, IN `no_ktp` BIGINT, IN `tanggal_lahir` DATE, IN `nama_lengkap` VARCHAR(64), IN `mail_user` VARCHAR(100), IN `telepon` VARCHAR(20))  BEGIN
UPDATE `sys_users` SET `nik` = no_ktp, 
`tgl_lhr` = tanggal_lahir, 
`fullname` = nama_lengkap, 
`email` = mail_user, 
`telp` = telepon,
`modified` = CURRENT_TIME(),
`modified_by` = "sysadmin"
WHERE `id` = id_user;
END$$

DROP PROCEDURE IF EXISTS `update_user_lkspwu`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_lkspwu` (IN `ktp` INT, IN `lahir_pemohon` DATE, IN `mali` VARCHAR(100), IN `telpon` VARCHAR(20), IN `nama` VARCHAR(64), IN `user_login` INT, IN `id_sys_user` INT)  BEGIN 

DECLARE track_no INT DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, NOT FOUND, SQLWARNING
    
    BEGIN
    
        ROLLBACK;
        GET DIAGNOSTICS CONDITION 1 @`errno` = MYSQL_ERRNO, @`sqlstate` = RETURNED_SQLSTATE, @`text` = MESSAGE_TEXT;
        SET @full_error = CONCAT('ERROR ', @`errno`, ' (', @`sqlstate`, '): ', @`text`);
        SELECT track_no, @full_error AS pesan_eror;
    
    END;

START TRANSACTION;
UPDATE 
  sys_users 
SET 
  sys_users.nik = ktp, 
  sys_users.tgl_lhr = lahir_pemohon, 
  sys_users.fullname = nama, 
  sys_users.email = mali, 
  sys_users.telp = telpon, 
  sys_users.modified = NOW(), 
  sys_users.modified_by = user_login
	WHERE sys_users.id =id_sys_user;
SET 
 track_no = 3;
SELECT track_no;
COMMIT;
END$$

DROP PROCEDURE IF EXISTS `verif_IKK`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verif_IKK` (IN `id_layanan` INT, IN `id_stat` INT, IN `alasan_tolak` TEXT, IN `sysupdateuser` INT, IN `sysupdatedate` DATETIME)  BEGIN
	UPDATE `dt_layanan` 
	SET `dt_layanan`.`id_stat` = id_stat,
	`dt_layanan`.`alasan_tolak` = alasan_tolak,
	`dt_layanan`.`sysupdateuser` = sysupdateuser,
	`dt_layanan`.`sysupdatedate` = sysupdatedate 
	WHERE
		`dt_layanan`.`id` = id_layanan;
END$$

DELIMITER ;
