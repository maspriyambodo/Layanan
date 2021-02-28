
-- --------------------------------------------------------

--
-- Table structure for table `dt_layanan_dokumen`
--

DROP TABLE IF EXISTS `dt_layanan_dokumen`;
CREATE TABLE `dt_layanan_dokumen` (
  `id` int NOT NULL,
  `id_layanan` int DEFAULT NULL COMMENT 'relasi dengan id table form layanan',
  `ktp_keg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `proposal_keg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `surat_permohonan_keg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `surat_permohonan_luar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'surat permohonan untuk keluar negeri',
  `proposal_luar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'proposal untuk keluar negeri',
  `cv_crmh_luar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'cv untuk penceramah/narasumber, keluar negeri',
  `pasp_crmh_luar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport  untuk penceramah keluar negeri',
  `pasp_pengundang_luar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport pengundang penceramah keluarnegeri',
  `pas_foto_crmh_luar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'pas foto untuk penceramah keluar negeri',
  `surat_permohonan_dalam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'surat permohonan untuk penceramah ke dalam negeri',
  `proposal_dalam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'proposal untuk penceramah ke dalam negeri',
  `cv_crmh_dalam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'cv untuk penceramah ke dalam negeri',
  `pasp_crmh_dalam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport untuk penceramah kedalam negeri',
  `ktp_dalam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy ktp penceramah kedalam negeri',
  `pas_foto_crmh_dalam` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'pas foto untuk penceramah kedalam negeri',
  `surat_permohonan_safari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'surat permohonan untuk safari dakwah',
  `proposal_safari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'proposal untuk program safari dakwah',
  `cv_crmh_safari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'cv untuk program safari dakwah',
  `pasp_crmh_safari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport untuk penceramah program safari dakwah',
  `ktp_safari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy ktp penceramah program safari dakwah',
  `pas_foto_crmh_safari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'pas foto untuk penceramah program safari dakwah',
  `crt_crmh_safari` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'certificate untuk penceramah program safari dakwah',
  `srt_prmhn_kementri_lkspwu` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `agrn_dsr_lkspwu` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `sk_hkm_lkspwu` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `skdu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `lapkeu_lkspwu` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `super_menteri_laznas` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `super_dirjen_lazprov` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `rekbaz_laznas` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `agrn_organisasi` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `sk_sbb_hkm` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `ssn_pgws_syariat` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `super_sbb_pgws_syariat` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `dftr_pgw_terkait` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `fc_bpjs` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `super_pgw_unrangkap` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `super_diaudit` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `prgrm_rcn` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `dt_layanan_dokumen`:
--   `id_layanan`
--       `dt_layanan` -> `id`
--
