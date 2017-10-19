<?php $__env->startSection('content'); ?>            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Items List</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <a class="btn btn-danger" href="<?php echo e(url('items/create')); ?>">Create Items</a>
                                    
                        <hr>
                        

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="3%">Sr.No</th>
                                <th width="3%">Image</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th width="15%">Type</th>
                                <th width="15%">Category</th>
                                <th width="8%">Quantity</th>
                                <th width="15%">Item Rate</th>
                                <th width="10%">Saleable Item</th>
                                
                                <th width="12%">Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                                <?php $i=1;?>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                	<tr>
                                		<td align="center"><?php echo e($i); ?></td>
                                		<td align="center"><img src="<?php echo e(asset('uploads/'.$item->item_image)); ?>" style="width: 50px;height: 50px"></td>
                                		<td><?php echo e($item->item_name); ?></td>
                                        <td><?php echo e($item->item_code); ?></td>
                                		<td><?php echo e($item->item_types->item_type_name); ?></td>
                                		<td><?php echo e($item->item_categories->item_cat_name); ?></td>
                                		<td><?php echo e($item->current_qnt); ?></td>
                                        <td><?php echo e($item->unit_price); ?> per <?php echo e($item->item_unit); ?></td>
                                		
                                		<?php if($item->is_saleable == 1): ?>
                                			
                                			
                                			<td>Saleable</td>
                                			
                                		
                                		<?php else: ?>
                                			
                                			<td>Not Saleable</td>

                                		<?php endif; ?>
                                		<td>
                                			
	                                            
                                            <a href="<?php echo e(url('items/'.$item->id)); ?>" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: left"> 
                                            	<i class="fa fa-eye"></i>
                                            </a>
                                            
                                            
                                            <a href="<?php echo e(url('items/'.$item->id.'/edit')); ?>" class="btn btn-icon waves-effect waves-light btn-info m-b-5" style="float: left"><i class="fa fa-edit"></i></a>
                                          
                                			
                                        	<button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" data-toggle="modal" data-target="#con-close-modal<?php echo e($item->id); ?>"><i class="fa fa-remove"></i></button>
                                		</td>
                                	</tr>
                                	<div id="con-close-modal<?php echo e($item->id); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Warning!</h4>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    Are You Sure.You want to Delete it.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" style="float: right;">Close</button>

                                                    <form action="<?php echo e(url('items/'.$item->id)); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger waves-effect" style="float: right;margin-right: 2%;">Yes Delete it</button>
                                                    
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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