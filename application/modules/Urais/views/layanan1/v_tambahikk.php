<form action="<?php echo base_url('Urais/Layanan_1/Simpan/'); ?>" method="post" enctype="multipart/form-data">
    <div class="card card-custom" style="margin-top:1.32857em;">
        <div class="card-header">
            <div class="card-title">
                Detail Data Pemohon
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Nomor KTP:</label>
                        <input type="text" name="ktp" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Nama Lengkap:</label>
                        <input type="text" name="nama" class="form-control" required="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Tanggal Lahir:</label>
                        <input type="date" name="tgl_lahir" class="form-control" required="" autocomplete="off"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="uname" class="form-control" required="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="mali" class="form-control" required="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Telepon:</label>
                        <input type="text" name="telpon" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom" style="margin-top:1.32857em;">
        <div class="card-header">
            <div class="card-title">
                Detail Data Kegiatan
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Nama Kegiatan:</label>
                        <input type="text" name="nm_keg" class="form-control" required="" autocomplete="off"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Tanggal Awal Kegiatan:</label>
                        <input type="date" name="tgl_awal_keg" class="form-control" required="" autocomplete="off" onchange="Awal()"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Tanggal Akhir Kegiatan:</label>
                        <input type="date" name="tgl_akhir_keg" class="form-control" required="" autocomplete="off" onchange="Tgl()"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Estimasi Peserta:</label>
                        <input type="text" name="esti_keg" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Lembaga:</label>
                        <select name="lembaga" class="form-control custom-select" required="" onchange="return Lembaga(this.value)">
                            <option value="">Pilih Jenis</option>
                            <option value="1">Perorangan</option>
                            <option value="2">Lembaga</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group" id="nm_lemb">
                        <label>Nama Lembaga:</label>
                        <input type="text" name="lemb_keg" class="form-control" autocomplete="off" required=""/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Provinsi:</label>
                        <select name="provinsi" required="" class="form-control custom-select" onchange="Provinsi(this.value)">
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
                        <label>Kabupaten:</label>
                        <select name="kabupaten" id="kotkabtxt" class="form-control custom-select" onchange="Kecshow(this.value)"></select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Kecamatan:</label>
                        <select name="kectxt" id="kectxt" class="form-control custom-select" onchange="Kelshow(this.value)"></select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Kelurahan:</label>
                        <select name="keltxt" id="keltxt" class="form-control custom-select"></select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label>Lokasi Kegiatan:</label>
                        <input type="text" name="alamat_kegiatan" class="form-control" autocomplete="off" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Narasumber / Penceramah:</label>
                        <input id="narsumtxt" type="text" name="narsum[]" class="form-control" autocomplete="off" required=""/>
                    </div>
                    <div id="repeat_narsum"></div>
                    <input type="hidden" id="jumlah-form" name="jumlah_narsum" value="0">
                    <div class="form-group">
                        <button type="button" id="narsumbtn" class="btn btn-info" title="Tambah Penceramah"><i class="fas fa-plus-square"></i> Tambah</button>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label>Keterangan Kegiatan:</label>
                        <textarea name="keterangan_kegiatan" class="form-control" required="" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom" style="margin-top:1.32857em;">
        <div class="card-header">
            <div class="card-title">
                Detail Dokumen Permohonan
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="ktp_keg" class="form-label">KTP Pemohon:</label>
                            <input class="form-control" type="file" id="ktp_keg" name="ktp_keg" required="">
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
                <div class="col-md">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="sp_keg" class="form-label">Surat Permohonan Kegiatan:</label>
                            <input class="form-control" type="file" id="sp_keg" name="sp_keg" required="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
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
                    <button type="submit" class="btn btn-info">Ya!</button>
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
        $("#narsumbtn").click(function () {
            var jumlah = parseInt($("#jumlah-form").val());
            var nextform = jumlah + 1;
            $("#repeat_narsum").append('<div class="form-group input-group" id="nextform' + nextform + '">' +
                    '<input id="narsumtxt" type="text" name="narsum[]" class="form-control" autocomplete="off" required=""/>'
                    + '<button class="btn" type="button" Title="Hapus" onclick="Del_narsum(' + nextform + ')"><i class="fas fa-minus-square" style="color:red;"></i></button>'
                    + '</div>');
            $("#jumlah-form").val(nextform);
        });
    };
    function Del_narsum(id) {
        var a = "#nextform" + id;
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
    function Modal() {
        $('#modal_save').modal({backdrop: 'static', keyboard: false});
    }
</script>