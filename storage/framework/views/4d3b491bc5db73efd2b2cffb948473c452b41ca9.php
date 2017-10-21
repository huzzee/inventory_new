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

                                        <a class="btn btn-danger" href="<?php echo e(url('users')); ?>">Users Lists</a>
                                        <a class="btn btn-pink" href="<?php echo e(url('users/create')); ?>">Create Users</a>
                                        
                                        <a href="<?php echo e(url('users/'.$users[0]->id.'/edit')); ?>" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: right"><i class="fa fa-edit"></i></a>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5" style="float: right"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           <div class="col-sm-3">
                                                
                                                <img src="<?php echo e(url('uploads/'.$users[0]->profile_image)); ?>" width="100%" height="300px" alt="<?php echo e($users[0]->profile_image); ?>">
                                                
                                           </div>
                                           <div class="col-sm-1"></div>
                                         
                                           <div class="col-sm-4">
                                                <div class="row" style="height: 50px;"></div>
                                                <dl class="dl-horizontal" style="font-size: 21px;"">
                                                    
                                                    <dt>Full Name:</dt><dd><?php echo e($users[0]->first_name); ?> <?php echo e($users[0]->first_name); ?></dd>
                                                    <dt>Username:</dt><dd><?php echo e($users[0]->username); ?></dd>
                                                    <dt>Designation:</dt><dd><?php echo e($users[0]->roles->role_name); ?></dd>
                                                   
                                                    <dt>Department:</dt><dd><?php echo e($users[0]->my_departments->department_name); ?></dd>
                                                    <dt>Gender:</dt><dd>
                                                        <?php if($users[0]->gender == 0): ?>
                                                           Male
                                                        <?php else: ?>
                                                           Female
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