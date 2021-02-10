
-- --------------------------------------------------------

--
-- Table structure for table `sys_param`
--

CREATE TABLE `sys_param` (
  `id` varchar(32) NOT NULL,
  `param_group` varchar(32) DEFAULT NULL,
  `param_value` varchar(32) NOT NULL,
  `param_type` varchar(8) NOT NULL,
  `param_desc` varchar(128) NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(32) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` varchar(32) NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
