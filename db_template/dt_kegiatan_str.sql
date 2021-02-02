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

SET FOREIGN_KEY_CHECKS = 1;
