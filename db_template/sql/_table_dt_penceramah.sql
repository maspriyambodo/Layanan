
-- --------------------------------------------------------

--
-- Table structure for table `dt_penceramah`
--

CREATE TABLE `dt_penceramah` (
  `id` int NOT NULL,
  `id_layanan` int DEFAULT NULL,
  `narsum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tmp_lhr` varchar(20) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jns_kelamin` tinyint DEFAULT NULL COMMENT '1 = laki | 2 = wanita',
  `no_paspor` VARCHAR (50) DEFAULT NULL,
  `id_provinsi` int DEFAULT NULL,
  `id_kabupaten` int DEFAULT NULL,
  `id_kecamatan` int DEFAULT NULL,
  `id_kelurahan` char(10) DEFAULT NULL,
  `almt_penceramah` text,
  `negara_asl` int NOT NULL DEFAULT '101' COMMENT '101 = indonesia',
  `cv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fc_passport` varchar(100) DEFAULT NULL,
  `pas_foto` varchar(100) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
