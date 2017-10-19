@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Good Receive</h4>
                        
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

                                        <h3>Detail</h3>
                                        <hr>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           
                                           <div class="col-md-2"></div>
                                         
                                            <div class="col-md-6">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Username:</dt><dd>{{ $grnMaster->users->username }}</dd>
                                                    
                                                    <dt>Supplier Name:</dt><dd>{{ $grnMaster->suppliers->sup_name }}</dd>

                                                    <dt>Purchase Code:</dt><dd>{{ $grnMaster->purchase_order_id }}</dd>

                                                    <dt>Delivery Code:</dt><dd>{{ $grnMaster->dn_code }}</dd>
                                                    
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
                                                            <th width="25%">Item Name</th>
                                                            <th width="25%">Qtty</th>
                                                            <th width="25%">Unit Rate</th>
                                                            <th width="25%">Total</th>
                                                            
                                                           
                                                                                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="item_row">
                                                        @php $i=1; $x; @endphp
                                                        @for ($x=0; $x < $grnMaster->grnDetails->count(); $x++)

                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{$grnMaster->grnDetails[$x]->items->item_name}}</td>
                                                                <td>{{$grnMaster->grnDetails[$x]->recieved_qnt}}</td>
                                                                <td>{{$grnMaster->grnDetails[$x]->per_unit_rate}}</td>
                                                                <td>{{$grnMaster->grnDetails[$x]->total_amount}}</td>   
                                                            </tr>
                                                            @php $i++; @endphp
                                                        @endfor
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