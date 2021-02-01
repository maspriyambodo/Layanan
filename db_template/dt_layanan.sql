/*
 Navicat Premium Data Transfer

 Source Server         : localbodo
 Source Server Type    : MySQL
 Source Server Version : 80022
 Source Host           : localhost:3306
 Source Schema         : db_kemenaglayanan

 Target Server Type    : MySQL
 Target Server Version : 80022
 File Encoding         : 65001

 Date: 01/02/2021 18:35:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dt_layanan
-- ----------------------------
DROP TABLE IF EXISTS `dt_layanan`;
CREATE TABLE `dt_layanan`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `id_user` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan table user',
  `id_stat` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan table status_layanan',
  `id_provinsi` int(0) NULL DEFAULT NULL COMMENT 'provinsi',
  `id_kabupaten` int(0) NULL DEFAULT NULL COMMENT 'kabupaten',
  `id_kecamatan` int(0) NULL DEFAULT NULL COMMENT 'kecamatan',
  `id_kelurahan` int(0) NULL DEFAULT NULL,
  `alamat_keg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `nm_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'nama kegiatan',
  `lok_keg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'lokasi',
  `esti_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'estimasi peserta',
  `crmh_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'nama penceramah',
  `lemb_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'lembaga',
  `tgl_awal_keg` date NULL DEFAULT NULL,
  `tgl_akhir_keg` date NULL DEFAULT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `jenis_layanan` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan id table daftar layanan',
  `stat` int(0) NULL DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete\r\n',
  `syscreateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dt_layanan
-- ----------------------------
INSERT INTO `dt_layanan` VALUES (1, 4, 1, 11, 1101, 110101, 1101012001, 'Aceh, Aceh Selatan, Bakongan, Keude Bakongan.', 'aslcm', 'asklcm', '32', 'apsbci', 'acbpbp', '2021-02-01', '2021-02-01', NULL, 1, 1, 4, '2021-01-29 02:38:35', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for dt_layanan_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dt_layanan_dokumen`;
CREATE TABLE `dt_layanan_dokumen`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `id_user` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan form_layanan',
  `id_layanan` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan id table form layanan',
  `nama_file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dt_layanan_dokumen
-- ----------------------------
INSERT INTO `dt_layanan_dokumen` VALUES (1, 4, 1, '');
INSERT INTO `dt_layanan_dokumen` VALUES (2, 4, 1, '');

-- ----------------------------
-- Table structure for mt_direktorat
-- ----------------------------
DROP TABLE IF EXISTS `mt_direktorat`;
CREATE TABLE `mt_direktorat`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `stat` int(0) NULL DEFAULT NULL,
  `syscreateuser` int(0) NULL DEFAULT NULL,
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(0) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(0) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_direktorat
-- ----------------------------
INSERT INTO `mt_direktorat` VALUES (1, 'Sekretariat', '- bagian perencanaan\r\n\r\n- bagian keluarga dan pendapatan negara bukan pajak\r\n\r\n- bagian organisasi, kepegawaian, dan hukum\r\n\r\n- bagian data, sistem informasi, dan hubungan masyarakat\r\n\r\n- bagian umum,  barang milik negara.', 1, 1, '2021-01-26 13:43:48', 1, '2021-01-27 13:33:20', 1, '2021-01-27 13:43:37');
INSERT INTO `mt_direktorat` VALUES (2, 'URAIS & BINSYAR', '- Hisab Rukyat\r\n\r\n- Kemasjidan\r\n\r\n- Bina Paham Keagamaan Islam dan penanganan konflik\r\n\r\n- kepustakaan islam', 1, 1, '2021-01-26 13:52:43', 1, '2021-01-27 13:34:26', NULL, NULL);
INSERT INTO `mt_direktorat` VALUES (3, 'PENAIS', '- Penyuluh Agama Islam\r\n\r\n- Dakwah dan HBI\r\n\r\n- Lembaga Tilawah dan Musabaqah Al\'Quran\r\n\r\n- Kemitraan Umat Islam\r\n\r\n- Seni, Budaya, dan Siaran Keagamaan', 1, 1, '2021-01-26 13:54:39', 1, '2021-01-27 13:34:43', NULL, NULL);
INSERT INTO `mt_direktorat` VALUES (4, 'Zakat & Wakaf', '- Kelembagaan dan informasi zakat dan wakaf\r\n\r\n- Edukasi, Inovasi, dan kerjasama zakat dan wakaf\r\n\r\n- Akreditasi dan Audit lembaga Zakat\r\n\r\n- Pengamanan Aset Wakaf', 1, 1, '2021-01-26 13:57:16', 1, '2021-01-27 13:35:20', NULL, NULL);
INSERT INTO `mt_direktorat` VALUES (5, 'Bina KUA & Keluarga Sakinah', '- Bina Kepenghuluan\r\n- Bina Kelembagaan KUA\r\n- Mutu, Sarana Prasarana, dan Sistem Informasi KUA\r\n- Bina Keluarga Sakinah', 1, 1, '2021-01-26 13:59:16', NULL, NULL, NULL, NULL);
INSERT INTO `mt_direktorat` VALUES (6, 'Subdit BI', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, 0, '2021-02-01 15:48:50', NULL, NULL, NULL, '2021-02-01 16:48:32');
INSERT INTO `mt_direktorat` VALUES (7, NULL, NULL, 3, 0, '2021-02-01 16:44:36', NULL, NULL, NULL, '2021-02-01 16:45:17');

-- ----------------------------
-- Table structure for mt_layanan
-- ----------------------------
DROP TABLE IF EXISTS `mt_layanan`;
CREATE TABLE `mt_layanan`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `jenis_layanan` int(0) NULL DEFAULT NULL COMMENT 'Relasi dengan id master direktorat',
  `stat` int(0) NULL DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete',
  `syscreateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_layanan
-- ----------------------------
INSERT INTO `mt_layanan` VALUES (1, 'Izin Kegiatan Keagamaan', NULL, 2, 1, 1, '2021-01-26 14:14:55', 1, '2021-01-26 17:04:10', 0, '2021-02-01 17:32:24');
INSERT INTO `mt_layanan` VALUES (2, 'Izin Pengiriman Da\'i ke Luar Negeri', NULL, 2, 1, 1, '2021-01-26 14:15:17', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (3, 'Izin Pengiriman Da\'i dari Luar Negeri', NULL, 2, 1, 1, '2021-01-26 14:15:36', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (4, 'Izin Pendirian LAZ Berskala Provinsi', NULL, 4, 1, 1, '2021-01-26 14:16:43', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (5, 'Izin Pendirian LAZ Berskala Nasional', NULL, 4, 1, 1, '2021-01-26 14:17:00', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (6, ' Izin Penunjukkan LKSPWU', NULL, 4, 1, 1, '2021-01-26 14:17:52', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (7, 'Bantuan Arah Kiblat', NULL, 2, 1, 1, '2021-01-26 14:18:11', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (8, 'Bantuan Masjid / Musholla', NULL, 2, 1, 1, '2021-01-26 14:18:29', 1, '2021-01-26 17:07:08', NULL, NULL);
INSERT INTO `mt_layanan` VALUES (9, 'Legalisasi Surat Keterangan Belum Nikah', NULL, 5, 1, 1, '2021-01-26 14:19:08', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (10, 'Legalisasi Surat Buku Nikah/Akta Nikah', NULL, 5, 1, 1, '2021-01-26 14:19:28', NULL, NULL, NULL, NULL);
INSERT INTO `mt_layanan` VALUES (11, 'Legalisasi Surat Keterangan Nikah Luar Negeri', NULL, 5, 1, 1, '2021-01-26 14:20:57', NULL, NULL, 1, '2021-01-26 15:04:10');

-- ----------------------------
-- Table structure for mt_status_layanan
-- ----------------------------
DROP TABLE IF EXISTS `mt_status_layanan`;
CREATE TABLE `mt_status_layanan`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `nama_stat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '1. diterima\r\n2. di proses\r\n3. verifikasi\r\n4. ditolak\r\n5. diterima',
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `stat` int(0) NULL DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete',
  `syscreateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_status_layanan
-- ----------------------------
INSERT INTO `mt_status_layanan` VALUES (1, 'di terima', 'status diterima adalah status saat user, baru melakukan pendaftaran permohonan baru.', 1, 1, '2021-01-27 15:22:31', 1, '2021-01-27 15:27:30', 1, '2021-01-27 15:36:56');

-- ----------------------------
-- Table structure for sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu`  (
  `id` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_parent` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_no` int(0) NOT NULL DEFAULT 0,
  `url_link` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `access_pref` int(0) NOT NULL DEFAULT 100000 COMMENT 'View|Add|Edit|Delete|Approve|Publish',
  `group_menu` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'app',
  `group_order` int(0) NOT NULL DEFAULT 0,
  `icon_class` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon_text` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_level` int(0) NOT NULL DEFAULT 0,
  `is_actived` int(0) NOT NULL DEFAULT 1,
  `created_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_on` datetime(0) NOT NULL,
  `modified_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `modified_on` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES ('00000000', NULL, 'DASHBOARD', 'Dashboard', 0, '{{base_url}}/dashboard', 100000, 'app', 0, 'list-icon material-icons', 'devices_other', 0, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('1010', NULL, 'Izin_Kegiatan_Keagamaan', 'Data Layanan', 0, 'javascript:void(0);', 100000, 'system', 98, 'list-icon material-icons', 'widgets', 0, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('101011', '1010', 'Layanan_1', 'Izin Kegiatan Keagamaan', 0, '{{base_url}}/account/usermanagement', 111100, 'system', 99, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('90000000', NULL, 'SYSTEM', 'Settings', 99, 'javascript:void(0);', 100000, 'system', 99, 'list-icon material-icons', 'extension', 0, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('90010000', '90000000', 'USER_MANAGEMENT', 'User Management', 0, '{{base_url}}/account/usermanagement', 111100, 'system', 99, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('90020000', '90000000', 'USER_GROUP', 'User Group', 1, '{{base_url}}/account/usergroup', 111100, 'system', 99, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('90030000', '90000000', 'PARAMETER', 'System Parameters', 100, '{{base_url}}/administration/parameter', 111100, 'system', 99, '', '', 0, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98000000', NULL, 'DATA_MASTER', 'Data Master', 0, 'javascript:void(0);', 100000, 'system', 98, 'list-icon material-icons', 'widgets', 0, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98010000', '98000000', 'SETTING_PROV', 'Data Provinsi', 9996, '{{base_url}}/datamaster/address/provinsi', 111100, 'system', 98, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98020000', '98000000', 'SETTING_KAB', 'Data Kabupaten/Kota', 9997, '{{base_url}}/datamaster/address/kabupaten', 111100, 'system', 98, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98030000', '98000000', 'SETTING_KEC', 'Data Kecamatan', 9998, '{{base_url}}/datamaster/address/kecamatan', 111100, 'system', 98, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98040000', '98000000', 'SETTING_KEL', 'Data Kelurahan/Desa', 9999, '{{base_url}}/datamaster/address/kelurahan', 111100, 'system', 98, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98050000', '98000000', 'SETTING_DIREKTORAT', 'Data Direktorat', 9990, '{{base_url}}/datamaster/Direktorat/index/', 111100, 'system', 98, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98060000', '98000000', 'MASTER_LAYANAN', 'Data Layanan', 9990, '{{base_url}}/datamaster/Layanan/index/', 111100, 'system', 98, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('98070000', '98000000', 'MASTER_STATUS_LAYANAN', 'Status Layanan', 9990, '{{base_url}}/datamaster/Status/index/', 111100, 'system', 98, '', '', 1, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');
INSERT INTO `sys_menu` VALUES ('99000000', NULL, 'REPORT', 'Laporan', 99, 'javascript:void(0);', 100000, 'app', 97, 'list-icon material-icons', 'chrome_reader_mode', 0, 1, 'system', '2020-03-10 01:02:03', 'system', '2020-03-10 01:02:03');

-- ----------------------------
-- Table structure for sys_permissions
-- ----------------------------
DROP TABLE IF EXISTS `sys_permissions`;
CREATE TABLE `sys_permissions`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `role_id` int(0) NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `id_menu` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_view` int(0) NOT NULL DEFAULT 0,
  `is_add` int(0) NOT NULL DEFAULT 0,
  `is_edit` int(0) NOT NULL DEFAULT 0,
  `is_delete` int(0) NOT NULL DEFAULT 0,
  `is_publish` int(0) NOT NULL DEFAULT 0,
  `is_approve` int(0) NOT NULL DEFAULT 0,
  `is_starter` int(0) NOT NULL DEFAULT 0,
  `created_by` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_on` datetime(0) NOT NULL,
  `modified_by` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `modified_on` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_permissions
-- ----------------------------
INSERT INTO `sys_permissions` VALUES (9142, 1, NULL, '00000000', 1, 0, 0, 0, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9143, 1, NULL, '1010', 1, 0, 0, 0, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9144, 1, NULL, '101011', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9145, 1, NULL, '90000000', 1, 0, 0, 0, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9146, 1, NULL, '90010000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9147, 1, NULL, '90020000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9148, 1, NULL, '90030000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9149, 1, NULL, '98000000', 1, 0, 0, 0, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9150, 1, NULL, '98010000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9151, 1, NULL, '98020000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9152, 1, NULL, '98030000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9153, 1, NULL, '98040000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9154, 1, NULL, '98050000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9155, 1, NULL, '98060000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9156, 1, NULL, '98070000', 1, 1, 1, 1, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');
INSERT INTO `sys_permissions` VALUES (9157, 1, NULL, '99000000', 1, 0, 0, 0, 0, 0, 0, 'sysadmin', '2021-02-01 17:51:39', 'sysadmin', '2021-02-01 17:51:39');

SET FOREIGN_KEY_CHECKS = 1;
