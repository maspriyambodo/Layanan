<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">
            <form action="<?php echo base_url('datamaster/Direktorat/Save/'); ?>" method="post">
                <div class="form-group">
                    <label>Nama Direktorat:</label>
                    <input type="text" name="nama" class="form-control" required="" autocomplete="off"/>
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