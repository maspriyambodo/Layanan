<style>
    .nav-pills .nav-link.active, .show > .nav-pills .nav-link {
        color: #fff;
        background-color: #5bc0de;
    }
</style>
<form action="<?php echo base_url('Urais/Layanan_2/Simpan/'); ?>" method="post" enctype="multipart/form-data">
    <div class="card card-custom" style="margin-top:1.32857em;">
        <div class="card-header">
            <div class="card-title">
                <h5>Data Pemohon</h5>
            </div>
        </div>
        <div class="card-body">
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
                        <select id="provinsi_pemohon" name="provinsi_pemohon" required="" class="form-control custom-select" onchange="Provinsi(this.value)">
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
                        <select name="kabupaten_pemohon" id="kotkabtxt" class="form-control custom-select" onchange="Kecshow(this.value)"></select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="kectxt">Kecamatan:</label>
                        <select name="kectxt_pemohon" id="kectxt" class="form-control custom-select" onchange="Kelshow(this.value)"></select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="keltxt">Kelurahan:</label>
                        <select name="keltxt_pemohon" id="keltxt" class="form-control custom-select"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom" style="margin-top:1.32857em;">
        <div class="card-header">
            <div class="card-title">
                <h5>Data Kegiatan</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="nm_keg">Nama Kegiatan:</label>
                        <input id="nm_keg" type="text" name="nm_keg" class="form-control" required="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="tgl_awal_keg">Tanggal Awal Kegiatan:</label>
                        <input id="tgl_awal_keg" type="text" name="tgl_awal_keg" class="form-control datepicker" required="" autocomplete="off" onchange="Awal()" onkeydown="return false;"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="tgl_akhir_keg">Tanggal Akhir Kegiatan:</label>
                        <input id="tgl_akhir_keg" type="text" name="tgl_akhir_keg" class="form-control datepicker" required="" autocomplete="off" onchange="Tgl()" onkeydown="return false;"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="esti_keg">Estimasi Peserta:</label>
                        <input id="esti_keg" type="text" name="esti_keg" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="lembaga">Lembaga:</label>
                        <select id="lembaga" name="lembaga" class="form-control custom-select" required="" onchange="return Lembaga(this.value)">
                            <option value="">Pilih Jenis</option>
                            <option value="1">Perorangan</option>
                            <option value="2">Lembaga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_kegiatan">Lokasi Kegiatan:</label>
                        <input id="alamat_kegiatan" type="text" name="alamat_kegiatan" class="form-control" autocomplete="off" required=""/>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara Tujuan:</label>
                        <select id="negara" class="negara form-control custom-select" name="negara" required="">
                            <option value=""></option>
                            <?php
                            foreach ($negara as $negara) {
                                echo '<option value="' . $negara->id . '">' . $negara->country . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group" id="nm_lemb">
                        <label for="lemb_keg">Nama Lembaga:</label>
                        <input id="lemb_keg" type="text" name="lemb_keg" class="form-control" autocomplete="off" required=""/>
                    </div>
                    <div class="form-group">
                        <label for="keterangan_kegiatan">Keterangan Kegiatan:</label>
                        <textarea id="keterangan_kegiatan" name="keterangan_kegiatan" class="form-control" required="" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom" style="margin-top:1.32857em;">
        <div class="card-header">
            <div class="card-title">
                <h5>Data Penceramah</h5>
            </div>
        </div>
        <div class="card-body">
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
                                echo '<option value="' . $prov->id_provinsi . '">' . $prov->nama . '</option>';
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
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="paspor_narsum">Fotocopy Passport:</label>
                        <input id="paspor_narsum" class="form-control" type="file" name="paspor_narsum[]" required=""/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="foto_narsum">Pas Foto:</label>
                        <input id="foto_narsum" class="form-control" type="file" name="foto_narsum[]" required=""/>
                    </div>
                </div>
            </div>
            <div id="repeat_narsum"></div>
            <hr>
            <input type="hidden" id="jumlah-form" name="jumlah_narsum" value="1">
            <div class="form-group" style="margin: 10px 0px;">
                <button type="button" id="narsumbtn" class="btn btn-info" title="Tambah Penceramah" onclick="Tambah()"><i class="fas fa-plus-square"></i> Tambah</button>
            </div>
        </div>
    </div>
    <div class="card card-custom" style="margin-top:1.32857em;">
        <div class="card-header">
            <div class="card-title">
                <h5>Dokumen Permohonan</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="ktp_keg" class="form-label">Surat Permohonan Kegiatan:</label>
                            <input class="form-control" type="file" id="sp_keg" name="sp_keg" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="proposal" class="form-label">Proposal Kegiatan:</label>
                            <input class="form-control" type="file" id="proposal" name="proposal" required="">
                        </div>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
            <div class="form-group text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_save" onclick="Modal()"><i class="fas fa-save"></i> Simpan</button>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak!</button>
                    <button id="svbtn" type="submit" class="btn btn-info" onclick="Save()">Ya!</button>
                </div>
            </div>
        </div>
    </div>
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
        $('#nm_lemb').hide('slow');
        $('.custom-select').select2();
        $('input[name="tgl_awal_keg"]').val(moment().format("YYYY-MM-DD"));
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
        // l = $('input[name="tgl_awal_keg"]').val();
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
        if (!a) {
            toastr.warning("Harap masukkan nama pemohon!");
        } else if (!b | !validateEmail(b)) {
            toastr.warning("Harap masukkan email pemohon!");
        } else if (!c) {
            toastr.warning("Harap masukkan nomor ktp pemohon!");
        } else if (!d) {
            toastr.warning("Harap masukkan nomor ktp pemohon!");
        } else if (!e) {
            toastr.warning("Harap masukkan tanggal lahir pemohon!");
        } else if (!f) {
            toastr.warning("Harap masukkan nomor telepon pemohon!");
        } else if (!g) {
            toastr.warning("Harap masukkan provinsi pemohon!");
        } else if (!h) {
            toastr.warning("Harap masukkan kabupaten pemohon!");
        } else if (!i) {
            toastr.warning("Harap masukkan kecamatan pemohon!");
        } else if (!j) {
            toastr.warning("Harap masukkan kelurahan pemohon!");
        } else if (!j) {
            toastr.warning("Harap masukkan nama kegiatan!");
// <<<<<<< HEAD
//         // } else if (l == "") {
//         //     toastr.warning("Harap masukkan tanggal kegiatan!");
//         } else if (m == "") {
// =======
//         } else if (!l) {
//             toastr.warning("Harap masukkan tanggal kegiatan!");
//         } else if (!m) {
// >>>>>>> 475628b860a9e732138fb05170c3fc6564e271c3
            // toastr.warning("Harap masukkan tanggal kegiatan!");
        } else if (!n) {
            toastr.warning("Harap masukkan estimasi peserta kegiatan!");
        } else if (!o) {
            toastr.warning("Harap memilih jenis lembaga!");
        } else if (!p) {
            toastr.warning("Harap masukkan nama lembaga kegiatan!");
        } else if (!q) {
            toastr.warning("Harap masukkan alamat atau lokasi kegiatan!");
        } else if (!r) {
            toastr.warning("Harap memilih negara tujuan kegiatan!");
        } else if (!s) {
            toastr.warning("Harap masukkan keterangan kegiatan!");
        } else if (!t) {
            toastr.warning("Harap masukkan nomor passport penceramah!");
        } else if (!u) {
            toastr.warning("Harap masukkan nama lengkap penceramah!");
        } else if (!v) {
            toastr.warning("Harap pilih jenis kelamin penceramah!");
        } else if (!w) {
            toastr.warning("Harap masukkan tempat lahir penceramah!");
        } else if (!x) {
            toastr.warning("Harap masukkan provinsi penceramah!");
        } else if (!y) {
            toastr.warning("Harap masukkan kabupaten penceramah!");
        } else if (!z) {
            toastr.warning("Harap masukkan kecamatan penceramah!");
        } else if (!ab) {
            toastr.warning("Harap masukkan kelurahan penceramah!");
        } else if (!ac) {
            toastr.warning("Harap masukkan tanggal lahir penceramah!");
        } else if (!ad) {
            toastr.warning("Harap masukkan cv atau resume penceramah!");
        } else if (!ae) {
            toastr.warning("Harap masukkan fotocopy passport penceramah!");
        } else if (!af) {
            toastr.warning("Harap masukkan pas foto penceramah!");
        } else if (!ag) {
            toastr.warning("Harap masukkan surat permohonan kegiatan!");
        } else if (!ah) {
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
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
        const todays = today.format("YYYY-MM-DD");
        const kegiatan = $('input[name="tgl_awal_keg"]').val();
        if (kegiatan < todays) {
            toastr.warning("Masukkan Tanggal Awal Kegiatan dengan benar!");
            $('input[name="tgl_awal_keg"]').val("");
        } else {

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
    function Provinsi(val) {
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
    }
    function Kecshow(val) {
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kecamatan");
            }
        });
    }
    function Kelshow(val) {
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }
    function Provinsi_narsum(val) {
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kabupaten");
            }
        });
    }
    function Kecshow_narsum(val) {
        $('#keltxt_narsum').children('option').remove();
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kecamatan");
            }
        });
    }
    function Kelshow_narsum(val) {
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
                }
            },
            error: function () {
                toastr.error("Error ketika mengambil data kelurahan");
            }
        });
    }
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
</script>