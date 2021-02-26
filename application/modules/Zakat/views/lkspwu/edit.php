<style>
    .nav-pills .nav-link.active, .show > .nav-pills .nav-link {
        color: #fff;
        background-color: #5bc0de;
    }
</style>
<div style="clear: both;margin:2% 0px;"></div>
<form action="<?php echo base_url('Zakat/LKSPWU/Update/'); ?>" method="post" enctype="multipart/form-data">
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pemohon-tab" data-toggle="tab" href="#pemohon" role="tab" aria-controls="pemohon" aria-selected="true">Data Pemohon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="instansi-tab" data-toggle="tab" href="#instansi" role="tab" aria-controls="instansi" aria-selected="false">Data Instansi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dokmohon-tab" data-toggle="tab" href="#dokmohon" role="tab" aria-controls="dokmohon" aria-selected="false">Dokumen Permohonan</a>
                </li>
            </ul>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pemohon" role="tabpanel" aria-labelledby="pemohon-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="uname">Username:</label>
                                <input id="uname" type="text" name="uname" class="form-control" required="" autocomplete="off" value="<?php echo $detil['username']; ?>" disabled=""/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="mali">Email:</label>
                                <input id="mali" type="email" name="mali" class="form-control" required="" autocomplete="off" value="<?php echo $detil['email']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="ktp">Nomor KTP:</label>
                                <input id="ktp" type="text" name="ktp" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil['nik']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input id="nama" type="text" name="nama" class="form-control" required="" autocomplete="off" value="<?php echo $detil['fullname']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="lahir_pemohon">Tanggal Lahir:</label>
                                <input id="lahir_pemohon" type="text" name="lahir_pemohon" class="form-control datepicker" required="" autocomplete="off" onkeydown="return false;" value="<?php echo $detil['tgl_lhr']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="telpon">Telepon:</label>
                                <input id="telpon" type="text" name="telpon" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil['telp']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="provinsi_pemohon">Provinsi:</label>
                                <select id="provinsi_pemohon" name="provinsi_pemohon" required="" class="form-control custom-select" onchange="Provinsi_pemohon(this.value)">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        if ($prov->id_provinsi == $detil['id_prov_user']) {
                                            $selected = 'selected=""';
                                        } else {
                                            $selected = null;
                                        }
                                        echo '<option value="' . $prov->id_provinsi . '" ' . $selected . '>' . $prov->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="kotkabtxt">Kabupaten:</label>
                                <select name="kabupaten_pemohon" id="kabupaten_pemohon" class="form-control custom-select" onchange="Kecshow_pemohon(this.value)"></select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="kectxt">Kecamatan:</label>
                                <select name="kectxt_pemohon" id="kectxt_pemohon" class="form-control custom-select" onchange="Kelshow_pemohon(this.value)"></select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="keltxt">Kelurahan:</label>
                                <select name="keltxt_pemohon" id="keltxt_pemohon" class="form-control custom-select"></select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="instansi" role="tabpanel" aria-labelledby="instansi-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>SK bergerak dibidang keuangan syariah</label>
                                <br>
                                <?php
                                if ($detil['sk_keu_syariah']) {
                                    echo '<input type="radio" name="sk_keu" id="sk_keu" value="1" checked=""/>'
                                    . '<label class="form-check-label" for="sk_keu">Ya</label>'
                                    . '<br>'
                                    . '<input type="radio" name="sk_keu" id="sk_keu2" value="0">'
                                    . '<label class="form-check-label" for="sk_keu2">Tidak</label>';
                                } else {
                                    echo '<input type="radio" name="sk_keu" id="sk_keu" value="1"/>'
                                    . '<label class="form-check-label" for="sk_keu">Ya</label>'
                                    . '<br>'
                                    . '<input type="radio" name="sk_keu" id="sk_keu2" value="0" checked=""/>'
                                    . '<label class="form-check-label" for="sk_keu2">Tidak</label>';
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Memiliki fungsi menerima titipan</label>
                                <br>
                                <?php
                                if ($detil['fungsi_titipan']) {
                                    echo '<input type="radio" name="titipan" id="titipan" value="1" checked=""/>'
                                    . '<label class="form-check-label" for="titipan">Ya</label>'
                                    . '<br>'
                                    . '<input type="radio" name="titipan" id="titipan2" value="0"/>'
                                    . '<label class="form-check-label" for="titipan2">Tidak</label>';
                                } else {
                                    echo '<input type="radio" name="titipan" id="titipan" value="1"/>'
                                    . '<label class="form-check-label" for="titipan">Ya</label>'
                                    . '<br>'
                                    . '<input type="radio" name="titipan" id="titipan2" value="0" checked=""/>'
                                    . '<label class="form-check-label" for="titipan2">Tidak</label>';
                                }
                                ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" name="instansi" class="form-control" autocomplete="off" required="" value="<?php echo $detil['nm_instansi']; ?>"/>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="mali_instansi" class="form-control" autocomplete="off" required="" value="<?php echo $detil['email_instansi']; ?>"/>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select id="prov_instansi" name="prov_instansi" required="" class="form-control custom-select" onchange="Provinsi_instansi(this.value)">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        if ($prov->id_provinsi == $detil['id_prov_instansi']) {
                                            $select_inst = 'selected=""';
                                        } else {
                                            $select_inst = null;
                                        }
                                        echo '<option value="' . $prov->id_provinsi . '" ' . $select_inst . '>' . $prov->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kota/Kabupaten</label>
                                <select name="kabupaten_instansi" id="kab_instansi" class="form-control custom-select" onchange="Kecshow_instansi(this.value)"></select>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="tlepon_instansi" class="form-control" autocomplete="off" required="" onkeypress="return isNumber(event)" value="<?php echo $detil['telp_instansi']; ?>"/>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat_instansi" class="form-control" autocomplete="off" required="" value="<?php echo $detil['telp_instansi']; ?>"/>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="kec_instansi" id="kec_instansi" class="form-control custom-select" onchange="Kelshow_instansi(this.value)"></select>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kel_instansi" id="kel_instansi" class="form-control custom-select"></select>
                            </div>    
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="dokmohon" role="tabpanel" aria-labelledby="dokmohon-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label data-toggle="popover" data-trigger="click" title="" data-content="surat permohonan tertulis kepada menteri agama" data-original-title="Surat Permohonan">Surat Permohonan <i class="far fa-question-circle text-info"></i></label>
                            </div>
                            <div class="form-group" id="o_sp">
                                <button id="spbtn" type="button" class="btn btn-warning btn-xs" onclick="Ganti_sp()"><i class="far fa-edit"></i> Ubah</button>
                                <a id="view_sp" href="<?php echo base_url('assets/uploads/zakat/lkspwu/' . $detil['srt_prmhn_kementri_lkspwu']); ?>" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat</a>
                            </div>
                            <div class="form-group" id="edit_sp"></div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Anggaran Dasar</label>
                            </div>
                            <div class="form-group" id="o_ad">
                                <button id="adbtn" type="button" class="btn btn-warning btn-xs" onclick="Ganti_anggaran()"><i class="far fa-edit"></i> Ubah</button>
                                <a id="view_ad" href="<?php echo base_url('assets/uploads/zakat/lkspwu/' . $detil['agrn_dsr_lkspwu']); ?>" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat</a>
                            </div>
                            <div class="form-group" id="edit_ad"></div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>SK Badan Hukum</label>
                            </div>
                            <div class="form-group" id="o_skhukum">
                                <button id="skhukumbtn" type="button" class="btn btn-warning btn-xs" onclick="Ganti_skhukum()"><i class="far fa-edit"></i> Ubah</button>
                                <a id="view_skhukum" href="<?php echo base_url('assets/uploads/zakat/lkspwu//' . $detil['sk_hkm_lkspwu']); ?>" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat</a>
                            </div>
                            <div class="form-group" id="edit_skhukum"></div>
                        </div>
                    </div>
                    <div style="clear: both;margin:10px 0px;"></div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label data-toggle="popover" data-trigger="click" title="" data-content="Surat Keterangan Domisili Usaha" data-original-title="SKDU">SKDU <i class="far fa-question-circle text-info"></i></label>
                            </div>
                            <div class="form-group" id="o_skdu">
                                <button id="skdubtn" type="button" class="btn btn-warning btn-xs" onclick="Ganti_skdu()"><i class="far fa-edit"></i> Ubah</button>
                                <a id="view_skdu" href="<?php echo base_url('assets/uploads/zakat/lkspwu//' . $detil['skdu']); ?>" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat</a>
                            </div>
                            <div class="form-group" id="edit_skdu"></div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label data-toggle="popover" data-trigger="click" title="" data-content="Bersedia menyampaikan laporan keuangan wakaf uang  meliputi jumlah, nilai dan hasil wakaf" data-original-title="LAPKEU">Laporan Keuangan <i class="far fa-question-circle text-info"></i></label>
                            </div>
                            <div class="form-group" id="o_lapkeu">
                                <button id="lapkeubtn" type="button" class="btn btn-warning btn-xs" onclick="Ganti_lapkeu()"><i class="far fa-edit"></i> Ubah</button>
                                <a id="view_lapkeu" href="<?php echo base_url('assets/uploads/zakat/lkspwu//' . $detil['lapkeu_lkspwu']); ?>" class="btn btn-info btn-xs" target="_new"><i class="fas fa-eye"></i> Lihat</a>
                            </div>
                            <div class="form-group" id="edit_lapkeu"></div>
                        </div>
                        <div class="col-md"></div>
                    </div>
                    <div style="clear:both;margin:15px 0px;"></div>
                    <div class="text-right">
                        <div class="form-group">
                            <a href="<?php echo base_url('Zakat/LKSPWU/index/'); ?>" class="btn btn-danger"><i class="fas fa-times-circle"></i> Batal</a>
                            <button type="button" class="btn btn-success" onclick="Save()"><i class="fas fa-save"></i> Simpan</button>
                        </div>
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
                    <button id="svbtn" type="submit" class="btn btn-info">Ya!</button>
                </div>
            </div>
        </div>
    </div>
    <input id="id_layanan" type="hidden" name="id_layanan" value="<?php echo $detil['id_layanan']; ?>"/>
    <input id="id_user" type="hidden" name="id_user" value="<?php echo $detil['id_user']; ?>"/>
    <input id="id_stat" type="hidden" name="id_stat" value="<?php echo $detil['id_stat']; ?>"/>
    <input id="id_instansi" type="hidden" name="id_instansi" value="<?php echo $detil['id_instansi']; ?>"/>
    <input id="id_dokmohon" type="hidden" name="id_dokmohon" value="<?php echo $detil['id_dokmohon']; ?>"/>
    <input id="status_aktif" type="hidden" name="status_aktif" value="<?php echo $detil['status_aktif']; ?>"/>
    <input id="id_prov_instansi" type="hidden" name="id_prov_instansi" value="<?php echo $detil['id_prov_instansi']; ?>"/>
    <input id="id_kab_instansi" type="hidden" name="id_kab_instansi" value="<?php echo $detil['id_kab_instansi']; ?>"/>
    <input id="id_kec_instansi" type="hidden" name="id_kec_instansi" value="<?php echo $detil['id_kec_instansi']; ?>"/>
    <input id="id_kel_instansi" type="hidden" name="id_kel_instansi" value="<?php echo $detil['id_kel_instansi']; ?>"/>
    <input id="id_prov_user" type="hidden" name="id_prov_user" value="<?php echo $detil['id_prov_user']; ?>"/>
    <input id="id_kab_user" type="hidden" name="id_kab_user" value="<?php echo $detil['id_kab_user']; ?>"/>
    <input id="id_kec_user" type="hidden" name="id_kec_user" value="<?php echo $detil['id_kec_user']; ?>"/>
    <input id="id_kel_user" type="hidden" name="id_kel_user" value="<?php echo $detil['id_kel_user']; ?>"/>
</form>
<div style="clear: both;margin:5% 0px;"></div>
<input type="hidden" name="err_msg" value="<?php echo $msg['gagal']; ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $msg['sukses']; ?>"/>
<?php
unset($_SESSION['gagal']);
unset($_SESSION['sukses']);
?>
<script>
    window.onload = function () {
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: true,
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
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
        var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q;
        a = $('input[name="err_msg"]').val();
        b = $('input[name="succ_msg"]').val();
        c = $('select[name="lembaga"]').val();
        d = $('input[name="id_layanan"]').val();
        e = $('input[name="id_user"]').val();
        f = $('input[name="id_stat"]').val();
        g = $('input[name="id_instansi"]').val();
        h = $('input[name="id_dokmohon"]').val();
        i = $('input[name="status_aktif"]').val();
        j = $('input[name="id_prov_instansi"]').val();
        k = $('input[name="id_kab_instansi"]').val();
        l = $('input[name="id_kec_instansi"]').val();
        m = $('input[name="id_kel_instansi"]').val();
        n = $('input[name="id_prov_user"]').val();
        o = $('input[name="id_kab_user"]').val();
        p = $('input[name="id_kec_user"]').val();
        q = $('input[name="id_kel_user"]').val();
        if (a) {
            toastr.error(a);
        } else if (b) {
            toastr.success(b);
        }
        var wil_pemohon = {
            provinsi: n,
            kabupaten: o,
            kecamatan: p,
            kelurahan: q
        };
        var wil_instansi = {
            provinsi: j,
            kabupaten: k,
            kecamatan: l,
            kelurahan: m
        };
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        Provinsi_pemohon(wil_pemohon);
        Kecshow_pemohon(wil_pemohon);
        Kelshow_pemohon(wil_pemohon);
        Provinsi_instansi(wil_instansi);
        Kecshow_instansi(wil_instansi);
        Kelshow_instansi(wil_instansi);
    };
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }
    function isNumber(b) {
        b = (b) ? b : window.event;
        var a = (b.which) ? b.which : b.keyCode;
        if (a > 31 && (a < 48 || a > 57)) {
            toastr.warning("Hanya boleh di isi dengan angka!");
            return false;
        }
    }
    function Provinsi_pemohon(val) {
        $('#kectxt_pemohon').children('option').remove();
        $('#kabupaten_pemohon').children('option').remove();
        $('#keltxt_pemohon').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkab?id_provinsi='); ?>" + val['provinsi'],
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kabupaten_pemohon");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kabupaten;
                    opt.text = data[i].kabupaten;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == val['kabupaten']) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
    }
    function Kecshow_pemohon(val) {
        $('#keltxt_pemohon').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkec?id_kabupaten='); ?>" + val['kabupaten'],
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kectxt_pemohon");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kecamatan;
                    opt.text = data[i].kecamatan;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == val['kecamatan']) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kecamatan");
            }
        });
    }
    function Kelshow_pemohon(val) {
        $('#keltxt_pemohon').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkel?id_kecamatan='); ?>" + val['kecamatan'],
            type: 'get',
            dataType: 'json',
            cache: false,
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("keltxt_pemohon");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kelurahan;
                    opt.text = data[i].kelurahan;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == val['kelurahan']) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }
    function Provinsi_instansi(val) {
        $('#kec_instansi').children('option').remove();
        $('#kab_instansi').children('option').remove();
        $('#kel_instansi').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkab?id_provinsi='); ?>" + val['provinsi'],
            type: 'get',
            dataType: 'json',
            cache: false, success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kab_instansi");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kabupaten;
                    opt.text = data[i].kabupaten;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == val['kabupaten']) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
    }
    function Kecshow_instansi(val) {
        $('#kel_instansi').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkec?id_kabupaten='); ?>" + val['kabupaten'],
            type: 'get',
            dataType: 'json',
            cache: false, success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kec_instansi");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kecamatan;
                    opt.text = data[i].kecamatan;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == val['kecamatan']) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kecamatan");
            }
        });
    }
    function Kelshow_instansi(val) {
        $('#kel_instansi').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkel?id_kecamatan='); ?>" + val['kecamatan'],
            type: 'get',
            dataType: 'json',
            cache: false, success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kel_instansi");
                    var opt = document.createElement("option");
                    opt.value = data[i].id_kelurahan;
                    opt.text = data[i].kelurahan;
                    sel.add(opt, sel.options[i]);
                    if (opt.value == val['kelurahan']) {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }
    function Save() {
        var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s;
        a = $('input[name="mali"]').val();
        b = $('input[name="ktp"]').val();
        c = $('input[name="nama"]').val();
        d = $('input[name="lahir_pemohon"]').val();
        e = $('input[name="telpon"]').val();
        f = $('select[name="provinsi_pemohon"]').val();
        g = $('select[name="kabupaten_pemohon"]').val();
        h = $('select[name="kectxt_pemohon"]').val();
        i = $('select[name="keltxt_pemohon"]').val();
        j = $('input[name="sk_keu"]').val();
        k = $('input[name="titipan"]').val();
        l = $('input[name="instansi"]').val();
        m = $('input[name="mali_instansi"]').val();
        n = $('select[name="prov_instansi"]').val();
        o = $('select[name="kabupaten_instansi"]').val();
        p = $('input[name="tlepon_instansi"]').val();
        q = $('input[name="alamat_instansi"]').val();
        r = $('select[name="kec_instansi"]').val();
        s = $('select[name="kel_instansi"]').val();
        if (!a | !validateEmail(a)) {
            toastr.warning('Harap masukkan email pemohon!');
        } else if (!b) {
            toastr.warning('Harap masukkan nomor ktp pemohon!');
        } else if (!c) {
            toastr.warning('Harap masukkan nama pemohon!');
        } else if (!d) {
            toastr.warning('Harap masukkan tanggal lahir pemohon!');
        } else if (!e) {
            toastr.warning('Harap masukkan nomor telepon pemohon!');
        } else if (!f) {
            toastr.warning('Harap masukkan provinsi pemohon!');
        } else if (!g) {
            toastr.warning('Harap masukkan kabupaten pemohon!');
        } else if (!h) {
            toastr.warning('Harap masukkan kecamatan pemohon!');
        } else if (!i) {
            toastr.warning('Harap masukkan kelurahan pemohon!');
        } else if (!j) {
            toastr.warning('Harap pilih sk keuangan syariah!');
        } else if (!k) {
            toastr.warning('Harap pilih fungsi titipan!');
        } else if (!l) {
            toastr.warning('Harap masukkan nama instansi!');
        } else if (!m) {
            toastr.warning('Harap masukkan email instansi!');
        } else if (!n) {
            toastr.warning('Harap masukkan provinsi instansi!');
        } else if (!o) {
            toastr.warning('Harap masukkan kabupaten instansi!');
        } else if (!p) {
            toastr.warning('Harap masukkan nomor telepon instansi!');
        } else if (!q) {
            toastr.warning('Harap masukkan alamat instansi!');
        } else if (!r) {
            toastr.warning('Harap masukkan kecamatan instansi!');
        } else if (!s) {
            toastr.warning('Harap masukkan kelurahan instansi!');
        } else {
            $('#modal_save').modal({show: true, backdrop: 'static', keyboard: false});
        }
    }
    function Ganti_sp() {
        $('#o_sp').hide('slow');
        $('#edit_sp').append(
                '<div class="input-group">'
                + '<input id="sptxt" class="form-control" type="file" name="sptxt" required="">'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_sp()" title="Batal ubah"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_sp()" title="Simpan perubahan" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_sp() {
        $('#o_sp').show('slow');
        $('#edit_sp').empty();
    }
    function S_sp() {
        var a, b, c, d, e;
        e = $('input[name="sptxt"]').val();
        if (e) {
            a = new FormData();
            b = $('input[name="id_layanan"]').val();
            c = $('input[name="id_dokmohon"]').val();
            d = $('#sptxt')[0].files[0];
            a.append('id_layanan', b);
            a.append('id_dokmohon', c);
            a.append('surat_permohonan', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Zakat/LKSPWU/Update_dokmohon?dokmohon=surat_permohonan&field=srt_prmhn_kementri_lkspwu'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: a,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#view_sp').attr('href', '<?php echo base_url('assets/uploads/zakat/lkspwu/'); ?>' + data.file_name);
                        C_sp();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat menyimpan dokumen!');
                }
            });
        } else {
            toastr.warning('Anda belum memilih dokumen untuk diubah!');
        }
    }
    function Ganti_anggaran() {
        $('#o_ad').hide('slow');
        $('#edit_ad').append(
                '<div class="input-group">'
                + '<input id="anggaran_dasar" class="form-control" type="file" name="anggaran_dasar" required=""/>'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_ad()" title="Batal ubah"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_ad()" title="Simpan perubahan" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_ad() {
        $('#o_ad').show('slow');
        $('#edit_ad').empty();
    }
    function S_ad() {
        var a, b, c, d, e;
        e = $('input[name="anggaran_dasar"]').val();
        if (e) {
            a = new FormData();
            b = $('input[name="id_layanan"]').val();
            c = $('input[name="id_dokmohon"]').val();
            d = $('#anggaran_dasar')[0].files[0];
            a.append('id_layanan', b);
            a.append('id_dokmohon', c);
            a.append('anggaran_dasar', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Zakat/LKSPWU/Update_dokmohon?dokmohon=anggaran_dasar&field=agrn_dsr_lkspwu'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: a,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#view_ad').attr('href', '<?php echo base_url('assets/uploads/zakat/lkspwu/'); ?>' + data.file_name);
                        C_ad();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat menyimpan dokumen!');
                }
            });
        } else {
            toastr.warning('Anda belum memilih dokumen untuk diubah!');
        }
    }
    function Ganti_skhukum() {
        $('#o_skhukum').hide('slow');
        $('#edit_skhukum').append(
                '<div class="input-group">'
                + '<input id="sk_hukum" class="form-control" type="file" name="sk_hukum" required=""/>'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_skhukum()" title="Batal ubah"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_skhukum()" title="Simpan perubahan" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_skhukum() {
        $('#o_skhukum').show('slow');
        $('#edit_skhukum').empty();
    }
    function S_skhukum() {
        var a, b, c, d, e;
        e = $('input[name="sk_hukum"]').val();
        if (e) {
            a = new FormData();
            b = $('input[name="id_layanan"]').val();
            c = $('input[name="id_dokmohon"]').val();
            d = $('#sk_hukum')[0].files[0];
            a.append('id_layanan', b);
            a.append('id_dokmohon', c);
            a.append('sk_hukum', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Zakat/LKSPWU/Update_dokmohon?dokmohon=sk_hukum&field=sk_hkm_lkspwu'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: a,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#view_skhukum').attr('href', '<?php echo base_url('assets/uploads/zakat/lkspwu/'); ?>' + data.file_name);
                        C_skhukum();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat menyimpan dokumen!');
                }
            });
        } else {
            toastr.warning('Anda belum memilih dokumen untuk diubah!');
        }
    }
    function Ganti_skdu() {
        $('#o_skdu').hide('slow');
        $('#edit_skdu').append(
                '<div class="input-group">'
                + '<input id="skdu" class="form-control" type="file" name="skdu" required=""/>'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_skdu()" title="Batal ubah"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_skdu()" title="Simpan perubahan" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_skdu() {
        $('#o_skdu').show('slow');
        $('#edit_skdu').empty();
    }
    function S_skdu() {
        var a, b, c, d, e;
        e = $('input[name="skdu"]').val();
        if (e) {
            a = new FormData();
            b = $('input[name="id_layanan"]').val();
            c = $('input[name="id_dokmohon"]').val();
            d = $('#skdu')[0].files[0];
            a.append('id_layanan', b);
            a.append('id_dokmohon', c);
            a.append('skdu', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Zakat/LKSPWU/Update_dokmohon?dokmohon=skdu&field=skdu'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: a,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#view_skdu').attr('href', '<?php echo base_url('assets/uploads/zakat/lkspwu/'); ?>' + data.file_name);
                        C_skdu();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat menyimpan dokumen!');
                }
            });
        } else {
            toastr.warning('Anda belum memilih dokumen untuk diubah!');
        }
    }

    function Ganti_lapkeu() {
        $('#o_lapkeu').hide('slow');
        $('#edit_lapkeu').append(
                '<div class="input-group">'
                + '<input id="lapkeu" class="form-control" type="file" name="lapkeu" required=""/>'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_lapkeu()" title="Batal ubah"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_lapkeu()" title="Simpan perubahan" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_lapkeu() {
        $('#o_lapkeu').show('slow');
        $('#edit_lapkeu').empty();
    }
    function S_lapkeu() {
        var a, b, c, d, e;
        e = $('input[name="lapkeu"]').val();
        if (e) {
            a = new FormData();
            b = $('input[name="id_layanan"]').val();
            c = $('input[name="id_dokmohon"]').val();
            d = $('#lapkeu')[0].files[0];
            a.append('id_layanan', b);
            a.append('id_dokmohon', c);
            a.append('lapkeu', d);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Zakat/LKSPWU/Update_dokmohon?dokmohon=lapkeu&field=lapkeu_lkspwu'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                enctype: "multipart/form-data",
                data: a,
                success: function (data) {
                    if (data.status == 0) {
                        toastr.error(data.pesan);
                    } else {
                        toastr.success(data.pesan);
                        $('#view_skdu').attr('href', '<?php echo base_url('assets/uploads/zakat/lkspwu/'); ?>' + data.file_name);
                        C_lapkeu();
                    }
                },
                error: function () {
                    toastr.error('terjadi kesalahan saat menyimpan dokumen!');
                }
            });
        } else {
            toastr.warning('Anda belum memilih dokumen untuk diubah!');
        }
    }
</script>