<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Add Items</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="<?php echo e(route('items.store')); ?>" enctype="multipart/form-data" method="POST">

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
                    <div class="col-xs-7">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    
                                    
                                    <a class="btn btn-danger" href="<?php echo e(url('items')); ?>">Items Lists</a>
                                    
                                    <hr>
                                    <h4>General Info</h4>
                                    <hr>
                                    <div class="p-20" style="clear: both;">
                                            
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Type<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="type_id">
                                                        <option selected disabled="disabled">Select Item Type</option>
                                                        
                                                        <?php $__currentLoopData = $item_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($item_type->id); ?>"><?php echo e($item_type->item_type_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                    </select>
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Category<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="catagory_id">
                                                        <option selected disabled="disabled">Select Item Category</option>
                                                        
                                                        <?php $__currentLoopData = $item_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($item_cat->id); ?>"><?php echo e($item_cat->item_cat_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                    </select>
                                                        
                                                </div>
                                            </div>
                                                
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="item_name" parsley-trigger="change" required
                                                       placeholder="Enter Item Name" class="form-control" value="<?php echo e(old('item_name')); ?>" />
                                                        
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Code<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="item_code" parsley-trigger="change" required
                                                       placeholder="Enter Item Code" class="form-control" value="<?php echo e(old('item_code')); ?>" />
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="description" class="col-sm-3">Description</label>
                                                <div class="col-sm-9">
                                                    <textarea name="description" id="textarea" class="form-control" maxlength="225" rows="5" placeholder="Item Description Here If Important" value="<?php echo e(old('description')); ?>"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_image" class="col-sm-3">Item Image</label>
                                                <div class="col-sm-9">
                                                   <input type="file" class="filestyle" placeholder="Not Important" name="item_image" data-buttonname="btn-inverse">
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

                    <!--new col-->
                    <div class="col-xs-5">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">

                                    <h4>Buying Rate</h4>
                                    <hr>

                                    <div class="p-20">
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Select Item Unit<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="item_unit">
                                                        <option selected disabled="disabled">Select Item Unit</option>
                                                        
                                                        <option value="Box">Box</option>
                                                        <option value="Kilogram">Kilogram</option>
                                                        <option value="Gram">Gram</option>
                                                        <option value="Liter">Liter</option>
                                                        <option value="Mililiter">Mililiter</option>
                                                        <option value="Mon">Mon</option>
                                                        <option value="Ton">Ton</option>
                                                        <option value="Meter">Meter</option>
                                                        <option value="centimeter">centimeter</option>
                                                        <option value="Inch">Inch</option>
                                                        <option value="Feet">Feet</option>
                                                        <option value="sq.meter">sq.meter</option>
                                                        <option value="sq.feet">sq.feet</option>
                                                        <option value="Bundle">Bundle</option>
                                                        <option value="Bulk">Bulk</option>
                                                        <option value="KiloMeter">KiloMeter</option>
                                                        

                                                                
                                                    </select>
                                                        
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                
                                                <label for="item_name" class="col-sm-3">Per Unit Rate<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" id="unit_price" name="unit_price" parsley-trigger="change" 
                                                       class="form-control" placeholder="Enter Per unit rate" value="<?php echo e(old('unit_price')); ?>"  />
                                                        
                                                </div>
                                                
                                            </div>
                                            
                                        
                                    </div>

                                </div>

                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <hr>
                                    <h4>Quantity</h4>
                                    <hr>

                                    <div class="p-20">
                                            
                                        <div class="form-group row">
                                            
                                            <label for="opening_qnt" class="col-sm-3">Opening Quantity<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" id="opening_qnt" name="opening_qnt" parsley-trigger="change" 
                                                   class="form-control" value="0"  />
                                                    
                                            </div>
                                            
                                        </div>


                                        <div class="form-group row">
                                            
                                            <label for="min_qnt" class="col-sm-3">Notify Quantity<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" id="min_qnt" name="min_qnt" parsley-trigger="change" 
                                                   class="form-control" value="0"  />
                                                    
                                            </div>
                                            
                                        </div>


                                        <div class="form-group row">
                                            <label for="status" class="col-sm-3">Is Item Saleable</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" id="switch4" name="is_saleable" switch="bool" />
                                                <label for="switch4" data-on-label="Yes"
                                                   data-off-label="No"></label>
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
<?php $__env->stopSection(); ?>

<!--*********Page Scripts End*********-->
<?php echo $__env->make('layouts.mainHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>