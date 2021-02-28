
-- --------------------------------------------------------

--
-- Table structure for table `sys_ci_sessions`
--

DROP TABLE IF EXISTS `sys_ci_sessions`;
CREATE TABLE `sys_ci_sessions` (
  `id` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_ci_sessions`:
--
