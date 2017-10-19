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

                                        <a class="btn btn-danger" href="<?php echo e(url('items')); ?>">Items Lists</a>
                                        <a class="btn btn-pink" href="<?php echo e(url('items/create')); ?>">Create Items</a>
                                        
                                        <a href="<?php echo e(url('items/'.$items[0]->id.'/edit')); ?>" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: right"><i class="fa fa-edit"></i></a>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5" style="float: right"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           <div class="col-sm-3">
                                                
                                                <img src="<?php echo e(url('uploads/'.$items[0]->item_image)); ?>" width="100%" height="300px" alt="<?php echo e($items[0]->item_image); ?>">
                                                
                                           </div>
                                           <div class="col-sm-1"></div>
                                         
                                           <div class="col-sm-4">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Name:</dt><dd><?php echo e($items[0]->item_name); ?></dd>
                                                    <dt>Name:</dt><dd><?php echo e($items[0]->item_code); ?></dd>
                                                   
                                                    <dt>Description:</dt>
                                                    <dd>
                                                    <?php if($items[0]->description == null): ?>
                                                        No description
                                                    <?php else: ?>
                                                        <?php echo e($items[0]->description); ?>

                                                    <?php endif; ?>
                                                    </dd>
                                                    <dt>Item Type:</dt><dd><?php echo e($items[0]->item_types->item_type_name); ?></dd>
                                                    <dt>Item Category:</dt><dd><?php echo e($items[0]->item_categories->item_cat_name); ?></dd>
                                                    <dt>Opening Qnt:</dt><dd><?php echo e($items[0]->opening_qnt); ?></dd>
                                                    <dt>Current Qnt</dt><dd><?php echo e($items[0]->current_qnt); ?></dd>
                                                    
                                                    <dt>Notify Qnt:</dt><dd><?php echo e($items[0]->min_qnt); ?></dd>
                                                    <dt>Status:</dt><dd>
                                                        <?php if($items[0]->status == 0): ?>
                                                            In Active
                                                        <?php else: ?>
                                                            Active
                                                        <?php endif; ?>
                                                    </dd>
                                                    <dt>Saleable Item:</dt><dd>
                                                        <?php if($items[0]->is_saleable == 0): ?>
                                                            Not Saleable
                                                        <?php else: ?>
                                                            Saleable
                                                        <?php endif; ?>
                                                    </dd>
                                                    <dt>Current Rate:</dt><dd><?php echo e($items[0]->unit_price); ?> per <?php echo e($items[0]->item_unit); ?></dd>
                                                    
                                                    <dt>Last Rate:</dt>
                                                        <?php if($items[0]->last_purchase_rate == 0): ?>
                                                        <dd>
                                                            not Available
                                                        </dd>
                                                        <?php else: ?>
                                                            <dd><?php echo e($items[0]->last_purchase_rate); ?> per <?php echo e($items[0]->item_unit); ?></dd>
                                                        <?php endif; ?>    
                                                    
                                                    

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