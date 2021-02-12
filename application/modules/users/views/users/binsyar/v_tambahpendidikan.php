<form method="post" action="<?php echo site_url('users/binsyar/simpan_formpendidikan');?>">
<!-- Kumpulan inputan di hidden -->
<input type="hidden" name="id_stat" value="1" />
<input type="hidden" name="jenis_layanan" value="<?php echo $jenis_layanan[5]->id;?>" />
<input type="hidden" name="id" value="<?php echo $id_dtlayanan->id;?>" />
<input type="hidden" name="id_user" value="<?php echo $id_session->id;?>" />
<input type="hidden" name="syscreatedate" value="<?php echo date('Y-m-d h:i:s');?>">

<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
          <?php for($i = 0; $i < $hitung->jumlah; $i++){?>
            <fieldset>
              <legend>Data Penceramah :</legend>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Pendidikan Formal</label>
                  <div class="input-group mb-6">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="btn-reset-form-pddk" style="background-color: #000; border: 1px solid #000; color: white;">Hapus</button>
                      <button class="btn btn-outline-secondary btn-primary" type="button" id="btn-tambah-form-pddk">Tambah</button>
                    </div>

                    <select class="form-control" id="exampleFormControlSelect1" name="pddk[]">
                      <option value="1">S1</option>
                      <option value="2">D3</option>
                      <option value="3">SMK / SMA</option>
                      <option value="4">SLTP</option>
                      <option value="5">SD</option>
                    </select>
                    <?php echo form_error('pddk',"<div style='color:red'>","</div>");?>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="input-group mb-6">
                      <div class="input-group-prepend" id="insert-form-pddk">
                        <div></div>
                      </div>
                      <input type="hidden" id="jumlah-form-pddk" value="1" class="form-control" aria-describedby="basic-addon1" placeholder="Masukkan Pendidikan Formal . .">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label>Pendidikan Non Formal</label>
                  <div class="input-group mb-6">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="btn-reset-form-pddk-non" style="background-color: #000; border: 1px solid #000; color: white;">Hapus</button>
                      <button class="btn btn-outline-secondary btn-primary" type="button" id="btn-tambah-form-pddk-non">Tambah</button>
                    </div>
                    <input type="text" class="form-control" name="pddk_non[]" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    <?php echo form_error('pddk_non',"<div style='color:red'>","</div>");?>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="input-group mb-6">
                      <div class="input-group-prepend" id="insert-form-pddk-non">
                        <div></div>
                      </div>
                      <input type="hidden" id="jumlah-form-pddk-non" value="1" class="form-control" aria-describedby="basic-addon1" placeholder="Masukkan Pendidikan Non Formal . .">
                    </div>
                  </div>
                </div>
              </div>
          </fieldset><br>
          <?php }?>

          
          <!-- <fieldset>
              <legend>Data Penceramah :</legend>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Pendidikan Formal</label>
                  <div class="input-group mb-6">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="btn-reset-form-pddk" style="background-color: #000; border: 1px solid #000; color: white;">Hapus</button>
                      <button class="btn btn-outline-secondary btn-primary" type="button" id="btn-tambah-form-pddk">Tambah</button>
                    </div>

                    <select class="form-control" id="exampleFormControlSelect1" name="pddk[]">
                      <option value="1">S1</option>
                      <option value="2">D3</option>
                      <option value="3">SMK / SMA</option>
                      <option value="4">SLTP</option>
                      <option value="5">SD</option>
                    </select>
                    <?php echo form_error('pddk',"<div style='color:red'>","</div>");?>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="input-group mb-6">
                      <div class="input-group-prepend" id="insert-form-pddk">
                        <div></div>
                      </div>
                      <input type="hidden" id="jumlah-form-pddk" value="1" class="form-control" aria-describedby="basic-addon1" placeholder="Masukkan Pendidikan Formal . .">
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label>Pendidikan Non Formal</label>
                  <div class="input-group mb-6">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="btn-reset-form-pddk-non" style="background-color: #000; border: 1px solid #000; color: white;">Hapus</button>
                      <button class="btn btn-outline-secondary btn-primary" type="button" id="btn-tambah-form-pddk-non">Tambah</button>
                    </div>
                    <input type="text" class="form-control" name="pddk_non[]" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    <?php echo form_error('pddk_non',"<div style='color:red'>","</div>");?>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="input-group mb-6">
                      <div class="input-group-prepend" id="insert-form-pddk-non">
                        <div></div>
                      </div>
                      <input type="hidden" id="jumlah-form-pddk-non" value="1" class="form-control" aria-describedby="basic-addon1" placeholder="Masukkan Pendidikan Non Formal . .">
                    </div>
                  </div>
                </div>
              </div>
          </fieldset><br> -->
          <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>KIRIM DATA</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('users/binsyar/datasafari') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
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