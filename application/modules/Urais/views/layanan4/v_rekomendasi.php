<!-- <h4>No. Form: <?php //echo $detil[0]->no_direktorat . '.' . $detil[0]->no_layanan . '.' . $detil[0]->tgl_input . '.' . $detil[0]->no_urut; ?></h4> -->
<h4>No. Form: <?php echo $pemohon->kode;?></h4>
<div class="card card-custom" style="margin-top:1.32857em;">
    <div class="card-header">
        <div class="card-title">
            Detail Data Pemohon
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>: <?php echo $pemohon->fullname; ?></td>
                        <td><b>N I K</b></td>
                        <td>: <?php echo $pemohon->nik; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tgl Lahir</b></td>
                        <td>: <?php echo date("d F Y", strtotime($pemohon->tgl_lhr)); ?></td>
                        <td><b>Usia</b></td>
                        <td>: 
                            <?php
                            $date = new DateTime($pemohon->tgl_lhr);
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            echo $interval->y . ' Tahun ' . $interval->m . ' Bulan';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Telp</b></td>
                        <td>: <?php echo $pemohon->telp; ?></td>
                        <td><b>Email</b></td>
                        <td>: <?php echo $pemohon->email; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card" style="margin-top:1.32857em;">
    <div class="card-header">
        <div class="card-title">
            Detail Data Kegiatan
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Nama Kegiatan</b></td>
                        <td>: <?php echo $kegiatan->nm_keg; ?></td>
                        <td><b>Tanggal Kegiatan</b></td>
                        <td>: 
                            <?php
                            if ($kegiatan->tgl_awal_keg == $kegiatan->tgl_akhir_keg) {
                                echo date("d F Y", strtotime($kegiatan->tgl_awal_keg));
                            } else {
                                echo date("d F Y", strtotime($kegiatan->tgl_awal_keg)) . ' <b>s/d</b> ' . date("d F Y", strtotime($kegiatan->tgl_akhir_keg));
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Lembaga</b></td>
                        <td>: <?php echo $kegiatan->lemb_keg; ?></td>
                        <td><b>Estimasi</b></td>
                        <td>: <?php echo $kegiatan->esti_keg; ?> Peserta</td>
                    </tr>
                    <tr>
                        <td><b>Lokasi</b></td>
                        <td>: <?php echo $kegiatan->alamat_keg; ?></td>
                        <td><b>Narasumber</b></td>
                        <td>
                            <?php
                            foreach ($narsum as $narsum) {
                                echo '- ' . $narsum->narsum . '<br>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td colspan="3">: <?php echo 'Provinsi ' . $pemohon->nama . ', ' . $pemohon->nama_kabupaten . '<br>&nbsp;&nbsp;Kec. ' . $pemohon->nama_kecamatan . ', Kel. ' . $pemohon->nama_kelurahan; ?></td>
                    </tr>
                    <tr>
                        <td><b>Keterangan</b></td>
                        <td colspan="3">: <?php echo $pemohon->keterangan; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card" style="margin-top:1.32857em;">
    <div class="card-header">
        <div class="card-title">
            Detail Data Dokumen
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $lampiran[0]->surat_permohonan_dalam); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Surat Permohonan
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $lampiran[0]->proposal_dalam); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Proposal
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $lampiran[0]->cv_crmh_dalam); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            CV Penceramah
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $lampiran[0]->pasp_crmh_dalam); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            FC Passport Penceramah
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $lampiran[0]->ktp_dalam); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            FC KTP
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $lampiran[0]->pas_foto_crmh_dalam); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-id-card" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Pas Foto Penceramah
                        </div>
                    </div>
                </a>
            </div>
        </div>

        
        <div class="card card-custom" style="margin-top:1.32857em;">
            <div class="card-header">
                <div class="card-title">
                    Hasil Verifikasi
                </div>
            </div>
            <form action="<?php echo base_url('Urais/Layanan_3/Proses_verifikasi'); ?>" method="post">
                <input type="hidden" name="id_layanan" value="<?php echo $pemohon->id; ?>"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasil Verifikasi</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select required="" name="id_stat" class="form-control custom-select" onchange="Verif()">
                                    <option value="">Pilih Keputusan</option>
                                    <?php foreach($status as $s){?>
                                        <option value="<?php echo $s->id;?>"><?php echo $s->nama_stat;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="form-group" id="alasan_tolak">
                        <label>Alasan Penolakan</label>
                        <textarea id="alasan_tolaktxt" name="alasan_tolak" class="form-control" rows="8"></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <input type="checkbox" id="cbOk" required=""> Dengan ini menyatakan bahwa data dan atau dokumen yang dibuat adalah dengan sebenarnya
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="<?php echo base_url('Urais/Layanan_3/Proses/'); ?>" class="btn btn-default btn-sm"><i class="fas fa-times-circle"></i> Batal</a>
                        <button id="btnsub" type="submit" class="btn btn-success btn-sm" disabled="true"><i class="fas fa-check"></i> Proses Verifikasi</button>
                    </div>
                </div>
                <div class="modal fade" id="modal_verif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Verifikasi Permohonan</h4>
                            </div>
                            <div class="modal-body">
                                Anda yakin ingin verifikasi data?
                            </div>
                            <div class="modal-footer">
                                <button id="close" type="button" class="btn btn-danger" data-dismiss="modal">Tidak!</button>
                                <button type="submit" class="btn btn-info" onclick="Svbtn();">Ya!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <?php
    if ($detil[0]->status_aktif == 1) {
        echo '<div class="card-footer">'
        . '<div class="text-right">'
        . '<button type="button" class="btn btn-success" onclick="Page.Terima(' . $detil[0]->id_layanan . ');" style="margin:0px 10px;"><i class="fas fa-check"></i> Terima</button>'
        . '<button type="button" class="btn btn-danger" onclick="Page.Tolak(' . $detil[0]->id_layanan . ');"><i class="fas fa-times"></i> Tolak</button>'
        . '</div>'
        . '</div>';
    } else {
        null;
    }
    ?>
</div>
<div style="clear: both;margin: 5% 0px;"></div>
<script>
    window.onload = function () {
        $('#alasan_tolak').hide('slow');
        $('input[type="checkbox"]').click(function () {
            if ($(this).is(":checked")) {
                document.getElementById("btnsub").disabled = false;
                $('#btnsub').attr('data-toggle', 'modal');
                $('#btnsub').attr('data-target', '#modal_verif');
                $('#btnsub').attr('onclick', 'Modal()');
            } else {
                document.getElementById("btnsub").disabled = true;
                $('#btnsub').removeAttr('data-toggle');
                $('#btnsub').removeAttr('data-target');
                $('#btnsub').removeAttr('onclick');
            }
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
    };
    function Svbtn() {
        var a, b;
        a = $('select[name="id_stat"]').val();
        b = $('textarea[name="alasan_tolak"]').val();
        if (a == "") {
            $("#modal_verif #close").click();
            toastr.warning("Silahkan pilih keputusan!");
        } else if (b == "" & a == 4) {
            $("#modal_verif #close").click();
            toastr.warning("Silahkan berikan alasan_tolak penolakan!");
        }
    }
    function Modal() {
        $('#modal_verif').modal({backdrop: 'static', keyboard: false});
    }
    function Verif() {
        var a = $('select[name=id_stat] option:selected').text();
        if (a === "tidak direkomendasikan") {
            $('#alasan_tolak').show('slow');
            $('textarea[name="alasan_tolak"]').attr('required', '');
        } else if (a === "direkomendasikan") {
            $('#alasan_tolak').hide('slow');
            $('textarea[name="alasan_tolak"]').removeAttr('required');
        } else {
            $('#alasan_tolak').hide('slow');
        }
    }

    var Page = {};
    Page.Terima = function (id) {
        swal({
            title: 'Are you sure?',
            text: "",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            allowOutsideClick: false
        }).then(function (result) {
            if (result) {
                App.IsLoading(true);
                var data = {
                    id: id
                };
                var url = '<?php echo base_url('Urais/Layanan_3/Update/'); ?>';
                ajaxPost(url, data, function (data) {
                    App.IsLoading(false);
                    if (data.success === false) {
                        swal({
                            title: '<strong>Error</strong>',
                            type: 'error',
                            text: "Surat Permohonan gagal diproses",
                            showCloseButton: false,
                            showCancelButton: false,
                            focusConfirm: false,
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        });
                    } else {
                        swal({
                            title: '<strong>Success</strong>',
                            type: 'success',
                            text: "Surat Permohonan berhasil diproses",
                            showCloseButton: false,
                            showCancelButton: false,
                            focusConfirm: false,
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                                Page.Direct();
                            }
                        });
                    }
                });
            }
        }
        , function (dismiss) {
            // do nothing for dismiss modal
        });
    };
    Page.Tolak = function (id) {
        swal({
            title: 'Are you sure?',
            text: "",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            allowOutsideClick: false
        }).then(function (result) {
            if (result) {
                App.IsLoading(true);
                var data = {
                    id: id
                };
                var url = '<?php echo base_url('Urais/Layanan_1/Reject/'); ?>';
                ajaxPost(url, data, function (data) {
                    App.IsLoading(false);
                    if (data.success === false) {
                        swal({
                            title: '<strong>Error</strong>',
                            type: 'error',
                            text: "Surat Permohonan gagal diproses",
                            showCloseButton: false,
                            showCancelButton: false,
                            focusConfirm: false,
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        });
                    } else {
                        swal({
                            title: '<strong>Success</strong>',
                            type: 'success',
                            text: "Surat Permohonan berhasil diproses",
                            showCloseButton: false,
                            showCancelButton: false,
                            focusConfirm: false,
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                                Page.Direct();
                            }
                        });
                    }
                });
            }
        }
        , function (dismiss) {
            // do nothing for dismiss modal
        });
    };
    Page.Direct = function () {
        window.location.href = '<?php echo base_url('Urais/Layanan_1/index/'); ?>';
    };
</script>