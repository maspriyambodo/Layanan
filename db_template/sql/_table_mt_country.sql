
-- --------------------------------------------------------

--
-- Table structure for table `mt_country`
--

DROP TABLE IF EXISTS `mt_country`;
CREATE TABLE `mt_country` (
  `id` int NOT NULL,
  `code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `country` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `mt_country`:
--
