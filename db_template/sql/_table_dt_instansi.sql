
-- --------------------------------------------------------

--
-- Table structure for table `dt_instansi`
--

DROP TABLE IF EXISTS `dt_instansi`;
CREATE TABLE `dt_instansi` (
  `id` int NOT NULL,
  `id_layanan` int DEFAULT NULL COMMENT 'terhubung dengan dt_layanan',
  `nm_instansi` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_provinsi` int DEFAULT NULL,
  `id_kabupaten` int DEFAULT NULL,
  `id_kecamatan` int DEFAULT NULL,
  `id_kelurahan` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `almt_instansi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `telp_instansi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email_instansi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sk_keu_syariah` int DEFAULT NULL,
  `fungsi_titipan` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `dt_instansi`:
--   `id_layanan`
--       `dt_layanan` -> `id`
--
