
-- --------------------------------------------------------

--
-- Table structure for table `sys_permissions`
--

DROP TABLE IF EXISTS `sys_permissions`;
CREATE TABLE `sys_permissions` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_bin,
  `id_menu` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_view` int NOT NULL DEFAULT '0',
  `is_add` int NOT NULL DEFAULT '0',
  `is_edit` int NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0',
  `is_publish` int NOT NULL DEFAULT '0',
  `is_approve` int NOT NULL DEFAULT '0',
  `is_starter` int NOT NULL DEFAULT '0',
  `created_by` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_permissions`:
--
