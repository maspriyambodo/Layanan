
-- --------------------------------------------------------

--
-- Table structure for table `mt_wil_kelurahan`
--

DROP TABLE IF EXISTS `mt_wil_kelurahan`;
CREATE TABLE `mt_wil_kelurahan` (
  `id_kelurahan` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kecamatan` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `id_jenis` int NOT NULL,
  `nama_abbr` varchar(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_actived` int NOT NULL DEFAULT '1',
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `created_by` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modified_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `mt_wil_kelurahan`:
--
