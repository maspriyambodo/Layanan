
-- --------------------------------------------------------

--
-- Table structure for table `sys_login_attempts`
--

DROP TABLE IF EXISTS `sys_login_attempts`;
CREATE TABLE `sys_login_attempts` (
  `id` int NOT NULL,
  `ip_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_login_attempts`:
--
