<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Requisitions</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <h3>Pending Requests</h3>
                                    
                        <hr>
                        

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th width="5%">Sr.No</th>
                                <th width="15%">User Name</th>
                                <th width="15%">Department</th>
                                <th width="15%">Code</th>
                                <th width="10%">Required Items</th>
                                <th>Reason</th>
                                <th width="15%">Action</th>

                                
                            </tr>
                            </thead>


                            <tbody>
                                <?php $i=1;?>

                                <?php $__currentLoopData = $requisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($requisition->approved == 0 && $requisition->rejected == 0): ?>
                                	<tr>
                                		<td><?php echo e($i); ?></td>
                                        <td><?php echo e($requisition->users->username); ?></td>
                                        <td><?php echo e($requisition->departments->department_name); ?></td>
                                        <td><?php echo e($requisition->req_code); ?></td>
                                        <td><?php echo e($requisition->requisitionDetails->count()); ?></td>
                                        <td><?php echo e($requisition->reason); ?></td>
                                		<td>
                                			
	                                            
                                            <a href="<?php echo e(url('requisitions/'.$requisition->id)); ?>" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: left"> 
                                            	<i class="fa fa-eye"></i>
                                            </a>
                                            
                                           
                                		</td>
                                	</tr>
                                	
                                    <?php endif; ?>
                                <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <h3>Rejected Requests</h3>
                                    
                        <hr>
                        

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">Sr.No</th>
                                <th width="15%">User Name</th>
                                <th width="20%">Department</th>
                                <th width="15%">Code</th>
                                <th width="10%">Required Items</th>
                                <th>Permission</th>
                                
                                <th width="15%">Action</th>

                                
                            </tr>
                            </thead>


                            <tbody>
                                <?php $i=1;?>

                                <?php $__currentLoopData = $requisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php if($requisition->rejected == 1): ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($requisition->users->username); ?></td>
                                        <td><?php echo e($requisition->departments->department_name); ?></td>
                                        <td><?php echo e($requisition->req_code); ?></td>
                                        <td><?php echo e($requisition->requisitionDetails->count()); ?></td>
                                        
                                        <td>Rejected</td>
                                        
                                        <td>       
                                            <a href="<?php echo e(url('requisitions/'.$requisition->id)); ?>" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: left"> 
                                                <i class="fa fa-eye"></i>
                                            </a>
                                           
                                            
                                        </td>
                                    </tr>
                                    
                                 
                                    <?php endif; ?>
                                <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

<?php $__env->stopSection(); ?>

<!--*********Page Scripts Here*********-->

<?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/buttons.bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/jszip.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/pdfmake.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/vfs_fonts.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/buttons.html5.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/buttons.print.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.fixedHeader.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.keyTable.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/responsive.bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.scroller.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.colVis.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.fixedColumns.min.js')); ?>"></script>

        <!-- init -->
        <script src="<?php echo e(asset('assets/pages/jquery.datatables.init.js')); ?>"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>
<?php $__env->stopSection(); ?>

<!--*********Page Scripts End*********-->
<?php echo $__env->make('layouts.mainHome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>