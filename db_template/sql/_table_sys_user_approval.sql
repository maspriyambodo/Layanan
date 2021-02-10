
-- --------------------------------------------------------

--
-- Table structure for table `sys_user_approval`
--

CREATE TABLE `sys_user_approval` (
  `id` bigint NOT NULL,
  `id_user` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `approver_id` int NOT NULL,
  `approver_username` varchar(32) NOT NULL,
  `approver_name` varchar(64) NOT NULL,
  `approver_as` varchar(64) NOT NULL,
  `approver_level` int NOT NULL DEFAULT '1',
  `is_actived` int NOT NULL DEFAULT '1',
  `created_by` varchar(32) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(32) NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
