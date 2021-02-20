<form id="formKabupaten" data-bind="with:Page.FormData">
<!-- <input type="hidden" name="kabupaten_id" data-bind="value:kabupaten_id" /> -->
<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <fieldset>
              <legend>Data Pemohon :</legend>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Nama Lengkap</label>
                  <input type="hidden" id="id" name="id" value="<?php //echo $dataku->id;?>" />
                  <input type="text" class="form-control" name="fullname" value="<?php //echo $dataku->fullname;?>" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Telepon</label>
                  <input type="text" class="form-control" name="telp" value="<?php //echo $dataku->telp;?>" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?php //echo $dataku->email;?>" readonly>
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
                  <input type="text" class="form-control" name="jenis_layanan" value="<?php //echo $dataku->nama_layanan;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Nama Kegiatan</label>
                  <input type="text" class="form-control" name="nm_keg" value="<?php //echo $dataku->nm_keg;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Awal Kegiatan</label>
                  <input type="text" class="form-control" name="tgl_awal_keg" value="<?php //echo $dataku->tgl_awal_keg;?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Tanggal Akhir Kegiatan</label>
                  <input type="text" class="form-control" name="tgl_akhir_keg" value="<?php //echo $dataku->tgl_akhir_keg;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Lokasi Kegiatan</label>
                  <input type="text" class="form-control" name="lok_keg" value="<?php //echo $dataku->lok_keg;?>">
                </div>
                <div class="form-group col-md-4">
                  <label>Estimasi Jamaah</label>
                  <input type="text" class="form-control" name="esti_keg" value="<?php //echo $dataku->esti_keg;?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputEmail4">Lembaga Penyelenggara</label>
                  <input type="text" class="form-control" name="lemb_keg" value="<?php //echo $dataku->lemb_keg;?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Provinsi</label>
                  <select class="form-control" name="id_provinsi">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Kabupaten</label>
                  <select class="form-control" name="id_kabupaten">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4">Kecamatan</label>
                  <select class="form-control" name="id_kecamatan">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Kelurahan</label>
                  <select class="form-control" name="id_kelurahan">
                    <option>Pilih . .</option>
                    <option value="">1</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                  <div class="form-group col-md-12">
                  <label for="inputEmail4">Alamat Lengkap</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_keg"><?php //echo $dataku->alamat_keg;?></textarea>
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

          <button type="button" id="btnSave" onclick="Page.Save(event)" class="btn btn-primary btn-md"><i class="material-icons">save</i>KIRIM DATA</button>
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