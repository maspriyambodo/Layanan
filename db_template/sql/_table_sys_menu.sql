
-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu` (
  `id` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_parent` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kode` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_no` int NOT NULL DEFAULT '0',
  `url_link` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `access_pref` int NOT NULL DEFAULT '100000' COMMENT 'View|Add|Edit|Delete|Approve|Publish',
  `group_menu` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'app',
  `group_order` int NOT NULL DEFAULT '0',
  `icon_class` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon_text` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_level` int NOT NULL DEFAULT '0',
  `is_actived` int NOT NULL DEFAULT '1',
  `created_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_menu`:
--
