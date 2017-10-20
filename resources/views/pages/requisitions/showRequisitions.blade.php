@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">View Requests</h4>
                        
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

                                        
                                        @if( $requisition[0]->approved == 0 && $requisition[0]->rejected == 0 )
                                            <a href="{{ url('requisitions/'.$requisition[0]->id.'/edit') }}" class="btn btn-icon waves-effect waves-light btn-teal m-b-5"><i class="fa fa-edit"></i></a>
                                        @endif

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           
                                           <div class="col-md-3"></div>
                                         
                                            <div class="col-md-9">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Username:</dt><dd>{{ $requisition[0]->users->first_name }} {{ $requisition[0]->users->last_name }}</dd>
                                                    
                                                    <dt>Department:</dt><dd>{{ $requisition[0]->departments->department_name }}</dd>
                                                    
                                                    <dt>Reason:</dt><dd>{{ $requisition[0]->reason }}</dd>
                                                    <dt>Code:</dt><dd>{{ $requisition[0]->req_code }}</dd>
                                                    @if($requisition[0]->approved == 1)
                                                    <dt>Permission:</dt><dd>Approved</dd>
                                                    @elseif($requisition[0]->rejected == 1)
                                                    <dt>Permission:</dt><dd>Rejected</dd>
                                                    @endif

                                                    @if($requisition[0]->approved == 1)
                                                    <dt>Approved By:</dt><dd>{{ $users[0]->first_name }} {{ $users[0]->last_name }}</dd>
                                                    @elseif($requisition[0]->rejected == 1)
                                                    <dt>Reject By:</dt><dd>{{ $users[0]->first_name }} {{ $users[0]->last_name }}</dd>
                                                    @endif

                                                    @if($requisition[0]->approval_date !== null)
                                                    <dt>Permission Date:</dt><dd>{{ $requisition[0]->approval_date }}</dd>
                                                    @endif

                                                    @if($requisition[0]->approved == 0 && $requisition[0]->rejected == 0)
                                                    <dt>Requisition Date:</dt><dd>{{ $requisition[0]->created_at }}</dd>
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
                                                            <th width="40%">Required Quantity</th>
                                                            @if( $requisition[0]->approved == 0 && $requisition[0]->rejected == 0)
                                                            <th>Available Stock</th>
                                                            @endif
                                                                                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="item_row">
                                                        @php $i = 1; @endphp
                                                        @foreach($requisition[0]->requisitionDetails as $detailItem)
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $detailItem->items->item_name }}</td>
                                                                <td>{{ $detailItem->required_qnt }}</td>
                                                                @if( $requisition[0]->approved == 0 && $requisition[0]->rejected == 0)
                                                                    <td>{{ $detailItem->items->current_qnt }}</td>
                                                                @endif
                                                            </tr>
                                                        @php $i++ @endphp    
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            
                                       </div>
                                       @if( $requisition[0]->approved == 0 && $requisition[0]->rejected == 0 )

                                       <div class="row" style="height:50px;"></div>

                                       <div class="row">
                                           <div class="col-md-3"></div>
                                           <div class="col-md-2">
                                                <form method="post" action="{{ url('requisitions_approved') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="approval_by" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="req_id" value="{{ $requisition[0]->id }}">
                                                    <button type="submit" style="float: left;" class="btn btn-success waves-effect waves-light box-header">Approved</button>
                                                </form>
                                           
                                                <form method="post" action="{{ url('requisitions_rejected') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="approval_by" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="req_id" value="{{ $requisition[0]->id }}">
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