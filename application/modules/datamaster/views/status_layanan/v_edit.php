<div class="card" style="margin-top:1.32857em;">
    <div class="card-body">
        <form action="<?php echo base_url('datamaster/Status/Update/'); ?>" method="post">
            <input type="hidden" name="e_id" required="" readonly="" value="<?php echo $dt_stat[0]->id; ?>"/>
            <div class="form-group">
                <label>Status:</label>
                <input type="text" name="nama" class="form-control" required="" autocomplete="off" value="<?php echo $dt_stat[0]->nama_stat; ?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan:</label>
                <textarea name="ket" class="form-control" required="" rows="8"><?php echo $dt_stat[0]->keterangan; ?></textarea>
            </div>
            <div class="clearfix" style="margin: 20px 0px;"></div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
            <a href="<?php echo base_url('datamaster/Status/index/'); ?>" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
        </form>
    </div>
</div>