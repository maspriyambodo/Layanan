
-- --------------------------------------------------------

--
-- Table structure for table `sys_param`
--

DROP TABLE IF EXISTS `sys_param`;
CREATE TABLE `sys_param` (
  `id` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `param_group` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `param_value` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `param_type` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `param_desc` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_param`:
--
