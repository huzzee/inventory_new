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

    
    <body class="bg-transparent">

        <!-- Begin page -->
        <?php echo $__env->yieldContent('content'); ?>
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