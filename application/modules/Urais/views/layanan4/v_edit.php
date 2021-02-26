<style>
    .nav-pills .nav-link.active, .show > .nav-pills .nav-link {
        color: #fff;
        background-color: #5bc0de;
    }
</style>

    <div style="clear: both;margin:2% 0px;"></div>
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pemohon-tab" data-toggle="tab" href="#pemohon" role="tab" aria-controls="home" aria-selected="true">Data Pemohon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="kegiatan-tab" data-toggle="tab" href="#kegiatan" role="tab" aria-controls="profile" aria-selected="false">Data Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="narsum-tab" data-toggle="tab" href="#narsum" role="tab" aria-controls="contact" aria-selected="false">Data Penceramah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dokmohon-tab" data-toggle="tab" href="#dokmohon" role="tab" aria-controls="contact" aria-selected="false">Dokumen Permohonan</a>
                </li>
            </ul>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pemohon" role="tabpanel" aria-labelledby="pemohon-tab">
                    <form action="<?php echo base_url('Urais/Layanan_4/UpdatePemohon/'); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $detil[0]->id;?>"/>
                    <input type="hidden" name="id_user" value="<?php echo $detil[0]->id_user;?>"/>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nomor KTP:</label>
                                <input type="text" name="ktp" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->nik; ?>" readonly/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama Lengkap:</label>
                                <input type="text" name="nama" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->fullname; ?>" readonly/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tanggal Lahir:</label>
                                <input type="text" name="tgl_lahir" class="form-control datepicker" required="" autocomplete="off" value="<?php echo $detil[0]->tgl_lhr; ?>" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="uname" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->username;?>" disabled/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="mali" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->email; ?>" readonly/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Telepon:</label>
                                <input type="text" name="telpon" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->telp; ?>" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="provinsi_narsum">Provinsi:</label>
                                <select id="provinsi_narsum" name="provinsi" required="" class="form-control custom-select" onchange="Provinsi_narsum(this.value)">
                                    <option value="">Pilih Provinsi</option>
                                        <?php
                                        foreach ($provinsi as $prov) {
                                            if ($prov->id_provinsi == $detil[0]->id_provinsi) {
                                                $prov_selected = 'selected=""';
                                            } else {
                                                $prov_selected = '';
                                            }
                                            echo '<option value="' . $prov->id_provinsi . '" ' . $prov_selected . '>' . $prov->nama . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="kotkabtxt_narsum">Kabupaten:</label>
                                    <select name="kabupaten" id="kotkabtxt_narsum" class="form-control custom-select" onchange="Kecshow_narsum(this.value)"></select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="kectxt_narsum">Kecamatan:</label>
                                    <select id="kectxt_narsum" name="kecamatan" class="form-control custom-select" onchange="Kelshow_narsum(this.value)"></select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="keltxt_narsum">Kelurahan:</label>
                                    <select name="kelurahan" id="keltxt_narsum" class="form-control custom-select"></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Keterangan Pemohon:</label>
                                <textarea class="form-control" name="keterangan_pemohon" rows="3"><?php echo $detil[0]->keterangan;?></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbaharui</button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="kegiatan" role="tabpanel" aria-labelledby="kegiatan-tab">
                    <form action="<?php echo base_url('Urais/Layanan_4/UpdateKegiatan/'); ?>" method="post">
                    <input type="hidden" name="id_layanan" value="<?php echo $detil[0]->id;?>"/>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="nm_keg">Nama Kegiatan:</label>
                                <input id="nm_keg" type="text" name="nm_keg" class="form-control" required="" autocomplete="off" value="<?php echo $detil[0]->nm_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="tgl_awal_keg">Tanggal Awal Kegiatan:</label>
                                <input id="tgl_awal_keg" type="text" name="tgl_awal_keg" class="form-control datepicker" required="" autocomplete="off" onchange="Awal()" onkeydown="return false;" value="<?php echo $detil[0]->tgl_awal_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="tgl_akhir_keg">Tanggal Akhir Kegiatan:</label>
                                <input id="tgl_akhir_keg" type="text" name="tgl_akhir_keg" class="form-control datepicker" required="" autocomplete="off" onchange="Tgl()" onkeydown="return false;" value="<?php echo $detil[0]->tgl_akhir_keg; ?>"/>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="esti_keg">Estimasi Peserta:</label>
                                <input id="esti_keg" type="text" name="esti_keg" class="form-control" required="" autocomplete="off" onkeypress="return isNumber(event)" value="<?php echo $detil[0]->esti_keg; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="lembaga">Lembaga:</label>
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
                            <div class="form-group">
                                <label for="alamat_kegiatan">Lokasi Kegiatan:</label>
                                <input id="alamat_kegiatan" type="text" name="alamat_kegiatan" class="form-control" autocomplete="off" required="" value="<?php echo $detil[0]->alamat_keg; ?>"/>
                            </div>
                            
                        </div>
                        <div class="col-md">
                            <div class="form-group" id="nm_lemb">
                                <label for="lemb_keg">Nama Lembaga:</label>
                                <input id="lemb_keg" type="text" name="lemb_keg" class="form-control" autocomplete="off" required="" value="<?php echo $detil[0]->lemb_keg; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_kegiatan">Keterangan Kegiatan:</label>
                                <textarea id="keterangan_kegiatan" name="keterangan_kegiatan" class="form-control" required="" rows="5"><?php echo $detil[0]->ket_keg; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbaharui</button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="narsum" role="tabpanel" aria-labelledby="narsum-tab">
                        <table class="table table-striped table-striped">
                          <thead style="background-color: #545d73; color: white;">
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Nama Penceramah</th>
                              <th scope="col">Tempat Lahir</th>
                              <th scope="col">Tanggal Lahir</th>
                              <th scope="col">Jenis Kelamin</th>
                              <th scope="col">Pendidikan Formal</th>
                              <th scope="col">Pendidikan Non</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; foreach ($penceramah as $narsum) { ?>
                            <tr>
                              <th scope="row"><?php echo $no++;?></th>
                              <td><?php echo $narsum->narsum;?></td>
                              <td><?php echo $narsum->tmp_lahir;?></td>
                              <td><?php echo $narsum->lhr_narsum;?></td>
                              <td><?php echo $narsum->jns_kelamin;?></td>
                              <td><?php echo $narsum->pddk_formal;?></td>
                              <td><?php echo $narsum->pddk_non;?></td>
                              <td>
                                <a href="" data-toggle="modal" data-target="#Edit<?php echo $narsum->id;?>"><i class="fa fa-edit" style="color:orange; margin-right: 4px;"></i></a>
                                <a href="" data-toggle="modal" data-target="#View<?php echo $narsum->id;?>"><i class="fa fa-eye" style="margin-left: 4px; margin-right: 4px;"></i></a>
                            </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                </div>

                <?php foreach($penceramah as $narsum){?>
                    <div class="modal fade" id="Edit<?php echo $narsum->id;?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="EditLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="Edit<?php echo $narsum->id_penceramah;?>">Edit Data Penceramah, <?php echo $narsum->narsum;?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="<?php echo site_url('Urais/Layanan_4/UpdatePenceramah/');?>" enctype="multipart/form-data">
                                <div style="clear: both; margin:10px 0;"></div>
                                    <div class="row">
                                                <input type="hidden" name="id" value="<?php echo $narsum->id_penceramah;?>"/>
                                                <input type="hidden" name="id_layanan" value="<?php echo $narsum->id_layanan_penceramah;?>"/>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="ceramah">Nama:</label>
                                                        <input id="ceramah" type="text" name="ceramah" autocomplete="off" class="form-control" value="<?php echo $narsum->narsum;?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="tmp_lahir">Tempat Lahir:</label>
                                                        <input id="tmp_lahir" type="text" name="tmp_lahir" class="form-control" autocomplete="off" value="<?php echo $narsum->tmp_lahir;?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="lahir_narsum">Tanggal Lahir:</label>
                                                        <input id="lahir_narsum" type="text" name="lahir_narsum" class="form-control datepicker" autocomplete="off" onkeydown="return false;" value="<?php echo $narsum->lhr_narsum;?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="jkel">Jenis Kelamin:</label>
                                                        <select id="jkel" name="jkel" class="form-control custom-select">
                                                            <option value="">Pilih Jenis Kelamin</option>
                                                            <option <?php if($narsum->jns_kelamin == 'laki-laki'){echo "selected"; } ?> value="1">Laki-laki</option>
                                                            <option <?php if($narsum->jns_kelamin == 'perempuan'){echo "selected"; } ?> value="2">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="pddk_formal">Pendidikan Formal:</label>
                                                        <select id="pddk_formal" name="pddk_formal" class="form-control custom-select">
                                                            <option value="">Pilih</option>
                                                            <option <?php if($narsum->pddk_formal == 'SD'){echo "selected"; } ?> value="1">SD</option>
                                                            <option <?php if($narsum->pddk_formal == 'SLTP/MTS'){echo "selected"; } ?> value="2">SLTP/MTS</option>
                                                            <option <?php if($narsum->pddk_formal == 'SMK/SMA'){echo "selected"; } ?> value="3">SMK/SMA</option>
                                                            <option <?php if($narsum->pddk_formal == 'D3'){echo "selected"; } ?> value="4">D3</option>
                                                            <option <?php if($narsum->pddk_formal == 'S1'){echo "selected"; } ?> value="5">S1</option>
                                                            <option <?php if($narsum->pddk_formal == 'S2'){echo "selected"; } ?> value="6">S2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="pddk_non">Pendidikan Non Formal:</label>
                                                        <input id="pddk_non" type="text" name="pddk_non" autocomplete="off" class="form-control" value="<?php echo $narsum->pddk_non;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>CV Penceramah:</label>
                                                        <input class="form-control" type="file" name="cv">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="scan_doks">Scan Sertifikat:</label>
                                                        <input class="form-control" type="file" name="sc_sertifikat">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat:</label>
                                                        <input type="text" name="alamat_ceramah" class="form-control" autocomplete="off" value="<?php echo $narsum->alamat;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="paspor_narsum">Fotocopy Passport:</label>
                                                        <input class="form-control" type="file" name="fc_passport"/>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="ktp_docs">Scan KTP:</label>
                                                        <input class="form-control" type="file" name="sc_ktp"/>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="foto_narsum">Pas Foto:</label>
                                                        <input class="form-control" type="file" name="pas_foto"/>
                                                    </div>
                                                </div>
                                            </div>
                                <div id="repeat_narsum"></div><br>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbaharui</button>
                                </form>
                              </div>
                            </div>
                      </div>
                    </div>

                    <div class="modal fade" id="View<?php echo $narsum->id;?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="EditLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="View<?php echo $narsum->id_penceramah;?>">Data Penceramah, <?php echo $narsum->narsum;?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div style="clear: both; margin:10px 0;"></div>
                                    <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="ceramah">Nama:</label>
                                                        <input id="ceramah" type="text" name="ceramah" autocomplete="off" class="form-control" value="<?php echo $narsum->narsum;?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="tmp_lahir">Tempat Lahir:</label>
                                                        <input id="tmp_lahir" type="text" name="tmp_lahir" class="form-control" autocomplete="off" value="<?php echo $narsum->tmp_lahir;?>" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="lahir_narsum">Tanggal Lahir:</label>
                                                        <input id="lahir_narsum" type="text" name="lahir_narsum" class="form-control datepicker" autocomplete="off" onkeydown="return false;" value="<?php echo $narsum->lhr_narsum;?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="jkel">Jenis Kelamin:</label>
                                                        <input id="pddk_non" type="text" name="pddk_non" autocomplete="off" class="form-control" value="<?php echo $narsum->jns_kelamin;?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="pddk_formal">Pendidikan Formal:</label>
                                                        <input id="pddk_non" type="text" name="pddk_non" autocomplete="off" class="form-control" value="<?php echo $narsum->pddk_formal;?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="pddk_non">Pendidikan Non Formal:</label>
                                                        <input id="pddk_non" type="text" name="pddk_non" autocomplete="off" class="form-control" value="<?php echo $narsum->pddk_non;?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat:</label>
                                                        <input type="text" name="alamat_ceramah" class="form-control" autocomplete="off" value="<?php echo $narsum->alamat;?>" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>CV Penceramah:</label><br>
                                                        <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $narsum->cv;?>" width="200px" height="100px">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="scan_doks">Scan Sertifikat:</label><br>
                                                        <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $narsum->sc_sertifikat;?>" width="200px" height="100px">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="paspor_narsum">Fotocopy Passport:</label><br>
                                                        <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $narsum->fc_passport;?>" width="200px" height="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md"></div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="ktp_docs">Scan KTP:</label><br>
                                                        <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $narsum->sc_ktp;?>" width="220px" height="100px">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="foto_narsum">Pas Foto:</label><br>
                                                        <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $narsum->pas_foto;?>" width="220px" height="100px">
                                                    </div>
                                                </div>
                                                <div class="col-md"></div>
                                            </div>
                              </div>
                            </div>
                      </div>
                    </div>
                <?php }?>

                <div class="tab-pane fade" id="dokmohon" role="tabpanel" aria-labelledby="dokmohon-tab">
                    <form method="post" action="<?php echo site_url('Urais/Layanan_4/UpdateDokumen/');?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md"></div>
                        <input type="hidden" name="id" value="<?php echo $detil[0]->id_dokumen;?>"/>
                            <input type="hidden" name="id_layanan" value="<?php echo $detil[0]->id;?>"/>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="ktp_keg" class="form-label">Surat Permohonan Safari:</label>
                                <br>
                                <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $detil[0]->surat_permohonan_safari;?>" width="220px" height="100px"><br>
                                <input class="form-control" type="file" name="surat_permohonan_safari" value="<?php echo $detil[0]->super_safari; ?>">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="proposal" class="form-label">Proposal Safari:</label>
                                <br>
                                <img src="<?php echo base_url();?>assets/uploads/binsyar/<?php echo $detil[0]->proposal_safari;?>" width="220px" height="100px"><br>
                            <input class="form-control" type="file" name="proposal_safari" value="<?php echo $detil[0]->prosa; ?>">
                            </div>
                        </div>
                        <div class="col-md"></div>
                    </div>
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbaharui</button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script>
    window.onload = function () {
        Provinsi_narsum($('#provinsi_narsum option:selected').val());
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
        l = $('input[name="tgl_awal_keg"]').val();
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
        if (a == "") {
            toastr.warning("Harap masukkan nama pemohon!");
        } else if (b == "" | !validateEmail(b)) {
            toastr.warning("Harap masukkan email pemohon!");
        } else if (c == "") {
            toastr.warning("Harap masukkan nomor ktp pemohon!");
        } else if (d == "") {
            toastr.warning("Harap masukkan nomor ktp pemohon!");
        } else if (e == "") {
            toastr.warning("Harap masukkan tanggal lahir pemohon!");
        } else if (f == "") {
            toastr.warning("Harap masukkan nomor telepon pemohon!");
        } else if (g == "") {
            toastr.warning("Harap masukkan provinsi pemohon!");
        } else if (h == "") {
            toastr.warning("Harap masukkan kabupaten pemohon!");
        } else if (i == "") {
            toastr.warning("Harap masukkan kecamatan pemohon!");
        } else if (j == "") {
            toastr.warning("Harap masukkan kelurahan pemohon!");
        } else if (k == "") {
            toastr.warning("Harap masukkan nama kegiatan!");
        } else if (l == "") {
            toastr.warning("Harap masukkan tanggal kegiatan!");
        } else if (m == "") {
            toastr.warning("Harap masukkan tanggal kegiatan!");
        } else if (n == "") {
            toastr.warning("Harap masukkan estimasi peserta kegiatan!");
        } else if (o == "") {
            toastr.warning("Harap memilih jenis lembaga!");
        } else if (p == "") {
            toastr.warning("Harap masukkan nama lembaga kegiatan!");
        } else if (q == "") {
            toastr.warning("Harap masukkan alamat atau lokasi kegiatan!");
        } else if (r == "") {
            toastr.warning("Harap memilih negara tujuan kegiatan!");
        } else if (s == "") {
            toastr.warning("Harap masukkan keterangan kegiatan!");
        } else if (t == "") {
            toastr.warning("Harap masukkan nomor passport penceramah!");
        } else if (u == "") {
            toastr.warning("Harap masukkan nama lengkap penceramah!");
        } else if (v == "") {
            toastr.warning("Harap pilih jenis kelamin penceramah!");
        } else if (w == "") {
            toastr.warning("Harap masukkan tempat lahir penceramah!");
        } else if (x == "") {
            toastr.warning("Harap masukkan provinsi penceramah!");
        } else if (y == "") {
            toastr.warning("Harap masukkan kabupaten penceramah!");
        } else if (z == "") {
            toastr.warning("Harap masukkan kecamatan penceramah!");
        } else if (ab == "") {
            toastr.warning("Harap masukkan kelurahan penceramah!");
        } else if (ac == "") {
            toastr.warning("Harap masukkan tanggal lahir penceramah!");
        } else if (ad == "") {
            toastr.warning("Harap masukkan cv atau resume penceramah!");
        } else if (ae == "") {
            toastr.warning("Harap masukkan fotocopy passport penceramah!");
        } else if (af == "") {
            toastr.warning("Harap masukkan pas foto penceramah!");
        } else if (ag == "") {
            toastr.warning("Harap masukkan surat permohonan kegiatan!");
        } else if (ah == "") {
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
        const todays = today.format("DD/MM/YYYY");
        const kegiatan = $('input[name="tgl_awal_keg"]').val();
        if (kegiatan == todays) {
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
                    if (sel.options[i].innerHTML == "<?php echo $detil[0]->kabupaten; ?>") {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                        Kecshow_narsum(opt.value);
                    }
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
                    if (sel.options[i].innerHTML == "<?php echo $detil[0]->kecamatan;?>") {
                        $('select option[value="' + opt.value + '"]').attr('selected', true);
                        Kelshow_narsum(opt.value);
                    }
                }
                // console.log(<?php echo $detil[0]->kecamatan_layanan;?>);
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