<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/app/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assets/app/img/favicon.ico" type="image/x-icon">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo (isset($siteTitle)?$siteTitle:"Web Admin - Sign In"); ?></title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url(); ?>assets/app/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/js/plugins/swal/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/swal/sweetalert2.min.js"></script>

    <link href="<?php echo base_url(); ?>assets/app/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/css/loader.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/app/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Head Libs -->
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url(<?php echo base_url(); ?>assets/app/img/login-bg.jpg)">

    <div class="pace  pace-active" data-bind="visible: App.IsLoading()">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <div id="wrapper" class="row wrapper">
        <?php
        echo $content;
        ?>
    </div>
    <!-- /.body-container -->
    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/app/js/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/app/js/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/libs/knockout-3.4.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/swal/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/app/js/material-design.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/app.js"></script>

    <script type="text/javascript">
        var App = {};
        App.IsLoading = ko.observable(false);
    </script>

    <?php 
    echo $js;
    ?>

    <script type="text/javascript">
        ko.applyBindings(App);
    </script>
</body>

</html>