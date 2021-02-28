
-- --------------------------------------------------------

--
-- Table structure for table `mt_layanan`
--

DROP TABLE IF EXISTS `mt_layanan`;
CREATE TABLE `mt_layanan` (
  `id` int NOT NULL,
  `nama_layanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `jenis_layanan` int DEFAULT NULL COMMENT 'Relasi dengan id master direktorat',
  `stat` int DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete',
  `syscreateuser` int DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL COMMENT 'diambil dari session login user/relasi dengan table user',
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `mt_layanan`:
--   `jenis_layanan`
--       `mt_direktorat` -> `id`
--
