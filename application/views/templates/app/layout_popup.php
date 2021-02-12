<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/app/favicon.png" />
    
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
    <link href="<?php echo base_url(); ?>assets/app/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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

    <!-- Date picker bagus -->
    <link href="<?php echo base_url(); ?>assets/app/css/daterangepicker.css" rel="stylesheet" type="text/css" />

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

<body class="">

    <div class="app-loader" data-bind="visible: App.IsLoading()">
        <div class="app-loader-content">
            <div class="app-loader-logo">
                <img src="<?php echo base_url(); ?>assets/app/img/logo-expand-alt.png" />
            </div>
            <div class="loader">Loading...</div>
        </div>
    </div>

    <div id="wrapper" class="wrapper">
    <div class="content-wrapper">
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
    </div>
    <!--/ #wrapper -->
    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/app/js/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/plugins/bootstrap-util.js"></script>
    <!-- <script src="<?php //echo base_url(); ?>assets/app/js/libs/knockout-3.4.2.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>
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

    <script src="<?php echo base_url(); ?>assets/app/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/app/js/app.js"></script>

    <!-- Date picker bagus -->
    <script src="<?php echo base_url(); ?>assets/app/js/daterangepicker.js"></script>

    <!-- Onchange provinsi bagus -->
    <script>
            $("#provinsi").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_kab'); ?>/" + $(this).val();
                    $('#kabupaten').load(url);
                    return true;
            });
            $("#kabupaten").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_kec'); ?>/" + $(this).val();
                    $('#kecamatan').load(url);
                    return true;
            });
            $("#kecamatan").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_kel'); ?>/" + $(this).val();
                    $('#kelurahan').load(url);
                    return true;
            });
            $("#kelurahan").change(function () {
                    var url = "<?php echo site_url('users/binsyar/add_ajax_des'); ?>/" + $(this).val();
                    $('#desa').load(url);
                    return true;
            });
    </script>

    <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append("<b>Nama Penceramah ke - " + nextform + " :</b>" +
                "<table>" +
                "<tr>" +
                "<td><input type='text' name='narsum[]' class='form-control' aria-describedby='basic-addon1' placeholder='Masukkan Nama Penceramah . .' style='width:400px; border:1px solid #ccc;'></td>" +
                "</tr>" +
                "</table>" +
                "<br><br>");
            
            $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>

    <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form-pddk").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form-pddk").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form-pddk").append("<br><b>Pendidikan Formal ke - " + nextform + " :</b>" +
                "<table>" +
                "<tr>" +
                "<td><select class='form-control' id='exampleFormControlSelect1' name='pddk[]' style='width:300px;'><option value='1'>S1</option>+<option value='2'>D3</option>+<option value='3'>SMK / SMA</option>+<option value='4'>SLTP</option>+<option value='5'>SD</option>+</select></td>" +
                "</tr>" +
                "</table>" +
                "<br><br>");
            
            $("#jumlah-form-pddk").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form-pddk").click(function(){
            $("#insert-form-pddk").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form-pddk").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>

    <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form-pddk-non").click(function(){ // Ketika tombol Tambah Data Form di klik
            var jumlah = parseInt($("#jumlah-form-pddk-non").val()); // Ambil jumlah data form pada textbox jumlah-form
            var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form-pddk-non").append("<br><b>Pendidikan Non Formal ke - " + nextform + " :</b>" +
                "<table>" +
                "<tr>" +
                "<td><input type='text' name='pddk_non[]' class='form-control' aria-describedby='basic-addon1' placeholder='Masukkan Pendidikan Non Formal . .' style='width:400px; border:1px solid #ccc;'></td>" +
                "</tr>" +
                "</table>" +
                "<br><br>");
            
            $("#jumlah-form-pddk-non").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form-pddk-non").click(function(){
            $("#insert-form-pddk-non").html(""); // Kita kosongkan isi dari div insert-form
            $("#jumlah-form-pddk-non").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>

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
        
        ko.bindingHandlers.select2 = {
            init: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
                var options = ko.unwrap(valueAccessor());
                ko.unwrap(allBindings.get('selectedOptions'));
                ko.unwrap(allBindings.get('selectedValue'));
                
                $(element).select2(options);

                window.setTimeout(function(){
                    $(element).val(allBindings().selectedValue);
                    $(element).trigger('change');
                }, 300);
                // console.log('init');
            },
            update: function (element, valueAccessor, allBindings, viewModel, bindingContext) {
                var options = ko.unwrap(valueAccessor());
                ko.unwrap(allBindings.get('selectedOptions'));
                ko.unwrap(allBindings.get('selectedValue'));
                
                $(element).select2(options);

                window.setTimeout(function(){
                    $(element).val(allBindings().selectedValue);
                    $(element).trigger('change');
                }, 300);
                // console.log('update');
            }
        };

        ko.applyBindings(App);
    </script>
</body>

</html>
