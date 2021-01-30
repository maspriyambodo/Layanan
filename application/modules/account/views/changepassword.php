<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

            <form id="formData" autocompete="off" enctype="multipart/form-data">
                <input type="hidden" id="id" value="<?php echo $this->gembok->get_userid(); ?>" />
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="currpass">Current Password</label>
                            <div class="col-md-3">
                                <input type="password" class="form-control" id="currpass" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="newpass">New Password</label>
                            <div class="col-md-3">
                                <input type="password" class="form-control" id="newpass" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="currpass">Confirm New Password</label>
                            <div class="col-md-3">
                                <input type="password" class="form-control" id="newpassconfirm" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions btn-list text-center">
                    <button class="btn btn-primary" type="button" onclick="Page.Save()">Change Password</button>
                </div>
            </form>

        </div>
    </div>
</div>

{JS START}
<script>
    var Page = {};
    Page.Save = function() {
        App.IsLoading(true);
        var param = {
            id: $('#id').val(),
            currpass: $('#currpass').val(),
            newpass: $('#newpass').val(),
            newpassconfirm: $('#newpassconfirm').val(),
        };
        var url = '<?php echo base_url(); ?>account/savenewpassword';
        ajaxPost(url, param, function(data){
            if(data.success) {
                swal(
                    'Saved!',
                    'Your password has been changed.',
                    'success'
                );
            } else {
                swal(
                    'Error!',
                    data.message,
                    'error'
                );
            }
            App.IsLoading(false);
        }, function(data) {
            // do nothing for unsuccess transaction
            App.IsLoading(false);
        });
    }
</script>
{JS END}