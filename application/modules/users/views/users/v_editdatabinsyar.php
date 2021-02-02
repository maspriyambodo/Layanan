<form id="formProvinsi" data-bind="with:Page.FormData">
<input type="hidden" name="id" data-bind="value:id" />

<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

          <fieldset>
              <legend>Data Pemohon :</legend>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Nama Lengkap</label>
                  <input type="text" data-bind="value:id_stat" id="id_stat" class="form-control" name="" required data-vindicate="required">
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" class="form-control" name="" readonly data-bind="value:telp">
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input type="text" class="form-control" name="" readonly data-bind="value:email">
                </div>
                <!-- <div class="form-group col-md-3">
                  <label for="inputEmail4">Telepon</label>
                  <input type="text" class="form-control" name="" readonly data-bind="value:fullname">
                </div> -->
              </div>
          </fieldset><br>

          <fieldset>
              <legend>Data Kegiatan :</legend>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Jenis Layanan</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="form-group col-md-3">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Awal Kegiatan</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Akhir Kegiatan</label>
                  <input type="text" class="form-control" name="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Lokasi Kegiatan</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="form-group col-md-4">
                  <label>Estimasi Jamaah</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Lembaga Penyelenggara</label>
                  <input type="text" class="form-control" name="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Provinsi</label>
                  <select class="form-control" name="">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Kabupaten</label>
                  <select class="form-control" name="">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Kecamatan</label>
                  <select class="form-control" name="">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Kelurahan</label>
                  <select class="form-control" name="">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                  <div class="form-group col-md-12">
                  <label for="inputEmail4">Alamat Lengkap</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
              </div>
          </fieldset>

          <fieldset>
              <legend>Data Lampiran Dokumen :</legend>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Dokumen 1, KTP Pemohon</label>
                  <input type="file" class="form-control-file" name="">
                </div>
                <div class="form-group col-md-4">
                  <label>Dokumen 2, Proposal Kegiatan</label>
                  <input type="file" class="form-control-file" name="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Dokumen 3, Surat Permohonan Rekomendasi</label>
                  <input type="file" class="form-control-file" name="">
                </div>
              </div>
          </fieldset><br>

          <input data-bind="value:id" id="id" type="text" class="form-control" <?php if($formMode == "edit"){ echo "disabled='disabled'"; } ?>>

          <button type="button" id="btnSave" onclick="Page.Save(event)" class="btn btn-primary btn-md"><i class="material-icons">save</i>PERBAHARUI DATA</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/binsyar/datapermohonan') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>

        </div>
    </div>
</div>
</form>

{JS START}
<script type="text/javascript">

var Page = {};
Page.FormMode = ko.observable("<?php echo $formMode; ?>")
Page.Cek = $('#formProvinsi').cek();
Page.FormData = ko.observable({
    id : ko.observable(""),
    // fullname : ko.observable(""),
    // telp : ko.observable(""),
    // email : ko.observable(""),
    id_stat : ko.observable("")
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
      var url = '<?php echo site_url("datamaster/address/save_provinsi") ?>';
      var dataProv = ko.mapping.toJS(Page.FormData());
      var formData = new FormData();
      formData.append("formData", JSON.stringify(dataProv));
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
              window.location.href = '<?php echo site_url("datamaster/address/provinsi"); ?>';
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

$(function() { 
    Page.FormData().id("<?php echo $rekomendasi_kode ?>");
    <?php if($formMode == "edit"): ?>
        var dataProv = <?php echo $dataProvinsi; ?>;
        Page.FormData(ko.mapping.fromJS(dataProv));
    <?php endif; ?>
    Page.Cek.dong();
});
</script>
{JS END}