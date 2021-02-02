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

 Date: 03/02/2021 00:56:26
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
) ENGINE = InnoDB AUTO_INCREMENT = 0 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
