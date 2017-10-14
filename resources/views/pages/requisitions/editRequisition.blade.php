@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Edit Request</h4>
                        
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

                                        <h3>Requested Item Edit</h3>
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

                                            {!! Form::model($requisition, ['method' => 'PATCH','url' => ['requisitions', $requisition[0]->id]]) !!}   
                                                {{ csrf_field() }}
                                               
                                               <div class="col-md-3"></div>
                                             
                                                <div class="col-md-6">
                                                    @foreach($requisition[0]->requisitionDetails as $item_detail)
                                                    <div class="form-group row">
                                                        <label for="user_id" class="col-sm-3">Item Name<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input type="text" parsley-trigger="change"
                                                               placeholder="Quantity" disabled="disabled" class="form-control" 
                                                               value="{{ $item_detail->items->item_name }}" />
                                                                
                                                        </div>

                                                        <label for="user_id" class="col-sm-3">Required Qnt<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            
                                                                <input type="number" parsley-trigger="change"
                                                               placeholder="Quantity" name="required_qnt[]" class="form-control" value="{{ $item_detail->required_qnt }}" />
                                                               
                                                        </div>
                                                    </div>
                                                    @endforeach



                                               
                                                    <div class="form-group row">
                                                        <div class="col-sm-10"></div>
                                                        <div class="col-sm-2">
                                                            <button type="submit" class="btn btn-teal">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>    
                                           {!! Form::close() !!}    
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