<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">View Purchase Order</h4>
                        
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

                                        <a href="<?php echo e(url('purchase')); ?>" class="btn btn-danger waves-effect waves-light">Purchase Order List</a>

                                        <?php if(Auth::user()->role_id == 1): ?>
                                        <?php if($purchase_order[0]->printed == 1 ): ?>
                                        <hr>
                                        <form method="post" action="<?php echo e(url('permit_print')); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            
                                            <input type="hidden" name="req_id" value="<?php echo e($purchase_order[0]->id); ?>">

                                            <button type="submit" class="btn btn-teal waves-effect waves-light box-header">Printing Permission</button>
                                        </form>
                                        <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($purchase_order[0]->approved == 1): ?>
                                        <?php if($purchase_order[0]->printed == 0 ): ?>
                                        <a href="javascript:void(0);" style="float: right" class="purchase_print btn btn-icon waves-effect waves-light btn-inverse m-b-5" data-purchase_id="<?php echo e($purchase_order[0]->id); ?>"><i class="fa fa-print"></i></a>
                                        <hr>
                                        <?php endif; ?>
                                        <?php endif; ?>

                                        
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           
                                           <div class="col-md-3"></div>
                                         
                                            <div class="col-md-9">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Make By:</dt><dd><?php echo e($purchase_order[0]->users->username); ?></dd>
                                                    
                                                    <dt>Department:</dt><dd><?php echo e($purchase_order[0]->users->my_departments->department_name); ?></dd>
                                                    <dt>Supplier Name:</dt><dd><?php echo e($purchase_order[0]->suppliers->sup_name); ?></dd>

                                                    <dt>Order Code:</dt><dd><?php echo e($purchase_order[0]->purchase_code); ?></dd>

                                                    <dt>Quation No:</dt><dd>
                                                        <?php if($purchase_order[0]->quatation_nmbr !== null): ?>
                                                        <?php echo e($purchase_order[0]->quatation_nmbr); ?>

                                                        <?php else: ?>
                                                        Not available
                                                        <?php endif; ?>
                                                    </dd>
                                                    
                                                   
                                                    <?php if($purchase_order[0]->approved == 1): ?>
                                                    <dt>Permission:</dt><dd>Approved</dd>
                                                    <?php elseif($purchase_order[0]->rejected == 1): ?>
                                                    <dt>Approval:</dt><dd>Rejected</dd>
                                                    <?php endif; ?>

                                                    <?php if($purchase_order[0]->approved == 1): ?>
                                                    <dt>Approved By:</dt><dd><?php echo e($users[0]->first_name); ?> <?php echo e($users[0]->last_name); ?></dd>
                                                    <?php elseif($purchase_order[0]->rejected == 1): ?>
                                                    <dt>Reject By:</dt><dd><?php echo e($users[0]->first_name); ?> <?php echo e($users[0]->last_name); ?></dd>
                                                    <?php endif; ?>

                                                    <?php if($purchase_order[0]->approval_date !== null): ?>
                                                    <dt>Permission Date:</dt><dd><?php echo e($purchase_order[0]->approval_date); ?></dd>
                                                    <?php endif; ?>

                                                    <?php if($purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0): ?>
                                                    <dt>Order Date:</dt><dd><?php echo e($purchase_order[0]->created_date); ?></dd>
                                                    <?php endif; ?>
                                                </dl>
                                            </div>
                                            

                                       </div>
                                       <div class="row" style="height:50px;"></div>
                                       
                                       <div class="row">
                                           
                                           <div class="col-md-3"></div>
                                         
                                            <div class="col-md-4">
                                                <table class="table table-striped m-0">

                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th width="40%">Item Name</th>
                                                            <th width="20%">Ordered Quantity</th>
                                                            <th width="20%">Item Rate</th>
                                                            <th width="20%">Total Amount</th>
                                                            <?php if( $purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0): ?>
                                                            <th>Available Stock</th>
                                                            <?php endif; ?>
                                                                                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="item_row">
                                                        <?php $i = 1; ?>
                                                        <?php $__currentLoopData = $purchase_order[0]->purchaseOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($i); ?></td>
                                                                <td><?php echo e($detailItem->items->item_name); ?></td>
                                                                <td><?php echo e($detailItem->order_qnt); ?></td>
                                                                <td><?php echo e($detailItem->item_rate); ?></td>
                                                                <td><?php echo e($detailItem->total_amount); ?></td>
                                                                <?php if( $purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0): ?>
                                                                    <td><?php echo e($detailItem->items->current_qnt); ?></td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        <?php $i++ ?>    
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            
                                       </div>
                                       <?php if( $purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0 ): ?>

                                       <div class="row" style="height:50px;"></div>

                                       <div class="row">
                                           <div class="col-md-3"></div>
                                           <div class="col-md-2">
                                                <form method="post" action="<?php echo e(url('purchase_orders_approved')); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="approval_by" value="<?php echo e(Auth::user()->id); ?>">
                                                    <input type="hidden" name="req_id" value="<?php echo e($purchase_order[0]->id); ?>">
                                                    <button type="submit" style="float: left;" class="btn btn-success waves-effect waves-light box-header">Approved</button>
                                                </form>
                                           
                                                <form method="post" action="<?php echo e(url('purchase_orders_rejected')); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="approval_by" value="<?php echo e(Auth::user()->id); ?>">
                                                    <input type="hidden" name="req_id" value="<?php echo e($purchase_order[0]->id); ?>">
                                                    <button type="submit" style="margin-left: 5px" class="btn btn-danger waves-effect waves-light box-header">Rejected</button>
                                                </form>
                                           </div>

                                       </div>
                                       <?php endif; ?>
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