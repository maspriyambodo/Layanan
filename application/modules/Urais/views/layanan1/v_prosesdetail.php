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
                        <td><b>Lokasi</b></td>
                        <td>: <?php echo $detil[0]->alamat_keg; ?></td>
                        <td><b>Narasumber</b></td>
                        <td>
                            <?php
                            $narsum_unique = [];
                            $array2 = [];
                            foreach ($detil as $narsum) {
                                if (!in_array($narsum->narsum, $narsum_unique)) {
                                    $narsum_unique[] = $narsum->narsum;
                                } else {
                                    $array2[] = $narsum->narsum;
                                }
                            }
                            foreach ($narsum_unique as $narsum2) {
                                echo '- ' . $narsum2 . '<br>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td colspan="3">: <?php echo 'Provinsi ' . $detil[0]->provinsi . ', ' . $detil[0]->kabupaten . '<br>&nbsp;&nbsp;Kec. ' . $detil[0]->kecamatan . ', Kel. ' . $detil[0]->kelurahan; ?></td>
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
            <?php
            $dok_unique = [];
            $array3 = [];
            foreach ($detil as $dokumen) {
                if (!in_array($dokumen->nama_file, $dok_unique)) {
                    $dok_unique[] = $dokumen->nama_file;
                } else {
                    $array3[] = $dokumen->nama_file;
                }
            }
            foreach ($dok_unique as $dokumen2) {
                ?>
                <div class="col-md" style="margin: 10px 0px;">
                    <a href="<?php echo base_url('assets/images/' . $dokumen2); ?>" class="card card-custom bg-secondary bg-hover-state-light card-stretch gutter-b" target="_new">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-sitemap" style="font-size: 48px; color: white;"></i>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px; font-size: 20px;"><?php echo $dokumen2; ?></div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="card card-custom" style="margin-top:1.32857em;">
    <div class="card-header">
        <div class="card-title">
            Hasil Verifikasi
        </div>
    </div>
    <form action="<?php echo base_url('Urais/Layanan_1/Proses_verif/'); ?>" method="post">
        <input type="hidden" name="id_layanan" value="<?php echo $detil[0]->id_layanan; ?>"/>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Hasil Verifikasi</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select required="" name="hasil" class="form-control custom-select" onchange="Verif()">
                            <option value="">Pilih Keputusan</option>
                            <?php
                            foreach ($stat as $keputusan) {
                                echo '<option value="' . $keputusan->id . '">' . $keputusan->nama_stat . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="form-group" id="alasan">
                <label>Alasan Penolakan</label>
                <textarea id="alasantxt" name="alasan" class="form-control" rows="8"></textarea>
            </div>
            <div class="text-center mt-4">
                <input type="checkbox" id="cbOk" required=""> Dengan ini menyatakan bahwa data dan atau dokumen yang dibuat adalah dengan sebenarnya
            </div>
        </div>
        <div class="card-footer">
            <div class="text-center">
                <a href="<?php echo base_url('Urais/Layanan_1/Proses/'); ?>" class="btn btn-default btn-sm"><i class="fas fa-times-circle"></i> Batal</a>
                <button id="btnsub" type="submit" class="btn btn-success btn-sm" disabled="true"><i class="fas fa-check"></i> Proses Verifikasi</button>
            </div>
        </div>
    </form>
</div>
<div style="clear: both;margin: 5% 0px;"></div>
<script>
    window.onload = function () {
        $('#alasan').hide('slow');
        $('input[type="checkbox"]').click(function () {
            if ($(this).is(":checked")) {
                document.getElementById("btnsub").disabled = false;
            } else {
                document.getElementById("btnsub").disabled = true;
            }
        });
    };
    function Verif() {
        var a = $('select[name=hasil] option:selected').text();
        if (a === "di Tolak") {
            $('#alasan').show('slow');
            $('textarea[name="alasan"]').attr('required', '');
        } else if (a === "di Setujui") {
            $('#alasan').hide('slow');
            $('textarea[name="alasan"]').removeAttr('required');
        } else {
            $('#alasan').hide('slow');
        }
    }
</script>