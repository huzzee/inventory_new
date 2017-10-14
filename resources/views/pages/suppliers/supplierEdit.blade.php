@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Add Supplier</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                {!! Form::model($sup, ['method' => 'PATCH','url' => ['suppliers', $sup->id], 'files'=>true]) !!}

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
                    <div class="col-xs-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    
                                    
                                    <a class="btn btn-danger" href="{{ url('suppliers') }}">Suppliers Lists</a>
                                    
                                    <hr>
                                    <div class="p-20" style="clear: both;">
                                            
                                            
                                                
                                            <div class="form-group row">
                                                <label for="sup_name" class="col-sm-3">Supplier Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                    
                                                    {!!Form::text('sup_name',null ,['class' => 'form-control'])!!}
                                                        
                                                </div>
                                            </div>               

                                            <div class="form-group row">
                                                <label for="sup_phone" class="col-sm-3">Phone Number<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                     {!!Form::number('sup_phone',null ,['class' => 'form-control'])!!}
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sup_email" class="col-sm-3">Email<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                     {!!Form::email('sup_email',null ,['class' => 'form-control'])!!}
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sup_address" class="col-sm-3">Address<span class="text-danger">*</span></label>
                                                <div class="col-sm-7">
                                                     {!!Form::textarea('sup_address',null ,['class' => 'form-control','maxlength' => '225','rows' => '5', 'id' => 'textarea'])!!}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sup_image" class="col-sm-3">Supplier Image</label>
                                                <div class="col-sm-7">
                                                   <input type="file" class="filestyle" placeholder="Not Important" name="sup_image" data-placeholder="{{ $sup->sup_image }}" data-buttonname="btn-inverse">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Active<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    @if($sup->status == 1)
                                                    <input type="checkbox" id="switch3" name="status" switch="bool" checked/>

                                                    @else

                                                    <input type="checkbox" id="switch3" name="status" switch="bool" />

                                                    @endif
                                                    <label for="switch3" data-on-label="Yes"
                                                       data-off-label="No"></label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-9"></div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-teal">Submit</button>
                                                </div>
                                            </div>

                                            
                                        
                                    </div>

                                </div>

                            </div>
                            <!-- end row -->

                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->               
              
            </div>

           

        </div> <!-- container -->

    </div> <!-- content -->

@endsection
@section('scripts')
        <script src="{{ asset('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('assets/pages/jquery.form-advanced.init.js') }}"></script>

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
@endsection 