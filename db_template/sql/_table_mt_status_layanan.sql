
-- --------------------------------------------------------

--
-- Table structure for table `mt_status_layanan`
--

DROP TABLE IF EXISTS `mt_status_layanan`;
CREATE TABLE `mt_status_layanan` (
  `id` int NOT NULL,
  `nama_stat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT '1. diterima\r\n2. di proses\r\n3. verifikasi\r\n4. ditolak\r\n5. diterima',
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `stat` int DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete',
  `syscreateuser` int DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `mt_status_layanan`:
--
