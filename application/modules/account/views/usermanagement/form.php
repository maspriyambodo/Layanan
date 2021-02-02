<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

            <form id="formData" autocompete="off" enctype="multipart/form-data">
                <input type="hidden" id="id" value="<?php echo $id; ?>" />
                <input type="hidden" id="mode" value="<?php echo $mode; ?>" />
                <div class="row">
                    <div class="col-md-2 no-padding-left photo-uploader">
                        <div class="upload-btn-wrapper">
                            <input type="hidden" id="isresetimg" value="0" />
                            <?php
                            $img_photo = base_url(). "assets/app/img/add_photo.png";
                            if(!empty($formdata["img_photo"])) {
                                if(file_exists($formdata["checkfile"])) {
                                    $img_photo = base_url() . "uploads/users/" . $formdata["username"] . "/" . $formdata["img_photo"];
                                }
                            }
                            ?>
                            <img src="<?php echo $img_photo; ?>" width="100%" id="img_preview" class="img_preview" />
                            <input type="file" name="img_photo" id="img_photo" accept="image/jpeg, image/png" onchange="Page.ReadImg(this, '#img_preview');" />
                        </div>
                        <button type="button" class="btn btn-xs btn-warning">Reset Image</button>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="usernm">User ID</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="usernm" value="<?php echo $formdata["username"]; ?>" autocomplete="off" />
                            </div>
                            <div class="col-md-2"></div>
                            <label class="col-md-2 col-form-label" for="user_group">User Group</label>
                            <div class="col-md-3">
                                <select class="m-b-10 form-control" id="user_group" data-placeholder="Choose" data-toggle="select2">
                                    <option value="0">Please User Group</option>
                                    <?php
                                    if(count($user_group)>0) {
                                        foreach($user_group as $ug) {
                                    ?>
                                    <option value="<?php echo $ug->id; ?>"<?php echo ($formdata["role_id"]==$ug->id?" selected=\"selected\"":""); ?>><?php echo $ug->name; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="passwd">Password</label>
                            <div class="col-md-3">
                                <input class="form-control" id="passwd" placeholder="Password" value="<?php echo ""; ?>" type="password" autocomplete="off" />
                                <?php
                                if($mode=="edit"):
                                ?>
                                <small>* Please empty password if not edited</small>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-1"></div>
                            <label class="col-md-2 col-form-label" for="email">Email</label>
                            <div class="col-md-4">
                                <input class="form-control" id="email" value="<?php echo $formdata["email"]; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="l0">Fullname</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="fullname" value="<?php echo $formdata["fullname"]; ?>" />
                            </div>
                            <label class="col-md-2 col-form-label" for="l0">Is Active?</label>
                            <div class="col-md-2">
                                <select id="is_actived" class="m-b-10 form-control">
                                    <option value="1"<?php echo ($formdata["banned"]==0?" selected=\"selected\"":""); ?>>Yes</option>
                                    <option value="0"<?php echo ($formdata["banned"]==1?" selected=\"selected\"":""); ?>>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="l0">Employee No.</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="no_staff" value="<?php echo $formdata["no_staff"]; ?>" />
                            </div>
                            <div class="col-md-1"></div>
                            <label class="col-md-2 col-form-label" for="l0">Employee Occupation</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="occupation" value="<?php echo $formdata["occupation"]; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="l0">Wilayah</label>
                            <div class="col-md-4">
                                <select class="m-b-10 form-control" id="partner" data-placeholder="Choose" data-toggle="select2">
                                    <option value="0">Semua</option>
                                    <?php
                                    if(count($partners)>0) {
                                        foreach($partners as $bu) {
                                    ?>
                                    <option value="<?php echo $bu->id; ?>"<?php echo ($formdata["id_company"]==$bu->id?" selected=\"selected\"":""); ?>><?php echo $bu->nama; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-separator hidden"></div>
                
                <div class="form-group row hidden">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-sm btn-info" onclick="Page.AddNewApprover();">Tambah Approver</button>
                    </div>
                </div>
                <div class="form-group row hidden">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="40">No.</th>
                                    <th>Approver Name</th>
                                    <th width="140">Approval Level</th>
                                    <th width="240">Position As</th>
                                    <th width="100">Control</th>
                                </tr>
                            </thead>
                            <tbody data-bind="foreach: Page.Approvers">
                                <tr>
                                    <td align="right"><span data-bind="text: $index()+1"></span></td>
                                    <td><span data-bind="text: approver_name"></span></td>
                                    <td><span data-bind="text: approver_level"></span></td>
                                    <td><span data-bind="text: approver_as"></span></td>
                                    <td align="center">
                                        <a href="javascript:void(0);" class="text-warning" data-bind="click: function() { Page.EditApprover(id); }"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:void(0);" class="text-danger" data-bind="click: function() { Page.DeleteApprover(id); }"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="form-actions btn-list text-center">
                    <button class="btn btn-primary" type="button" onclick="Page.Save()">Submit</button>
                    <button class="btn btn-outline-default" type="button" onclick="window.location.href = '<?php echo base_url(); ?>account/usermanagement';">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php require_once("modal-form.php"); ?>

{JS START}
<script type="text/javascript">
var Page = {};
Page.DefaultImage = ko.observable('<?php echo base_url(); ?>assets/app/img/add_photo.png');
Page.Approvers = ko.observableArray([]);

<?php
if(count($formdata["approvers"]) > 0) {
    $items = array();
    $count = 0;
    foreach($formdata["approvers"] as $dt) {
        $count++;
        $item = array(
            "id" => $count,
            "approver_id" => $dt["approver_id"],
            "approver_username" => $dt["approver_username"],
            "approver_name" => $dt["approver_name"],
            "approver_as" => $dt["approver_as"],
            "approver_level" => $dt["approver_level"],
        );
        array_push($items, $item);
    }
?>
    Page.Approvers(<?php echo json_encode($items); ?>);
<?php
}
?>
Page.ReadImg = function (data, target) {
    readImg(data, target);
};
Page.IsValid = function() {
    return true;
};
Page.Save = function() {
    if(Page.IsValid()) {
        App.IsLoading(true);
        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('mode', $('#mode').val());
        formData.append('username', $('#usernm').val());
        formData.append('fullname', $('#fullname').val());
        formData.append('email', $('#email').val());
        formData.append('password', $('#passwd').val());
        formData.append('is_actived', $('#is_actived').val());
        formData.append('user_group', $('#user_group').val());
        formData.append('company_id', $('#partner').val());
        formData.append('business_unit', '');
        // formData.append('business_unit', $('#business_unit').val());
        formData.append('no_staff', $('#no_staff').val());
        formData.append('occupation', $('#occupation').val());
        formData.append('isresetimg', $('#isresetimg').val());
        formData.append('approvers', JSON.stringify(Page.Approvers()));
        formData.append('img_photo', $('#img_photo')[0].files[0]);
        var url = '<?php echo base_url(); ?>account/usermanagement/save';
        $.ajax({
            url: url,
            data: formData,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
        }).done(function(data){
            if(data.success) {
                swal(
                    'Saved!',
                    'Your data has been saved.',
                    'success'
                );
                window.setTimeout(function(){
                    window.location.href = '<?php echo base_url(); ?>account/usermanagement';
                },1000);
            } else {
                swal(
                    'Error saving user data!',
                    data.message,
                    'warning'
                );
            }
            App.IsLoading(false);
        });
    }
};

Page.ShowApprover = function(tipe) {
    $('#modalForm').modal(tipe);
};
Page.OpenApprover = function() {
    Page.ShowApprover('show');
};
Page.HideApprover = function() {
    Page.ShowApprover('hide');
};
Page.ResetApprover = function() {
    $('#did').val('');
    $('#dmode').val('add');
    $('#approver').val('');
    $('#approver_as').val('');
    $('#approver_level').val('0');
    return Page.GetApprover();
};
Page.GetApprover = function() {
    var R = $.Deferred();
    App.IsLoading(true);
    var data = {};
    var url = '<?php echo base_url(); ?>account/usermanagement/getdata';
    ajaxPost(url, data, function(data){
        var data = data.data;
        if(data.length > 0) {
            $('#approver').html('');
            $('#approver')
                .append($("<option></option>")
                    .attr("value",0)
                    .text("Silakan Pilih")); 
            $.each(data, function(idx, val){
                var id = val.id + '|' + val.username;
                var username = val.fullname;

                $('#approver')
                    .append($("<option></option>")
                        .attr("value",id)
                        .text(username)); 
            });
        }

        App.IsLoading(false);
    }, function(data) {
        // do nothing for unsuccess transaction
        App.IsLoading(false);
    });

    return R;
};
Page.AddNewApprover = function() {
    Page.ResetApprover().done(Page.OpenApprover());
};
Page.EditApprover = function(id) {
    Page.ResetApprover().done(Page.OpenApprover());
    if(Page.Approvers().length > 0) {
        $.each(Page.Approvers(), function(idx, item){
            if(item.id==id) {
                $('#did').val(item.id);
                $('#dmode').val('edit');
                $('#approver_as').val(item.approver_as);
                $('#approver_level').val(item.approver_level);
                window.setTimeout(function(){
                    $('#approver').val(item.approver_id + '|' + item.approver_username).trigger('change');
                }, 500);
                return false;
            }
        });
    }
};
Page.SortApprover = function() {
    var arrdata = _.sortBy(Page.Approvers(), function(o) { return o.approver_level; });
    Page.Approvers(arrdata);
};
Page.SaveApprover = function() {
    var id = $('#did').val();
    var mode = $('#dmode').val();
    var newid = Page.Approvers().length + 1;
    if(mode=="edit") {
        Page.Approvers.remove(function(item){ return item.id == id });
        newid = id;
    }
    var approvers = $('#approver').val().split('|');
    var obj = {
        id: newid,
        approver_id: approvers[0],
        approver_username: approvers[1],
        approver_name: $('#approver option:selected').text(),
        approver_as: $('#approver_as').val(),
        approver_level: $('#approver_level').val(),
    };
    Page.Approvers.push(obj);
    swal(
        'Saved!',
        'Your data has been saved.',
        'success'
    );
    Page.SortApprover();
    Page.HideApprover();
};
Page.DeleteApprover = function(id) {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if (result) {
            Page.Approvers.remove(function(item){ return item.id == id });
            swal(
                'Deleted!',
                'Your data has been deleted.',
                'success'
            );
            Page.SortApprover();
        }
    }, function(dismiss) {
        // do nothing for dismiss modal
    });
};
</script>
{JS END}