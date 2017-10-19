<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Make Good Receive</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                
                    <div class="col-xs-12">
                        <div class="card-box">
                            <form action="<?php echo e(route('grn.store')); ?>" enctype="multipart/form-data" method="POST">

                             <?php echo e(csrf_field()); ?>


                             <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12 col-md-12">
                                        
                                       
                                        <a class="btn btn-danger" href="<?php echo e(url('grn')); ?>">Good Receive List</a>
                                        <hr>
                                        
                                        
                                        
                                        <div class="p-20" style="clear: both;">

                                                
                                                
                                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">   
                                                   

                                                <div class="form-group row">
                                                    <label for="supplier_id" class="col-sm-3">Supplier<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="supplier_id">
                                                            <option selected disabled="disabled">Select Supplier</option>
                                                            
                                                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->sup_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </select>
                                                            
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="purchase_order_code" class="col-sm-3">Purchase Order Code<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="purchase_order_code" placeholder="Purchase Order Code">
                                                       
                                                            
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="dn_code" class="col-sm-3">Delivery Note Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" parsley-trigger="change"
                                                           placeholder="Delivery Note Code" name="dn_code" class="form-control"/>
                                                             
                                                            
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row" id="main_body">
                                                    <div class="form-group row">
                                                        <label for="reason" class="col-sm-3">Select Item<span class="text-danger">*</span></label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control select2 name_of_item_puchase">
                                                                <option selected disabled="disabled">Select Items</option>

                                                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->item_name); ?> (Current Quantity: <?php echo e($item->current_qnt); ?>)</option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                            </select>

                                                            
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="number" parsley-trigger="change"
                                                           placeholder="Quantity" class="form-control qnt_item1"/>
                                                           

                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="number" parsley-trigger="change"
                                                           placeholder="Per Unit Rate" class="form-control rate_item"/>
                                                           

                                                        </div>
                                                        <div class="col-sm-1">
                                                            <button type="button" class="btn btn-icon btn-inverse m-b-5 add_itemlist_purchased"><i class="fa fa-plus"></i></button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="height: 50px;"></div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <table class="table table-striped m-0">

                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th width="30%">Item Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Per Unit Rate</th>
                                                                    <th>Total Amount</th>
                                                                    <th width="20%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="item_row">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-teal">Submit</button>
                                                    </div>
                                                </div>

                                                
                                            
                                        </div>

                                    </div>

                                </div>
                            <!-- end row -->
                            </form>
                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->

                    <!--new col-->
                    
                
            </div>

           

        </div> <!-- container -->

    </div> <!-- content -->

<?php $__env->stopSection(); ?>

<!--*********Page Scripts Here*********-->

<?php $__env->startSection('scripts'); ?>
        
       

        <script src="<?php echo e(asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/multiselect/js/jquery.multi-select.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/jquery-quicksearch/jquery.quicksearch.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/plugins/autocomplete/jquery.mockjax.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/autocomplete/jquery.autocomplete.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/autocomplete/countries.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/pages/jquery.autocomplete.init.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/pages/jquery.form-advanced.init.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/plugins/moment/moment.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/timepicker/bootstrap-timepicker.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/pages/jquery.form-pickers.init.js')); ?>"></script>

        
<?php $__env->stopSection(); ?>

<!--*********Page Scripts End*********-->
<?php echo $__env->make('layouts.mainHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>