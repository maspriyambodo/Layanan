
-- --------------------------------------------------------

--
-- Table structure for table `dt_layanan`
--

DROP TABLE IF EXISTS `dt_layanan`;
CREATE TABLE `dt_layanan` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL COMMENT 'relasi dengan table user',
  `id_stat` int DEFAULT NULL COMMENT 'relasi dengan table status_layanan',
  `id_provinsi` int DEFAULT NULL COMMENT 'provinsi',
  `id_kabupaten` int DEFAULT NULL COMMENT 'kabupaten',
  `id_kecamatan` int DEFAULT NULL COMMENT 'kecamatan',
  `id_kelurahan` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `jenis_layanan` int DEFAULT NULL COMMENT 'relasi dengan id table daftar layanan',
  `alasan_tolak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `stat` int DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete\r\n',
  `syscreateuser` int DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `dt_layanan`:
--   `id_stat`
--       `mt_status_layanan` -> `id`
--   `id_user`
--       `sys_users` -> `id`
--   `jenis_layanan`
--       `mt_layanan` -> `id`
--
