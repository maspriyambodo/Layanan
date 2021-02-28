
-- --------------------------------------------------------

--
-- Table structure for table `sys_user_approval`
--

DROP TABLE IF EXISTS `sys_user_approval`;
CREATE TABLE `sys_user_approval` (
  `id` bigint NOT NULL,
  `id_user` int NOT NULL,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `approver_id` int NOT NULL,
  `approver_username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `approver_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `approver_as` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `approver_level` int NOT NULL DEFAULT '1',
  `is_actived` int NOT NULL DEFAULT '1',
  `created_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `sys_user_approval`:
--
