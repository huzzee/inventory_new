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

                                        <h3>Request</h3>
                                        <hr>
                                        <a href="{{ url('requisitions/'.$requisition[0]->id.'/edit') }}" class="btn btn-icon waves-effect waves-light btn-teal m-b-5"><i class="fa fa-edit"></i></a>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           
                                           <div class="col-md-2"></div>
                                         
                                            <div class="col-md-6">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Username:</dt><dd>{{ $requisition[0]->users->username }}</dd>
                                                    
                                                    <dt>Department:</dt><dd>{{ $requisition[0]->departments->department_name }}</dd>
                                                    
                                                    <dt>Reason:</dt><dd>{{ $requisition[0]->reason }}</dd>
                                                    
                                                </dl>
                                            </div>
                                            

                                       </div>
                                       <div class="row" style="height:50px;"></div>
                                       <div class="row">
                                           
                                           <div class="col-md-2"></div>
                                         
                                            <div class="col-md-6">
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    
                                                    

                                                </dl>
                                            </div>
                                            

                                       </div>
                                       <div class="row" style="height:50px;"></div>
                                       <div class="row">
                                           
                                           <div class="col-md-3"></div>
                                         
                                            <div class="col-md-4">
                                                <table class="table table-striped m-0">

                                                            <thead>
                                                                <tr>
                                                                    <th>Sr.No</th>
                                                                    <th width="40%">Item Name</th>
                                                                    <th width="40%">Required Quantity</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody id="item_row">
                                                                @php $i = 1; @endphp
                                                                @foreach($requisition[0]->requisitionDetails as $detailItem)
                                                                    <tr>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $detailItem->item_name }}</td>
                                                                        <td>{{ $detailItem->required_qnt }}</td>
                                                                    </tr>
                                                                @php $i++ @endphp    
                                                                @endforeach
                                                            </tbody>
                                                </table>
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