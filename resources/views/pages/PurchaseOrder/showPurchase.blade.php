@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">View Purchase Order</h4>
                        
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

                                        <h3>Purchase Order</h3>
                                        <hr>
                                        @if($purchase_order[0]->approved == 1 || $purchase_order[0]->rejected == 1)
                                        @if( $purchase_order[0]->printed == 0 )
                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5"><i class="fa fa-print"></i></a>
                                        <hr>
                                        @endif
                                        @endif
                                        
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           
                                           <div class="col-md-2"></div>
                                         
                                            <div class="col-md-6">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Make By:</dt><dd>{{ $purchase_order[0]->users->username }}</dd>
                                                    
                                                    <dt>Department:</dt><dd>{{ $purchase_order[0]->users->my_departments->department_name }}</dd>

                                                    <dt>Quation No:</dt><dd>
                                                        @if($purchase_order[0]->quatation_nmbr !== null)
                                                        {{ $purchase_order[0]->quatation_nmbr }}
                                                        @else
                                                        Not available
                                                        @endif
                                                    </dd>
                                                    
                                                   
                                                    @if($purchase_order[0]->approved == 1)
                                                    <dt>Permission:</dt><dd>Approved</dd>
                                                    @elseif($purchase_order[0]->rejected == 1)
                                                    <dt>Permission:</dt><dd>Rejected</dd>
                                                    @endif

                                                    @if($purchase_order[0]->approved == 1)
                                                    <dt>Approved By:</dt><dd>{{ $users->first_name }} {{ $users->last_name }}</dd>
                                                    @elseif($purchase_order[0]->rejected == 1)
                                                    <dt>Reject By:</dt><dd>{{ $users->first_name }} {{ $users->last_name }}</dd>
                                                    @endif

                                                    @if($purchase_order[0]->approval_date !== null)
                                                    <dt>Permission Date:</dt><dd>{{ $purchase_order[0]->approval_date }}</dd>
                                                    @endif

                                                    @if($purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0)
                                                    <dt>Order Date:</dt><dd>{{ $purchase_order[0]->created_date }}</dd>
                                                    @endif
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
                                                            <th width="20%">Ordered Quantity</th>
                                                            <th width="20%">Item Rate</th>
                                                            <th width="20%">Total Amount</th>
                                                            @if( $purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0)
                                                            <th>Available Stock</th>
                                                            @endif
                                                                                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="item_row">
                                                        @php $i = 1; @endphp
                                                        @foreach($purchase_order[0]->purchaseOrderDetails as $detailItem)
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $detailItem->items->item_name }}</td>
                                                                <td>{{ $detailItem->order_qnt }}</td>
                                                                <td>{{ $detailItem->item_rate }}</td>
                                                                <td>{{ $detailItem->total_amount }}</td>
                                                                @if( $purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0)
                                                                    <td>{{ $detailItem->items->current_qnt }}</td>
                                                                @endif
                                                            </tr>
                                                        @php $i++ @endphp    
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            
                                       </div>
                                       @if( $purchase_order[0]->approved == 0 && $purchase_order[0]->rejected == 0 )

                                       <div class="row" style="height:50px;"></div>

                                       <div class="row">
                                           <div class="col-md-3"></div>
                                           <div class="col-md-2">
                                                <form method="post" action="{{ url('purchase_orders_approved') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="approval_by" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="req_id" value="{{ $purchase_order[0]->id }}">
                                                    <button type="submit" style="float: left;" class="btn btn-success waves-effect waves-light box-header">Approved</button>
                                                </form>
                                           
                                                <form method="post" action="{{ url('purchase_orders_rejected') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="approval_by" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="req_id" value="{{ $purchase_order[0]->id }}">
                                                    <button type="submit" style="margin-left: 5px" class="btn btn-danger waves-effect waves-light box-header">Rejected</button>
                                                </form>
                                           </div>

                                       </div>
                                       @endif
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