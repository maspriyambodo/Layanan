
-- --------------------------------------------------------

--
-- Table structure for table `dt_pendidikan`
--

CREATE TABLE `dt_pendidikan` (
  `id` int NOT NULL,
  `id_crmh` int NOT NULL COMMENT 'relasi dengan id table dt_penceramah',
  `tingkatan_pddk` int NOT NULL COMMENT '1 = S1 | 2 = D3 | 3 = SMK/SMA | 4 = SLTP/SMP | 5 = SD',
  `program_pddk` varchar(30) NOT NULL,
  `almt_pddk` text NOT NULL,
  `lulus_pddk` year NOT NULL,
  `jenis_pddk` int NOT NULL COMMENT '1 = formal | 2 = nonformal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
