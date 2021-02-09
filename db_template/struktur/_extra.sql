
--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_kegiatan`
--
ALTER TABLE `dt_kegiatan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `id_layanan` (`id_layanan`) USING BTREE;

--
-- Indexes for table `dt_layanan`
--
ALTER TABLE `dt_layanan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_layanan` (`id`) USING BTREE,
  ADD KEY `id_stat` (`id_stat`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `jenis_layanan` (`jenis_layanan`) USING BTREE;

--
-- Indexes for table `dt_layanan_dokumen`
--
ALTER TABLE `dt_layanan_dokumen`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `id_layanan` (`id_layanan`) USING BTREE;
ALTER TABLE `dt_layanan_dokumen` CHANGE `ktp` `ktp_keg` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL;
--
-- Indexes for table `dt_penceramah`
--
ALTER TABLE `dt_penceramah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dt_penceramah_ibfk_1` (`id_layanan`);

--
-- Indexes for table `dt_pendidikan`
--
ALTER TABLE `dt_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dt_pendidikan_ibfk` (`id_crmh`);

--
-- Indexes for table `mt_direktorat`
--
ALTER TABLE `mt_direktorat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mt_layanan`
--
ALTER TABLE `mt_layanan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `jenis_layanan` (`jenis_layanan`) USING BTREE;

--
-- Indexes for table `mt_status_layanan`
--
ALTER TABLE `mt_status_layanan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mt_wil_jenis`
--
ALTER TABLE `mt_wil_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `mt_wil_kabupaten`
--
ALTER TABLE `mt_wil_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `mt_wil_kecamatan`
--
ALTER TABLE `mt_wil_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `mt_wil_kelurahan`
--
ALTER TABLE `mt_wil_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `mt_wil_provinsi`
--
ALTER TABLE `mt_wil_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `sys_access_log`
--
ALTER TABLE `sys_access_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_ci_sessions`
--
ALTER TABLE `sys_ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `sys_login_attempts`
--
ALTER TABLE `sys_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `kode` (`kode`) USING BTREE;

--
-- Indexes for table `sys_param`
--
ALTER TABLE `sys_param`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `sys_roles`
--
ALTER TABLE `sys_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `sys_user_approval`
--
ALTER TABLE `sys_user_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_user_autologin`
--
ALTER TABLE `sys_user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `sys_user_profile`
--
ALTER TABLE `sys_user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_user_temp`
--
ALTER TABLE `sys_user_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_kegiatan`
--
ALTER TABLE `dt_kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_layanan`
--
ALTER TABLE `dt_layanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_layanan_dokumen`
--
ALTER TABLE `dt_layanan_dokumen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_penceramah`
--
ALTER TABLE `dt_penceramah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_pendidikan`
--
ALTER TABLE `dt_pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_direktorat`
--
ALTER TABLE `mt_direktorat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_layanan`
--
ALTER TABLE `mt_layanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_status_layanan`
--
ALTER TABLE `mt_status_layanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_wil_jenis`
--
ALTER TABLE `mt_wil_jenis`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_access_log`
--
ALTER TABLE `sys_access_log`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_login_attempts`
--
ALTER TABLE `sys_login_attempts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_roles`
--
ALTER TABLE `sys_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_user_approval`
--
ALTER TABLE `sys_user_approval`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_user_profile`
--
ALTER TABLE `sys_user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_user_temp`
--
ALTER TABLE `sys_user_temp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dt_kegiatan`
--
ALTER TABLE `dt_kegiatan`
  ADD CONSTRAINT `dt_kegiatan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `dt_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_layanan`
--
ALTER TABLE `dt_layanan`
  ADD CONSTRAINT `dt_layanan_ibfk_1` FOREIGN KEY (`id_stat`) REFERENCES `mt_status_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_layanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_layanan_ibfk_3` FOREIGN KEY (`jenis_layanan`) REFERENCES `mt_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_layanan_dokumen`
--
ALTER TABLE `dt_layanan_dokumen`
  ADD CONSTRAINT `dt_layanan_dokumen_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `dt_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_penceramah`
--
ALTER TABLE `dt_penceramah`
  ADD CONSTRAINT `dt_penceramah_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `dt_layanan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `dt_layanan` CHANGE `alasan_tolak` `alasan_tolak` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL;
--
-- Constraints for table `dt_pendidikan`
--
ALTER TABLE `dt_pendidikan`
  ADD CONSTRAINT `dt_pendidikan_ibfk` FOREIGN KEY (`id_crmh`) REFERENCES `dt_penceramah` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_layanan`
--
ALTER TABLE `mt_layanan`
  ADD CONSTRAINT `mt_layanan_ibfk_1` FOREIGN KEY (`jenis_layanan`) REFERENCES `mt_direktorat` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
