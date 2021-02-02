<div class="widget-list">
    <div class="widget-holder widget-full-height">
        <div class="widget-bg">
            <form action="<?php echo base_url('datamaster/Layanan/Add/'); ?>" method="post">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>Nama Layanan:</label>
                            <input type="text" name="nama" class="form-control" required="" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Nama Direktorat:</label>
                            <select name="direk" class="form-control custom-select" required="">
                                <option value="">Pilih Direktorat</option>
                                <?php foreach ($direktorat as $a) { ?>
                                    <option value="<?php echo $a->id; ?>"><?php echo $a->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan:</label>
                    <textarea class="form-control" name="ket" required="" rows="8"></textarea>
                </div>
                <div class="clearfix" style="margin: 20px 0px;"></div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</button>
            </form>
        </div>
    </div>
</div>