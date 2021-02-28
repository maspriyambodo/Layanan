
-- --------------------------------------------------------

--
-- Table structure for table `dt_penceramah`
--

DROP TABLE IF EXISTS `dt_penceramah`;
CREATE TABLE `dt_penceramah` (
  `id` int NOT NULL,
  `id_layanan` int DEFAULT NULL,
  `narsum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tmp_lhr` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jns_kelamin` tinyint DEFAULT NULL COMMENT '1 = laki | 2 = wanita',
  `no_paspor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_provinsi` int DEFAULT NULL,
  `id_kabupaten` int DEFAULT NULL,
  `id_kecamatan` int DEFAULT NULL,
  `id_kelurahan` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `almt_penceramah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `negara_asl` int NOT NULL DEFAULT '101' COMMENT '101 = indonesia',
  `cv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fc_passport` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sc_ktp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pas_foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `dt_penceramah`:
--   `id_layanan`
--       `dt_layanan` -> `id`
--   `negara_asl`
--       `mt_country` -> `id`
--
