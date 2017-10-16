@extends('layouts.mainHome')



@section('content')            
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

                        <h3>Issued Requests List</h3>
                                    
                        <hr>
                        

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">Sr.No</th>
                                <th width="15%">User Name</th>
                                <th width="20%">Department</th>
                                <th width="10%">Required Items</th>
                                <th>Permission</th>
                                <th>issued</th>
                                <th width="15%">Action</th>

                                
                            </tr>
                            </thead>


                            <tbody>
                                @php $i=1;@endphp

                                @foreach($requisitions as $requisition)
                                   
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $requisition->users->username }}</td>
                                        <td>{{ $requisition->departments->department_name }}</td>
                                        <td>{{ $requisition->requisitionDetails->count() }}</td>
                                        
                                        <td>Approved</td>
                                        

                                        
                                        <td>Issued</td>
                                        
                                            
                                        <td>       
                                            <a href="{{ url('requisitions/'.$requisition->id) }}" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: left"> 
                                                <i class="fa fa-eye"></i>
                                            </a>
                                           
                                            
                                        </td>
                                    </tr>
                                    
                                    
                                @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

@endsection

<!--*********Page Scripts Here*********-->

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

<!--*********Page Scripts End*********-->