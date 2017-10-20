@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Make Issuance Slip</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                
                    <div class="col-xs-12">
                        <div class="card-box">
                            <form action="{{ route('issuance.store') }}" enctype="multipart/form-data" method="POST">

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
                                        
                                       
                                        <a class="btn btn-danger" href="{{ url('grn') }}">Issuance List</a>
                                        <hr>
                                        
                                        
                                        
                                        <div class="p-20" style="clear: both;">

                                                
                                                
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">   
                                                   

                                                

                                                <div class="form-group row">
                                                    <label for="purchase_order_code" class="col-sm-3">Requisition Code<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="requisition_code" name="requisition_code" autocomplete="off" placeholder="Requisition Code">
                                                        <div id="chk_req_code">
                                                            
                                                        </div>
                                                            
                                                    </div>
                                                </div>

                                                <div id="req_info">
                                                    
                                                </div>

                                                

                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12" id="req_item_table">
                                                        
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