<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Add Users</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="<?php echo e(route('users.store')); ?>" enctype="multipart/form-data" method="POST">

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
                                    
                                    
                                    <a class="btn btn-danger" href="<?php echo e(url('users')); ?>">Users List</a>
                                    
                                    <hr>
                                    
                                    <div class="p-20" style="clear: both;">
                                            
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">User Designation<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="role_id">
                                                        <option selected disabled="disabled">Select User Designation</option>
                                                        
                                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->role_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">User Department<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="department_id">
                                                        <option selected disabled="disabled">Select User Department</option>
                                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($department->id); ?>"><?php echo e($department->department_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                                
                                                    </select>
                                                        
                                                </div>
                                            </div>
                                                
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">First Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="first_name" parsley-trigger="change" 
                                                       placeholder="Enter First Name" class="form-control" value="<?php echo e(old('first_name')); ?>" />
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Last Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="last_name" parsley-trigger="change" 
                                                       placeholder="Enter Last Name" class="form-control" value="<?php echo e(old('last_name')); ?>" />
                                                        
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Username<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="username" parsley-trigger="change" 
                                                       placeholder="Enter Username" class="form-control" value="<?php echo e(old('username')); ?>" />
                                                        
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Password<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password" parsley-trigger="change" 
                                                       placeholder="Enter Password" class="form-control" />
                                                        
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label for="item_image" class="col-sm-3">Profile Image</label>
                                                <div class="col-sm-9">
                                                   <input type="file" class="filestyle" placeholder="Not Important" name="profile_image" data-buttonname="btn-inverse">
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
                                                <label for="status" class="col-sm-3">Gender<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" name="gender" value="0">
                                                        <label for="inlineRadio1"> Male </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="inlineRadio2" name="gender" value="1">
                                                        <label for="inlineRadio2"> Female </label>
                                                    </div>
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
                                    <h3>User Permissions</h3>
                                    <hr>

                                    <div class="p-20" style="clear: both;">
                                        
                                        <div class="form-group row">
                                            
                                            <div class="col-sm-9">
                                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($menu->parent_menu_id == null): ?>
                                                <div class="checkbox checkbox-success checkbox-circle">
                                                    <input id="checkbox-<?php echo e($menu->id); ?>" name="menus[]" type="checkbox" value="<?php echo e($menu->id); ?>">
                                                    <label for="checkbox-<?php echo e($menu->id); ?>" style="font-weight: bold">
                                                        <?php echo e($menu->menu_name); ?>

                                                    </label>
                                                    
                                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($submenu->parent_menu_id == $menu->id): ?>
                                                        
                                                            <div class="checkbox checkbox-success checkbox-circle">
                                                                <input id="checkbox-<?php echo e($submenu->id); ?>" value="<?php echo e($submenu->id); ?>" type="checkbox" name="menus[]">
                                                                <label for="checkbox-<?php echo e($submenu->id); ?>" style="font-weight: bold">
                                                                    <?php echo e($submenu->menu_name); ?>

                                                                </label>
                                                            </div>
                                                        
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    

                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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