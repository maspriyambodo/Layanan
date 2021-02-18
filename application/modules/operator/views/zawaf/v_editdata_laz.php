<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Pemohon</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Data Instansi</a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Data Lampiran</a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <!--Data Pemohon-->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <form action="<?php //echo site_url('operator/zawaf/simpanedit_lkspwu');?>" method="post">
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $pemohon->id;?>">
                    <input type="hidden" name="id_user" value="<?php echo $pemohon->id_user;?>">
                    <input type="hidden" name="id_stat" value="<?php echo $pemohon->id_stat;?>">
                    <input type="hidden" name="jenis_layanan" value="<?php echo $pemohon->jenis_layanan;?>">
                    <input type="hidden" name="sysupdateuser" value="<?php echo $pemohon->id_user;?>">
                    <input type="hidden" name="sysupdatedate" value="<?php echo date('Y-m-d h:i:s');?>">

                    <!-- <legend>Data Pemohon :</legend> -->
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?php echo $pemohon->nik;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $pemohon->fullname;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Status Permohonan</label>
                        <input type="text" class="form-control" name="nama_stat" value="<?php echo $pemohon->nama_stat;?>" readonly>
                        <small class="form-text text-muted">Tahap selanjutnya, diproses, disetujui / ditolak.</small>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Jenis Layanan</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $pemohon->nama_layanan;?>" readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $pemohon->tgl_lhr;?>" readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telp" value="<?php echo $pemohon->telp;?>" readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $pemohon->email;?>" readonly>
                      </div>
                    </div>
                </fieldset><br>
                <!-- <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php //echo site_url('operator/binsyar/datakegiatan') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button> -->
              </form>
            </div>

            <!--Data Instansi-->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <form action="<?php echo site_url('operator/zawaf/simpanedit_instansi_laz');?>" method="post">
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $instansi->id;?>">
                    <input type="hidden" name="id_layanan" value="<?php echo $instansi->id_layanan;?>">
                    <!-- <legend>Data Kegiatan :</legend> -->
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Nama Instansi</label>
                        <input type="text" class="form-control" name="nm_instansi" value="<?php echo $instansi->nm_instansi;?>">
                        <?php echo form_error('nm_instansi');?>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Telepon Instansi</label>
                        <input type="text" class="form-control" name="telp_instansi" value="<?php echo $instansi->telp_instansi;?>">
                        <?php echo form_error('telp_instansi');?>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Email Instansi</label>
                        <input type="text" class="form-control" name="email_instansi" value="<?php echo $instansi->email_instansi;?>">
                        <?php echo form_error('email_instansi');?>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Provinsi</label>
                        <select class="form-control" name="id_provinsi" id="provinsi">
                          <option>Pilih . .</option>
                          <?php foreach($dt_provinsi as $provinsi){?>
                          <option <?php if($instansi->id_provinsi === $provinsi->id_provinsi){echo "selected"; } ?> value="<?php echo $provinsi->id_provinsi;?>"><?php echo $provinsi->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Kabupaten</label>
                        <select class="form-control" name="id_kabupaten" id="kabupaten">
                          <?php foreach($dt_kabupaten as $kabupaten){?>
                          <option <?php if($instansi->id_kabupaten === $kabupaten->id_kabupaten){echo "selected"; } ?> value="<?php echo $kabupaten->id_kabupaten;?>"><?php echo $kabupaten->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Kecamatan</label>
                        <select class="form-control" name="id_kecamatan" id="kecamatan">
                          <?php foreach($dt_kecamatan as $kecamatan){?>
                          <option <?php if($instansi->id_kecamatan === $kecamatan->id_kecamatan){echo "selected"; } ?> value="<?php echo $kecamatan->id_kecamatan;?>"><?php echo $kecamatan->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Kelurahan</label>
                        <select class="form-control" name="id_kelurahan" id="kelurahan">
                          <?php foreach($dt_kelurahan as $kelurahan){?>
                          <option <?php if($instansi->id_kelurahan === $kelurahan->id_kelurahan){echo "selected"; } ?> value="<?php echo $kelurahan->id_kelurahan;?>"><?php echo $kelurahan->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <textarea class="form-control" rows="3" name="almt_instansi"><?php echo $instansi->almt_instansi;?></textarea>
                      </div>
                    </div>
                </fieldset><br>
                <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('operator/zawaf/datalaz') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
              </form>
            </div>

            <!--Data Lampiran-->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <form method="post" action="<?php echo site_url('operator/zawaf/simpanedit_lampiran_laz');?>" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $lampiran->id;?>">
                    <input type="hidden" name="id_layanan" value="<?php echo $lampiran->id_layanan;?>">
                    <legend>Data Lampiran Dokumen :</legend>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Surat Permohonan Teruntuk Menteri Agama</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->srt_prmhn_mntr_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="srt_prmhn_mntr_laz">
                        <?php echo form_error('srt_prmhn_mntr_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Rekomendasi Baznas</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->rcmd_baznas_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="rcmd_baznas_laz">
                        <?php echo form_error('rcmd_baznas_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Anggaran Dasar Organisasi</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->agrn_dsr_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="agrn_dsr_laz">
                        <?php echo form_error('agrn_dsr_laz',"<div style='color:red'>","</div>");?>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>SK Sebagai Badan Hukum</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->sk_bdn_hkm_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="sk_bdn_hkm_laz">
                        <?php echo form_error('sk_bdn_hkm_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Susunan Pengawas Syariat</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->ssn_pngws_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="ssn_pngws_laz">
                        <?php echo form_error('ssn_pngws_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Surat Pernyataan Sebagai Pengawas</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->srt_sbg_pngws_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="srt_sbg_pngws_laz">
                        <?php echo form_error('srt_sbg_pngws_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Daftar Pegawai Dibidang Teknis</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->dftr_pgw_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="dftr_pgw_laz">
                        <?php echo form_error('dftr_pgw_laz',"<div style='color:red'>","</div>");?>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>FC Kartu BPJS</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->fc_kartubpjs_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="fc_kartubpjs_laz">
                        <?php echo form_error('fc_kartubpjs_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Pernyataan Pegawai Non Rangkap Baznas</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->srt_pgw_baznas_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="srt_pgw_baznas_laz">
                        <?php echo form_error('srt_pgw_baznas_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Pernyataan Siap Diaudit Syariat & Keuangan</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->srt_sediaaudit_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="srt_sediaaudit_laz">
                        <?php echo form_error('srt_sediaaudit_laz',"<div style='color:red'>","</div>");?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Ikhtisar Perencanaan Program</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/zakat/<?php echo $lampiran->iktsr_prcn_laz;?>">
                        </div><br>
                        <input type="file" class="form-control" name="iktsr_prcn_laz">
                        <?php echo form_error('iktsr_prcn_laz',"<div style='color:red'>","</div>");?>
                      </div>
                    </div>
                </fieldset><br>
                <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('operator/zawaf/datalaz') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
              </form>
            </div>
          </div>

        </div><!--widget-bg-->
    </div>
</div>