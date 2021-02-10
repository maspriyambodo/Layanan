
-- --------------------------------------------------------

--
-- Table structure for table `dt_layanan`
--

CREATE TABLE `dt_layanan` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL COMMENT 'relasi dengan table user',
  `id_stat` int DEFAULT NULL COMMENT 'relasi dengan table status_layanan',
  `id_provinsi` int DEFAULT NULL COMMENT 'provinsi',
  `id_kabupaten` int DEFAULT NULL COMMENT 'kabupaten',
  `id_kecamatan` int DEFAULT NULL COMMENT 'kecamatan',
  `id_kelurahan` int DEFAULT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `jenis_layanan` int DEFAULT NULL COMMENT 'relasi dengan id table daftar layanan',
  `alasan_tolak` text COLLATE utf8mb4_bin NOT NULL,
  `stat` int DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif\r\n3. delete\r\n',
  `syscreateuser` int DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL COMMENT 'diambil dari session userlogin/ relasi dengan table user',
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;
