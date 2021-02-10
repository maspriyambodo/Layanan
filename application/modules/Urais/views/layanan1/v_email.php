<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <style>
            body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:1rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff}*,::after,::before{box-sizing:border-box}:root{--blue:#007bff;--indigo:#6610f2;--purple:#6f42c1;--pink:#e83e8c;--red:#dc3545;--orange:#fd7e14;--yellow:#ffc107;--green:#28a745;--teal:#20c997;--cyan:#17a2b8;--white:#fff;--gray:#6c757d;--gray-dark:#343a40;--primary:#007bff;--secondary:#6c757d;--success:#28a745;--info:#17a2b8;--warning:#ffc107;--danger:#dc3545;--light:#f8f9fa;--dark:#343a40;--breakpoint-xs:0;--breakpoint-sm:576px;--breakpoint-md:768px;--breakpoint-lg:992px;--breakpoint-xl:1200px;--font-family-sans-serif:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-family-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace}.container,.container-lg,.container-md,.container-sm,.container-xl{max-width:1140px}.container,.container-fluid,.container-lg,.container-md,.container-sm,.container-xl{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}.card{position:relative;display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}.card-body{-ms-flex:1 1 auto;flex:1 1 auto;min-height:1px;padding:1.25rem}.text-center{text-align:center!important}.h1,h1{font-size:2.5rem}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6{margin-bottom:.5rem;font-weight:500;line-height:1.2}.mb-4,.my-4{margin-bottom:1.5rem!important}.mt-4,.my-4{margin-top:1.5rem!important}hr{margin-top:1rem;margin-bottom:1rem;border:0;border-top:1px solid rgba(0,0,0,.1)}hr{box-sizing:content-box;height:0;overflow:visible}.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch}.table-responsive>.table-bordered{border:0}.table-bordered{border:1px solid #dee2e6}.table{width:100%;margin-bottom:1rem;color:#212529}table{border-collapse:collapse}.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}.alert-primary{color:#004085;background-color:#cce5ff;border-color:#b8daff}.alert{position:relative;padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem}b,strong{font-weight:bolder}.pl-4, .px-4 {padding-left: 1.5rem !important;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center"><?php echo $value[0]->nm_keg; ?></h1>
                    <h2 class="text-center"><?php echo $value[0]->lemb_keg; ?></h2>
                    <hr class="my-4">
                    <div class="table-responsive px-4">
                        <table class="table table-bordered" style="width:100%;">
                            <tbody>
                                <tr>
                                    <td><b>Nama Kegiatan</b></td>
                                    <td>: <?php echo $value[0]->nm_keg; ?></td>
                                    <td><b>Tanggal Kegiatan</b></td>
                                    <td>: 
                                        <?php
                                        if ($value[0]->tgl_awal_keg == $value[0]->tgl_akhir_keg) {
                                            echo date("d F Y", strtotime($value[0]->tgl_awal_keg));
                                        } else {
                                            echo date("d F Y", strtotime($value[0]->tgl_awal_keg)) . ' <b>s/d</b> ' . date("d F Y", strtotime($value[0]->tgl_akhir_keg));
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Lembaga</b></td>
                                    <td>: <?php echo $value[0]->lemb_keg; ?></td>
                                    <td><b>Estimasi</b></td>
                                    <td>: <?php echo $value[0]->esti_keg; ?> Peserta</td>
                                </tr>
                                <tr>
                                    <td><b>Lokasi</b></td>
                                    <td>: <?php echo $value[0]->alamat_keg; ?></td>
                                    <td><b>Narasumber</b></td>
                                    <td>
                                        <?php
                                        $narsum_unique = [];
                                        $array2 = [];
                                        foreach ($value as $narsum) {
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
                                    <td colspan="3">: <?php echo 'Provinsi ' . $value[0]->provinsi . ', ' . $value[0]->kabupaten . '<br>&nbsp;&nbsp;Kec. ' . $value[0]->kecamatan . ', Kel. ' . $value[0]->kelurahan; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Keterangan</b></td>
                                    <td colspan="3">: <?php echo $value[0]->keterangan; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-primary my-4" role="alert">
            Status Permohonan: <?php echo $value[0]->nm_keg; ?> - <b><?php echo $value[0]->nama_stat; ?></b>
            <?php
            if (empty($value[0]->alasan_tolak)) {
                
            } else {
                echo '<br>';
                echo 'Alasan:';
                echo '<br>';
                echo $value[0]->alasan_tolak;
            }
            ?>
        </div>
    </body>
</html>
