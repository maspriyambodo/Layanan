
-- --------------------------------------------------------

--
-- Structure for view `detail_wilayah`
--
DROP TABLE IF EXISTS `detail_wilayah`;

DROP VIEW IF EXISTS `detail_wilayah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_wilayah`  AS SELECT `mt_wil_provinsi`.`nama` AS `provinsi`, `mt_wil_kabupaten`.`nama` AS `kabupaten`, `mt_wil_kecamatan`.`nama` AS `kecamatan`, `mt_wil_kelurahan`.`nama` AS `kelurahan`, `mt_wil_provinsi`.`id_provinsi` AS `id_provinsi`, `mt_wil_kabupaten`.`id_kabupaten` AS `id_kabupaten`, `mt_wil_kecamatan`.`id_kecamatan` AS `id_kecamatan`, `mt_wil_kelurahan`.`id_kelurahan` AS `id_kelurahan` FROM (((`mt_wil_provinsi` join `mt_wil_kabupaten` on((`mt_wil_provinsi`.`id_provinsi` = `mt_wil_kabupaten`.`id_provinsi`))) join `mt_wil_kecamatan` on((`mt_wil_kabupaten`.`id_kabupaten` = `mt_wil_kecamatan`.`id_kabupaten`))) join `mt_wil_kelurahan` on((`mt_wil_kecamatan`.`id_kecamatan` = `mt_wil_kelurahan`.`id_kecamatan`))) ;
