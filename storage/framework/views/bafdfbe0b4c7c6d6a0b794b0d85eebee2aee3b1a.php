<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">View Item</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
               

                        
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <div class="box-header">

                                        <a class="btn btn-danger" href="<?php echo e(url('suppliers')); ?>">Supplier Lists</a>
                                        <a class="btn btn-pink" href="<?php echo e(url('suppliers/create')); ?>">Create Supplier</a>
                                        
                                        <a href="<?php echo e(url('suppliers/'.$sup->id.'/edit')); ?>" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: right"><i class="fa fa-edit"></i></a>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5" style="float: right"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           <div class="col-sm-3">
                                                
                                                <img src="<?php echo e(url('uploads/'.$sup->sup_image)); ?>" width="100%" height="300px" alt="<?php echo e($sup->sup_image); ?>">
                                                
                                           </div>
                                           <div class="col-sm-1"></div>
                                         
                                           <div class="col-sm-4">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Name:</dt><dd><?php echo e($sup->sup_name); ?></dd>
                                                    <dt>Email:</dt><dd><?php echo e($sup->sup_email); ?></dd>
                                                    <dt>Phone No:</dt><dd><?php echo e($sup->sup_phone); ?></dd>
                                                    <!--/* <?php if($sup->sup_account !== null ): ?>
                                                        <dt>Account No:</dt><dd><?php echo e($sup->sup_account); ?></dd>
                                                    <?php endif; ?>*/ -->
                                                    <?php if($sup->sup_address !== null ): ?>
                                                        <dt>Address:</dt><dd><?php echo e($sup->sup_address); ?></dd>
                                                    <?php endif; ?>
                                                    <dt>Status:</dt><dd> 
                                                        <?php if($sup->status == 0): ?>
                                                            In Active
                                                        <?php else: ?>
                                                            Active
                                                        <?php endif; ?>
                                                    </dd>

                                                </dl>
                                            </div>
                                            

                                       </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->

                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->

                    <!--new col-->
                    
                
            </div>

           

        </div> <!-- container -->

    </div> <!-- content -->

<?php $__env->stopSection(); ?>

<!--*********Page Scripts Here*********-->

<?php $__env->startSection('scripts'); ?>
       
<?php $__env->stopSection(); ?>

<!--*********Page Scripts End*********-->
<?php echo $__env->make('layouts.mainHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>