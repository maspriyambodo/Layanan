/*
 Navicat Premium Data Transfer

 Source Server         : localbodo
 Source Server Type    : MySQL
 Source Server Version : 80023
 Source Host           : localhost:3306
 Source Schema         : db_kemenaglayanan

 Target Server Type    : MySQL
 Target Server Version : 80023
 File Encoding         : 65001

 Date: 03/02/2021 01:32:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dt_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `dt_kegiatan`;
CREATE TABLE `dt_kegiatan`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `id_layanan` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan id table dt_layanan',
  `nm_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'nama kegiatan',
  `esti_keg` int(0) NULL DEFAULT NULL COMMENT 'estimasi peserta',
  `lemb_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT 'nama lembaga penyelenggara',
  `tgl_awal_keg` date NULL DEFAULT NULL,
  `tgl_akhir_keg` date NULL DEFAULT NULL,
  `alamat_keg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `narsum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `id_layanan`(`id_layanan`) USING BTREE,
  CONSTRAINT `dt_kegiatan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `dt_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = 'table untuk layanan izin kegiatan keagamaan' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dt_kegiatan
-- ----------------------------
INSERT INTO `dt_kegiatan` VALUES (2, 2, 'Pesantren Kilat', 30, 'Majelis Umat Rabbani Islam', '2021-02-28', '2021-02-28', 'Jl. Raya Penggilingan', 'Ust. Abd Somad');
INSERT INTO `dt_kegiatan` VALUES (3, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Ust. Adi Hidayat');
INSERT INTO `dt_kegiatan` VALUES (4, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Ust. Hanan Ataqi');
INSERT INTO `dt_kegiatan` VALUES (6, 3, 'Pembiasaan Akhlak Mulia', 30, 'Majelis Umat Rabbani Islam', '2021-02-28', '2021-02-28', 'Jl. Raya Penggilingan', 'Ust. Abd Somad');

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
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `jenis_layanan` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan id table daftar layanan',
  `stat` int(0) NULL DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete\r\n',
  `syscreateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(0) NULL DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_layanan`(`id`) USING BTREE,
  INDEX `id_stat`(`id_stat`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  INDEX `jenis_layanan`(`jenis_layanan`) USING BTREE,
  CONSTRAINT `dt_layanan_ibfk_1` FOREIGN KEY (`id_stat`) REFERENCES `mt_status_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `dt_layanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `dt_layanan_ibfk_3` FOREIGN KEY (`jenis_layanan`) REFERENCES `mt_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dt_layanan
-- ----------------------------
INSERT INTO `dt_layanan` VALUES (2, 11, 1, 11, 1101, 110101, 1101012001, NULL, 1, 1, 4, '2021-01-29 02:38:35', NULL, NULL, NULL, NULL);
INSERT INTO `dt_layanan` VALUES (3, 11, 1, 11, 1102, 110202, 1102022002, NULL, 1, 1, 4, '2021-01-29 02:38:35', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for dt_layanan_dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dt_layanan_dokumen`;
CREATE TABLE `dt_layanan_dokumen`  (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `id_user` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan form_layanan',
  `id_layanan` int(0) NULL DEFAULT NULL COMMENT 'relasi dengan id table form layanan',
  `nama_file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `id_layanan`(`id_layanan`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `dt_layanan_dokumen_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `dt_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dt_layanan_dokumen
-- ----------------------------
INSERT INTO `dt_layanan_dokumen` VALUES (1, 11, 2, 'aspc.pdf');
INSERT INTO `dt_layanan_dokumen` VALUES (2, 11, 2, 'mdpsc.pdf');
INSERT INTO `dt_layanan_dokumen` VALUES (3, 11, 3, 'oasc.pdf');
INSERT INTO `dt_layanan_dokumen` VALUES (4, 11, 3, 'mskalc.pdf');

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_direktorat
-- ----------------------------
INSERT INTO `mt_direktorat` VALUES (1, 'Sekretariat', '- bagian perencanaan\r\n\r\n- bagian keluarga dan pendapatan negara bukan pajak\r\n\r\n- bagian organisasi, kepegawaian, dan hukum\r\n\r\n- bagian data, sistem informasi, dan hubungan masyarakat\r\n\r\n- bagian umum,  barang milik negara.', 1, 1, '2021-01-26 13:43:48', 1, '2021-01-27 13:33:20', 1, '2021-01-27 13:43:37');
INSERT INTO `mt_direktorat` VALUES (2, 'URAIS & BINSYAR', '- Hisab Rukyat\r\n\r\n- Kemasjidan\r\n\r\n- Bina Paham Keagamaan Islam dan penanganan konflik\r\n\r\n- kepustakaan islam', 1, 1, '2021-01-26 13:52:43', 1, '2021-01-27 13:34:26', NULL, NULL);
INSERT INTO `mt_direktorat` VALUES (3, 'PENAIS', '- Penyuluh Agama Islam\r\n\r\n- Dakwah dan HBI\r\n\r\n- Lembaga Tilawah dan Musabaqah Al\'Quran\r\n\r\n- Kemitraan Umat Islam\r\n\r\n- Seni, Budaya, dan Siaran Keagamaan', 1, 1, '2021-01-26 13:54:39', 1, '2021-01-27 13:34:43', NULL, NULL);
INSERT INTO `mt_direktorat` VALUES (4, 'Zakat & Wakaf', '- Kelembagaan dan informasi zakat dan wakaf\r\n\r\n- Edukasi, Inovasi, dan kerjasama zakat dan wakaf\r\n\r\n- Akreditasi dan Audit lembaga Zakat\r\n\r\n- Pengamanan Aset Wakaf', 1, 1, '2021-01-26 13:57:16', 1, '2021-01-27 13:35:20', NULL, NULL);
INSERT INTO `mt_direktorat` VALUES (5, 'Bina KUA & Keluarga Sakinah', '- Bina Kepenghuluan\r\n- Bina Kelembagaan KUA\r\n- Mutu, Sarana Prasarana, dan Sistem Informasi KUA\r\n- Bina Keluarga Sakinah', 1, 1, '2021-01-26 13:59:16', NULL, NULL, NULL, NULL);

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
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jenis_layanan`(`jenis_layanan`) USING BTREE,
  CONSTRAINT `mt_layanan_ibfk_1` FOREIGN KEY (`jenis_layanan`) REFERENCES `mt_direktorat` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_layanan
-- ----------------------------
INSERT INTO `mt_layanan` VALUES (1, 'Izin Kegiatan Keagamaan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 1, 1, '2021-01-26 14:14:55', 0, '2021-02-02 12:37:09', 0, '2021-02-01 17:32:24');
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
INSERT INTO `mt_layanan` VALUES (12, 'Layanan Sekretariat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 3, 0, '2021-02-02 12:06:07', 0, '2021-02-02 12:41:56', 0, '2021-02-02 12:42:12');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mt_status_layanan
-- ----------------------------
INSERT INTO `mt_status_layanan` VALUES (1, 'di terima', 'status diterima adalah status saat user, baru melakukan pendaftaran permohonan baru.', 1, 1, '2021-01-27 15:22:31', 0, '2021-02-02 13:42:33', 0, '2021-02-02 13:22:35');
INSERT INTO `mt_status_layanan` VALUES (2, 'di proses', 'status di proses adalah status lanjutan ketika admin telah menerima permohonan.', 1, 0, '2021-02-02 13:51:33', 1, '2021-02-02 13:56:15', 0, '2021-02-02 13:51:41');

SET FOREIGN_KEY_CHECKS = 1;
