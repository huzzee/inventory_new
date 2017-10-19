<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">
        <!-- App title -->
        <title>Al Invento</title>

        <!-- Custom box -->
            <link href="<?php echo e(asset('assets/plugins/custombox/css/custombox.min.css')); ?>" rel="stylesheet">

        <!-- form css-->
        <link href="<?php echo e(asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('assets/plugins/multiselect/css/multi-select.css')); ?>"  rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">

        <!-- Datatables -->

        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/magnific-popup/css/magnific-popup.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-datatables-editable/datatables.css')); ?>" />
        
        <link href="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/datatables/buttons.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/datatables/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/datatables/responsive.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/datatables/scroller.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/datatables/dataTables.colVis.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/datatables/fixedColumns.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <!-- App css -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/core.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/components.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/pages.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/menu.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/responsive.css')); ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/switchery/switchery.min.css')); ?>">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo e(asset('assets/js/modernizr.min.js')); ?>"></script>

    </head>

    <style>
        


        @media  print{
          body .box-header{
            display: none;
          }
        }

        .head_show span{
            font-weight: bold;
            color: black;
            font-size: 17px;
            
        }

       
    </style>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <?php echo $__env->make('include.menus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <?php echo $__env->yieldContent('content'); ?>

                <?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/detect.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/fastclick.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/jquery.blockUI.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/waves.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/jquery.scrollTo.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/switchery/switchery.min.js')); ?>"></script>

        <?php echo $__env->yieldContent('scripts'); ?>;

        <!-- App js -->
        <script src="<?php echo e(asset('assets/js/jquery.core.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/jquery.app.js')); ?>"></script>
        <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

    </body>
</html>