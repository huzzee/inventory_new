@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">View Item</h4>
                        
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

                                        <a class="btn btn-danger" href="{{ url('suppliers') }}">Supplier Lists</a>
                                        <a class="btn btn-pink" href="{{ url('suppliers/create') }}">Create Supplier</a>
                                        
                                        <a href="{{ url('suppliers/'.$sup->id.'/edit') }}" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: right"><i class="fa fa-edit"></i></a>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5" style="float: right"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           <div class="col-sm-3">
                                                
                                                <img src="{{ url('uploads/'.$sup->sup_image) }}" width="100%" height="300px" alt="{{ $sup->sup_image }}">
                                                
                                           </div>
                                           <div class="col-sm-1"></div>
                                         
                                           <div class="col-sm-4">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Name:</dt><dd>{{ $sup->sup_name }}</dd>
                                                    <dt>Email:</dt><dd>{{ $sup->sup_email }}</dd>
                                                    <dt>Phone No:</dt><dd>{{ $sup->sup_phone }}</dd>
                                                    <dt>Address:</dt><dd>{{ $sup->sup_address }}</dd>
                                                    <dt>Status:</dt><dd> 
                                                        @if($sup->status == 0)
                                                            In Active
                                                        @else
                                                            Active
                                                        @endif
                                                    </dd>

                                                </dl>
                                            </div>
                                            

                                       </div>
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

@endsection

<!--*********Page Scripts Here*********-->

@section('scripts')
       
@endsection

<!--*********Page Scripts End*********-->