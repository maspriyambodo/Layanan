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

 Date: 03/02/2021 00:56:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 0 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
