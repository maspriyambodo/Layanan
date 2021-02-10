<form method="post" action="<?php echo site_url('users/binsyar/simpan_formc');?>" enctype="multipart/form-data">
<!-- Kumpulan inputan di hidden -->
<input type="hidden" name="id_stat" value="1" />
<input type="hidden" name="jenis_layanan" value="<?php echo $jenis_layanan[0]->id;?>" />
<input type="hidden" name="id" value="<?php echo $id_dtlayanan->id;?>" />
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
              <legend>Data Penceramah :</legend>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Nama Penceramah</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="btn-reset-form" style="background-color: #000; border: 1px solid #000; color: white;">Hapus</button>
                      <button class="btn btn-outline-secondary btn-primary" type="button" id="btn-tambah-form">Tambah Penceramah</button>
                    </div>
                    <input type="text" class="form-control" name="narsum[]" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    <?php echo form_error('narsum',"<div style='color:red'>","</div>");?>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend" id="insert-form">
                      <div ></div>
                    </div>
                    <input type="hidden" id="jumlah-form" value="1" class="form-control" aria-describedby="basic-addon1" placeholder="Masukkan Nama Penceramah . .">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="jen_kel">
                    <option>Pilih . .</option>
                    <option value="1">Laki-Laki</option>
                    <option value="2">Wanita</option>
                  </select>
                  <?php echo form_error('jen_kel',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" name="tmp_lhr">
                  <?php echo form_error('tmp_lhr',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" name="tgl_lhr" placeholder="dd-mm-yyyy" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                  <?php echo form_error('tgl_lhr',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>No. Passport</label>
                  <input type="number" class="form-control" name="no_pass">
                  <?php echo form_error('no_pass',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-6">
                  <label>Negara Asal</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="neg_keg">
                    <option>Pilih . .</option>
                    <option value="1">Indonesia</option>
                    <option value="2">Malaysia</option>
                    <option value="3">Singapura</option>
                    <option value="4">Thailand</option>
                    <option value="5">India</option>
                    <option value="6">Myanmar</option>
                    <option value="7">Jepang</option>
                    <option value="8">Inggris</option>
                    <option value="9">Amerika Serikat</option>
                    <option value="10">Rusia</option>
                  </select>
                  <?php echo form_error('neg_keg',"<div style='color:red'>","</div>");?>
                </div>
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Kegiatan :</legend>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" name="nm_keg">
                  <?php echo form_error('nm_keg',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>Tanggal Awal Pelaksanaan</label>
                  <input type="text" class="form-control" name="tgl_awal_keg" placeholder="dd-mm-yyyy" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                  <?php echo form_error('tgl_awal_keg',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-4">
                  <label>Tanggal Akhir Pelaksanaan</label>
                  <input type="text" class="form-control" name="tgl_akhir_keg" placeholder="dd-mm-yyyy" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                  <?php echo form_error('tgl_akhir_keg',"<div style='color:red'>","</div>");?>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Estimasi Jumlah Jamaah</label>
                  <input type="number" class="form-control" name="esti_keg">
                  <?php echo form_error('esti_keg',"<div style='color:red'>","</div>");?>
                </div>
                <div class="form-group col-md-6">
                  <label>Nama Lembaga</label>
                  <input type="text" class="form-control" name="lemb_keg">
                  <?php echo form_error('lemb_keg',"<div style='color:red'>","</div>");?>
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
          </fieldset><br>

          <fieldset>
              <legend>Data Lampiran Dokumen :</legend>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label style="margin-bottom: 10px;">Dokumen Pendukung (Surat Permohonan, Proposal, CV Penceramah, FC Passport Penceramah, Scan KTP, Pas Foto Penceramah)</label>
                  <input type="hidden" name="id_layanan" value="<?php echo $id_dtlayanan->id+1;?>" />
                  <?php for ($i=1; $i <=6 ; $i++) :?>
                  <input type="file" class="form-control-file" name="files<?php echo $i;?>" required><br>
                  <?php endfor;?>
                  <?php echo form_error('nama_file',"<div style='color:red'>","</div>");?>
                </div>
              </div>
          </fieldset><br>

          <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>KIRIM DATA</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/binsyar/datapermohonan') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>

        </div>
    </div>
</div>
</form>

{JS START}
<script type="text/javascript">

var Page = {};
Page.FormMode = ko.observable("<?php echo $formMode; ?>")
Page.Cek = $('#formKabupaten').cek();
Page.FormData = ko.observable({
    id_provinsi : ko.observable(""),
    id_kabupaten : ko.observable(""),
    nama : ko.observable(""),
});
Page.Save = function(e){
    $('#btnSave').attr('disabled', 'disabled');
    var isValid = Page.Cek.monggo();
    if(!isValid) { 
        swal(
                'Error',
                'Mohon lengkapi semua field!',
                'warning'
            );
      $('#btnSave').removeAttr('disabled');
      return;
    } else {
      App.IsLoading(true);
      e.preventDefault();
      var url = '<?php echo site_url("datamaster/address/save_kabupaten") ?>';
      var dataKab = ko.mapping.toJS(Page.FormData());
      dataKab.id_provinsi = $("#dd_province").val();
      var formData = new FormData();
      formData.append("formData", JSON.stringify(dataKab));
      formData.append("formMode", "<?php echo $formMode; ?>");

      $.ajax({
        url: url,
        data: formData,
        method: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          if(data.success) {
            $('#btnSave').removeAttr('disabled');
            swal(
                'Saved!',
                'Data sukses disimpan!',
                'success'
            ).then(function(result){
              window.location.href = '<?php echo site_url("datamaster/address/kabupaten"); ?>';
            });
          } else {
            $('#btnSave').removeAttr('disabled');
            swal(
                'Error saving data!',
                data.message,
                'warning'
            );
          }
          App.IsLoading(false);
        }
      });
      e.stopImmediatePropagation();
      return false;
    }
}

function getRekomendasiKode() {
    $.ajax({
        url: "<?php echo site_url("datamaster/address/getRekomendasiKodeKabupaten") ?>"+"/"+$("#dd_province").val(),
        data: "",
        method: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            Page.FormData().kabupaten_kode(data.data);
        }
      });
}

Page.PopulateMasterProvince = function(urlProv) {
    // console.log("PopulateMasterProvince")
    $.ajax({
        url: urlProv,
        data: {},
        method: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data.success) {
                $("#dd_province").select2("destroy")
                $("#dd_province").select2({
                    data: data.data,
                    placeholder: "Pilih Provinsi"
                });
                if (Page.FormData().id_provinsi() != 0){
                    $("#dd_province").val(Page.FormData().id_provinsi());
                    $("#dd_province").select2().trigger("change");
                }
                <?php if($formMode == "edit") : ?>
                    $("#dd_province"). prop("disabled", true);
                <?php else: ?>
                $("#dd_province").select2().on("change", function(){
                    getRekomendasiKode();
                });
                setTimeout(function() {
                    getRekomendasiKode();
                }, 500)
                <?php endif; ?>
            } else {
                swal(
                    'Error getting province master data!',
                    data.message,
                    'warning'
                );
            }
        }
    });
}

$(function() { 
    <?php if($formMode == "edit"): ?>
        var dataKab = <?php echo $dataKabupaten; ?>;
        Page.FormData(ko.mapping.fromJS(dataKab));
    <?php endif; ?>
    Page.Cek.dong();
    $("#dd_province").select2({});
    Page.PopulateMasterProvince("<?php echo site_url("datamaster/address/populateProvinces") ?>","<?php echo site_url("datamaster/address/populateCities") ?>","<?php echo site_url("datamaster/address/populateDistricts") ?>");
});
</script>
{JS END}