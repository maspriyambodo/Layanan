<form method="post" action="<?php echo site_url('users/zawaf/simpan_forma');?>" enctype="multipart/form-data">
<!-- Kumpulan inputan di hidden -->
<input type="hidden" name="id_stat" value="1" />
<input type="hidden" name="jenis_layanan" value="<?php echo $jenis_layanan[2]->id;?>" />
<input type="hidden" name="id_user" value="<?php echo $id_session->id;?>" />
<input type="hidden" name="syscreatedate" value="<?php echo date('Y-m-d h:i:s');?>">

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
                  <input type="text" class="form-control" name="nik" value="<?php echo $id_session->nik;?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="fullname" value="<?php echo $id_session->fullname;?>" readonly>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $id_session->tgl_lhr;?>" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" class="form-control" name="telp" value="<?php echo $id_session->telp;?>" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $id_session->email;?>" readonly>
                </div>
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Instansi :</legend>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Nama Instansi</label>
                  <input type="text" class="form-control" name="nm_instansi" autofocus>
                  <?php echo form_error('nm_instansi',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon Instansi</label>
                  <input type="text" class="form-control" name="telp_instansi">
                  <?php echo form_error('telp_instansi',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>Email Instansi</label>
                  <input type="text" class="form-control" name="email_instansi">
                  <?php echo form_error('email_instansi',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Provinsi</label>
                  <select class="form-control" name="id_provinsi" id="provinsi">
                    <option>Pilih . .</option>
                    <?php foreach($ambil_provinsi as $provinsi){?>
                    <option value="<?php echo $provinsi->id_provinsi;?>"><?php echo $provinsi->nama;?></option>
                    <?php }?>
                  </select>
                  <?php echo form_error('id_provinsi',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Kabupaten</label>
                  <select class="form-control" name="id_kabupaten" id="kabupaten">
                    <option value="">Pilih . .</option>
                  </select>
                  <?php echo form_error('id_kabupaten',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Kecamatan</label>
                  <select class="form-control" name="id_kecamatan" id="kecamatan">
                    <option value="">Pilih . .</option>
                  </select>
                  <?php echo form_error('id_kecamatan',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Kelurahan</label>
                  <select class="form-control" name="id_kelurahan" id="kelurahan">
                    <option value="">Pilih . .</option>
                  </select>
                  <?php echo form_error('id_kelurahan',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Alamat Lengkap Instansi</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="almt_instansi"></textarea>
                  <?php echo form_error('almt_instansi',"<div style='color:red'>","</div>");?>
                </div>
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Lampiran Dokumen :</legend>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Surat Permohonan Tertulis Untuk Menteri Agama</label>
                  <input type="hidden" name="id_layanan" value="<?php echo $id_dtlayanan->id+1;?>" />
                  <input type="file" class="form-control" name="srt_prmhn_tertulis_lkspwu">
                  <?php echo form_error('srt_prmhn_tertulis_lkspwu',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>Anggaran Dasar</label>
                  <input type="file" class="form-control" name="agrn_dsr_lkspwu">
                  <?php echo form_error('agrn_dsr_lkspwu',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>SK Badan Hukum</label>
                  <input type="file" class="form-control" name="sk_bdn_hkm_lkspwu">
                  <?php echo form_error('sk_bdn_hkm_lkspwu',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Surat Keterangan Domisili Usaha</label>
                  <input type="file" class="form-control" name="dmsl_ush_lkspwu">
                  <?php echo form_error('dmsl_ush_lkspwu',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Surat Keterangan Dibidang Keuangan Syariah</label>
                  <input type="file" class="form-control" name="suket_keuangan_lkspwu">
                  <?php echo form_error('suket_keuangan_lkspwu',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Memiliki Fungsi Menerima Titipan</label>
                  <input type="file" class="form-control" name="trm_ttpn_lkspwu">
                  <?php echo form_error('trm_ttpn_lkspwu',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Laporan Keuangan (Jumlah, Nilai, Hasil Wakaf)</label>
                  <input type="file" class="form-control" name="lprn_keuangan_lkspwu">
                  <?php echo form_error('lprn_keuangan_lkspwu',"<div style='color:red'>","</div>");?>
                </div>
              </div>
          </fieldset><br>

          <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>KIRIM DATA</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/zawaf/datalkspwu') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>

        </div>
    </div>
</div>
</form>