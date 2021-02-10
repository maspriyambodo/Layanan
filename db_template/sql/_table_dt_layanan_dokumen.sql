
-- --------------------------------------------------------

--
-- Table structure for table `dt_layanan_dokumen`
--

CREATE TABLE `dt_layanan_dokumen` (
  `id` int NOT NULL,
  `id_layanan` int DEFAULT NULL COMMENT 'relasi dengan id table form layanan',
  `ktp_keg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `proposal_keg` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `surat_permohonan_keg` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `surat_permohonan_luar` int DEFAULT NULL COMMENT 'surat permohonan untuk keluar negeri',
  `proposal_luar` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'proposal untuk keluar negeri',
  `cv_crmh_luar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'cv untuk penceramah/narasumber, keluar negeri',
  `pasp_crmh_luar` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport  untuk penceramah keluar negeri',
  `pasp_pengundang_luar` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport pengundang penceramah keluarnegeri',
  `pas_foto_crmh_luar` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'pas foto untuk penceramah keluar negeri',
  `surat_permohonan_dalam` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'surat permohonan untuk penceramah ke dalam negeri',
  `proposal_dalam` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'proposal untuk penceramah ke dalam negeri',
  `cv_crmh_dalam` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'cv untuk penceramah ke dalam negeri',
  `pasp_crmh_dalam` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport untuk penceramah kedalam negeri',
  `ktp_dalam` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy ktp penceramah kedalam negeri',
  `pas_foto_crmh_dalam` int DEFAULT NULL COMMENT 'pas foto untuk penceramah kedalam negeri',
  `surat_permohonan_safari` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'surat permohonan untuk safari dakwah',
  `proposal_safari` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'proposal untuk program safari dakwah',
  `cv_crmh_safari` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'cv untuk program safari dakwah',
  `pasp_crmh_safari` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy pasport untuk penceramah program safari dakwah',
  `ktp_safari` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'fotocopy ktp penceramah program safari dakwah',
  `pas_foto_crmh_safari` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'pas foto untuk penceramah program safari dakwah',
  `crt_crmh_safari` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'certificate untuk penceramah program safari dakwah'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;
