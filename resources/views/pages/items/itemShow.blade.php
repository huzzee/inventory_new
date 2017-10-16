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

                                        <a class="btn btn-danger" href="{{ url('items') }}">Items Lists</a>
                                        <a class="btn btn-pink" href="{{ url('items/create') }}">Create Items</a>
                                        
                                        <a href="{{ url('items/'.$items[0]->id.'/edit') }}" class="btn btn-icon waves-effect waves-light btn-teal m-b-5" style="float: right"><i class="fa fa-edit"></i></a>

                                        <a href="javascript:void(0);" onclick="window.print();" class="btn btn-icon waves-effect waves-light btn-inverse m-b-5" style="float: right"><i class="fa fa-print"></i></a>
                                        
                                        <hr>
                                    </div>
                                    
                                    <div class="p-20" style="clear: both;">
                                       <div class="row">
                                           <div class="col-sm-3">
                                                
                                                <img src="{{ url('uploads/'.$items[0]->item_image) }}" width="100%" height="300px" alt="{{ $items[0]->item_image }}">
                                                
                                           </div>
                                           <div class="col-sm-1"></div>
                                         
                                           <div class="col-sm-4">
                    
                                                <dl class="dl-horizontal" style="font-size: 18px;"">
                                                    
                                                    <dt>Name:</dt><dd>{{ $items[0]->item_name }}</dd>
                                                    <dt>Name:</dt><dd>{{ $items[0]->item_code }}</dd>
                                                   
                                                    <dt>Description:</dt>
                                                    <dd>
                                                    @if($items[0]->description == null)
                                                        No description
                                                    @else
                                                        {{$items[0]->description}}
                                                    @endif
                                                    </dd>
                                                    <dt>Item Type:</dt><dd>{{ $items[0]->item_types->item_type_name }}</dd>
                                                    <dt>Item Category:</dt><dd>{{ $items[0]->item_categories->item_cat_name }}</dd>
                                                    <dt>Opening Qnt:</dt><dd>{{ $items[0]->opening_qnt }}</dd>
                                                    <dt>Current Qnt</dt><dd>{{ $items[0]->current_qnt }}</dd>
                                                    
                                                    <dt>Notify Qnt:</dt><dd>{{ $items[0]->min_qnt }}</dd>
                                                    <dt>Status:</dt><dd>
                                                        @if($items[0]->status == 0)
                                                            In Active
                                                        @else
                                                            Active
                                                        @endif
                                                    </dd>
                                                    <dt>Saleable Item:</dt><dd>
                                                        @if($items[0]->is_saleable == 0)
                                                            Not Saleable
                                                        @else
                                                            Saleable
                                                        @endif
                                                    </dd>
                                                    <dt>Current Rate:</dt><dd>{{ $items[0]->unit_price }} per {{$items[0]->item_unit}}</dd>
                                                    
                                                    <dt>Last Rate:</dt>
                                                        @if($items[0]->last_purchase_rate == 0)
                                                        <dd>
                                                            not Available
                                                        </dd>
                                                        @else
                                                            <dd>{{$items[0]->last_purchase_rate}}</dd>
                                                        @endif    
                                                    <dt>Last buying Qnt:</dt>
                                                        @if($items[0]->last_purchase_qnt == 0)
                                                        <dd>
                                                            not Available
                                                        </dd>
                                                        @else
                                                            <dd>{{$items[0]->last_purchase_qnt}}</dd>
                                                        @endif 
                                                    

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