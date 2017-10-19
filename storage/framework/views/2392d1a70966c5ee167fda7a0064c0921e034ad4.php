<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Make Requests</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                
                    <div class="col-xs-12">
                        <div class="card-box">
                            <form action="<?php echo e(route('requisitions.store')); ?>" enctype="multipart/form-data" method="POST">

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
                                        
                                       
                                        <a class="btn btn-danger" href="<?php echo e(url('requisitions')); ?>">Requisitions</a>
                                        <hr>
                                        
                                        
                                        
                                        <div class="p-20" style="clear: both;">

                                                
                                                <div class="form-group row">
                                                    <label for="user_id" class="col-sm-3">User<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="user_id">
                                                            <option selected value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></option>
                                                             
                                                        </select>
                                                            
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="department_id" class="col-sm-3">Department<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="department_id">
                                                            <option selected value="<?php echo e(Auth::user()->department_id); ?>"><?php echo e(Auth::user()->my_departments->department_name); ?></option>
                                                            
                                                        </select>
                                                            
                                                    </div>
                                                </div>
                                              
                                                

                                                <div class="form-group row">
                                                    <label for="reason" class="col-sm-3">Reason<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <textarea name="reason" id="textarea" class="form-control" maxlength="500" rows="5" placeholder="Give A Reason" value="<?php echo e(old('reason')); ?>"></textarea>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row" id="main_body">
                                                    <div class="form-group row">
                                                        <label for="reason" class="col-sm-3">Select Item<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <select class="form-control select2 name_of_item">
                                                                <option selected disabled="disabled">Select Items</option>

                                                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->item_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                            </select>

                                                            
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="number" parsley-trigger="change"
                                                           placeholder="Quantity" class="form-control qnt_item"/>
                                                           

                                                        </div>
                                                        <div class="col-sm-2">
                                                            <button type="button" class="btn btn-icon btn-inverse m-b-5 add_itemlist"><i class="fa fa-plus"></i></button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="height: 50px;"></div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-6">
                                                        <table class="table table-striped m-0">

                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th width="40%">Item Name</th>
                                                                    <th width="40%">Quantity</th>
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

        
<?php $__env->stopSection(); ?>

<!--*********Page Scripts End*********-->
<?php echo $__env->make('layouts.mainHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>