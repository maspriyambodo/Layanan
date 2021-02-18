<form method="post" action="<?php echo site_url('operator/simpan_edituser');?>" enctype="multipart/form-data">
<!-- Kumpulan inputan di hidden -->
<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
          
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <fieldset>
              <legend>Data User :</legend>
                <input type="hidden" class="form-control" name="id" value="<?php echo $users->id;?>">
                <input type="hidden" class="form-control" name="modified" value="<?php echo date('Y-m-d H:i:s');?>">
                <input type="hidden" class="form-control" name="modified_by" value="<?php echo $biodata->fullname;?>">

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>User Group</label>
                  <select class="form-control" name="role_id">
                    <option value="">Pilih . .</option>
                    <?php foreach($role_user as $data){?>
                      <option <?php if($users->role_id === $data->id){echo "selected"; } ?> value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
                    <?php }?>
                  </select>
                  <?php echo form_error('role_id',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $users->username;?>">
                  <?php echo form_error('username',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" value="">
                  <input type="hidden" class="form-control" name="re_password" value="<?php echo $users->re_password;?>">
                  <?php echo form_error('password',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $users->email;?>">
                  <?php echo form_error('email',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="nik" value="<?php echo $users->nik;?>">
                  <?php echo form_error('nik',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="fullname" value="<?php echo $users->fullname;?>">
                  <?php echo form_error('fullname',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" name="tgl_lhr" placeholder="dd-mm-yyyy" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?php echo $users->tgl_lhr;?>">
                  <?php echo form_error('tgl_lhr',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Telepon</label>
                  <input type="text" class="form-control" name="telp" value="<?php echo $users->telp;?>">
                  <?php echo form_error('telp',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Provinsi</label>
                  <select class="form-control" name="id_provinsi" id="provinsi">
                    <option>Pilih . .</option>
                    <?php foreach($provinsi as $provinsi){?>
                      <option <?php if($users->id_provinsi === $provinsi->id_provinsi){echo "selected"; } ?> value="<?php echo $provinsi->id_provinsi;?>"><?php echo $provinsi->nama;?></option>
                    <?php }?>
                  </select>
                  <?php echo form_error('id_provinsi',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Kabupaten</label>
                  <select class="form-control" name="id_kabupaten" id="kabupaten">
                    <?php foreach($kabupaten as $kabupaten){?>
                      <option <?php if($users->id_kabupaten === $kabupaten->id_kabupaten){echo "selected"; } ?> value="<?php echo $kabupaten->id_kabupaten;?>"><?php echo $kabupaten->nama;?></option>
                    <?php }?>
                  </select>
                  <?php echo form_error('id_kabupaten',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Kecamatan</label>
                  <select class="form-control" name="id_kecamatan" id="kecamatan">
                    <?php foreach($kecamatan as $kecamatan){?>
                      <option <?php if($users->id_kecamatan === $kecamatan->id_kecamatan){echo "selected"; } ?> value="<?php echo $kecamatan->id_kecamatan;?>"><?php echo $kecamatan->nama;?></option>
                    <?php }?>
                  </select>
                  <?php echo form_error('id_kecamatan',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Kelurahan</label>
                  <select class="form-control" name="id_kelurahan" id="kelurahan">
                    <?php foreach($kelurahan as $kelurahan){?>
                      <option <?php if($users->id_kelurahan === $kelurahan->id_kelurahan){echo "selected"; } ?> value="<?php echo $kelurahan->id_kelurahan;?>"><?php echo $kelurahan->nama;?></option>
                    <?php }?>
                  </select>
                  <?php echo form_error('id_kelurahan',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Alamat Lengkap</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?php echo $users->alamat;?></textarea>
                  <?php echo form_error('alamat',"<div style='color:red'>","</div>");?>
                </div>
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Instansi :</legend>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Nama Kepala</label>
                  <input type="text" class="form-control" name="nama_kepala" value="<?php echo $users->nama_kepala;?>">
                  <?php echo form_error('nama_kepala',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Nip Kepala</label>
                  <input type="text" class="form-control" name="nip_kepala" value="<?php echo $users->nip_kepala;?>">
                  <?php echo form_error('nip_kepala',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="occupation" value="<?php echo $users->occupation;?>">
                  <?php echo form_error('occupation',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-3">
                  <label>Foto User</label>
                  <div style="width:100px; height: 100px; background-color: #ccc;">
                      <img src="<?php echo base_url();?>assets/uploads/users/<?php echo $users->img_photo;?>">
                  </div><br>
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