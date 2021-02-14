<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Pemohon</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Data Kegiatan</a>
              <a class="nav-item nav-link" id="nav-penceramah-tab" data-toggle="tab" href="#nav-penceramah" role="tab" aria-controls="nav-penceramah" aria-selected="false">Data Penceramah</a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Data Lampiran</a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <!--Data Pemohon-->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <form action="" method="post">
                <fieldset>
                    <!-- <legend>Data Pemohon :</legend> -->
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?php echo $pemohon->nik;?>" readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $pemohon->fullname;?>" readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Jenis Layanan</label>
                        <input type="text" class="form-control" name="nama_layanan" value="<?php echo $pemohon->nama_layanan;?>" readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Status Permohonan</label>
                        <input type="text" class="form-control" name="nama_stat" value="<?php echo $pemohon->nama_stat;?>" readonly>
                        <small class="form-text text-muted">Tahap selanjutnya, diproses, disetujui / ditolak.</small>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $pemohon->tgl_lhr;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telp" value="<?php echo $pemohon->telp;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $pemohon->email;?>" readonly>
                      </div>
                    </div>
                </fieldset><br>
                <!-- <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php //echo site_url('users/binsyar/datapermohonan') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button> -->
              </form>
            </div>
            <!--Data Kegiatan-->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <form action="<?php echo site_url('users/binsyar/simpanedit_ekspor_kegiatan');?>" method="post">
                <fieldset>
                  <input type="hidden" name="id" value="<?php echo $kegiatan->id;?>">
                  <input type="hidden" name="id_layanan" value="<?php echo $kegiatan->id_layanan;?>">
                    <!-- <legend>Data Kegiatan :</legend> -->
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nm_keg" value="<?php echo $kegiatan->nm_keg;?>">
                        <?php echo form_error('nm_keg');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Awal Kegiatan</label>
                        <input type="text" class="form-control" name="tgl_awal_keg" placeholder="dd-mm-yyyy" onclick="this.type='date'" onmouseout="timeFunctionLong(this)" value="<?php echo $dataku[1]->tgl_awal_keg;?>">
                        <?php echo form_error('tgl_awal_keg');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Akhir Kegiatan</label>
                        <input type="text" class="form-control" name="tgl_akhir_keg" placeholder="dd-mm-yyyy" onclick="this.type='date'" onmouseout="timeFunctionLong(this)" value="<?php echo $dataku[1]->tgl_akhir_keg;?>">
                        <?php echo form_error('tgl_akhir_keg');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Estimasi Jumlah Jamaah</label>
                        <input type="number" class="form-control" name="esti_keg" value="<?php echo $dataku[1]->esti_keg;?>">
                        <?php echo form_error('esti_keg');?>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Negara Tujuan</label>
                        <select class="form-control" name="code_negara">
                          <option>Pilih . .</option>
                          <?php foreach($dt_negara as $negara){?>
                          <option <?php if($dataku[1]->code_negara === $negara->id){echo "selected"; } ?> value="<?php echo $negara->id;?>"><?php echo $negara->country;?></option>
                          <?php }?>
                          <?php echo form_error('code_negara');?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="alamat_keg" value="<?php echo $dataku[1]->alamat_keg;?>">
                        <?php echo form_error('alamat_keg');?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Lembaga Penyelenggara</label>
                        <input type="text" class="form-control" name="lemb_keg" value="<?php echo $dataku[1]->lemb_keg;?>">
                        <?php echo form_error('lemb_keg');?>
                      </div>
                    </div>
                </fieldset><br>
                <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/binsyar/dataekspor') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
              </form>
            </div>

            <!--Data Penceramah-->
            <div class="tab-pane fade" id="nav-penceramah" role="tabpanel" aria-labelledby="nav-penceramah-tab">
              <form action="<?php echo site_url('users/binsyar/simpanedit_ekspor_penceramah');?>" method="post">
                <fieldset>
                    <div class="form-row">
                      <?php foreach($crmh_array as $data){?>
                      <div class="form-group col-md-3">
                        <label>Nama Penceramah</label>
                        <input type="hidden" name="id[]" value="<?php echo $data->id;?>">
                        <input type="hidden" name="id_layanan[]" value="<?php echo $data->id_layanan;?>">
                        <input type="text" class="form-control" name="narsum[]" value="<?php echo $data->narsum;?>">
                      </div>
                      <?php }?>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jns_kelamin">
                          <option <?php if($crmh->jns_kelamin == 1){echo "selected"; } ?> value="1">Laki-laki</option>
                          <option <?php if($crmh->jns_kelamin == 2){echo "selected"; } ?> value="2">Wanita</option>
                        </select>
                        <?php echo form_error('jns_kelamin');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Nomor Passport</label>
                        <input type="text" class="form-control" name="no_paspor" value="<?php echo $crmh->no_paspor;?>">
                        <?php echo form_error('no_paspor');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tmp_lhr" value="<?php echo $crmh->tmp_lhr;?>">
                        <?php echo form_error('tmp_lhr');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $crmh->tgl_lhr;?>">
                        <?php echo form_error('tgl_lhr');?>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Provinsi</label>
                        <select class="form-control" name="id_provinsi" id="provinsi">
                          <option>Pilih . .</option>
                          <?php foreach($dt_provinsi as $provinsi){?>
                          <option <?php if($crmh->id_provinsi === $provinsi->id_provinsi){echo "selected"; } ?> value="<?php echo $provinsi->id_provinsi;?>"><?php echo $provinsi->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Kabupaten</label>
                        <select class="form-control" name="id_kabupaten" id="kabupaten">
                          <?php foreach($dt_kabupaten as $kabupaten){?>
                          <option <?php if($crmh->id_kabupaten === $kabupaten->id_kabupaten){echo "selected"; } ?> value="<?php echo $kabupaten->id_kabupaten;?>"><?php echo $kabupaten->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Kecamatan</label>
                        <select class="form-control" name="id_kecamatan" id="kecamatan">
                          <?php foreach($dt_kecamatan as $kecamatan){?>
                          <option <?php if($crmh->id_kecamatan === $kecamatan->id_kecamatan){echo "selected"; } ?> value="<?php echo $kecamatan->id_kecamatan;?>"><?php echo $kecamatan->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Kelurahan</label>
                        <select class="form-control" name="id_kelurahan" id="kelurahan">
                          <?php foreach($dt_kelurahan as $kelurahan){?>
                          <option <?php if($crmh->id_kelurahan === $kelurahan->id_kelurahan){echo "selected"; } ?> value="<?php echo $kelurahan->id_kelurahan;?>"><?php echo $kelurahan->nama;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Alamat Penceramah</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="almt_penceramah"><?php echo $crmh->almt_penceramah;?></textarea>
                      </div>
                    </div>
                </fieldset><br>
                <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/binsyar/dataekspor') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
              </form>
            </div>

            <!--Data Lampiran-->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <form method="post" action="<?php echo site_url('users/binsyar/simpanedit_ekspor_lampiran');?>" enctype="multipart/form-data">
                <fieldset>
                  <input type="hidden" name="id" value="<?php echo $lampiran->id;?>">
                  <input type="hidden" name="id_layanan" value="<?php echo $lampiran->id_layanan;?>">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">Surat Permohonan</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->surat_permohonan_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="surat_permohonan_luar">
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">Proposal</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->proposal_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="proposal_luar">
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">CV Penceramah</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->cv_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="cv_crmh_luar">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">FC Pasport Penceramah</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->pasp_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pasp_crmh_luar">
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">FC Passport Pengundang</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->pasp_pengundang_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pasp_pengundang_luar">
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">Pas Foto Penceramah</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->pas_foto_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pas_foto_crmh_luar">
                      </div>
                    </div>
                </fieldset><br>
                <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/binsyar/dataekspor') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
              </form>
            </div>
          </div>

        </div><!--widget-bg-->
    </div>
</div>