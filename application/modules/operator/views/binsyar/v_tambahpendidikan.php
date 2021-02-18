<form method="post" action="<?php echo site_url('operator/binsyar/simpan_formpendidikan') ?>">

<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
    </div>

    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="<?php echo $dt_last[0]->id;?>" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $dt_last[0]->narsum;?></a>
              <a class="nav-item nav-link" id="<?php echo $dt_last[1]->id;?>" data-toggle="tab" href="#dua" role="tab" aria-controls="dua" aria-selected="false"><?php echo $dt_last[1]->narsum;?></a>
              <a class="nav-item nav-link" id="<?php echo $dt_last[2]->id;?>" data-toggle="tab" href="#tiga" role="tab" aria-controls="tiga" aria-selected="false"><?php echo $dt_last[2]->narsum;?></a>
              <a class="nav-item nav-link" id="<?php echo $dt_last[3]->id;?>" data-toggle="tab" href="#empat" role="tab" aria-controls="empat" aria-selected="false"><?php echo $dt_last[3]->narsum;?></a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="<?php echo $dt_last[0]->id;?>">
                <fieldset>
                  <legend>Pendidikan Formal :</legend>
                  <button class="btn btn-info btn-md" data-bind='click: addPddk' style="margin-bottom: 20px;"><i class="material-icons">info</i>Tambah Baris</button>
                  <div class="form-row" data-bind="foreach: Pddkcontacts">
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="hidden" name="id_crmh[]" value="<?php echo $dt_last[0]->id;?>">
                      <input type="text" class="form-control" name="pddk[]" placeholder="Pendidikan. ." data-bind='name: pddk'>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="program_pddk[]" placeholder="Program. ." data-bind='name: program_pddk'>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="almt_pddk[]" placeholder="Alamat Pendidikan. ." data-bind='name: almt_pddk'>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="lulus_pddk[]" placeholder="Lulus Pendidikan. ." data-bind='name: lulus_pddk'>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 5px;">
                      <button type="button" class="btn btn-danger" data-bind='click: $root.removePddkContact'><i class="material-icons">delete</i>Hapus</button>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset>
                  <legend>Pendidikan NON Formal :</legend>
                  <!-- <button class="btn btn-info btn-md" data-bind='click: tambah_non' style="margin-bottom: 20px;"><i class="material-icons">info</i>Tambah Baris</button> -->
                  <div class="form-row" data-bind="foreach: TambahNon">
                    <div class="col-md-10" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="pddk_non" placeholder="Pendidikan Non Formal. ." data-bind='name: pddk_non'>
                    </div>
                    <!-- <div class="col-md-2" style="margin-bottom: 5px;">
                      <button type="button" class="btn btn-danger" data-bind='click: $root.HapusTambah'><i class="material-icons">delete</i>Hapus</button>
                    </div> -->
                  </div>
                </fieldset><br>
            </div>

            <div class="tab-pane fade" id="dua" role="tabpanel" aria-labelledby="<?php echo $dt_last[1]->id;?>">
              <fieldset>
                  <legend>Pendidikan Formal :</legend>
                  <button class="btn btn-info btn-md" data-bind='click: addPddk' style="margin-bottom: 20px;"><i class="material-icons">info</i>Tambah Baris</button>
                  <div class="form-row" data-bind="foreach: Pddkcontacts">
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="hidden" name="id_crmh[]" value="<?php echo $dt_last[1]->id;?>">
                      <input type="text" class="form-control" name="pddk[]" placeholder="Pendidikan. ." data-bind='name: pddk'>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="program_pddk[]" placeholder="Program. ." data-bind='name: program_pddk'>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="almt_pddk[]" placeholder="Alamat Pendidikan. ." data-bind='name: almt_pddk'>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="lulus_pddk[]" placeholder="Lulus Pendidikan. ." data-bind='name: lulus_pddk'>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 5px;">
                      <button type="button" class="btn btn-danger" data-bind='click: $root.removePddkContact'><i class="material-icons">delete</i>Hapus</button>
                    </div>
                  </div>
                </fieldset><br>

                <fieldset>
                  <legend>Pendidikan NON Formal :</legend>
                  <!-- <button class="btn btn-info btn-md" data-bind='click: tambah_non' style="margin-bottom: 20px;"><i class="material-icons">info</i>Tambah Baris</button> -->
                  <div class="form-row" data-bind="foreach: TambahNon">
                    <div class="col-md-10" style="margin-bottom: 5px;">
                      <input type="text" class="form-control" name="pddk_non" placeholder="Pendidikan Non Formal. ." data-bind='name: pddk_non'>
                    </div>
                    <!-- <div class="col-md-2" style="margin-bottom: 5px;">
                      <button type="button" class="btn btn-danger" data-bind='click: $root.HapusTambah'><i class="material-icons">delete</i>Hapus</button>
                    </div> -->
                  </div>
                </fieldset><br>
            </div>

            <div class="tab-pane fade" id="tiga" role="tabpanel" aria-labelledby="<?php echo $dt_last[2]->id;?>">
              fhdjf
            </div>

            <div class="tab-pane fade" id="empat" role="tabpanel" aria-labelledby="<?php echo $dt_last[3]->id;?>">
              fhdjf
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary btn-md"><i class="material-icons">save</i>Simpan</button>
          <button type="button" id="btnCancel" onclick="document.location.href='<?php echo site_url('operator/binsyar/datasafari') ?>'" class="btn btn-warning btn-md"><i class="material-icons">cancel</i>BATAL</button>
        </div>
    </div>
</div>
</form>

{JS START}
<script type="text/javascript">
var PddkModel = function(Pddkcontacts) {
    var self = this;
    self.Pddkcontacts = ko.observableArray(ko.utils.arrayMap(Pddkcontacts, function(inipddk) {
        return { pddk: inipddk.pddk, program_pddk: inipddk.program_pddk, almt_pddk: inipddk.almt_pddk, lulus_pddk: inipddk.lulus_pddk };
    }));
 
    self.addPddk = function() {
        self.Pddkcontacts.push({
            pddk: "",
            program_pddk: "",
            almt_pddk: "",
            lulus_pddk: ""
        });
    };
 
    self.removePddkContact = function(inipddk) {
        self.Pddkcontacts.remove(inipddk);
    };
};
ko.applyBindings(new PddkModel());
</script>

<!-- <script>
  var TambahModel = function(TambahNon) {
    var self = this;
    self.TambahNon = ko.observableArray(ko.utils.arrayMap(TambahNon, function(initambah) {
        return { pddk_non: initambah.pddk_non };
    }));
 
    self.tambah_non = function() {
        self.TambahNon.push({
            pddk_non: ""
        });
    };
 
    self.HapusTambah = function(initambah) {
        self.TambahNon.remove(initambah);
    };
};
ko.applyBindings(new TambahModel());  
</script> -->
{JS END}