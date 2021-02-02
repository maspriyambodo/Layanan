<form id="formProvinsi" data-bind="with:Page.FormData">
<input type="hidden" name="provinsi_id" data-bind="value:id" />
<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <div class="row">
                <div class="col-md-6">
                <!-- <h5 class=""><i class="material-icons">book</i> Data Umum</h5> -->
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Nama Provinsi</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:provinsi_name" id="provinsi_name" type="text" class="form-control" required data-vindicate="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Singkatan</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:pn" id="pn" type="text" class="form-control" required data-vindicate="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Latitude</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:provinsi_lat" id="provinsi_lat" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Longitude</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:provinsi_long" id="provinsi_long" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Kode</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:provinsi_kode" id="provinsi_kode" type="text" class="form-control" <?php if($formMode == "edit"){ echo "disabled='disabled'"; } ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">&nbsp;</label>
                        </div>
                        <div class="col-md-9">
                        <button type="button" id="btnSave" onclick="Page.Save(event)" class="btn btn-primary btn-md"><i class="material-icons">save</i>
                            SIMPAN</button>
                        <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('datamaster/address/provinsi') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>
                            BATAL</button>
                        </div>
                    </div>
                </div>
            </div>

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
    provinsi_name : ko.observable(""),
    provinsi_kode : ko.observable(""),
    pn : ko.observable(""),
    provinsi_lat : ko.observable(""),
    provinsi_long : ko.observable("")
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
    Page.FormData().provinsi_kode("<?php echo $rekomendasi_kode ?>");
    <?php if($formMode == "edit"): ?>
        var dataProv = <?php echo $dataProvinsi; ?>;
        Page.FormData(ko.mapping.fromJS(dataProv));
    <?php endif; ?>
    Page.Cek.dong();
});
</script>
{JS END}