
-- --------------------------------------------------------

--
-- Structure for view `admin_dai_dari_luar`
--
DROP TABLE IF EXISTS `admin_dai_dari_luar`;

DROP VIEW IF EXISTS `admin_dai_dari_luar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_dai_dari_luar`  AS SELECT `a`.`id` AS `id` FROM `dt_layanan` AS `a` WHERE (`a`.`jenis_layanan` = 3) ;
