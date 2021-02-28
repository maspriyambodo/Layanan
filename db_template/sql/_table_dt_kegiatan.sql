
-- --------------------------------------------------------

--
-- Table structure for table `dt_kegiatan`
--

DROP TABLE IF EXISTS `dt_kegiatan`;
CREATE TABLE `dt_kegiatan` (
  `id` int NOT NULL,
  `id_layanan` int DEFAULT NULL COMMENT 'relasi dengan id table dt_layanan',
  `nm_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'nama kegiatan',
  `esti_keg` int DEFAULT NULL COMMENT 'estimasi peserta',
  `lemb_keg` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'nama lembaga penyelenggara',
  `tgl_awal_keg` date DEFAULT NULL,
  `tgl_akhir_keg` date DEFAULT NULL,
  `alamat_keg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `ket_keg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `code_negara` int NOT NULL DEFAULT '101' COMMENT 'digunakan hanya untuk penceramah keluar/dari luar negeri\r\nrelasi dengan id mt_country'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='table untuk layanan izin kegiatan keagamaan' ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `dt_kegiatan`:
--   `id_layanan`
--       `dt_layanan` -> `id`
--   `code_negara`
--       `mt_country` -> `id`
--
