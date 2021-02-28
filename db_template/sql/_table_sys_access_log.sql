
-- --------------------------------------------------------

--
-- Table structure for table `sys_access_log`
--

DROP TABLE IF EXISTS `sys_access_log`;
CREATE TABLE `sys_access_log` (
  `id` bigint NOT NULL,
  `id_user` int NOT NULL,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `access_type` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `access_on` datetime NOT NULL,
  `ip_local` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_server` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `page_id` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'UNKNOWN / LOGIN',
  `page_name` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Unknown / Login Page',
  `page_url` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `page_mode` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `page_segments` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `data_id` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `data_key` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `data_table` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `data_prev` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `data_update` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `success` int NOT NULL DEFAULT '1',
  `access_mode` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'AJAX: Via Ajax; URL: Via url address in browser;',
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remark` text CHARACTER SET latin1 COLLATE latin1_swedish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_access_log`:
--
