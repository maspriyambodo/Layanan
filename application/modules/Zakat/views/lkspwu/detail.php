<h4>No. Form: <?php echo $detil['no_direktorat'] . '.' . $detil['no_layanan'] . '.' . $detil['tgl_input'] . '.' . $detil['no_urut']; ?></h4>
<?php
if ($detil['stat_id'] == 4) {
    echo '<div class="card card-custom" style="margin-top:1.32857em;">'
    . '<div class="card-body">'
    . '<p>Terimakasih telah mengajukan permohonan kepada kami.</p>'
    . '<p>Sayangnya, setelah meninjau permohonan Anda, kami tidak dapat menerima permohonan Anda saat ini, dengan alasan:</p>'
    . '<p>'
    . '<mark>'
    . $detil[0]->alasan_tolak
    . '</mark>'
    . '</p>'
    . '<p>Anda juga dapat memperbarui dan mengirimkan aplikasi Anda. Pakar akan meninjau akun Anda untuk mengetahui kepatuhannya terhadap kebijakan program kami, jadi pastikan untuk menyelesaikan semua masalah.</p>'
    . '</div>'
    . '</div>';
} else {
    null;
}
?>
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
                        <td><b>NAMA LENGKAP</b></td>
                        <td>: <?php echo $detil['fullname']; ?></td>
                        <td><b>NO KTP</b></td>
                        <td>: <?php echo $detil['nik']; ?></td>
                    </tr>
                    <tr>
                        <td><b>TANGGAL LAHIR</b></td>
                        <td>: <?php echo $detil['tgl_lhr']; ?></td>
                        <td><b>USIA</b></td>
                        <td>
                            <?php
                            $date = new DateTime($detil['tgl_lhr']);
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            echo $interval->y . ' Tahun';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>EMAIL</b></td>
                        <td>: <?php echo $detil['email']; ?></td>
                        <td><b>TELEPON</b></td>
                        <td>: <?php echo $detil['telp']; ?></td>
                    </tr>
                    <tr>
                        <td><b>ALAMAT</b></td>
                        <td colspan="3">: <?php echo 'Kel. ' . $detil['kelurahan_user'] . ' Kec. ' . $detil['kecamatan_user'] . '<br>&nbsp;&nbsp;Kota/Kabupaten ' . $detil['kabupaten_user'] . ' Prov. ' . $detil['provinsi_user']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card card-custom" style="margin-top:1.32857em;">
    <div class="card-header">
        <div class="card-title">
            Detail Data Instansi
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>NAMA INSTANSI</b></td>
                        <td>: <?php echo $detil['nm_instansi']; ?></td>
                        <td><b>EMAIL</b></td>
                        <td>: <?php echo $detil['email_instansi']; ?></td>
                        <td><b>TELEPON</b></td>
                        <td>: <?php echo $detil['telp_instansi']; ?></td>
                    </tr>
                    <tr>
                        <td><b>ALAMAT</b></td>
                        <td colspan="5">: 
                            <?php
                            echo $detil['almt_instansi'] . '<br>&nbsp;&nbsp;Kel. ' . $detil['kelurahan_user'] . ' Kec. ' . $detil['kecamatan_user'] . '<br>&nbsp;&nbsp;Kota/Kabupaten ' . $detil['kabupaten_user'] . ' Prov. ' . $detil['provinsi_user'];
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <b>*</b>Instansi memiliki fungsi menerima titipan:
            <b><?php
                if ($detil['fungsi_titipan']) {
                    echo 'Ya';
                } else {
                    echo 'Tidak';
                }
                ?>
            </b>
        </div>
        <div class="form-group">
            <b>*</b>Instansi SK bergerak dibidang keuangan syariah:
            <b><?php
                if ($detil['sk_keu_syariah']) {
                    echo 'Ya';
                } else {
                    echo 'Tidak';
                }
                ?>
            </b>
        </div>
    </div>
</div>

<div class="card card-custom" style="margin-top:1.32857em;">
    <div class="card-header">
        <div class="card-title">
            Detail Data Dokumen
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/zakat/lkspwu/' . $detil['srt_prmhn_kementri_lkspwu']); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Surat Permohonan
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/zakat/lkspwu/' . $detil['agrn_dsr_lkspwu']); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Anggaran Dasar
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/zakat/lkspwu/' . $detil['sk_hkm_lkspwu']); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            SK<br>Hukum
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/zakat/lkspwu/' . $detil['skdu']); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            SKDU<br><br>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/zakat/lkspwu/' . $detil['lapkeu_lkspwu']); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Laporan Keuangan
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php
    if ($detil['status_aktif'] == 1 and $detil['id_stat'] == 1) {
        echo '<div class="card-footer">'
        . '<div class="text-right">'
        . '<button type="button" class="btn btn-success" onclick="Page.Terima(' . $detil['id_layanan'] . ');" style="margin:0px 10px;"><i class="fas fa-check"></i> Terima</button>'
        . '<button type="button" class="btn btn-danger" onclick="Page.Tolak(' . $detil['id_layanan'] . ');"><i class="fas fa-times"></i> Tolak</button>'
        . '</div>'
        . '</div>';
    } else {
        null;
    }
    ?>
</div>
<?php
if ($detil['status_aktif'] == 1 and $detil['id_stat'] == 2) {
    echo '<div class="card card-custom" style="margin-top:1.32857em;">'
    . '<div class="card-header">'
    . '<div class="card-title">Hasil Verifikasi'
    . '</div>'
    . '</div>'
    . '<form action="' . base_url('Zakat/LKSPWU/Proses_verif/') . '" method="post">'
    . '<input type="hidden" name="id_layanan" value="' . $detil['id_layanan'] . '"/>'
    . '<div class="card-body">'
    . '<div class="row">'
    . '<div class="col-md-4">'
    . '<div class="form-group">'
    . '<label>Hasil Verifikasi</label>'
    . '</div>'
    . '</div>'
    . '<div class="col-md-4">'
    . '<div class="form-group">'
    . '<select required="" name="hasil" class="form-control custom-select" onchange="Verif()">'
    . '<option value="">Pilih Keputusan</option>';
    foreach ($stat as $keputusan) {
        echo '<option value="' . $keputusan->id . '">' . $keputusan->nama_stat . '</option>';
    }
    echo '</select>'
    . '</div>'
    . '</div>'
    . '<div class="col-md-4"></div>'
    . '</div>'
    . '<div class="form-group" id="alasan">'
    . '<label>Alasan Penolakan</label>'
    . '<textarea id="alasantxt" name="alasan" class="form-control" rows="8"></textarea>'
    . '</div>'
    . '<div class="text-center mt-4">'
    . '<input type="checkbox" id="cbOk" required=""> Dengan ini menyatakan bahwa data dan atau dokumen yang dibuat adalah dengan sebenarnya'
    . '</div>'
    . '</div>'
    . '<div class="card-footer">'
    . '<div class="text-center">'
    . '<a href="' . base_url('Zakat/LKSPWU/Proses/') . '" class="btn btn-default btn-sm" style="margin:0px 5px;"><i class="fas fa-times-circle"></i> Batal</a>'
    . '<button id="btnsub" type="button" class="btn btn-success btn-sm" disabled="true" style="margin:0px 5px;"><i class="fas fa-check"></i> Proses Verifikasi</button>'
    . '</div>'
    . '</div>'
    . '<div class="modal fade" id="modal_verif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'
    . '<div class="modal-dialog" role="document">'
    . '<div class="modal-content">'
    . '<div class="modal-header">'
    . '<h4 class="modal-title" id="myModalLabel">Verifikasi Permohonan</h4>'
    . '</div>'
    . '<div class="modal-body">'
    . 'Anda yakin ingin verifikasi data?'
    . '</div>'
    . '<div class="modal-footer">'
    . '<button id="close" type="button" class="btn btn-danger" data-dismiss="modal">Tidak!</button>'
    . '<button type="submit" class="btn btn-info" onclick="Svbtn();">Ya!</button>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '</form>'
    . '</div>';
}
?>
<div style="clear: both;margin: 5% 0px;"></div>
<input type="hidden" name="err_msg" value="<?php echo $msg['gagal']; ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $msg['sukses']; ?>"/>
<?php
unset($_SESSION['gagal']);
unset($_SESSION['sukses']);
?>
<script>
    window.onload = function () {
        $('#alasan').hide('slow');
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
                    id: id,
                    status_id: 2
                };
                var url = '<?php echo base_url('Zakat/LKSPWU/Verif/'); ?>';
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
                    id: id,
                    status_id: 4
                };
                var url = '<?php echo base_url('Zakat/LKSPWU/Verif/'); ?>';
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
        window.location.href = '<?php echo base_url('Zakat/LKSPWU/index/'); ?>';
    };
    function Svbtn() {
        var a, b;
        a = $('select[name="hasil"]').val();
        b = $('textarea[name="alasan"]').val();
        if (a == "") {
            $("#modal_verif #close").click();
            toastr.warning("Silahkan pilih keputusan!");
        } else if (b == "" & a == 4) {
            $("#modal_verif #close").click();
            toastr.warning("Silahkan berikan alasan penolakan!");
        }
    }
    function Modal() {
        $('#modal_verif').modal({backdrop: 'static', keyboard: false});
    }
    function Verif() {
        var a = $('select[name=hasil] option:selected').text();
        if (a === "tidak direkomendasikan") {
            $('#alasan').show('slow');
            $('textarea[name="alasan"]').attr('required', '');
        } else if (a === "direkomendasikan") {
            $('#alasan').hide('slow');
            $('textarea[name="alasan"]').removeAttr('required');
        } else {
            $('#alasan').hide('slow');
        }
    }
</script>