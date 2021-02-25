<style>
    .nav-pills .nav-link.active, .show > .nav-pills .nav-link {
        color: #fff;
        background-color: #5bc0de;
    }
</style>
<div style="clear: both;margin:2% 0px;"></div>
<form action="<?php echo base_url(); ?>" method="post" enctype="multipart/form-data">
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
                                <input type="file" name="sp_1" class="form-control" required=""/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Anggaran Dasar</label>
                                <input type="file" name="anggaran" class="form-control" required=""/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>SK Badan Hukum</label>
                                <input type="file" name="sk_hukum" class="form-control" required=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label data-toggle="popover" data-trigger="click" title="" data-content="Surat Keterangan Domisili Usaha" data-original-title="SKDU">SKDU <i class="far fa-question-circle text-info"></i></label>
                                <input type="file" name="skdu" class="form-control" required=""/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label data-toggle="popover" data-trigger="click" title="" data-content="Bersedia menyampaikan laporan keuangan wakaf uang  meliputi jumlah, nilai dan hasil wakaf" data-original-title="LAPKEU">Laporan Keuangan <i class="far fa-question-circle text-info"></i></label>
                                <input type="file" name="lapkeu" class="form-control" required=""/>
                            </div>
                        </div>
                        <div class="col-md"></div>
                    </div>
                    <div style="clear:both;margin:15px 0px;"></div>
                    <div class="text-right">
                        <div class="form-group">
                            <a href="<?php echo base_url('Zakat/LKSPWU/index/'); ?>" class="btn btn-danger"><i class="fas fa-times-circle"></i> Batal</a>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_save" onclick="Modal()"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
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
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
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
        var a, b, c, d, e, f, g, h, i;
        a = $('input[name="mali"]').val();
        b = $('input[name="ktp"]').val();
        c = $('input[name="nama"]').val();
        d = $('input[name="lahir_pemohon"]').val();
        e = $('input[name="telpon"]').val();
        f = $('select[name="provinsi_pemohon"]').val();
        g = $('select[name="kabupaten_pemohon"]').val();
        h = $('select[name="kectxt_pemohon"]').val();
        i = $('select[name="keltxt_pemohon"]').val();
        if (!a) {
            toastr.warning('Harap masukkan email pemohon!');
        } else if (!b | !validateEmail(b)) {

        }

    }
</script>