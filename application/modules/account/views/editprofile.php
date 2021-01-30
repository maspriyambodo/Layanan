<div class="widget-list">
    <div class="col-md-12 widget-holder widget-full-height">
        <div class="widget-bg">

            <form id="formData" autocompete="off" enctype="multipart/form-data">
                <input type="hidden" id="id" value="<?php echo $this->gembok->get_userid(); ?>" />
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
                                <input type="text" readonly class="form-control" id="usernm" value="<?php echo $formdata["username"]; ?>" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group row">
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
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="l0">Employee No.</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="no_staff" value="<?php echo $formdata["no_staff"]; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="l0">Employee Occupation</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="occupation" value="<?php echo $formdata["occupation"]; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions btn-list text-center">
                    <button class="btn btn-primary" type="button" onclick="Page.Save()">Save My Profile</button>
                </div>
            </form>

        </div>
    </div>
</div>

{JS START}
<script>
    var Page = {};
    Page.DefaultImage = ko.observable('<?php echo base_url(); ?>assets/app/img/add_photo.png');
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
            formData.append('mode', "edit");
            formData.append('username', $('#usernm').val());
            formData.append('fullname', $('#fullname').val());
            formData.append('email', $('#email').val());
            formData.append('no_staff', $('#no_staff').val());
            formData.append('occupation', $('#occupation').val());
            formData.append('isresetimg', $('#isresetimg').val());
            formData.append('img_photo', $('#img_photo')[0].files[0]);
            var url = '<?php echo base_url(); ?>account/saveprofile';
            $.ajax({
                url: url,
                data: formData,
                method: 'POST',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.success) {
                        swal(
                            'Saved!',
                            'Your data has been saved.',
                            'success'
                        );
                        window.setTimeout(function(){
                            var random = Math.random() * 10 - 5;
                            window.location.href = '<?php echo base_url(); ?>account/editprofile/'+random;
                        },1000);
                    } else {
                        swal(
                            'Error saving user data!',
                            data.message,
                            'warning'
                        );
                    }
                    App.IsLoading(false);
                }
            });
        }
    };
</script>
{JS END}