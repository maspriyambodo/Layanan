<?php
// echo "Pertamax? => ". $is_first_2019;
$defaultjudul = "Semangat <b>Bekerja</b>";
$defaultkata = "Tetap fokus dan semangat, capai target pekerjaan hari ini";
$jamnow = date("H");
// $jamnow = 19;
if($jamnow <= 7 && $jamnow >= 4) {
    $defaultjudul = "Selamat <b>Pagi</b>";
    $defaultkata = "Awali hari ini dengan berdoa dan tersenyum, bawa semangat sepanjang hari";
}
else if($jamnow <= 10 && $jamnow > 7) {
    $defaultjudul = "Selamat <b>Bekerja</b>";
    $defaultkata = "Awali niat dari dalam hati, bersiap untuk berkonsentrasi";
}
else if($jamnow >= 15 && $jamnow <= 18) {
    $defaultjudul = "Selamat <b>Sore</b>";
    $defaultkata = "Semangat tidak boleh padam, tetap senyum dan fokus";
}
else if($jamnow > 18 || $jamnow < 4) {
    $defaultjudul = "Selamat <b>Malam</b>";
    $defaultkata = "Bersyukurlah atas apa yang kamu kerjakan dan dapatkan hari ini.";
}
?>      
<?php if($is_first_2019) { ?>
<div id="bg-fake">
    <img src="<?php echo base_url(); ?>assets/app/img/bg-fake.jpg" />
</div>
<div id="bg-ori" style="display: none;">
<?php } ?>
        <div class="greeting">
            <h4><?php echo $defaultjudul; ?></h4>
            <p><?php echo $defaultkata; ?></p>
        </div>
        <div class="col-10 ml-sm-auto col-sm-6 col-md-4 login-right login-wrapper">
            <div class="navbar-header text-center">
                <a href="<?php echo base_url(); ?>">
                    <img alt="" src="<?php echo base_url(); ?>assets/app/img/Logo_B_Islam.png" style="max-width: 50%;"/>
                </a>
            </div>
            <form method="post">    
                <div class="form-group">
                    <h4>Sign In</h4>
                </div>
                <div class="form-group">
                    <label for="userid">User ID / Email</label>
                    <input type="text" placeholder="user@alfabet.com" class="form-control" name="email" id="email" autocomplete="off" require />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="password" class="form-control" name="password" id="password" autocomplete="off" require />
                </div>
                <div class="form-group">
                    <div class="text-right">
                        <span class="text-muted font-weight-bold font-size-h4">New Here? <a href="<?php echo base_url('Register/index/');?>" class="text-primary font-weight-bolder">Create an Account</a></span>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-color-scheme ripple" type="button" onclick="Login.DoSignIn()">Login</button>
                </div>
                <div class="form-group no-gutters mb-0">
                    <div class="col-md-12 d-flex">
                        <div class="checkbox checkbox-info mr-auto">
                            <label class="d-flex">
                                <input type="checkbox" id="remember_me" value="1" /> <span class="label-text">Remember me</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="navbar-footer">
                <span class="powered">&copy; Brought to you by Developer</span>
            </div>
        </div>
<?php if($is_first_2019) { ?>
</div>
<?php } ?>

{JS START}
<script type="text/javascript">
    var Login = {};
    Login.DoSignIn = function() {
        var url = '<?php echo base_url(); ?>dosignin';
        var data = {
            email: $('#email').val(),
            password: $('#password').val(),
            remember: ($('#remember_me').is(':checked')?1:0),
        };
        App.IsLoading(true);
        ajaxPost(url, data, Login.Success, Login.Error);
    };
    Login.Success = function(data) {
        //console.log(data);
        App.IsLoading(false);
        if(data.success) {
            window.location.href = '<?php echo base_url(); ?>';
        } else {
            swal(
                data.error,
                data.message,
                'warning'
            );
            if(data.show_captcha) {
                //console.log('show captcha');
            }
        }
    };
    Login.Error = function(data) {
        swal(
            "Login failed!",
            data.message,
            'error'
        );
        App.IsLoading(false);
    };
    Login.FirstTime = function(bodystyle) {
        swal({
            title: 'Do you want to log in now?',
            text: "You will never seen this screen anymore!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Log In now!'
        }).then(function(result) {
            if (result) {
                // $('#bg-fake').addClass('magictime kelapKelip');
                $('#bg-fake').addClass('magictime vanishOut');
                setTimeout(() => {
                    $('#bg-ori').removeAttr('style');
                    $('body').addClass('magictime vanishIn');
                    $('body').attr('style', bodystyle);
                    $('#bg-fake').attr('style', 'display: none');
                }, 800);
            }
        }, function(dismiss) {
            // do nothing
        });
    }
    $(function(){
        <?php if($is_first_2019) { ?>
        var bodystyle = $('body').attr('style');
        $('body').removeAttr('style');
        $('#bg-fake img').on('click', function(){
            Login.FirstTime(bodystyle);
        });
        <?php } ?>
        $('#email').on('keypress', function(e){
            if(e.which == 13) {
                $('#password').focus();
            }
        });
        $('#password').on('keypress', function(e){
            if(e.which == 13) {
                Login.DoSignIn();
            }
        });
    });
</script>
{JS END}