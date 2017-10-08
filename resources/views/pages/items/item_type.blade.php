@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Items Type</h4>
                        
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

                                <h4 class="header-title m-t-0">Create Items Type</h4>
                                

                                <div class="p-20">
                                    <form action="{{ route('item_types.store') }}" method="POST">
                                         {{ csrf_field() }}
                                        <div class="form-group row">
                                            <label for="item_type" class="col-sm-2">Item Type Name<span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="item_type_name" parsley-trigger="change" required
                                                   placeholder="Enter Item Type Name" class="form-control" id="item_type"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-2">Active<span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" id="switch3" name="status" switch="bool" checked/>
                                                <label for="switch3" data-on-label="Yes"
                                                   data-off-label="No"></label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-8"></div>
                                            <div class="col-sm-2">
                                                <button class="btn btn-teal">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                       
                    </div> <!-- end ard-box -->
                </div><!-- end col-->

            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Item Type List</b></h4>
                        

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">Sr.No</th>
                                <th>Name</th>
                                <th width="20%">Status</th>
                                <th width="20%">Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                                @php $i=1; @endphp
                                @foreach($item_types as $item_type)    
                                <tr>
                                    <td style="color: teal;">{{ $i }}</td>
                                    <td style="font-size: 16px;">{{ $item_type->item_type_name }}</td>
                                    <td style="font-size: 16px;">
                                        @if($item_type->status == 1)
                                        Active
                                        @else
                                        Inactive
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ url('item_types/'.$item_type->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"> <i class="fa fa-remove"></i></button>
                                            
                                        </form>
                                    </td>
                                    
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

@endsection
@section('scripts')
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>

        <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.scroller.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.colVis.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.fixedColumns.min.js') }}"></script>

        <!-- init -->
        <script src="{{ asset('assets/pages/jquery.datatables.init.js') }}"></script>


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
@endsection