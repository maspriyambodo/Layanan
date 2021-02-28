
-- --------------------------------------------------------

--
-- Structure for view `Get_penceramah`
--
DROP TABLE IF EXISTS `Get_penceramah`;

DROP VIEW IF EXISTS `Get_penceramah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Get_penceramah`  AS SELECT `dt_penceramah`.`id` AS `penceramah_id`, `dt_penceramah`.`id_layanan` AS `layanan_id`, `dt_penceramah`.`narsum` AS `narsum`, `dt_penceramah`.`tmp_lhr` AS `tempat_lahir`, `dt_penceramah`.`tgl_lhr` AS `tanggal_lahir`, `dt_penceramah`.`jns_kelamin` AS `kelamin`, `dt_penceramah`.`no_paspor` AS `no_paspor`, `dt_penceramah`.`id_provinsi` AS `id_prov`, `dt_penceramah`.`id_kabupaten` AS `id_kab`, `dt_penceramah`.`id_kecamatan` AS `id_kec`, `dt_penceramah`.`id_kelurahan` AS `id_kel`, `dt_penceramah`.`almt_penceramah` AS `alamat`, `dt_penceramah`.`negara_asl` AS `origin`, `dt_penceramah`.`cv` AS `dok_cv`, `dt_penceramah`.`fc_passport` AS `dok_paspor`, `dt_penceramah`.`pas_foto` AS `dok_foto`, `mt_wil_provinsi`.`nama` AS `provinsi`, `mt_wil_kabupaten`.`nama` AS `kabupaten`, `mt_wil_kecamatan`.`nama` AS `kecamatan`, `mt_wil_kelurahan`.`nama` AS `kelurahan` FROM ((((`dt_penceramah` left join `mt_wil_provinsi` on((`dt_penceramah`.`id_provinsi` = `mt_wil_provinsi`.`id_provinsi`))) left join `mt_wil_kabupaten` on((`dt_penceramah`.`id_kabupaten` = `mt_wil_kabupaten`.`id_kabupaten`))) left join `mt_wil_kecamatan` on((`dt_penceramah`.`id_kecamatan` = `mt_wil_kecamatan`.`id_kecamatan`))) left join `mt_wil_kelurahan` on((`dt_penceramah`.`id_kelurahan` = `mt_wil_kelurahan`.`id_kelurahan`))) ;
