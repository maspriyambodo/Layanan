
-- --------------------------------------------------------

--
-- Structure for view `admin_IKK_persetujuan`
--
DROP TABLE IF EXISTS `admin_IKK_persetujuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_IKK_persetujuan`  AS SELECT `mt_status_layanan`.`id` AS `id`, `mt_status_layanan`.`nama_stat` AS `nama_stat` FROM `mt_status_layanan` WHERE (((`mt_status_layanan`.`stat` = 1) AND (`mt_status_layanan`.`nama_stat` like '%Setujui%')) OR ((`mt_status_layanan`.`stat` = 1) AND (`mt_status_layanan`.`nama_stat` like '%Tolak%'))) ;
