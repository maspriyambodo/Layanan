<!-- <h4>No. Form: <?php //echo $detil[0]->no_direktorat . '.' . $detil[0]->no_layanan . '.' . $detil[0]->tgl_input . '.' . $detil[0]->no_urut; ?></h4> -->
<h4>No. Form: <?php echo $detail->id_formulir;?></h4>
<div class="card card-custom" style="margin-top:1.32857em;">
    <div class="card-header" style="background-color: #545d73;">
        <div class="card-title" style="color: white;">
            Detail Alasan Penolakan
        </div>
    </div>
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
          <?php echo $detail->alasan_tolak; ?>
        </div>
    </div>
</div>
<div class="card card-custom" style="margin-top:1.32857em;">
    <div class="card-header" style="background-color: #545d73;">
        <div class="card-title" style="color: white;">
            Detail Data Pemohon
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Nama</b></td>
                        <td>: <?php echo $detail->fullname; ?></td>
                        <td><b>N I K</b></td>
                        <td>: <?php echo $detail->nik; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tgl Lahir</b></td>
                        <td>: <?php echo date("d F Y", strtotime($detail->tgl_lhr)); ?></td>
                        <td><b>Usia</b></td>
                        <td>: 
                            <?php
                            $date = new DateTime($detail->tgl_lhr);
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            echo $interval->y . ' Tahun ' . $interval->m . ' Bulan';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Telp</b></td>
                        <td>: <?php echo $detail->telp; ?></td>
                        <td><b>Email</b></td>
                        <td>: <?php echo $detail->email; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card" style="margin-top:1.32857em;">
    <div class="card-header" style="background-color: #545d73;">
        <div class="card-title" style="color: white;">
            Detail Data Kegiatan
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><b>Nama Kegiatan</b></td>
                        <td>: <?php echo $detail->nm_keg; ?></td>
                        <td><b>Tanggal Kegiatan</b></td>
                        <td>: 
                            <?php
                            if ($detail->tgl_awal_keg == $detail->tgl_akhir_keg) {
                                echo date("d F Y", strtotime($detail->tgl_awal_keg));
                            } else {
                                echo date("d F Y", strtotime($detail->tgl_awal_keg)) . ' <b>s/d</b> ' . date("d F Y", strtotime($detail->tgl_akhir_keg));
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Lembaga</b></td>
                        <td>: <?php echo $detail->lemb_keg; ?></td>
                        <td><b>Estimasi</b></td>
                        <td>: <?php echo $detail->esti_keg; ?> Peserta</td>
                    </tr>
                    <tr>
                        <td><b>Lokasi</b></td>
                        <td>: <?php echo $detail->alamat_keg; ?></td>
                        <!-- <td><b>Narasumber</b></td>
                        <td>
                            <?php
                            foreach ($narsum as $narsum) {
                                echo '- ' . $narsum->narsum . '<br>';
                            }
                            ?>
                        </td> -->
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td colspan="3">: <?php echo 'Provinsi ' . $detail->provinsi . ', ' . $detail->kabupaten . '<br>&nbsp;&nbsp;Kec. ' . $detail->kecamatan . ', Kel. ' . $detail->kelurahan; ?></td>
                    </tr>
                    <tr>
                        <td><b>Keterangan</b></td>
                        <td colspan="3">: <?php echo $detail->keterangan; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card" style="margin-top:1.32857em;">
    <div class="card-header" style="background-color: #545d73;">
        <div class="card-title" style="color: white;">
            Detail Data Penceramah
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <?php $no = 1; foreach($penceramah as $data){?>
            <div class="col-md">
                <table class="table table-bordered">
                <tbody>
                    <footer class="blockquote-footer" style="font-size:12px; font-weight: bold;">Penceramah Ke <?php echo $no++;?></footer>
                    <tr>
                        <td><b>No. Passport</b></td>
                        <td>: <?php echo $data->no_paspor; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Penceramah</b></td>
                        <td>: <?php echo $data->narsum; ?></td>
                        <td><b>Tempat Lahir</b></td>
                        <td>: <?php echo $data->tmp_lhr; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Lahir</b></td>
                        <td>: <?php echo date('d-m-Y', strtotime($data->tgl_lhr)); ?></td>
                        <td><b>Jenis Kelamin</b></td>
                        <td>: <?php echo $data->jns_kelamin; ?></td>
                    </tr>
                    <tr>
                        <td><b>Alamat Lengkap</b></td>
                        <td>: <?php echo $data->almt_penceramah; ?></td>
                    </tr>
                    <tr>
                        <td><b>CV</b></td>
                        <td>: <a href="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $data->cv;?>" target="_blank"><button class="btn btn-dark"><i class="fa fa-eye"></i> Lihat</button></a></td>
                        <td><b>Passport</b></td>
                        <td>: <a href="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $data->fc_passport;?>" target="_blank"><button class="btn btn-dark"><i class="fa fa-eye"></i> Lihat</button></a></td>
                    </tr>
                    <tr>
                                                <td><b>KTP</b></td>
                        <td>: <a href="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $data->sc_ktp;?>" target="_blank"><button class="btn btn-dark"><i class="fa fa-eye"></i> Lihat</button></a></td>
                        <td><b>Foto</b></td>
                        <td>: <a href="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $data->pas_foto;?>" target="_blank"><button class="btn btn-dark"><i class="fa fa-eye"></i> Lihat</button></a></td>
                    </tr>
                </tbody>
                </table>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<div class="card" style="margin-top:1.32857em;">
    <div class="card-header" style="background-color: #545d73;">
        <div class="card-title" style="color: white;">
            Detail Data Dokumen
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $detail->surat_permohonan_dalam;?>" target="_blank" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b">
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
                <a href="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $detail->proposal_dalam;?>" target="_blank" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b">
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
                var url = '<?php echo base_url('Urais/Layanan_1/Update/'); ?>';
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