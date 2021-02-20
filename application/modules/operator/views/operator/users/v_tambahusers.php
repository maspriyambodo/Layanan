<form method="post" action="<?php echo site_url('operator/simpan_formuser');?>" enctype="multipart/form-data">
<!-- Kumpulan inputan di hidden -->
<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
          
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <fieldset>
              <legend>Data User :</legend>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>ID User</label>
                  <input type="text" class="form-control" value="<?php echo $last_id_user->id+1;?>" readonly>
                  <input type="hidden" class="form-control" name="created" value="<?php echo date('Y-m-d H:i:s');?>">
                  <input type="hidden" class="form-control" name="created_by" value="<?php echo $biodata->fullname;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>User Group</label>
                  <select class="form-control" name="role_id">
                    <option value="">Pilih . .</option>
                    <?php foreach($role_user as $data){?>
                    <option value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
                    <?php }?>
                  </select>
                  <?php echo form_error('role_id',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username">
                  <?php echo form_error('username',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password">
                  <?php echo form_error('password',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email">
                  <?php echo form_error('email',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="nik">
                  <?php echo form_error('nik',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="fullname">
                  <?php echo form_error('fullname',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" name="tgl_lhr" placeholder="dd-mm-yyyy" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                  <?php echo form_error('tgl_lhr',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Telepon</label>
                  <input type="text" class="form-control" name="telp">
                  <?php echo form_error('telp',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Provinsi</label>
                  <select class="form-control" name="id_provinsi" id="provinsi">
                    <option>Pilih . .</option>
                    <?php foreach($provinsi as $provinsi){?>
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
                  <label>Kecamatan</label>
                  <select class="form-control" name="id_kecamatan" id="kecamatan">
                    <option value="">Pilih . .</option>
                  </select>
                  <?php echo form_error('id_kecamatan',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Kelurahan</label>
                  <select class="form-control" name="id_kelurahan" id="kelurahan">
                    <option value="">Pilih . .</option>
                  </select>
                  <?php echo form_error('id_kelurahan',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Alamat Lengkap</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
                  <?php echo form_error('alamat',"<div style='color:red'>","</div>");?>
                </div>
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Instansi :</legend>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Nama Kepala</label>
                  <input type="text" class="form-control" name="nama_kepala">
                  <?php echo form_error('nama_kepala',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Nip Kepala</label>
                  <input type="text" class="form-control" name="nip_kepala">
                  <?php echo form_error('nip_kepala',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="occupation">
                  <?php echo form_error('occupation',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Foto User</label>
                  <input type="file" class="form-control" name="img_photo">
                  <?php echo form_error('img_photo',"<div style='color:red'>","</div>");?>
                </div>
              </div>
          </fieldset>

          <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>KIRIM DATA</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('operator/users/datauser') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
        </div>
    </div>
</div>
</form>