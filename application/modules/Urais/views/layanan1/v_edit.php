<style>
    .nav-pills .nav-link.active, .show > .nav-pills .nav-link {
        color: #fff;
        background-color: #5bc0de;
    }
</style>
<form action="<?php echo base_url('Urais/Layanan_1/Change/'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_layanan" value="<?php echo $detil[0]->id_layanan; ?>"/>
    <input type="hidden" name="id_user" value="<?php echo $detil[0]->id_user; ?>"/>
    <div style="clear: both;margin:2% 0px;"></div>
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Pemohon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Dokumen Permohonan</a>
                </li>
            </ul>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nomor KTP:</label>
                                <input type="text" name="ktp" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->nik; ?>"/>
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
                                <label>Tanggal Lahir:</label>
                                <input type="date" name="tgl_lahir" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->tgl_lhr; ?>"/>
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
                                <label>Email:</label>
                                <input type="email" name="mali" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->mail; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Telepon:</label>
                                <input type="text" name="telpon" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->telp; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Kegiatan:</label>
                                <input type="text" name="nm_keg" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->nm_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tanggal Awal Kegiatan:</label>
                                <input type="date" name="tgl_awal_keg" class="form-control" required="" autocomplete="off" onchange="Awal()" value="<?php echo $detil[0]->tgl_awal_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tanggal Akhir Kegiatan:</label>
                                <input type="date" name="tgl_akhir_keg" class="form-control" required="" autocomplete="off" onchange="Tgl()" value="<?php echo $detil[0]->tgl_akhir_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Estimasi Peserta:</label>
                                <input type="text" name="esti_keg" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->esti_keg; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Lembaga:</label>
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
                        </div>
                        <div class="col-md">
                            <div class="form-group" id="nm_lemb">
                                <label>Nama Lembaga:</label>
                                <input type="text" name="lemb_keg" class="form-control" autocomplete="off" required="" value="<?php echo $detil[0]->lemb_keg; ?>"/>
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
                                        if ($detil[0]->provinsi == $prov->nama) {
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
                                <select name="kabupaten" id="kotkabtxt" class="form-control custom-select" onchange="Kecshow(this.value)" required=""></select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kecamatan:</label>
                                <select name="kectxt" id="kectxt" class="form-control custom-select" onchange="Kelshow(this.value)" required=""></select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Kelurahan:</label>
                                <select name="keltxt" id="keltxt" class="form-control custom-select" required=""></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Lokasi Kegiatan:</label>
                                <input type="text" name="alamat_kegiatan" class="form-control" autocomplete="off" required="" value="<?php echo $detil[0]->alamat_keg; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Narasumber / Penceramah:</label>
                                <div id="repeat_narsum">
                                    <?php
                                    $jum_narsum = sizeof($detil);
                                    for ($i = 0; $i < $jum_narsum; $i++) {
                                        if ($i == 0) {
                                            echo '<div class="form-group input-group">'
                                            . '<input id="narsumtxt" type="text" name="narsum[]" class="form-control" autocomplete="off" required="" value="' . $detil[$i]->narsum . '"/>'
                                            . '</div>';
                                        } else {
                                            echo '<div class="form-group input-group" id="nextform' . $i . '">'
                                            . '<input id="narsumtxt" type="text" name="narsum[]" class="form-control" autocomplete="off" required="" value="' . $detil[$i]->narsum . '"/>'
                                            . '<button class="btn" type="button" Title="Hapus" onclick="Del_narsum(' . $i . ')"><i class="fas fa-minus-square" style="color:red;"></i></button>'
                                            . '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <input type="hidden" id="jumlah-form" name="jumlah_narsum" value="<?php echo $jum_narsum; ?>">
                            <div class="form-group">
                                <button type="button" id="narsumbtn" class="btn btn-info" title="Tambah Penceramah"><i class="fas fa-plus-square"></i> Tambah</button>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Keterangan Kegiatan:</label>
                                <textarea name="keterangan_kegiatan" class="form-control" required="" rows="8"><?php echo $detil[0]->keterangan; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="ktp_keg" class="form-label">KTP Pemohon:</label>
                            </div>
                            <div class="form-group" id="o_ktp">
                                <button id="ktpbtn" type="button" class="btn btn-warning btn-xs" onclick="KTP()"><i class="far fa-edit"></i> Ganti KTP</button>
                                <a id="a_ktp" href="<?php echo base_url('assets/uploads/binsyar/' . $detil[0]->ktp_keg); ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Lihat KTP</a>
                            </div>
                            <div class="form-group" id="e_ktp"></div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="proposal" class="form-label">Proposal Kegiatan:</label>
                            </div>
                            <div class="form-group" id="o_proposal">
                                <button id="proposalbtn" type="button" class="btn btn-warning btn-xs" onclick="Proposal()"><i class="far fa-edit"></i> Ganti Proposal</button>
                                <a id="a_proposal" href="<?php echo base_url('assets/uploads/binsyar/' . $detil[0]->proposal_keg); ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Lihat Proposal</a>
                            </div>
                            <div class="form-group" id="e_proposal"></div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="sp_keg" class="form-label">Surat Permohonan Kegiatan:</label>
                            </div>
                            <div class="form-group" id="o_spk">
                                <button id="spkbtn" type="button" class="btn btn-warning btn-xs" onclick="Spk()"><i class="far fa-edit"></i> Ganti SPK</button>
                                <a id="a_spk" href="<?php echo base_url('assets/uploads/binsyar/' . $detil[0]->surat_permohonan_keg); ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Lihat SPK</a>
                            </div>
                            <div class="form-group" id="e_spk"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group text-right">
                        <a href="<?php echo base_url('Urais/Layanan_1/index/'); ?>" class="btn btn-danger"><i class="fas fa-reply"></i> Kembali</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_save" onclick="Modal()"><i class="fas fa-save"></i> Simpan Perubahan</button>
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
                    <button type="submit" class="btn btn-info">Ya!</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div style="clear: both;margin:5% 0px;"></div>
<input type="hidden" name="err_msg" value="<?php echo $msg['gagal']; ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $msg['sukses']; ?>"/>
<!-- kotkabtxt <?php echo $detil[0]->kabupaten; ?> -->
<script>
    window.onload = function () {
        Provinsi($('select[name="provinsi"]').val());

        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "2000",
            timeOut: "5000",
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
            url: "<?php echo base_url('Urais/Layanan_1/S_proposal/'); ?>",
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

            }
        });
    }
    function KTP() {
        $('#o_ktp').hide('slow');
        $('#e_ktp').append(
                '<div class="input-group">'
                + '<input id="ktp_keg" class="form-control" type="file" name="ktp_keg" required="">'
                + '</div>'
                + '<div style="clear:both;margin:5px 0px;"></div>'
                + '<button type="button" class="btn btn-danger btn-xs" onclick="C_ktp()" title="Batal Ganti KTP"><i class="fas fa-times-circle"></i> Batal</button>'
                + '<button type="button" class="btn btn-success btn-xs" onclick="S_ktp()" title="Simpan KTP" style="margin:0px 5px;"><i class="fas fa-save"></i> Simpan</button>'
                );
    }
    function C_ktp() {
        $('#o_ktp').show('slow');
        $('#e_ktp').empty();
    }
    function S_ktp() {
        var a, b, c;
        c = new FormData();
        a = $('input[name="id_layanan"]').val();
        b = $('#ktp_keg')[0].files[0];
        c.append('ktp_keg', b);
        c.append('id_layanan', a);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('Urais/Layanan_1/S_ktp/'); ?>",
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
                    $('#a_ktp').attr('href', '<?php echo base_url('assets/uploads/binsyar/'); ?>' + data.file_name);
                    C_ktp();
                }

            }
        });
    }
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
            url: "<?php echo base_url('Urais/Layanan_1/S_spk/'); ?>",
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

            }
        });
    }
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
            toastr.warning("Hanya boleh di isi dengan angka!");
            return false;
        }
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
                    if (sel.options[i].innerHTML == "<?php echo $detil[0]->kabupaten; ?>") {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                        Kecshow(opt.value);
                    }
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
                    if (sel.options[i].innerHTML == "<?php echo $detil[0]->kecamatan; ?>") {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                        Kelshow(opt.value);
                    }
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
                    if (sel.options[i].innerHTML == "<?php echo $detil[0]->kelurahan; ?>") {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                    }
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