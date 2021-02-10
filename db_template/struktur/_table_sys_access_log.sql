
-- --------------------------------------------------------

--
-- Table structure for table `sys_access_log`
--

CREATE TABLE `sys_access_log` (
  `id` bigint NOT NULL,
  `id_user` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `access_type` varchar(16) NOT NULL,
  `access_on` datetime NOT NULL,
  `ip_local` varchar(32) NOT NULL,
  `ip_server` varchar(32) NOT NULL,
  `page_id` varchar(32) NOT NULL DEFAULT 'UNKNOWN / LOGIN',
  `page_name` varchar(32) NOT NULL DEFAULT 'Unknown / Login Page',
  `page_url` varchar(128) DEFAULT NULL,
  `page_mode` varchar(32) DEFAULT NULL,
  `page_segments` varchar(128) DEFAULT NULL,
  `data_id` varchar(32) DEFAULT NULL,
  `data_key` varchar(32) DEFAULT NULL,
  `data_table` varchar(32) DEFAULT NULL,
  `data_prev` text,
  `data_update` text,
  `success` int NOT NULL DEFAULT '1',
  `access_mode` varchar(8) NOT NULL COMMENT 'AJAX: Via Ajax; URL: Via url address in browser;',
  `email` varchar(128) NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
