<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Add Supplier</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="<?php echo e(route('suppliers.store')); ?>" enctype="multipart/form-data" method="POST">

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
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    
                                    
                                    <a class="btn btn-danger" href="<?php echo e(url('suppliers')); ?>">Suppliers Lists</a>
                                    
                                    <hr>
                                    <div class="p-20" style="clear: both;">
                                            
                                            
                                                
                                            <div class="form-group row">
                                                <label for="sup_name" class="col-sm-3">Supplier Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="sup_name" parsley-trigger="change" required
                                                       placeholder="Enter Supplier Name" class="form-control" value="<?php echo e(old('sup_name')); ?>" />
                                                        
                                                </div>
                                            </div>               

                                            <div class="form-group row">
                                                <label for="sup_phone" class="col-sm-3">Phone Number<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="number" name="sup_phone" parsley-trigger="change" required
                                                       placeholder="Enter Phone No." class="form-control" value="<?php echo e(old('sup_phone')); ?>" />
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sup_email" class="col-sm-3">Email<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="Email" name="sup_email" parsley-trigger="change" required
                                                       placeholder="Enter Email" class="form-control" value="<?php echo e(old('sup_email')); ?>" />
                                                        
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <label for="sup_account" class="col-sm-3">Account Number<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="number" name="sup_account" parsley-trigger="change" required
                                                       placeholder="Enter Account No." class="form-control" value="<?php echo e(old('sup_account')); ?>" disabled />
                                                        
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label for="sup_address" class="col-sm-3">Address<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    <textarea name="sup_address" id="textarea" class="form-control" maxlength="225" rows="5" placeholder="Enter Address Of Supplier" value="<?php echo e(old('sup_address')); ?>" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sup_image" class="col-sm-3">Supplier Image</label>
                                                <div class="col-sm-7">
                                                   <input type="file" class="filestyle" placeholder="Not Important" name="sup_image" data-buttonname="btn-inverse">
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Active<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" id="switch3" name="status" switch="bool" checked/>
                                                    <label for="switch3" data-on-label="Yes"
                                                       data-off-label="No"></label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-9"></div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-teal">Submit</button>
                                                </div>
                                            </div>

                                            
                                        
                                    </div>

                                </div>

                            </div>
                            <!-- end row -->

                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->               
                </form>
            </div>

           

        </div> <!-- container -->

    </div> <!-- content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/multiselect/js/jquery.multi-select.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/jquery-quicksearch/jquery.quicksearch.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/pages/jquery.form-advanced.init.js')); ?>"></script>

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
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.mainHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>