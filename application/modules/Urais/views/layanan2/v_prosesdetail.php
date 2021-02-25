<h4>No. Form: <?php echo $detil[0]->no_direktorat . '.' . $detil[0]->no_layanan . '.' . $detil[0]->tgl_input . '.' . $detil[0]->no_urut; ?></h4>
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
                        <td>: <?php echo $detil[0]->nama_user; ?></td>
                        <td><b>N I K</b></td>
                        <td>: <?php echo $detil[0]->nik; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tgl Lahir</b></td>
                        <td>: <?php echo date("d F Y", strtotime($detil[0]->tgl_lhr)); ?></td>
                        <td><b>Usia</b></td>
                        <td>: 
                            <?php
                            $date = new DateTime($detil[0]->tgl_lhr);
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            echo $interval->y . ' Tahun ' . $interval->m . ' Bulan';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Telp</b></td>
                        <td>: <?php echo $detil[0]->telp; ?></td>
                        <td><b>Email</b></td>
                        <td>: <?php echo $detil[0]->mail; ?></td>
                    </tr>
                    <tr>
                        <td><b>Provinsi</b></td>
                        <td>
                            <?php echo $detil[0]->provinsi_layanan; ?>
                        </td>
                        <td><b>Kota/Kabupaten</b></td>
                        <td>
                            <?php echo $detil[0]->kabupaten_layanan; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Kecamatan</b></td>
                        <td>
                            <?php echo $detil[0]->kecamatan_layanan; ?>
                        </td>
                        <td><b>Kelurahan</b></td>
                        <td>
                            <?php echo $detil[0]->kelurahan_layanan; ?>
                        </td>
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
                        <td>: <?php echo $detil[0]->nm_keg; ?></td>
                        <td><b>Tanggal Kegiatan</b></td>
                        <td>: 
                            <?php
                            if ($detil[0]->tgl_awal_keg == $detil[0]->tgl_akhir_keg) {
                                echo date("d F Y", strtotime($detil[0]->tgl_awal_keg));
                            } else {
                                echo date("d F Y", strtotime($detil[0]->tgl_awal_keg)) . ' <b>s/d</b> ' . date("d F Y", strtotime($detil[0]->tgl_akhir_keg));
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Lembaga</b></td>
                        <td>: <?php echo $detil[0]->lemb_keg; ?></td>
                        <td><b>Estimasi</b></td>
                        <td>: <?php echo $detil[0]->esti_keg; ?> Peserta</td>
                    </tr>
                    <tr>
                        <td><b>Negara Tujuan</b></td>
                        <td>: <?php echo $detil[0]->negara_tujuan; ?></td>
                        <td><b>Lokasi</b></td>
                        <td>: <?php echo $detil[0]->alamat_keg; ?></td>
                    </tr>
                    <tr>
                        <td><b>Keterangan</b></td>
                        <td colspan="3">: <?php echo $detil[0]->keterangan; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card card-custom" style="margin-top:1.32857em;">
    <div class="card-header">
        <div class="card-title">
            Detail Data Penceramah
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase">
                    <tr>
                        <th rowspan="2" class="text-center">No.</th>
                        <th rowspan="2" class="text-center">nama</th>
                        <th rowspan="2" class="text-center">nomor<br>passport</th>
                        <th colspan="3" class="text-center">lahir</th>
                        <th rowspan="2" class="text-center">jenis<br>kelamin</th>
                        <th rowspan="2" class="text-center">aksi</th>
                    </tr>
                    <tr>
                        <th class="text-center">tempat</th>
                        <th class="text-center">tanggal</th>
                        <th class="text-center">usia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detil as $narsum) { ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?php echo $narsum->narsum; ?></td>
                            <td class="text-center"><?php echo $narsum->no_paspor; ?></td>
                            <td class="text-center"><?php echo $narsum->tmp_lahir_narsum; ?></td>
                            <td class="text-center"><?php echo date("d F Y", strtotime($narsum->tgl_lahir_narsum)); ?></td>
                            <td class="text-center">
                                <?php
                                $date = new DateTime($narsum->tgl_lahir_narsum);
                                $now = new DateTime();
                                $interval = $now->diff($date);
                                echo $interval->y . ' Tahun ' . $interval->m . ' Bulan';
                                ?>
                            </td>
                            <td class="text-center text-capitalize"><?php echo $narsum->jns_kelamin; ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-xs btn-default" title="lihat cv <?php echo $narsum->narsum; ?>"><i class="far fa-file-word"></i></button>
                                <button type="button" class="btn btn-xs btn-default" title="lihat passport <?php echo $narsum->narsum; ?>"><i class="fas fa-passport"></i></button>
                                <button type="button" class="btn btn-xs btn-default" title="lihat foto <?php echo $narsum->narsum; ?>"><i class="fas fa-user"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
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
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $detil[0]->sp_keg); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Surat Permohonan Kegiatan
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md" style="margin: 10px 0px;">
                <a href="<?php echo base_url('assets/uploads/binsyar/' . $detil[0]->proposal_keg); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                            <i class="fas fa-file" style="font-size: 48px;"></i>
                        </span>
                        <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;">
                            Proposal Kegiatan
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
if ($detil[0]->status_aktif == 1 and $detil[0]->stat_id == 2) {
    echo '<div class="card card-custom" style="margin-top:1.32857em;">'
    . '<div class="card-header">'
    . '<div class="card-title">Hasil Verifikasi'
    . '</div>'
    . '</div>'
    . '<form action="' . base_url('Urais/Layanan_2/Proses_verif/') . '" method="post">'
    . '<input type="hidden" name="id_layanan" value="' . $detil[0]->id_layanan . '"/>'
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
    . '<a href="' . base_url('Urais/Layanan_2/Proses/') . '" class="btn btn-default btn-sm" style="margin:0px 5px;"><i class="fas fa-times-circle"></i> Batal</a>'
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
} else {
    null;
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