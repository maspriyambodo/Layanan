<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <form action="<?php echo base_url('datamaster/Direktorat/Update/'); ?>" method="post">
                <div class="form-group">
                    <label>Nama Direktorat:</label>
                    <input type="hidden" name="e_id" value="<?php echo $direktorat[0]->id; ?>"/>
                    <input type="text" name="e_direk" class="form-control" required="" autocomplete="off" value="<?php echo $direktorat[0]->nama; ?>"/>
                </div>
                <div class="form-group">
                    <label>Keterangan:</label>
                    <textarea class="form-control" name="e_ket" required="" rows="4"><?php echo $direktorat[0]->keterangan; ?></textarea>
                </div>
                <div class="clearfix" style="margin: 20px 0px;"></div>
                <div class="btn-group" role="group" aria-label="Form Action">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>