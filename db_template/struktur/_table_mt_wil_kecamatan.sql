
-- --------------------------------------------------------

--
-- Table structure for table `mt_wil_kecamatan`
--

CREATE TABLE `mt_wil_kecamatan` (
  `id_kecamatan` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kabupaten` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` tinytext NOT NULL,
  `nama_abbr` varchar(48) DEFAULT NULL,
  `is_actived` int NOT NULL DEFAULT '1',
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `created_by` varchar(32) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(32) NOT NULL,
  `modified_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
