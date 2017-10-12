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
                                                <a href="{{ url('uploads/'.$items[0]->item_image) }}" onclick="deafult();">
                                                   <img src="{{ url('uploads/'.$items[0]->item_image) }}" width="100%" height="300px" alt="{{ $items[0]->item_image }}">
                                                </a>
                                           </div>
                                         
                                           <div class="col-sm-8">
                                               <div class="row">
                                                   <div class="col-sm-6">
                                                       <p class="head_show">Name :</p>
                                                       <p class="head_show">Description :</p>
                                                       <p class="head_show">Item Type :</p>
                                                       <p class="head_show">Item Category :</p>
                                                       <p class="head_show">Opening Quantity :</p>
                                                       <p class="head_show">Current Quantity :</p>
                                                       <p class="head_show">Minimum Quantity :</p>
                                                       <p class="head_show">Status :</p>
                                                  
                                                       
                                                   </div>
                                               </div> 
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