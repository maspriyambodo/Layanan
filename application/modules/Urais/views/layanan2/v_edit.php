<style>
    .nav-pills .nav-link.active, .show > .nav-pills .nav-link {
        color: #fff;
        background-color: #5bc0de;
    }
</style>
<form action="<?php echo base_url('Urais/Layanan_2/Change/'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_layanan" value="<?php echo $detil[0]->id_layanan; ?>"/>
    <input type="hidden" name="id_user" value="<?php echo $detil[0]->id_user; ?>"/>
    <div style="clear: both;margin:2% 0px;"></div>
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pemohon-tab" data-toggle="tab" href="#pemohon" role="tab" aria-controls="home" aria-selected="true">Data Pemohon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="kegiatan-tab" data-toggle="tab" href="#kegiatan" role="tab" aria-controls="profile" aria-selected="false">Data Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="narsum-tab" data-toggle="tab" href="#narsum" role="tab" aria-controls="contact" aria-selected="false">Data Penceramah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dokmohon-tab" data-toggle="tab" href="#dokmohon" role="tab" aria-controls="contact" aria-selected="false">Dokumen Permohonan</a>
                </li>
            </ul>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pemohon" role="tabpanel" aria-labelledby="pemohon-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
<<<<<<< HEAD
                                <label>Nomor KTP:</label>
                                <input type="text" name="ktp" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->nik; ?>"/>
=======
                                <label>Username:</label>
                                <input type="text" name="uname" class="form-control" required="" autocomplete="off" disabled=""/>
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Lengkap:</label>
                                <input type="text" name="nama" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->nama_user; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
<<<<<<< HEAD
                                <label>Tanggal Lahir:</label>
                                <input type="text" name="tgl_lahir" class="form-control datepicker" required="" autocomplete="off" value="<?php echo $detil[0]->tgl_lhr; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="uname" class="form-control" required="" autocomplete="off" disabled=""/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
=======
                                <label>Provinsi:</label>
                                <select name="provinsi" required="" class="form-control custom-select" onchange="Provinsi_user(this.value, '<?php echo $detil[0]->kabupaten_id; ?>')">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        if ($detil[0]->provinsi_layanan == $prov->nama) {
                                            $selected = ' selected=""';
                                        } else {
                                            $selected = '';
                                        }
                                        echo '<option value="' . $prov->id_provinsi . '"' . $selected . '>' . $prov->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kabupaten:</label>
                                <select name="kabupaten" id="kotkabtxt" class="form-control custom-select" onchange="Kecshow_user(this.value)" required=""></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nomor KTP:</label>
                                <input type="text" name="ktp" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->nik; ?>"/>
                            </div>
                            <div class="form-group">
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                                <label>Email:</label>
                                <input type="email" name="mali" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->mail; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
<<<<<<< HEAD
=======
                                <label>Tanggal Lahir:</label>
                                <input type="text" name="tgl_lahir" class="form-control datepicker" required="" autocomplete="off" value="<?php echo $detil[0]->tgl_lhr; ?>"/>
                            </div>
                            <div class="form-group">
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                                <label>Telepon:</label>
                                <input type="text" name="telpon" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->telp; ?>"/>
                            </div>
                        </div>
<<<<<<< HEAD
=======
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kecamatan:</label>
                                <select name="kectxt" id="kectxt" class="form-control custom-select" onchange="Kelshow_user(this.value)" required=""></select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kelurahan:</label>
                                <select name="keltxt" id="keltxt" class="form-control custom-select" required=""></select>
                            </div>
                        </div>
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                    </div>
                </div>

                <div class="tab-pane fade" id="kegiatan" role="tabpanel" aria-labelledby="kegiatan-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nm_keg">Nama Kegiatan:</label>
                                <input id="nm_keg" type="text" name="nm_keg" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->nm_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="tgl_awal_keg">Tanggal Awal Kegiatan:</label>
                                <input id="tgl_awal_keg" type="text" name="tgl_awal_keg" class="form-control datepicker" required="" autocomplete="off" onchange="Awal()" onkeydown="return false;" value="<?php echo $detil[0]->tgl_awal_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="tgl_akhir_keg">Tanggal Akhir Kegiatan:</label>
                                <input id="tgl_akhir_keg" type="text" name="tgl_akhir_keg" class="form-control datepicker" required="" autocomplete="off" onchange="Tgl()" onkeydown="return false;" value="<?php echo $detil[0]->tgl_akhir_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="esti_keg">Estimasi Peserta:</label>
                                <input id="esti_keg" type="text" name="esti_keg" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->esti_keg; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="lembaga">Lembaga:</label>
                                <select name="lembaga" class="form-control custom-select" required="" onchange="return Lembaga(this.value)">
                                    <?php
                                    if ($detil[0]->lemb_keg == "Perorangan") {
                                        $Perorangan = 'selected=""';
                                    } else {
                                        $Lembaga = 'selected=""';
                                    }
                                    ?>
                                    <option value="">Pilih Jenis</option>
                                    <option value="1"<?php echo ' ' . $Perorangan; ?>>Perorangan</option>
                                    <option value="2"<?php echo ' ' . $Lembaga; ?>>Lembaga</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat_kegiatan">Lokasi Kegiatan:</label>
                                <input id="alamat_kegiatan" type="text" name="alamat_kegiatan" class="form-control" autocomplete="off" required="" value="<?php echo $detil[0]->alamat_keg; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="negara">Negara Tujuan:</label>
                                <select id="negara" class="negara form-control custom-select" name="negara" required="">
                                    <option value=""></option>
                                    <?php
                                    foreach ($negara as $negara) {
                                        if ($detil[0]->negara_tujuan == $negara->id) {
                                            $selected = 'selected=""';
                                        } else {
                                            $selected = '';
                                        }
                                        echo '<option value="' . $negara->id . '" ' . $selected . '>' . $negara->country . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group" id="nm_lemb">
                                <label for="lemb_keg">Nama Lembaga:</label>
                                <input id="lemb_keg" type="text" name="lemb_keg" class="form-control" autocomplete="off" required="" value="<?php echo $detil[0]->lemb_keg; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_kegiatan">Keterangan Kegiatan:</label>
                                <textarea id="keterangan_kegiatan" name="keterangan_kegiatan" class="form-control" required="" rows="5"><?php echo $detil[0]->keterangan; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="narsum" role="tabpanel" aria-labelledby="narsum-tab">
<<<<<<< HEAD
                    <?php foreach ($detil as $key => $narsum) { ?>
                        <div class="text-center"> <b><u>Penceramah 1:</u></b> </div> <div style="clear:both;margin:10px 0"></div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="pasport">No. Passport:</label>
                                    <input id="pasport" type="text" name="pasport[]" class="form-control" autocomplete="off" required=""/>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="ceramah">Nama:</label>
                                    <input id="ceramah" type="text" name="ceramah[]" autocomplete="off" required="" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="jkel">Jenis Kelamin:</label>
                                    <select id="jkel" name="jkel[]" class="form-control custom-select" required="">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="tmp_lahir">Tempat Lahir:</label>
                                    <input id="tmp_lahir" type="text" name="tmp_lahir[]" class="form-control" autocomplete="off" required=""/>
                                </div>
                                <div class="form-group">
                                    <label for="lahir_narsum">Tanggal Lahir:</label>
                                    <input id="lahir_narsum" type="text" name="lahir_narsum[]" class="form-control datepicker" autocomplete="off" required="" onkeydown="return false;"/>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="provinsi_narsum">Provinsi:</label>
                                    <select id="provinsi_narsum" name="provinsi_narsum[]" required="" class="form-control custom-select" onchange="Provinsi_narsum(this.value)">
                                        <option value="">Pilih Provinsi</option>
                                        <?php
                                        foreach ($provinsi as $prov) {
                                            if ($prov->nama == $detil[$key]->provinsi) {
                                                $prov_selected = 'selected=""';
                                            } else {
                                                $prov_selected = '';
                                            }
                                            echo '<option value="' . $prov->id_provinsi . '" ' . $prov_selected . '>' . $prov->nama . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kectxt_narsum">Kecamatan:</label>
                                    <select id="kectxt_narsum" name="kectxt_narsum[]" class="form-control custom-select" onchange="Kelshow_narsum(this.value)"></select>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="kotkabtxt_narsum">Kabupaten:</label>
                                    <select name="kabupaten_narsum[]" id="kotkabtxt_narsum" class="form-control custom-select" onchange="Kecshow_narsum(this.value)"></select>
                                </div>
                                <div class="form-group">
                                    <label for="keltxt_narsum">Kelurahan:</label>
                                    <select name="keltxt_narsum[]" id="keltxt_narsum" class="form-control custom-select"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CV Penceramah:</label>
                                    <input id="cv_narsum" class="form-control" type="file" name="cv_narsum[]" required="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" name="alamat_ceramah[]" class="form-control" required="" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="tab-pane fade" id="dokmohon" role="tabpanel" aria-labelledby="dokmohon-tab">

                </div>
            </div>
        </div>
    </div>
</form>
<script>
    window.onload = function () {
        Provinsi_narsum($('#provinsi_narsum option:selected').val());
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
=======
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" style="width:100%;">
                            <thead class="text-uppercase">
                                <tr>
                                    <th rowspan="2" class="text-center">No.</th>
                                    <th rowspan="2" class="text-center">nama</th>
                                    <th rowspan="2" class="text-center">nomor<br>passport</th>
                                    <th colspan="3" class="text-center">lahir</th>
                                    <th rowspan="2" class="text-center">jenis<br>kelamin</th>
                                    <th rowspan="2" class="text-center">aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">tempat</th>
                                    <th class="text-center">tanggal</th>
                                    <th class="text-center">usia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detil as $narsum) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php
                                            static $id = 1;
                                            echo $id++;
                                            ?>
                                        </td>
                                        <td><?php echo $narsum->narsum; ?></td>
                                        <td class="text-center"><?php echo $narsum->no_paspor; ?></td>
                                        <td class="text-center"><?php echo $narsum->tmp_lahir_narsum; ?></td>
                                        <td class="text-center"><?php echo date("d F Y", strtotime($narsum->tgl_lahir_narsum)); ?></td>
                                        <td class="text-center">
                                            <?php
                                            $date = new DateTime($narsum->tgl_lahir_narsum);
                                            $now = new DateTime();
                                            $interval = $now->diff($date);
                                            echo $interval->y . ' Tahun ' . $interval->m . ' Bulan';
                                            ?>
                                        </td>
                                        <td class="text-center text-capitalize"><?php echo $narsum->jns_kelamin; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-xs btn-default" title="edit data penceramah" onclick="Edit_penceramah('<?php echo $narsum->id_penceramah; ?>', '<?php echo $narsum->id_layanan; ?>')"><i class="far fa-edit"></i></button>
                                            <a id="btn_cv<?php echo $narsum->id_penceramah; ?>" href="<?php echo base_url('assets/uploads/binsyar/' . $narsum->cv); ?>" class="btn btn-xs btn-default" target="_new" title="lihat cv <?php echo $narsum->narsum; ?>"><i class="far fa-file-word"></i></a>
                                            <a id="btn_paspor<?php echo $narsum->id_penceramah; ?>" href="<?php echo base_url('assets/uploads/binsyar/' . $narsum->fc_passport); ?>" class="btn btn-xs btn-default" target="_new" title="lihat passport <?php echo $narsum->narsum; ?>"><i class="fas fa-passport"></i></a>
                                            <a id="btn_foto<?php echo $narsum->id_penceramah; ?>" href="<?php echo base_url('assets/uploads/binsyar/' . $narsum->pas_foto); ?>" class="btn btn-xs btn-default" target="_new" title="lihat foto <?php echo $narsum->narsum; ?>"><i class="fas fa-user"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="dokmohon" role="tabpanel" aria-labelledby="dokmohon-tab">
                    <div class="row text-center">
                        <div class="col-md-1"></div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="sp_keg" class="form-label">Surat Permohonan Kegiatan:</label>
                            </div>
                            <div class="form-group" id="o_spk">
                                <button id="spkbtn" type="button" class="btn btn-warning btn-xs" onclick="Spk()"><i class="far fa-edit"></i> Ganti SPK</button>
                                <a id="a_spk" href="<?php echo base_url('assets/uploads/binsyar/' . $detil[0]->sp_keg); ?>" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat SPK</a>
                            </div>
                            <div class="form-group" id="e_spk"></div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="proposal" class="form-label">Proposal Kegiatan:</label>
                            </div>
                            <div class="form-group" id="o_proposal">
                                <button id="proposalbtn" type="button" class="btn btn-warning btn-xs" onclick="Proposal()"><i class="far fa-edit"></i> Ganti Proposal</button>
                                <a id="a_proposal" href="<?php echo base_url('assets/uploads/binsyar/' . $detil[0]->proposal_keg); ?>" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat Proposal</a>
                            </div>
                            <div class="form-group" id="e_proposal"></div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div style="clear:both;margin: 20px 0px;"></div>
                    <div class="form-group text-center">
                        <a id="cancelbtn" href="<?php echo base_url('Urais/Layanan_2/index/'); ?>" class="btn btn-danger"><i class="fas fa-window-close"></i> Batal</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_save" onclick="Modal()"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Simpan Perubahan</h4>
                </div>
                <div class="modal-body">
                    Anda yakin ingin merubah data permohonan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak!</button>
                    <button id="svbtn" type="submit" class="btn btn-info" onclick="Save()">Ya!</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="edit_penceramah" tabindex="-1" role="dialog" aria-labelledby="edit_penceramah">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit_title"></h4>
            </div>
            <div class="modal-body">
                <div id="param_penceramah"></div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="pasport">No. Passport:</label>
                            <input id="pasport" type="text" name="pasport" class="form-control" autocomplete="off" required=""/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="ceramah">Nama Penceramah:</label>
                            <input id="ceramah" type="text" name="ceramah" autocomplete="off" required="" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="jkel">Jenis Kelamin:</label>
                            <select id="jkel" name="jkel" class="form-control custom-select" required="">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir:</label>
                            <input id="tmp_lahir" type="text" name="tmp_lahir" class="form-control" autocomplete="off" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="lahir_narsum">Tanggal Lahir:</label>
                            <input id="lahir_narsum" type="text" name="lahir_narsum" class="form-control datepicker" autocomplete="off" required="" onkeydown="return false;"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="provinsi_narsum">Provinsi:</label>
                            <select id="provinsi_narsum" name="provinsi_narsum" required="" class="form-control custom-select" onchange="Provinsi(this.value, null)">
                                <option value="">Pilih Provinsi</option>
                                <?php
                                foreach ($provinsi as $prov) {
                                    echo '<option value="' . $prov->id_provinsi . '">' . $prov->nama . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kectxt_narsum">Kecamatan:</label>
                            <select id="kectxt_narsum" name="kectxt_narsum" class="form-control custom-select" onchange="Kelshow(this.value)"></select>
                        </div>

                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="kotkabtxt_narsum">Kabupaten:</label>
                            <select name="kabupaten_narsum" id="kotkabtxt_narsum" class="form-control custom-select" onchange="Kecshow(this.value, null)"></select>
                        </div>
                        <div class="form-group">
                            <label for="keltxt_narsum">Kelurahan:</label>
                            <select name="keltxt_narsum" id="keltxt_narsum" class="form-control custom-select"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat_ceramah" class="form-control" required="" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div style="clear:both;margin: 15px 0px;"></div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>CV Penceramah:</label>
                        </div>
                        <div class="form-group" id="o_cv">
                            <button id="cvbtn" type="button" class="btn btn-warning btn-xs" onclick="CV_narsum()"><i class="far fa-edit"></i> Ganti CV</button>
                            <a id="a_cv" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat CV</a>
                        </div>
                        <div class="form-group" id="e_cv"></div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Passport:</label>
                        </div>
                        <div class="form-group" id="o_paspor">
                            <button id="pasporbtn" type="button" class="btn btn-warning btn-xs" onclick="Paspor_narsum()"><i class="far fa-edit"></i> Ganti Passport</button>
                            <a id="a_paspor" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat Passport</a>
                        </div>
                        <div class="form-group" id="e_paspor"></div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Pas Foto:</label>
                        </div>
                        <div class="form-group" id="o_foto">
                            <button id="fotobtn" type="button" class="btn btn-warning btn-xs" onclick="Foto_narsum()"><i class="far fa-edit"></i> Ganti Pas Foto</button>
                            <a id="a_foto" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat Pas Foto</a>
                        </div>
                        <div class="form-group" id="e_foto"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn_close" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button id="btn_edit" type="submit" class="btn btn-info" onclick="Edit()"><i class="fas fa-save"></i> Ubah</button>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;margin:10px 0px;"></div>
<input type="hidden" name="err_msg" value="<?php echo $msg['gagal']; ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $msg['sukses']; ?>"/>
<?php
unset($_SESSION['gagal']);
unset($_SESSION['sukses']);
?>
<script>
    window.onload = function () {
        Provinsi_user($('select[name="provinsi"]').val(), <?php echo $detil[0]->kabupaten_id_layanan; ?>);
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: true,
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: true,
            onclick: null,
            showDuration: "300",
            hideDuration: "2000",
            timeOut: false,
            extendedTimeOut: "2000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        var a, b, c;
        a = $('input[name="err_msg"]').val();
        b = $('input[name="succ_msg"]').val();
        c = $('select[name="lembaga"]').val();
        if (a !== "") {
            toastr.error(a);
        } else if (b !== "") {
            toastr.success(b);
        }
        if (c == 1) {
            $('#nm_lemb').hide('slow');
        } else {
            $('#nm_lemb').show('slow');
        }
<<<<<<< HEAD
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    };
    function Save() {
        var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, ab, ac, ad, ae, af, ag, ah;
        a = $('input[name="uname"]').val();
        b = $('input[name="mali"]').val();
        c = $('input[name="ktp"]').val();
        d = $('input[name="nama"]').val();
        e = $('input[name="lahir_pemohon"]').val();
        f = $('input[name="telpon"]').val();
        g = $('select[name="provinsi_pemohon"]').val();
        h = $('select[name="kabupaten_pemohon"]').val();
        i = $('select[name="kectxt_pemohon"]').val();
        j = $('select[name="keltxt_pemohon"]').val();
        k = $('input[name="nm_keg"]').val();
        l = $('input[name="tgl_awal_keg"]').val();
        m = $('input[name="tgl_akhir_keg"]').val();
        n = $('input[name="esti_keg"]').val();
        o = $('select[name="lembaga"]').val();
        p = $('input[name="lemb_keg"]').val();
        q = $('input[name="alamat_kegiatan"]').val();
        r = $('input[name="negara"]').val();
        s = $('textarea[name="keterangan_kegiatan"]').val();
        t = $('input[name="pasport"]').val();
        u = $('input[name="ceramah"]').val();
        v = $('select[name="jkel"]').val();
        w = $('input[name="tmp_lahir"]').val();
        x = $('select[name="provinsi_narsum"]').val();
        y = $('select[name="kabupaten_narsum"]').val();
        z = $('select[name="kectxt_narsum"]').val();
        ab = $('select[name="keltxt_narsum"]').val();
        ac = $('input[name="lahir_narsum"]').val();
        ad = $('input[name="cv_narsum"]').val();
        ae = $('input[name="paspor_narsum"]').val();
        af = $('input[name="foto_narsum"]').val();
        ag = $('input[name="sp_keg"]').val();
        ah = $('input[name="proposal"]').val();
        if (a == "") {
            toastr.warning("Harap masukkan nama pemohon!");
        } else if (b == "" | !validateEmail(b)) {
            toastr.warning("Harap masukkan email pemohon!");
        } else if (c == "") {
            toastr.warning("Harap masukkan nomor ktp pemohon!");
        } else if (d == "") {
            toastr.warning("Harap masukkan nomor ktp pemohon!");
        } else if (e == "") {
            toastr.warning("Harap masukkan tanggal lahir pemohon!");
        } else if (f == "") {
            toastr.warning("Harap masukkan nomor telepon pemohon!");
        } else if (g == "") {
            toastr.warning("Harap masukkan provinsi pemohon!");
        } else if (h == "") {
            toastr.warning("Harap masukkan kabupaten pemohon!");
        } else if (i == "") {
            toastr.warning("Harap masukkan kecamatan pemohon!");
        } else if (j == "") {
            toastr.warning("Harap masukkan kelurahan pemohon!");
        } else if (k == "") {
            toastr.warning("Harap masukkan nama kegiatan!");
        } else if (l == "") {
            toastr.warning("Harap masukkan tanggal kegiatan!");
        } else if (m == "") {
            toastr.warning("Harap masukkan tanggal kegiatan!");
        } else if (n == "") {
            toastr.warning("Harap masukkan estimasi peserta kegiatan!");
        } else if (o == "") {
            toastr.warning("Harap memilih jenis lembaga!");
        } else if (p == "") {
            toastr.warning("Harap masukkan nama lembaga kegiatan!");
        } else if (q == "") {
            toastr.warning("Harap masukkan alamat atau lokasi kegiatan!");
        } else if (r == "") {
            toastr.warning("Harap memilih negara tujuan kegiatan!");
        } else if (s == "") {
            toastr.warning("Harap masukkan keterangan kegiatan!");
        } else if (t == "") {
            toastr.warning("Harap masukkan nomor passport penceramah!");
        } else if (u == "") {
            toastr.warning("Harap masukkan nama lengkap penceramah!");
        } else if (v == "") {
            toastr.warning("Harap pilih jenis kelamin penceramah!");
        } else if (w == "") {
            toastr.warning("Harap masukkan tempat lahir penceramah!");
        } else if (x == "") {
            toastr.warning("Harap masukkan provinsi penceramah!");
        } else if (y == "") {
            toastr.warning("Harap masukkan kabupaten penceramah!");
        } else if (z == "") {
            toastr.warning("Harap masukkan kecamatan penceramah!");
        } else if (ab == "") {
            toastr.warning("Harap masukkan kelurahan penceramah!");
        } else if (ac == "") {
            toastr.warning("Harap masukkan tanggal lahir penceramah!");
        } else if (ad == "") {
            toastr.warning("Harap masukkan cv atau resume penceramah!");
        } else if (ae == "") {
            toastr.warning("Harap masukkan fotocopy passport penceramah!");
        } else if (af == "") {
            toastr.warning("Harap masukkan pas foto penceramah!");
        } else if (ag == "") {
            toastr.warning("Harap masukkan surat permohonan kegiatan!");
        } else if (ah == "") {
            toastr.warning("Harap masukkan proposal kegiatan!");
        } else {
            return true;
        }
    }
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }
    function Tambah() {
        var jumlah = parseInt($("#jumlah-form").val());
        var nextform = jumlah + 1;
        $("#repeat_narsum").append(
                '<div id="repeat' + nextform + '"><hr><div class="text-center"> <b><u>Penceramah ' + nextform + ':</u></b> </div> <div style="clear:both;margin:10px 0"></div><hr>'
                + '<div class="row"> <div class="col-md"> <div class="form-group"> <label>No. Passport:</label> <input id="pasport" type="text" name="pasport[]" class="form-control" autocomplete="off" required=""/> </div> </div> <div class="col-md"> <div class="form-group"> <label>Nama:</label> <input id="ceramah" type="text" name="ceramah[]" autocomplete="off" required="" class="form-control"/> </div> </div> <div class="col-md"> <div class="form-group"> <label>Jenis Kelamin:</label> <select id="jkel" name="jkel[]" class="form-control custom-select" required=""> <option value="">Pilih Jenis Kelamin</option> <option value="1">Laki-Laki</option> <option value="2">Perempuan</option> </select> </div> </div> </div>'
                + '<div class="row"> <div class="col-md"> <div class="form-group"> <label>Tempat Lahir:</label> <input id="tmp_lahir" type="text" name="tmp_lahir[]" class="form-control" autocomplete="off" required=""/> </div> <div class="form-group"> <label>Tanggal Lahir:</label> <input id="lahir_narsum' + nextform + '" type="text" name="lahir_narsum[]" class="form-control datepicker" autocomplete="off" required="" onkeydown="return false"/> </div> </div> <div class="col-md"> <div class="form-group"> <label>Provinsi:</label> <select id="provinsi_narsum_' + nextform + '" name="provinsi_narsum[]" required="" class="form-control custom-select" onchange="Provinsi_narsum_2(' + nextform + ')"> <option value="">Pilih Provinsi</option> </select> </div> <div class="form-group"> <label>Kecamatan:</label> <select id="kectxt_narsum_' + nextform + '" name="kectxt_narsum[]" class="form-control custom-select" onchange="Kelshow_narsum_2(' + nextform + ')"></select> </div> </div> <div class="col-md"> <div class="form-group"> <label>Kabupaten:</label> <select name="kabupaten_narsum[]" id="kotkabtxt_narsum_' + nextform + '" class="form-control custom-select" onchange="Kecshow_narsum_2(' + nextform + ')"></select> </div> <div class="form-group"> <label>Kelurahan:</label> <select name="keltxt_narsum[]" id="keltxt_narsum_' + nextform + '" class="form-control custom-select"></select> </div> </div> </div>'
                + '<div class="row"> <div class="col-md-4"> <div class="form-group"> <label for="cv_narsum">CV Penceramah:</label> <input id="cv_narsum" class="form-control" type="file" name="cv_narsum[]" required=""/> </div> </div> <div class="col-md-8"> <div class="form-group"> <label for="alamat">Alamat:</label> <input type="text" name="alamat_ceramah[]" class="form-control" required="" autocomplete="off"/> </div> </div> </div>'
                + '<div class="row"> <div class="col-md"> <div class="form-group"> <label>Fotocopy Passport:</label> <input id="paspor_narsum" class="form-control" type="file" name="paspor_narsum[]" required=""> </div> </div> <div class="col-md"> <div class="form-group"> <label>Pas Foto:</label> <input id="foto_narsum" class="form-control" type="file" name="foto_narsum[]" required=""> </div> </div> </div>'
                + '<div class="text-right"><button class="btn btn-danger" type="button" Title="Hapus" onclick="Del_narsum(' + nextform + ')"><i class="fas fa-minus-square"></i> Hapus</button></div></div>'
                );
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_2/Get_provinsi/'); ?>",
            type: 'get',
            dataType: 'json',
            cache: true,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("provinsi_narsum_" + nextform);
                    var opt = document.createElement("option");
                    opt.value = data[i].id_provinsi;
                    opt.text = data[i].nama;
                    sel.add(opt, sel.options[i]);
=======
    };
    function Save() {
        var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r;
        a = $('input[name="nama"]').val();
        b = $('input[name="tgl_lahir"]').val();
        c = $('input[name="ktp"]').val();
        d = $('input[name="mali"]').val();
        e = $('input[name="telpon"]').val();
        f = $('select[name="provinsi"]').val();
        g = $('select[name="kabupaten"]').val();
        h = $('select[name="kectxt"]').val();
        i = $('select[name="keltxt"]').val();
        j = $('input[name="nm_keg"]').val();
        k = $('input[name="tgl_awal_keg"]').val();
        l = $('input[name="tgl_akhir_keg"]').val();
        m = $('input[name="esti_keg"]').val();
        n = $('select[name="lembaga"]').val();
        o = $('select[name="negara"]').val();
        p = $('textarea[name="keterangan_kegiatan"]').val();
        q = $('input[name="alamat_kegiatan"]').val();
        r = $('input[name="lemb_keg"]').val();
        if (!a) {
            toastr.warning('Harap masukkan nama pemohon!');
        } else if (!b) {
            toastr.warning('Harap masukkan tanggal lahir pemohon!');
        } else if (!c) {
            toastr.warning('Harap masukkan nomor ktp pemohon!');
        } else if (!d) {
            toastr.warning('Harap masukkan email pemohon!');
        } else if (!e) {
            toastr.warning('Harap masukkan nomor telepon pemohon!');
        } else if (!f) {
            toastr.warning('Harap pilih provinsi pemohon!');
        } else if (!g) {
            toastr.warning('Harap pilih kabupaten pemohon!');
        } else if (!h) {
            toastr.warning('Harap pilih kecamatan pemohon!');
        } else if (!i) {
            toastr.warning('Harap pilih kelurahan pemohon!');
        } else if (!j) {
            toastr.warning('Harap masukkan nama kegiatan!');
        } else if (!k) {
            toastr.warning('Harap masukkan tanggal awal kegiatan!');
        } else if (!l) {
            toastr.warning('Harap masukkan tanggal akhir kegiatan!');
        } else if (!m) {
            toastr.warning('Harap masukkan estimasi peserta kegiatan!');
        } else if (!n) {
            toastr.warning('Harap pilih jenis lembaga kegiatan!');
        } else if (!o) {
            toastr.warning('Harap masukkan negara tujuan kegiatan!');
        } else if (!p) {
            toastr.warning('Harap masukkan keterangan kegiatan!');
        } else if (!q) {
            toastr.warning('Harap masukkan lokasi kegiatan!');
        } else if (!r) {
            toastr.warning('Harap masukkan nama lembaga kegiatan!');
        } else {
            $('#svbtn').attr('disabled', true);
        }
    }
    function Provinsi_user(val, id_kab) {
        $('#kectxt').children('option').remove();
        $('#kotkabtxt').children('option').remove();
        $('#keltxt').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkab?id_provinsi='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kotkabtxt");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kabupaten;
                    opt.text = data[i].kabupaten;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == id_kab) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                        Kecshow_user(opt.value,<?php echo $detil[0]->kecamatan_id_layanan; ?>);
                    }
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
<<<<<<< HEAD
        $("#jumlah-form").val(nextform);
        $('.custom-select').select2();
        $('#lahir_narsum' + nextform).datepicker({
            format: 'yyyy-mm-dd'
        });
    }
    function Del_narsum(id) {
        var a = "#repeat" + id;
        var b = $('input[name="jumlah_narsum"]').val();
        $(a).remove();
        $("#jumlah-form").val(parseInt(b) - 1);
=======
    }
    function Kecshow_user(val, id_kec) {
        $('#keltxt').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkec?id_kabupaten='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kectxt");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kecamatan;
                    opt.text = data[i].kecamatan;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == id_kec) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                        Kelshow_user(opt.value,<?php echo $detil[0]->kelurahan_id_layanan; ?>);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kecamatan");
            }
        });
    }
    function Kelshow_user(val, id_kel) {
        $('#keltxt').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkel?id_kecamatan='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("keltxt");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kelurahan;
                    opt.text = data[i].kelurahan;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == id_kel) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }
    function Edit() {
        $('#btn_edit').attr('disabled', true);
        var a, b, c, d, e, f, g, h, i, j, k, l, fd;
        a = $('input[name="pasport"]').val();
        b = $('input[name="ceramah"]').val();
        c = $('select[name="jkel"]').val();
        d = $('input[name="tmp_lahir"]').val();
        e = $('select[name="provinsi_narsum"]').val();
        f = $('select[name="kabupaten_narsum"]').val();
        g = $('select[name="kectxt_narsum"]').val();
        h = $('select[name="keltxt_narsum"]').val();
        i = $('input[name="lahir_narsum"]').val();
        j = $('input[name="alamat_ceramah"]').val();
        k = $('input[name="id_penceramah"]').val();
        l = $('input[name="id_layanan"]').val();
        if (!a) {
            toastr.warning('mohon masukkan nomor passport');
        } else if (!b) {
            toastr.warning('mohon masukkan nama penceramah');
        } else if (!c) {
            toastr.warning('mohon pilih jenis kelamin penceramah');
        } else if (!d) {
            toastr.warning('mohon masukkan tempat lahir penceramah');
        } else if (!e) {
            toastr.warning('mohon pilih provinsi penceramah');
        } else if (!f) {
            toastr.warning('mohon pilih kabupaten penceramah');
        } else if (!g) {
            toastr.warning('mohon pilih kecamatan penceramah');
        } else if (!h) {
            toastr.warning('mohon pilih kelurahan penceramah');
        } else if (!i) {
            toastr.warning('mohon masukkan tanggal lahir penceramah');
        } else if (!j) {
            toastr.warning('mohon masukkan alamat lengkap penceramah');
        } else {
            fd = new FormData();
            fd.append('nomor_passport', a);
            fd.append('nama_penceramah', b);
            fd.append('jenis_kelamin', c);
            fd.append('tempat_lahir', d);
            fd.append('id_prov', e);
            fd.append('id_kab', f);
            fd.append('id_kec', g);
            fd.append('id_kel', h);
            fd.append('tanggal_lahir', i);
            fd.append('alamat_rumah', j);
            fd.append('id_narsum', k);
            fd.append('layanan_id', l);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Urais/Layanan_2/Update_narsum/'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: fd,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.msg);
                        $('#btn_edit').removeAttr('disabled');
                    } else {
                        toastr.success(data.msg);
                        $('#btn_close').attr('disabled', true);
                        setInterval(function () {
                            location.reload();
                        }, 1500);
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat merubah cv penceramah!');
                    $('#btn_edit').removeAttr('disabled');
                }
            });
        }
    }
    function CV_narsum() {
        $('#o_cv').hide('slow');
        $('#e_cv').append(
                '<div class="input-group">'
                + '<input id="cv_penceramah" class="form-control" type="file" name="cv_penceramah" required="">'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_cv()" title="Batal Ubah CV"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_cv()" title="Simpan CV" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_cv() {
        $('#o_cv').show('slow');
        $('#e_cv').empty();
    }
    function S_cv() {
        var a, b, c, d, e;
        e = $('input[name="cv_penceramah"]').val();
        if (e) {
            c = new FormData();
            a = $('input[name="id_layanan"]').val();
            d = $('input[name="id_penceramah"]').val();
            b = $('#cv_penceramah')[0].files[0];
            c.append('cv_penceramah', b);
            c.append('id_layanan', a);
            c.append('id_penceramah', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Urais/Layanan_2/S_Cv/'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: c,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#a_cv').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                        $('#btn_cv' + d).removeAttr('href');
                        $('#btn_cv' + d).attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                        C_cv();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat merubah cv penceramah!');
                }
            });
        } else {
            toastr.warning('anda belum memilih cv untuk disimpan!');
        }
    }
    function Paspor_narsum() {
        $('#o_paspor').hide('slow');
        $('#e_paspor').append(
                '<div class="input-group">'
                + '<input id="paspor_penceramah" class="form-control" type="file" name="paspor_penceramah" required="">'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_paspor()" title="Batal Ubah Passport"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_paspor()" title="Simpan Passport" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_paspor() {
        $('#o_paspor').show('slow');
        $('#e_paspor').empty();
    }
    function S_paspor() {
        var a, b, c, d, e;
        e = $('input[name="paspor_penceramah"]').val();
        if (e) {
            c = new FormData();
            a = $('input[name="id_layanan"]').val();
            d = $('input[name="id_penceramah"]').val();
            b = $('#paspor_penceramah')[0].files[0];
            c.append('paspor_penceramah', b);
            c.append('id_layanan', a);
            c.append('id_penceramah', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Urais/Layanan_2/S_paspor/'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: c,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#a_paspor').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                        $('#btn_paspor' + d).removeAttr('href');
                        $('#btn_paspor' + d).attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                        C_paspor();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat merubah passport penceramah!');
                }
            });
        } else {
            toastr.warning('anda belum memilih passport untuk disimpan');
        }
    }
    function Foto_narsum() {
        $('#o_foto').hide('slow');
        $('#e_foto').append(
                '<div class="input-group">'
                + '<input id="foto_penceramah" class="form-control" type="file" name="foto_penceramah" required="">'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_foto()" title="Batal Ubah Pas Foto"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_foto()" title="Simpan Pas Foto" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_foto() {
        $('#o_foto').show('slow');
        $('#e_foto').empty();
    }
    function S_foto() {
        var a, b, c, d, e;
        e = $('input[name="foto_penceramah"]').val();
        if (e) {
            c = new FormData();
            a = $('input[name="id_layanan"]').val();
            d = $('input[name="id_penceramah"]').val();
            b = $('#foto_penceramah')[0].files[0];
            c.append('foto_penceramah', b);
            c.append('id_layanan', a);
            c.append('id_penceramah', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Urais/Layanan_2/S_foto/'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: c,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#a_foto').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                        $('#btn_foto' + d).removeAttr('href');
                        $('#btn_foto' + d).attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                        C_foto();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat merubah passport penceramah!');
                }
            });
        } else {
            toastr.warning('anda belum memilih pas foto untuk disimpan!');
        }
    }
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
    }
    function isNumber(b) {
        b = (b) ? b : window.event;
        var a = (b.which) ? b.which : b.keyCode;
        if (a > 31 && (a < 48 || a > 57)) {
            return false;
        }
        return true;
    }
    function Lembaga() {
        var a = $('select[name="lembaga"] option:selected').text();
        if (a === "Perorangan") {
            $('#nm_lemb').hide('slow');
            $('input[name="lemb_keg"]').attr('value', 'Perorangan');
        } else if (a === "Lembaga") {
            $('#nm_lemb').show('slow');
            $('input[name="lemb_keg"]').removeAttr('value');
        } else {
            $('#nm_lemb').hide('slow');
            $('input[name="lemb_keg"]').removeAttr('value');
        }
    }
    function Awal() {
        const today = moment();
<<<<<<< HEAD
        const todays = today.format("DD/MM/YYYY");
=======
        const todays = today.format("YYYY-MM-DD");
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
        const kegiatan = $('input[name="tgl_awal_keg"]').val();
        if (kegiatan < todays) {
            toastr.warning("Masukkan Tanggal Awal Kegiatan dengan benar!");
            $('input[name="tgl_awal_keg"]').val("");
        } else {
<<<<<<< HEAD

=======
            return true;
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
        }
    }
    function Tgl() {
        var a, b;
        a = $('input[name="tgl_awal_keg"]').val();
        b = $('input[name="tgl_akhir_keg"]').val();
        if (b < a) {
            $('input[name="tgl_akhir_keg"]').val("");
        } else {
            return true;
        }

    }
<<<<<<< HEAD

    function Provinsi_narsum(val) {
=======
    function Modal() {
        $('#modal_save').modal({backdrop: 'static', keyboard: false});
    }
    function Edit_penceramah(id, layanan) {
        $('#edit_penceramah').modal({backdrop: 'static', keyboard: false});
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_2/Get_narsum/'); ?>",
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
                id_layanan: layanan,
                id_penceramah: id
            },
            success: function (data) {
                if (data.status == false) {
                    toastr.error(data.msg);
                } else {
                    document.getElementById('edit_title').innerHTML = "Ubah data: " + data.data[0].narsum;
                    $('#param_penceramah').append(
                            '<input type="hidden" name="id_penceramah" value="' + id + '"/>'
                            + '<input type="hidden" name="id_layanan" value="' + layanan + '"/>'
                            );
                    $('#a_cv').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.data[0].dok_cv);
                    $('#a_paspor').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.data[0].dok_paspor);
                    $('#a_foto').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.data[0].dok_foto);
                    $('input[name="pasport"]').val(data.data[0].no_paspor);
                    $('input[name="ceramah"]').val(data.data[0].narsum);
                    $("#jkel").val(data.data[0].kelamin).change();
                    $('input[name="tmp_lahir"]').val(data.data[0].tempat_lahir);
                    $('input[name="lahir_narsum"]').val(data.data[0].tanggal_lahir);
                    $("#provinsi_narsum").val(data.data[0].id_prov).change();
                    Provinsi(data.data[0].id_prov, data.data[0].id_kab);
                    Kecshow(data.data[0].id_kab, data.data[0].id_kec);
                    Kelshow(data.data[0].id_kec, data.data[0].id_kel);
                    $('input[name="alamat_ceramah"]').val(data.data[0].alamat);
                }
            }
        });
    }
    function Provinsi(val, id_kab) {
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
        $('#kectxt_narsum').children('option').remove();
        $('#kotkabtxt_narsum').children('option').remove();
        $('#keltxt_narsum').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkab?id_provinsi='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kotkabtxt_narsum");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kabupaten;
                    opt.text = data[i].kabupaten;
                    sel.add(opt, sel.options[i]);
<<<<<<< HEAD
=======
                    if (opt.value == id_kab) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
    }
<<<<<<< HEAD
    function Kecshow_narsum(val) {
        $('#keltxt_narsum').children('option').remove();
=======
    function Kecshow(val, id_kec) {
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkec?id_kabupaten='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kectxt_narsum");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kecamatan;
                    opt.text = data[i].kecamatan;
                    sel.add(opt, sel.options[i]);
<<<<<<< HEAD
=======
                    if (opt.value == id_kec) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kecamatan");
            }
        });
    }
<<<<<<< HEAD
    function Kelshow_narsum(val) {
=======
    function Kelshow(val, id_kel) {
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
        $('#keltxt_narsum').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkel?id_kecamatan='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("keltxt_narsum");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kelurahan;
                    opt.text = data[i].kelurahan;
                    sel.add(opt, sel.options[i]);
<<<<<<< HEAD
=======
                    if (opt.value == id_kel) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    } else {

                    }
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }
<<<<<<< HEAD
    function Provinsi_narsum_2(val) {
        var prov = $('#provinsi_narsum_' + val).val();
        $('#kectxt_narsum_' + val).children('option').remove();
        $('#kotkabtxt_narsum_' + val).children('option').remove();
        $('#keltxt_narsum_' + val).children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkab?id_provinsi='); ?>" + prov,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kotkabtxt_narsum_" + val);
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kabupaten;
                    opt.text = data[i].kabupaten;
                    sel.add(opt, sel.options[i]);
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
    }
    function Kecshow_narsum_2(val) {
        var kab = $('#kotkabtxt_narsum_' + val).val();
        console.log(kab);
        $('#keltxt_narsum_' + val).children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkec?id_kabupaten='); ?>" + kab,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kectxt_narsum_" + val);
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kecamatan;
                    opt.text = data[i].kecamatan;
                    sel.add(opt, sel.options[i]);
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kecamatan");
            }
        });
    }
    function Kelshow_narsum_2(val) {
        var kec = $('#kectxt_narsum_' + val).val();
        $('#keltxt_narsum_' + val).children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkel?id_kecamatan='); ?>" + kec,
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("keltxt_narsum_" + val);
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kelurahan;
                    opt.text = data[i].kelurahan;
                    sel.add(opt, sel.options[i]);
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }
    function Modal() {
        $('#modal_save').modal({backdrop: 'static', keyboard: false});
    }
=======
    function Spk() {
        $('#o_spk').hide('slow');
        $('#e_spk').append(
                '<div class="input-group">'
                + '<input id="sp_keg" class="form-control" type="file" name="sp_keg" required="">'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_spk()" title="Batal Ganti SPK"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_spk()" title="Simpan SPK" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_spk() {
        $('#o_spk').show('slow');
        $('#e_spk').empty();
    }
    function S_spk() {
        var a, b, c;
        c = new FormData();
        a = $('input[name="id_layanan"]').val();
        b = $('#sp_keg')[0].files[0];
        c.append('sp_keg', b);
        c.append('id_layanan', a);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('Urais/Layanan_2/S_spk/'); ?>",
            cache: false,
            contentType: false,
            processData: false,
            enctype: "multipart/form-data",
            data: c,
            success: function (data) {
                if (data.status == 0) {
                    toastr.error(data.pesan);
                } else {
                    toastr.success(data.pesan);
                    $('#a_spk').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                    C_spk();
                }

            },
            error: function () {
                toastr.error('gagal menyimpan surat permohonan kegiatan!')
            }
        });
    }
    function Proposal() {
        $('#o_proposal').hide('slow');
        $('#e_proposal').append(
                '<div class="input-group">'
                + '<input id="proposal" class="form-control" type="file" name="proposal" required="">'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_proposal()" title="Batal Ganti Proposal"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_proposal()" title="Simpan Proposal" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_proposal() {
        $('#o_proposal').show('slow');
        $('#e_proposal').empty();
    }
    function S_proposal() {
        var a, b, c;
        c = new FormData();
        a = $('input[name="id_layanan"]').val();
        b = $('#proposal')[0].files[0];
        c.append('proposal', b);
        c.append('id_layanan', a);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('Urais/Layanan_2/S_proposal/'); ?>",
            cache: false,
            contentType: false,
            processData: false,
            enctype: "multipart/form-data",
            data: c,
            success: function (data) {
                if (data.status == 0) {
                    toastr.error(data.pesan);
                } else {
                    toastr.success(data.pesan);
                    $('#a_proposal').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                    C_proposal();
                }

            },
            error: function () {
                toastr.error('gagal menyimpan surat permohonan kegiatan!')
            }
        });
    }
>>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
</script>