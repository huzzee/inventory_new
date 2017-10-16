@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Make Purchase Order</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                
                    <div class="col-xs-12">
                        <div class="card-box">
                            <form action="{{ route('purchase.store') }}" enctype="multipart/form-data" method="POST">

                             {{ csrf_field() }}

                             @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12 col-md-12">
                                        
                                       
                                        <a class="btn btn-danger" href="{{ url('requisitions') }}">Purchase Order List</a>
                                        <hr>
                                        
                                        
                                        
                                        <div class="p-20" style="clear: both;">

                                                
                                                
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">   
                                                   

                                                <div class="form-group row">
                                                    <label for="supplier_id" class="col-sm-3">Supplier<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="supplier_id">
                                                            <option selected disabled="disabled">Select Supplier</option>
                                                            
                                                            @foreach($suppliers as $supplier)

                                                            <option value="{{ $supplier->id }}">{{ $supplier->sup_name }}</option>
                                                            @endforeach

                                                        </select>
                                                            
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="user_id" class="col-sm-3">Select Date<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="created_date" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                       
                                                            
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="user_id" class="col-sm-3">Quation Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" parsley-trigger="change"
                                                           placeholder="Quation number if needed" name="quatation_nmbr" class="form-control"/>
                                                             
                                                            
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row" id="main_body">
                                                    <div class="form-group row">
                                                        <label for="reason" class="col-sm-3">Select Item<span class="text-danger">*</span></label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control select2 name_of_item_puchase">
                                                                <option selected disabled="disabled">Select Items</option>

                                                                @foreach($items as $item)
                                                                <option value="{{ $item->id }}">{{ $item->item_name }} (Current Quantity: {{ $item->current_qnt }})</option>
                                                                @endforeach
                                                                
                                                            </select>

                                                            
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="number" parsley-trigger="change"
                                                           placeholder="Quantity" class="form-control qnt_item1"/>
                                                           

                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="number" parsley-trigger="change"
                                                           placeholder="Per Unit Rate" class="form-control rate_item"/>
                                                           

                                                        </div>
                                                        <div class="col-sm-1">
                                                            <button type="button" class="btn btn-icon btn-inverse m-b-5 add_itemlist_purchased"><i class="fa fa-plus"></i></button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="height: 50px;"></div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <table class="table table-striped m-0">

                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th width="30%">Item Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Per Unit Rate</th>
                                                                    <th>Total Amount</th>
                                                                    <th width="20%">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="item_row">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-teal">Submit</button>
                                                    </div>
                                                </div>

                                                
                                            
                                        </div>

                                    </div>

                                </div>
                            <!-- end row -->
                            </form>
                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->

                    <!--new col-->
                    
                
            </div>

           

        </div> <!-- container -->

    </div> <!-- content -->

@endsection

<!--*********Page Scripts Here*********-->

@section('scripts')
        
       

        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/autocomplete/jquery.mockjax.js') }}"></script>
        <script src="{{ asset('assets/plugins/autocomplete/jquery.autocomplete.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/autocomplete/countries.js') }}"></script>
        <script src="{{ asset('assets/pages/jquery.autocomplete.init.js') }}"></script>

        <script src="{{ asset('assets/pages/jquery.form-advanced.init.js') }}"></script>

        <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <script src="{{ asset('assets/pages/jquery.form-pickers.init.js') }}"></script>

        
@endsection

<!--*********Page Scripts End*********-->