<form method="post" action="<?php echo site_url('operator/binsyar/simpan_formuser');?>" enctype="multipart/form-data">
<!-- Kumpulan inputan di hidden -->
<input type="hidden" name="id_stat" value="1" />
<input type="hidden" name="jenis_layanan" value="<?php //echo $jenis_layanan[0]->id;?>" />
<input type="hidden" name="id" value="<?php //echo $id_dtlayanan->id;?>" />
<input type="hidden" name="id_user" value="<?php //echo $id_session->id;?>" />
<input type="hidden" name="syscreatedate" value="<?php //echo date('Y-m-d h:i:s');?>">

<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
          
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
        <!-- <p><?php //echo $this->session->flashdata('msg');?></p><br> -->
            <fieldset>
              <legend>Data Pemohon :</legend>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>ID User</label>
                  <input type="text" class="form-control" name="id_formulir" value="<?php echo $id_register[0]->kode.'.';?><?php echo $id_layanan->id + 1;?>" readonly>
                </div>
                <div class="form-group col-md-3">
                  <label>User Group</label>
                  <input type="text" class="form-control" name="nik" value="<?php echo $id_session->nik;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Username</label>
                  <input type="text" class="form-control" name="fullname" value="<?php echo $id_session->fullname;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Password</label>
                  <input type="text" class="form-control" name="fullname" value="<?php echo $id_session->fullname;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>NIK KTP</label>
                  <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $id_session->tgl_lhr;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="telp" value="<?php echo $id_session->telp;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Lahir</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $id_session->email;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $id_session->email;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Provinsi</label>
                  <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $id_session->tgl_lhr;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Kabupaten</label>
                  <input type="text" class="form-control" name="telp" value="<?php echo $id_session->telp;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Kecamatan</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $id_session->email;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Kelurahan</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $id_session->email;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $id_session->tgl_lhr;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $id_session->tgl_lhr;?>">
                </div>
                <div class="form-group col-md-4">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" name="tgl_lhr" value="<?php echo $id_session->tgl_lhr;?>">
                </div>
                <div class="form-group col-md-4">
                  <label>Photo</label>
                  <input e" class="form-control" name="tgl_lhr" value="<?php echo $id_session->tgl_lhr;?>">
                </div>
              </div>
          </fieldset><br>

          <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>KIRIM DATA</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('operator/binsyar/datauser') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>

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