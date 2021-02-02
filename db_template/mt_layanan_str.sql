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

 Date: 03/02/2021 00:57:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 0 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
