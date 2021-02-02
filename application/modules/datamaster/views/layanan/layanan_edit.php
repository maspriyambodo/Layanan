<div class="widget-list">
    <div class="widget-holder widget-full-height">
        <div class="widget-bg">
            <form action="<?php echo base_url('datamaster/Layanan/Update/'); ?>" method="post">
                <input type="hidden" name="e_id" value="<?php echo $layanan[0]->id; ?>" required="" readonly="readonly"/>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>Nama Layanan:</label>
                            <input type="text" name="e_nama" class="form-control" required="" autocomplete="off" value="<?php echo $layanan[0]->nama_layanan; ?>"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Nama Direktorat:</label>
                            <select name="e_direk" class="form-control custom-select" required="">
                                <option value="" selected="">Pilih Direktorat</option>
                                <?php
                                foreach ($direktorat as $a) {
                                    if ($a->id == $layanan[0]->id_direktorat) {
                                        $selected = 'selected=""';
                                    } else {
                                        $selected = null;
                                    }
                                    echo '<option value="' . $a->id . '" ' . $selected . '>' . $a->nama . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan:</label>
                    <textarea class="form-control" name="ket" required="" rows="8"><?php echo $layanan[0]->keterangan; ?></textarea>
                </div>
                <div class="clearfix" style="margin: 20px 0px;"></div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                <a href="<?php echo base_url('datamaster/Layanan/index/'); ?>" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
            </form>
        </div>
    </div>
</div>