
-- --------------------------------------------------------

--
-- Table structure for table `sys_roles`
--

CREATE TABLE `sys_roles` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `is_actived` int NOT NULL DEFAULT '1',
  `created_by` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
