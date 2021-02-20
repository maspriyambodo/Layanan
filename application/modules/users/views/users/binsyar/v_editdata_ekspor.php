<<<<<<< HEAD
<form method="post" action="<?php echo site_url('');?>" enctype="multipart/form-data">
<!-- Kumpulan inputan di hidden -->
<!-- <input type="hidden" name="id_stat" value="1" />
<input type="hidden" name="jenis_layanan" value="<?php echo $jenis_layanan[0]->id;?>" />
<input type="hidden" name="id" value="<?php echo $id_dtlayanan->id;?>" />
<input type="hidden" name="id_user" value="<?php echo $id_session->id;?>" />
<input type="hidden" name="syscreatedate" value="<?php echo date('Y-m-d h:i:s');?>"> -->
<input type="hidden" name="id" value="<?php echo $dataku[0]->id;?>" />

=======
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
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
<<<<<<< HEAD
                      <div class="form-group col-md-4">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?php echo $dataku[0]->nik;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $dataku[0]->fullname;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Jenis Layanan</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $dataku[0]->jenis_layanan;?>" readonly>
=======
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
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Tanggal Lahir</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $dataku[0]->tgl_lhr;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telp" value="<?php echo $dataku[0]->telp;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $dataku[0]->email;?>" readonly>
=======
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $pemohon->tgl_lhr;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telp" value="<?php echo $pemohon->telp;?>" readonly>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $pemohon->email;?>" readonly>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                      </div>
                    </div>
                </fieldset><br>
                <!-- <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
                <button type="button" id="btnCancel" onclick="document.location.href='<?php //echo site_url('users/binsyar/datapermohonan') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button> -->
              </form>
            </div>
            <!--Data Kegiatan-->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<<<<<<< HEAD
              <form action="<?php echo site_url('users/binsyar/simpanedit_ekspor');?>" method="post">
                <fieldset>
=======
              <form action="<?php echo site_url('users/binsyar/simpanedit_ekspor_kegiatan');?>" method="post">
                <fieldset>
                  <input type="hidden" name="id" value="<?php echo $kegiatan->id;?>">
                  <input type="hidden" name="id_layanan" value="<?php echo $kegiatan->id_layanan;?>">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                    <!-- <legend>Data Kegiatan :</legend> -->
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Nama Kegiatan</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="nm_keg" value="<?php echo $dataku[1]->nm_keg;?>">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $dataku[1]->id;?>">
                        <input type="hidden" class="form-control" name="id_layanan" value="<?php echo $dataku[1]->id_layanan;?>">
                        <input type="hidden" class="form-control" name="sysupdatedate" value="<?php echo date('Y-m-d h:i:s');?>">
=======
                        <input type="text" class="form-control" name="nm_keg" value="<?php echo $kegiatan->nm_keg;?>">
                        <?php echo form_error('nm_keg');?>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
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
<<<<<<< HEAD
=======
                          <?php echo form_error('code_negara');?>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
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
<<<<<<< HEAD
                      <div class="form-group col-md-3">
                        <label>Nama Penceramah</label>
                        <?php
                        if(empty($dataku[2]->narsum)){
                          echo "<input type='text' class='form-control' readonly>";
                        }else{
                          echo "<input type='text' class='form-control' name='narsum[]' value='".$dataku[2]->narsum."'>";
                          echo "<input type='hidden' name='id[]'' value='".$dataku[2]->id."'>";
                          echo "<input type='hidden' name='id_layanan[]'' value='".$dataku[2]->id_layanan."'>";
                        }
                        ?>
                      </div>

                      <div class="form-group col-md-3">
                        <label>Nama Penceramah</label>
                        <?php
                        if(empty($dataku[3]->narsum)){
                          echo "<input type='text' class='form-control' readonly>";
                        }else{
                          echo "<input type='text' class='form-control' name='narsum[]' value='".$dataku[3]->narsum."'>";
                          echo "<input type='hidden' name='id[]'' value='".$dataku[3]->id."'>";
                          echo "<input type='hidden' name='id_layanan[]'' value='".$dataku[3]->id_layanan."'>";
                        }
                        ?>
                      </div>

                      <div class="form-group col-md-3">
                        <label>Nama Penceramah</label>
                        <?php
                        if(empty($dataku[4]->narsum)){
                          echo "<input type='text' class='form-control' readonly>";
                        }else{
                          echo "<input type='text' class='form-control' name='narsum[]' value='".$dataku[4]->narsum."'>";
                          echo "<input type='hidden' name='id[]'' value='".$dataku[4]->id."'>";
                          echo "<input type='hidden' name='id_layanan[]'' value='".$dataku[4]->id_layanan."'>";
                        }
                        ?>
                      </div>

                      <div class="form-group col-md-3">
                        <label>Nama Penceramah</label>
                        <?php
                        if(empty($dataku[5]->narsum)){
                          echo "<input type='text' class='form-control' readonly>";
                        }else{
                          echo "<input type='text' class='form-control' name='narsum[]' value='".$dataku[5]->narsum."'>";
                          echo "<input type='hidden' name='id[]'' value='".$dataku[5]->id."'>";
                          echo "<input type='hidden' name='id_layanan[]'' value='".$dataku[5]->id_layanan."'>";
                        }
                        ?>
                      </div>
=======
                      <?php foreach($crmh_array as $data){?>
                      <div class="form-group col-md-3">
                        <label>Nama Penceramah</label>
                        <input type="hidden" name="id[]" value="<?php echo $data->id;?>">
                        <input type="hidden" name="id_layanan[]" value="<?php echo $data->id_layanan;?>">
                        <input type="text" class="form-control" name="narsum[]" value="<?php echo $data->narsum;?>">
                      </div>
                      <?php }?>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jns_kelamin">
<<<<<<< HEAD
                          <option <?php if($dataku[2]->jns_kelamin == 1){echo "selected"; } ?> value="1">Laki-laki</option>
                          <option <?php if($dataku[2]->jns_kelamin == 2){echo "selected"; } ?> value="2">Wanita</option>
=======
                          <option <?php if($crmh->jns_kelamin == 1){echo "selected"; } ?> value="1">Laki-laki</option>
                          <option <?php if($crmh->jns_kelamin == 2){echo "selected"; } ?> value="2">Wanita</option>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                        </select>
                        <?php echo form_error('jns_kelamin');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Nomor Passport</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="no_paspor" value="<?php echo $dataku[2]->no_paspor;?>">
=======
                        <input type="text" class="form-control" name="no_paspor" value="<?php echo $crmh->no_paspor;?>">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                        <?php echo form_error('no_paspor');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Tempat Lahir</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="tmp_lhr" value="<?php echo $dataku[2]->tmp_lhr;?>">
=======
                        <input type="text" class="form-control" name="tmp_lhr" value="<?php echo $crmh->tmp_lhr;?>">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                        <?php echo form_error('tmp_lhr');?>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Tanggal Lahir</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $dataku[2]->tgl_lhr;?>">
=======
                        <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $crmh->tgl_lhr;?>">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                        <?php echo form_error('tgl_lhr');?>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Provinsi</label>
                        <select class="form-control" name="id_provinsi" id="provinsi">
                          <option>Pilih . .</option>
                          <?php foreach($dt_provinsi as $provinsi){?>
<<<<<<< HEAD
                          <option <?php if($dataku[2]->id_provinsi === $provinsi->id_provinsi){echo "selected"; } ?> value="<?php echo $provinsi->id_provinsi;?>"><?php echo $provinsi->nama;?></option>
=======
                          <option <?php if($crmh->id_provinsi === $provinsi->id_provinsi){echo "selected"; } ?> value="<?php echo $provinsi->id_provinsi;?>"><?php echo $provinsi->nama;?></option>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label>Kabupaten</label>
                        <select class="form-control" name="id_kabupaten" id="kabupaten">
                          <?php foreach($dt_kabupaten as $kabupaten){?>
<<<<<<< HEAD
                          <option <?php if($dataku[2]->id_kabupaten === $kabupaten->id_kabupaten){echo "selected"; } ?> value="<?php echo $kabupaten->id_kabupaten;?>"><?php echo $kabupaten->nama;?></option>
=======
                          <option <?php if($crmh->id_kabupaten === $kabupaten->id_kabupaten){echo "selected"; } ?> value="<?php echo $kabupaten->id_kabupaten;?>"><?php echo $kabupaten->nama;?></option>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputEmail4">Kecamatan</label>
                        <select class="form-control" name="id_kecamatan" id="kecamatan">
                          <?php foreach($dt_kecamatan as $kecamatan){?>
<<<<<<< HEAD
                          <option <?php if($dataku[2]->id_kecamatan === $kecamatan->id_kecamatan){echo "selected"; } ?> value="<?php echo $kecamatan->id_kecamatan;?>"><?php echo $kecamatan->nama;?></option>
=======
                          <option <?php if($crmh->id_kecamatan === $kecamatan->id_kecamatan){echo "selected"; } ?> value="<?php echo $kecamatan->id_kecamatan;?>"><?php echo $kecamatan->nama;?></option>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                          <?php }?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Kelurahan</label>
                        <select class="form-control" name="id_kelurahan" id="kelurahan">
                          <?php foreach($dt_kelurahan as $kelurahan){?>
<<<<<<< HEAD
                          <option <?php if($dataku[2]->id_kelurahan === $kelurahan->id_kelurahan){echo "selected"; } ?> value="<?php echo $kelurahan->id_kelurahan;?>"><?php echo $kelurahan->nama;?></option>
=======
                          <option <?php if($crmh->id_kelurahan === $kelurahan->id_kelurahan){echo "selected"; } ?> value="<?php echo $kelurahan->id_kelurahan;?>"><?php echo $kelurahan->nama;?></option>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                          <?php }?>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Alamat Penceramah</label>
<<<<<<< HEAD
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="almt_penceramah"><?php echo $dataku[2]->almt_penceramah;?></textarea>
=======
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="almt_penceramah"><?php echo $crmh->almt_penceramah;?></textarea>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
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
<<<<<<< HEAD
=======
                  <input type="hidden" name="id" value="<?php echo $lampiran->id;?>">
                  <input type="hidden" name="id_layanan" value="<?php echo $lampiran->id_layanan;?>">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">Surat Permohonan</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
<<<<<<< HEAD
                          <img src="<?php echo base_url().$dataku[3]->surat_permohonan_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="surat_permohonan_luar" value="<?php echo $dataku[3]->surat_permohonan_luar;?>">
                        <input type="hidden" class="form-control-file" name="id" value="<?php echo $dataku[3]->id;?>">
                        <input type="hidden" class="form-control-file" name="id_layanan" value="<?php echo $dataku[3]->id_layanan;?>">
=======
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->surat_permohonan_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="surat_permohonan_luar">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">Proposal</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
<<<<<<< HEAD
                          <img src="<?php echo base_url().$dataku[3]->proposal_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="proposal_luar" value="<?php echo $dataku[3]->proposal_luar;?>">
=======
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->proposal_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="proposal_luar">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">CV Penceramah</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
<<<<<<< HEAD
                          <img src="<?php echo base_url().$dataku[3]->cv_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="cv_crmh_luar" value="<?php echo $dataku[3]->cv_crmh_luar;?>">
=======
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->cv_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="cv_crmh_luar">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">FC Pasport Penceramah</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
<<<<<<< HEAD
                          <img src="<?php echo base_url().$dataku[3]->pasp_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pasp_crmh_luar" value="<?php echo $dataku[3]->pasp_crmh_luar;?>">
=======
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->pasp_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pasp_crmh_luar">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">FC Passport Pengundang</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
<<<<<<< HEAD
                          <img src="<?php echo base_url().$dataku[3]->pasp_pengundang_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pasp_pengundang_luar" value="<?php echo $dataku[3]->pasp_pengundang_luar;?>">
=======
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->pasp_pengundang_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pasp_pengundang_luar">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
                      </div>

                      <div class="form-group col-md-4">
                        <label style="margin-bottom: 10px;">Pas Foto Penceramah</label>
                        <div style="width:100px; height: 100px; background-color: #ccc;">
<<<<<<< HEAD
                          <img src="<?php echo base_url().$dataku[3]->pas_foto_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pas_foto_crmh_luar" value="<?php echo $dataku[3]->pas_foto_crmh_luar;?>">
=======
                          <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $lampiran->pas_foto_crmh_luar;?>">
                        </div><br>
                        <input type="file" class="form-control-file" name="pas_foto_crmh_luar">
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
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
<<<<<<< HEAD
</div>
</form>
=======
</div>
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
