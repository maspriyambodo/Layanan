<form id="formKecamatan" data-bind="with:Page.FormData">
<input type="hidden" name="kecamatan_id" data-bind="value:kecamatan_id" />
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
                        <select class="form-control" id="dd_province" value="" placeholder="dropdown"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Nama Kabupaten</label>
                        </div>
                        <div class="col-md-9">
                        <select class="form-control" id="dd_city" value="" placeholder="dropdown"></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Nama Kecamatan</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:kecamatan_name" id="kecamatan_name" type="text" class="form-control" required data-vindicate="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">Kode</label>
                        </div>
                        <div class="col-md-9">
                            <input data-bind="value:kecamatan_kode" id="kecamatan_kode" type="text" class="form-control" <?php if($formMode == "edit"){ echo "disabled='disabled'"; } ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="usr">&nbsp;</label>
                        </div>
                        <div class="col-md-9">
                        <button type="button" id="btnSave" onclick="Page.Save(event)" class="btn btn-primary btn-md"><i class="material-icons">save</i>
                            SIMPAN</button>
                        <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('datamaster/address/kecamatan') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>
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
Page.Cek = $('#formKecamatan').cek();
Page.FormData = ko.observable({
    provinsi_id : ko.observable(""),
    kabupaten_id : ko.observable(""),
    kecamatan_id : ko.observable(""),
    kecamatan_kode : ko.observable(""),
    kecamatan_name : ko.observable(""),
});
Page.Save = function(e){
    $('#btnSave').attr('disabled', 'disabled');
    if($("#dd_city").val() == null || $("#dd_city").val() == '') {
        swal(
            'Error saving data!',
            'Mohon lengkapi semua field!',
            'warning'
        );
        $('#btnSave').removeAttr('disabled');
        return;
    }
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
      var url = '<?php echo site_url("datamaster/address/save_kecamatan") ?>';
      var dataKab = ko.mapping.toJS(Page.FormData());
      dataKab.provinsi_id = $("#dd_province").val();
      dataKab.kabupaten_id = $("#dd_city").val();
      
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
              window.location.href = '<?php echo site_url("datamaster/address/kecamatan"); ?>';
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
        url: "<?php echo site_url("datamaster/address/getRekomendasiKodeKecamatan") ?>"+"/"+$("#dd_city").val(),
        data: "",
        method: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            Page.FormData().kecamatan_kode(data.data);
        }
      });
}


$(function() { 
    <?php if($formMode == "edit"): ?>
        var dataKec = <?php echo $dataKecamatan; ?>;
        Page.FormData(ko.mapping.fromJS(dataKec));
    <?php endif; ?>
    Page.Cek.dong();
    $("#dd_province").select2({});
    $("#dd_city").select2({});
    Page.PopulateMasterProvince("<?php echo site_url("datamaster/address/populateProvinces") ?>","<?php echo site_url("datamaster/address/populateCities") ?>","<?php echo site_url("datamaster/address/populateDistricts") ?>");

});

Page.PopulateMasterProvince = function(urlProv,urlCity,urlDistrict,needLoadMasjid) {
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
                if (Page.FormData().provinsi_id() != 0){
                    $("#dd_province").val(Page.FormData().provinsi_id());
                    $("#dd_province").select2().trigger("change");
                }
                $("#dd_province").select2().on("change", function(){
                    console.log('changedd prov');
                    Page.PopulateMasterCities(urlCity,urlDistrict,needLoadMasjid)
                    if(typeof map !== "undefined") {
                        var getLongLat = _.find(Page.AllProvinceData, function(x){ return x.id == $("#dd_province").val(); });
                        console.log("refresh map to : ", getLongLat);
                        if(getLongLat){
                            map.setCenter({lat:parseFloat(getLongLat.lat),lng:parseFloat(getLongLat.long)});
                            map.setZoom(8);
                        }
                    }
                });
                setTimeout(function() {
                    Page.PopulateMasterCities(urlCity, urlDistrict,needLoadMasjid)
                }, 500);
                <?php if($formMode == "edit") : ?>
                    $("#dd_province"). prop("disabled", true);
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
Page.PopulateMasterCities = function(urlCity, urlDistrict, needLoadMasjid) {
    // console.log("PopulateMasterCities");
    var idProv = $("#dd_province").val()
    $.ajax({
        url: urlCity + "/" + idProv,
        data: {},
        method: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data.success) {
                $("#dd_city").select2("destroy")
                $("#dd_city").replaceWith($('<select />').attr('id', 'dd_city').addClass("form-control"))
                $("#dd_city").select2({
                    data: data.data,
                    placeholder: "Pilih Kabupaten/Kota"
                });
                if (Page.FormData().kabupaten_id() != 0){
                    $("#dd_city").val(Page.FormData().kabupaten_id());
                    $("#dd_city").select2().trigger("change");
                }
                <?php if($formMode != "edit") : ?>
                $("#dd_city").select2().on("change", function(){
                    getRekomendasiKode();
                });
                setTimeout(function() {
                    getRekomendasiKode();
                }, 500)
                <?php else : ?>
                    $("#dd_city"). prop("disabled", true);
                <?php endif; ?>
            } else {
                swal(
                    'Error getting kabupaten master data!',
                    data.message,
                    'warning'
                );
            }
        }
    });
}

</script>
{JS END}