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
<div style="clear: both;margin: 5% 0px;"></div>
<script>
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
</script>