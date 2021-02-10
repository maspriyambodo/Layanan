<form method="post" action="<?php echo site_url('users/binsyar/simpan_editA');?>" enctype="multipart/form-data">
<!-- Kumpulan inputan di hidden -->
<!-- <input type="hidden" name="id_stat" value="1" />
<input type="hidden" name="jenis_layanan" value="<?php echo $jenis_layanan[0]->id;?>" />
<input type="hidden" name="id" value="<?php echo $id_dtlayanan->id;?>" />
<input type="hidden" name="id_user" value="<?php echo $id_session->id;?>" />
<input type="hidden" name="syscreatedate" value="<?php echo date('Y-m-d h:i:s');?>"> -->
<input type="hidden" name="id" value="<?php echo $dataku[0]->id;?>" />

<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
          
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <fieldset>
              <legend>Data Pemohon :</legend>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="nik" value="<?php echo $dataku[0]->nik;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="fullname" value="<?php echo $dataku[0]->fullname;?>" readonly>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $dataku[0]->tgl_lhr;?>" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" class="form-control" name="telp" value="<?php echo $dataku[0]->telp;?>" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $dataku[0]->email;?>" readonly>
                </div>
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Kegiatan :</legend>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Nama Penceramah</label>
                  <?php
                  if(empty($dataku[1]->narsum)){
                    echo "<input type='text' class='form-control' readonly>";
                  }else{
                    echo "<input type='text' class='form-control' name='narsum[]' value='".$dataku[1]->narsum."'>";
                  }
                  ?>
                </div>

                <div class="form-group col-md-3">
                  <label>Nama Penceramah</label>
                  <?php
                  if(empty($dataku[2]->narsum)){
                    echo "<input type='text' class='form-control' readonly>";
                  }else{
                    echo "<input type='text' class='form-control' name='narsum[]' value='".$dataku[2]->narsum."'>";
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
                  }
                  ?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" name="nm_keg" value="<?php echo $dataku[0]->nm_keg;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Awal Kegiatan</label>
                  <input type="text" class="form-control" name="tgl_awal_keg" placeholder="dd-mm-yyyy" onclick="this.type='date'" onmouseout="timeFunctionLong(this)" value="<?php echo $dataku[0]->tgl_awal_keg;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Akhir Kegiatan</label>
                  <input type="text" class="form-control" name="tgl_akhir_keg" placeholder="dd-mm-yyyy" onclick="this.type='date'" onmouseout="timeFunctionLong(this)" value="<?php echo $dataku[0]->tgl_akhir_keg;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Estimasi Jumlah Jamaah</label>
                  <input type="text" class="form-control" name="esti_keg" value="<?php echo $dataku[0]->esti_keg;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Provinsi</label>
                  <select class="form-control" name="id_provinsi" id="provinsi">
                    <option>Pilih . .</option>
                    <?php foreach($dt_provinsi as $provinsi){?>
                    <option <?php if($dataku[0]->id_provinsi === $provinsi->id_provinsi){echo "selected"; } ?> value="<?php echo $provinsi->id_provinsi;?>"><?php echo $provinsi->nama;?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Kabupaten</label>
                  <select class="form-control" name="id_kabupaten" id="kabupaten">
                    <?php foreach($dt_kabupaten as $kabupaten){?>
                    <option <?php if($dataku[0]->id_kabupaten === $kabupaten->id_kabupaten){echo "selected"; } ?> value="<?php echo $kabupaten->id_kabupaten;?>"><?php echo $kabupaten->nama;?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Kecamatan</label>
                  <select class="form-control" name="id_kecamatan" id="kecamatan">
                    <?php foreach($dt_kecamatan as $kecamatan){?>
                    <option <?php if($dataku[0]->id_kecamatan === $kecamatan->id_kecamatan){echo "selected"; } ?> value="<?php echo $kecamatan->id_kecamatan;?>"><?php echo $kecamatan->nama;?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Kelurahan</label>
                  <select class="form-control" name="id_kelurahan" id="kelurahan">
                    <?php foreach($dt_kelurahan as $kelurahan){?>
                    <option <?php if($dataku[0]->id_kelurahan === $kelurahan->id_kelurahan){echo "selected"; } ?> value="<?php echo $kelurahan->id_kelurahan;?>"><?php echo $kelurahan->nama;?></option>
                    <?php }?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Lokasi Kegiatan</label>
                  <input type="text" class="form-control" name="alamat_keg" value="<?php echo $dataku[0]->alamat_keg;?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Lembaga Penyelenggara</label>
                  <input type="text" class="form-control" name="lemb_keg" value="<?php echo $dataku[0]->lemb_keg;?>">
                </div>
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Lampiran Dokumen :</legend>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label style="margin-bottom: 10px;">Dokumen Pendukung KTP</label>
                  <div style="width:100px; height: 100px; background-color: #ccc;">
                    <img src="<?php echo base_url().$dataku[3]->ktp;?>">
                  </div><br>
                  <input type="file" class="form-control-file" name="ktp">
                </div>

                <div class="form-group col-md-4">
                  <label style="margin-bottom: 10px;">Dokumen Pendukung Proposal Kegiatan</label>
                  <div style="width:100px; height: 100px; background-color: #ccc;">
                    <img src="<?php echo base_url().$dataku[3]->proposal_keg;?>">
                  </div><br>
                  <input type="file" class="form-control-file" name="proposal_keg">
                </div>

                <div class="form-group col-md-4">
                  <label style="margin-bottom: 10px;">Dokumen Pendukung Surat Permohonan Rekomendasi</label>
                  <div style="width:100px; height: 100px; background-color: #ccc;">
                    <img src="<?php echo base_url().$dataku[3]->surat_permohonan_keg;?>">
                  </div><br>
                  <input type="file" class="form-control-file" name="surat_permohonan_keg">
                </div>
              </div>
          </fieldset><br>

          <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/binsyar/datapermohonan') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>

        </div>
    </div>
</div>
</form>

<script>
            $("#provinsi").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_kab'); ?>/" + $(this).val();
                    $('#kabupaten').load(url);
                    return true;
            });
            $("#kabupaten").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_kec'); ?>/" + $(this).val();
                    $('#kecamatan').load(url);
                    return true;
            });
            $("#kecamatan").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_kel'); ?>/" + $(this).val();
                    $('#kelurahan').load(url);
                    return true;
            });
            $("#kelurahan").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_des'); ?>/" + $(this).val();
                    $('#desa').load(url);
                    return true;
            });
    </script>