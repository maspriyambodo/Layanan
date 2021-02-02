<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/app/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assets/app/img/favicon.ico" type="image/x-icon">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo (isset($siteTitle)?$siteTitle:"Web Admin"); ?></title>

    <!-- Loader -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/pace.css" />
    <script data-pace-options='{ "ajax": false }' src="<?php echo base_url(); ?>assets/app/js/plugins/pace.min.js"></script>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/app/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/app/js/plugins/perfect-scrollbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="<?php echo base_url(); ?>assets/app/vendors/weather-icons-master/weather-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/vendors/weather-icons-master/weather-icons-wind.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/js/plugins/swal/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/js/plugins/switchery.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>assets/app/js/plugins/select2.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/app/js/plugins/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/app/js/plugins/multi-select.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>assets/app/js/plugins/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/js/plugins/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url(); ?>assets/app/css/loader.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/css/style.css" rel="stylesheet" type="text/css" />
    
    <?php
        if(isset($cssFiles)) {
            if(count($cssFiles) > 0) {
                foreach($cssFiles as $key=>$val) {
    ?>
    <link href="<?php echo $val; ?>" rel="stylesheet" type="text/css" />
    <?php
                }
            }
        }
    ?>

    <!-- Head Libs -->
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/modernizr.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body class="header-light sidebar-dark sidebar-expand">

    <div class="pace  pace-active" data-bind="visible: App.IsLoading()">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <div id="wrapper" class="wrapper">
    		<!-- HEADER & TOP NAVIGATION -->
            <nav class="navbar navbar-fixed-top">
            <!-- Logo Area -->
            <div class="navbar-header">
                <a href="<?php echo base_url(); ?>" class="navbar-brand">
                    <img class="logo-expand" alt="" src="<?php echo base_url(); ?>assets/app/img/logo-expand.png" />
                    <img class="logo-collapse" alt="" src="<?php echo base_url(); ?>assets/app/img/logo-collapse.png" />
                    <!-- <p>OSCAR</p> -->
                </a>
            </div>
            <!-- /.navbar-header -->
            <!-- Left Menu & Sidebar Toggle -->
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a>
                </li>
                <li class="username-welcome">Welcome&nbsp;<b><?php echo $this->gembok->get_fullname(); ?></b>
                </li>
            </ul>
            <div class="spacer"></div>
            <!-- User Image with Dropdown -->
            <?php
            $img_photo = $this->gembok->get_userphoto();
            if(empty($img_photo)) {
                $img_photo = base_url() . "assets/app/img/default-avatar.jpg";
                //assets/app/docs/users/user-admin.png
            } else {
                $img_photo = base_url() . DIRECTORY_SEPARATOR . "uploads/users" . DIRECTORY_SEPARATOR . $this->gembok->get_username() . DIRECTORY_SEPARATOR . $img_photo;
            }
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><span class="avatar thumb-sm"><img src="<?php echo $img_photo; ?>" class="roundeded-circled" alt="" /> <i class="material-icons list-icon">expand_more</i></span></a>
                    <div class="dropdown-menu dropdown-left dropdown-card dropdown-card-wide dropdown-card-dark text-inverse user-menu">
                        <div class="card">
                            <header class="card-heading-extra">
                                <div class="row">
                                    <div class="col-3 user-menu-img">
                                        <img src="<?php echo $img_photo; ?>" class="img-child" alt="" />
                                    </div>
                                    <div class="col-7 user-menu-info">
										Welcome back,
                                        <h4 class="mr-b-15 mr-t-0 sub-heading-font-family fw-300"><?php echo $this->gembok->get_fullname(); ?></h4>
										<a href="<?php echo base_url(); ?>account/editprofile/" class="btn btn-xs btn-success"><i class="material-icons list-icon">person</i>Profile</a>
										<a href="<?php echo base_url(); ?>account/changepassword/" class="btn btn-xs btn-info"><i class="material-icons list-icon">security</i>Change Password</a>
                                    </div>
                                    <div class="user-menu-logout"><a href="javascript:SignOut();" class="mr-t-10 btn btn-sm btn-danger"><i class="material-icons list-icon">power_settings_new</i> Logout</a>
                                    </div>
                                    <!-- /.col-4 -->
                                </div>
                                <!-- /.row -->
                            </header>
                        </div>
					</div>
				</li>
			</ul>
		<!-- /.navbar-right -->
		</nav>
		<!-- /.navbar -->
    <div class="content-wrapper">
        <?php
        require_once("nav.php");
        ?>
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h5 class="mr-0 mr-r-5"><?php echo (isset($pageTitle)?$pageTitle:""); ?></h5>
                    <?php if(isset($pageSubtitle)) {
                        if(!empty($pageSubtitle)) {    
                    ?>
                    <p class="mr-0 text-muted d-none d-md-inline-block"><?php echo $pageSubtitle; ?></p>
                        <?php } } ?>
                </div>
                <!-- /.page-title-left -->
                <?php
                if(isset($breadcrumbs)) {
                    if(count($breadcrumbs) > 0) {
                ?>
                <div class="page-title-right d-inline-flex">
                    <ol class="breadcrumb">
                <?php
                        foreach($breadcrumbs as $b) {
                            if(!empty($b["link"]) && !$b["is_actived"]) {
                ?>
                            <li class="breadcrumb-item<?php echo ($b["is_actived"]?" active":""); ?>"><a href="<?php echo $b["link"]; ?>"><?php echo $b["title"]; ?></a></li>
                <?php
                            } else {
                ?>
                            <li class="breadcrumb-item<?php echo ($b["is_actived"]?" active":""); ?>"><?php echo $b["title"]; ?></li>
                <?php
                            }
                        }
                ?>
                    </ol>
                </div>
                <?php
                    }
                }
                ?>
                <!-- /.page-title-right -->
            </div>
            <!-- /.page-title -->
            <?php
            echo $content;
            ?>
        </main>
        <!-- /.main-wrappper -->
    </div>
    <!-- /.content-wrapper -->
    <!-- FOOTER -->
    <footer class="footer text-center clearfix"><?php date("Y"); ?> &copy; Web Admin brought to you by Developer</footer>
    </div>
    <!--/ #wrapper -->
    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/app/js/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/bootstrap-util.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/libs/knockout-3.4.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/libs/knockout-select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/swal/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/vendors/theme-widgets/widgets.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/underscore-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/clndr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/jquery.multi-select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/daterangepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/switchery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/vindicate.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/jquery.knob.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/app/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/app.js"></script>
    
    <script type="text/javascript">
        var App = {};
        App.IsLoading = ko.observable(false);

        function SignOut() {
            swal({
                title: 'Are you sure?',
                text: "You will log out from the application, and need to log in again.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Sign Out now!'
            }).then(function(result) {
                if (result) {
                    window.location.href = '<?php echo base_url(); ?>signout';
                }
            }, function(dismiss) {
                // do nothing for dismiss modal
            });
        }
    </script>


    <?php
        if(isset($jsFiles)) {
            if(count($jsFiles) > 0) {
                foreach($jsFiles as $key=>$val) {
    ?>
    <script src="<?php echo $val; ?>"></script>
    <?php
                }
            }
        }
    ?>

    <?php 
    echo $js;
    ?>

    <script type="text/javascript">
        $(document).ready(function(){
            var textSwitchYes = $('<span class="js-switch-text">&nbsp;Yes</span>');
            var textSwitchNo = $('<span class="js-switch-text">&nbsp;No</span>');
            var switchs = $('input.js-switch');
            if(switchs.length > 0) {
                $.each(switchs, function(i, e){
                    if($(e).is(':checked')) {
                        $($(e).parent()).append(textSwitchYes);
                    } else {
                        $($(e).parent()).append(textSwitchNo);
                    }
                    $(e).on('change', function() {
                        var checked = $(e).is(':checked');
                        var stext = $($(e).parent()).find('.js-switch-text');
                        if(checked) {
                            $(stext).html('&nbsp;Yes');
                        } else {
                            $(stext).html('&nbsp;No');
                        }
                    });
                });
            }
        });

        function FormIsValid(selector) {
            selector.vindicate("validate");
            var checks = selector.find('[data-vindicate]');
            var isValid = true;
            if(checks.length > 0) {
                $.each(checks, function(i, c) {
                    var e = $(c)[0];
                    if(!$('#'+e.id).hasClass('form-control-success')) {
                        isValid = false;
                    }
                });
            }

            return isValid;
        }

        ko.applyBindings(App);
    </script>
</body>

</html>
