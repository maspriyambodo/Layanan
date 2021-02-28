
-- --------------------------------------------------------

--
-- Table structure for table `mt_wil_jenis`
--

DROP TABLE IF EXISTS `mt_wil_jenis`;
CREATE TABLE `mt_wil_jenis` (
  `id_jenis` int NOT NULL,
  `nama` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `mt_wil_jenis`:
--
