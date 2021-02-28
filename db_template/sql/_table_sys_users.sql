
-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE `sys_users` (
  `id` int NOT NULL,
  `role_id` int NOT NULL DEFAULT '1',
  `nik` bigint DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fullname` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(34) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `telp` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(34) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL,
  `img_photo` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `no_staff` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `occupation` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_company` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `modified_by` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_users`:
--
