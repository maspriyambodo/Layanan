
-- --------------------------------------------------------

--
-- Table structure for table `sys_user_profile`
--

DROP TABLE IF EXISTS `sys_user_profile`;
CREATE TABLE `sys_user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_user_profile`:
--
