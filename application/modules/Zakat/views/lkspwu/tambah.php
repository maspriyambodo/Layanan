<style>
    .nav-pills .nav-link.active, .show > .nav-pills .nav-link {
        color: #fff;
        background-color: #5bc0de;
    }
</style>
<form action="<?php echo base_url('Zakat/LKSPWU/Simpan/'); ?>" method="post" enctype="multipart/form-data">
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Pemohon</a>
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
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="uname">Username:</label>
                                <input id="uname" type="text" name="uname" class="form-control" required="" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="mali">Email:</label>
                                <input id="mali" type="email" name="mali" class="form-control" required="" autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="ktp">Nomor KTP:</label>
                                <input id="ktp" type="text" name="ktp" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label>
                                <input id="nama" type="text" name="nama" class="form-control" required="" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="lahir_pemohon">Tanggal Lahir:</label>
                                <input id="lahir_pemohon" type="text" name="lahir_pemohon" class="form-control datepicker" required="" autocomplete="off" onkeydown="return false;"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="telpon">Telepon:</label>
                                <input id="telpon" type="text" name="telpon" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)"/>
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
                                        echo '<option value="' . $prov->id_provinsi . '">' . $prov->nama . '</option>';
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
                                <input type="radio" name="sk_keu" id="sk_keu" value="1">
                                <label class="form-check-label" for="sk_keu">
                                    Ya
                                </label>
                                <br>
                                <input type="radio" name="sk_keu" id="sk_keu2" value="0">
                                <label class="form-check-label" for="sk_keu2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Memiliki fungsi menerima titipan</label>
                                <br>
                                <input type="radio" name="titipan" id="titipan" value="1">
                                <label class="form-check-label" for="titipan">
                                    Ya
                                </label>
                                <br>
                                <input type="radio" name="titipan" id="titipan2" value="0">
                                <label class="form-check-label" for="titipan2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" name="instansi" class="form-control" autocomplete="off" required=""/>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="mali_instansi" class="form-control" autocomplete="off" required=""/>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select id="prov_instansi" name="prov_instansi" required="" class="form-control custom-select" onchange="Provinsi_instansi(this.value)">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        echo '<option value="' . $prov->id_provinsi . '">' . $prov->nama . '</option>';
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
                                <input type="text" name="tlepon_instansi" class="form-control" autocomplete="off" required="" onkeypress="return isNumber(event)"/>
                            </div>    
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat_instansi" class="form-control" autocomplete="off" required=""/>
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
    <div class="modal fade" id="modal_save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Simpan Data</h4>
                </div>
                <div class="modal-body">
                    Anda yakin ingin simpan data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger close_btn" data-dismiss="modal">Tidak!</button>
                    <button id="svbtn" type="submit" class="btn btn-info" onclick="Save()">Ya!</button>
                </div>
            </div>
        </div>
    </div>
</form>
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
        var a, b;
        a = $('input[name="err_msg"]').val();
        b = $('input[name="succ_msg"]').val();
        if (a !== "") {
            toastr.error(a);
        } else if (b !== "") {
            toastr.success(b);
        }
        $('.custom-select').select2();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    };
    function Provinsi_instansi(val) {
        $('#kec_instansi').children('option').remove();
        $('#kab_instansi').children('option').remove();
        $('#kel_instansi').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkab?id_provinsi='); ?>" + val,
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
            url: "<?php echo base_url('Urais/Layanan_1/Getkec?id_kabupaten='); ?>" + val,
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
            url: "<?php echo base_url('Urais/Layanan_1/Getkel?id_kecamatan='); ?>" + val,
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }

    function Provinsi_pemohon(val) {
        $('#kectxt_pemohon').children('option').remove();
        $('#kabupaten_pemohon').children('option').remove();
        $('#keltxt_pemohon').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkab?id_provinsi='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false, success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kabupaten_pemohon");
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
    function Kecshow_pemohon(val) {
        $('#keltxt_pemohon').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkec?id_kabupaten='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false, success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("kectxt_pemohon");
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
    function Kelshow_pemohon(val) {
        $('#keltxt_pemohon').children('option').remove();
        $.ajax({
            url: "<?php echo base_url('Urais/Layanan_1/Getkel?id_kecamatan='); ?>" + val,
            type: 'get',
            dataType: 'json',
            cache: false, success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    var sel = document.getElementById("keltxt_pemohon");
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
    function Save() {
        var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, x, y, z;
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
        k = $('input[name="instansi"]').val();
        l = $('input[name="mali_instansi"]').val();
        m = $('input[name="tlepon_instansi"]').val();
        n = $('input[name="alamat_instansi"]').val();
        o = $('select[name="prov_instansi"]').val();
        p = $('select[name="kabupaten_instansi"]').val();
        q = $('select[name="kec_instansi"]').val();
        r = $('select[name="kel_instansi"]').val();
        s = $('input[name="sp_1"]').val();
        t = $('input[name="anggaran"]').val();
        u = $('input[name="sk_hukum"]').val();
        v = $('input[name="skdu"]').val();
        x = $('input[name="lapkeu"]').val();
        y = $('input[name="sk_keu"]').val();
        z = $('input[name="titipan"]').val();
        if (!a) {
            toastr.warning('Harap masukkan username pemohon!');
            $('#modal_save').modal('toggle');
        } else if (!b | !validateEmail(b)) {
            toastr.warning('Harap masukkan email pemohon!');
        } else if (!c) {
            toastr.warning('Harap masukkan nomor ktp pemohon!');
        } else if (!d) {
            toastr.warning('Harap masukkan nama lengkap pemohon!');
        } else if (!e) {
            toastr.warning('Harap masukkan tanggal lahir pemohon!');
        } else if (!f) {
            toastr.warning('Harap masukkan nomor telepon pemohon!');
        } else if (!g) {
            toastr.warning('Harap masukkan provinsi pemohon!');
        } else if (!h) {
            toastr.warning('Harap masukkan kabupaten pemohon!');
        } else if (!i) {
            toastr.warning('Harap masukkan kecamatan pemohon!');
        } else if (!j) {
            toastr.warning('Harap masukkan kelurahan pemohon!');
        } else if (!k) {
            toastr.warning('Harap masukkan nama instansi!');
        } else if (!l) {
            toastr.warning('Harap masukkan email instansi!');
        } else if (!m) {
            toastr.warning('Harap masukkan nomor telepon instansi!');
        } else if (!n) {
            toastr.warning('Harap masukkan alamat instansi!');
        } else if (!o) {
            toastr.warning('Harap masukkan provinsi instansi!');
        } else if (!p) {
            toastr.warning('Harap masukkan kabupaten instansi!');
        } else if (!q) {
            toastr.warning('Harap masukkan kecamatan instansi!');
        } else if (!r) {
            toastr.warning('Harap masukkan kelurahan instansi!');
        } else if (!s) {
            toastr.warning('Harap masukkan dokumen permohonan!');
        } else if (!t) {
            toastr.warning('Harap masukkan dokumen anggaran dasar!');
        } else if (!u) {
            toastr.warning('Harap masukkan dokumen sk hukum!');
        } else if (!v) {
            toastr.warning('Harap masukkan dokumen skdu!');
        } else if (!w) {
            toastr.warning('Harap masukkan dokumen sk usaha!');
        } else if (!x) {
            toastr.warning('Harap masukkan dokumen laporan keuangan!');
        } else if (!y) {
            toastr.warning('Harap memilih SK Keu Syariah!');
        } else if (!z) {
            toastr.warning('Harap memilih fungsi menerima titipan!');
        } else {
            $('#svbtn').attr('disabled', true);
        }
        return $('#modal_save').modal('toggle');
    }
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }
    function isNumber(b) {
        b = (b) ? b : window.event;
        var a = (b.which) ? b.which : b.keyCode;
        if (a > 31 && (a < 48 || a > 57)) {
            return false;
        }
        return true;
    }
</script>