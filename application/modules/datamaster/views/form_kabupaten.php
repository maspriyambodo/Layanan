<form id="formKabupaten" data-bind="with:Page.FormData">
<!-- <input type="hidden" name="kabupaten_id" data-bind="value:kabupaten_id" /> -->
<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <div class="row">
                <div class="col-md-6">
                <!-- <h5 class=""><i class="material-icons">book</i> Data Umum</h5> -->
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Kode</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:id_kabupaten" id="id_kabupaten" type="text" class="form-control" <?php if($formMode == "edit"){ echo "disabled='disabled'"; } ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Nama Provinsi</label>
                        </div>
                        <div class="col-md-9">
                        <select class="form-control" id="dd_province" value="" placeholder="dropdown"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Nama Kabupaten</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:nama" id="nama" type="text" class="form-control" required data-vindicate="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">&nbsp;</label>
                        </div>
                        <div class="col-md-9">
                        <button type="button" id="btnSave" onclick="Page.Save(event)" class="btn btn-primary btn-md"><i class="material-icons">save</i>
                            SIMPAN</button>
                        <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('datamaster/address/kabupaten') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>
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