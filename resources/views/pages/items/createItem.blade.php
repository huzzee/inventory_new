@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Add Items</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <form action="{{ route('item_categories.store') }}" enctype="multipart/form-data" method="POST">

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
                    <div class="col-xs-7">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">

                                    <a class="btn btn-inverse">Items Lists</a>
                                    <hr>

                                    <div class="p-20">
                                            
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Type<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="type_id">
                                                        <option selected disabled="disabled">Select Item Type</option>
                                                        
                                                        @foreach($item_types as $item_type)
                                                            <option value="{{ $item_type->id }}">{{ $item_type->item_type_name }}</option>
                                                        @endforeach
                                                                
                                                    </select>
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Category<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="category_id">
                                                        <option selected disabled="disabled">Select Item Category</option>
                                                        
                                                        @foreach($item_cats as $item_cat)
                                                            <option value="{{ $item_cat->id }}">{{ $item_cat->item_cat_name }}</option>
                                                        @endforeach
                                                                
                                                    </select>
                                                        
                                                </div>
                                            </div>
                                                
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="item_name" parsley-trigger="change" required
                                                       placeholder="Enter Item Name" class="form-control" value="{{ old('item_name') }}" />
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="description" class="col-sm-3">Description</label>
                                                <div class="col-sm-9">
                                                    <textarea name="description" id="textarea" class="form-control" maxlength="225" rows="5" placeholder="Item Description Here If Important" value="{{ old('description') }}"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_image" class="col-sm-3">Item Image</label>
                                                <div class="col-sm-9">
                                                   <input type="file" class="filestyle" placeholder="Not Important" name="item_image" data-buttonname="btn-inverse">
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Active<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" id="switch3" name="status" switch="bool" checked/>
                                                    <label for="switch3" data-on-label="Yes"
                                                       data-off-label="No"></label>
                                                </div>
                                            </div>

                                            
                                        
                                    </div>

                                </div>

                            </div>
                            <!-- end row -->

                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->

                    <!--new col-->
                    <div class="col-xs-5">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">

                                    <h4>Saleable Item</h4>
                                    <hr>

                                    <div class="p-20">
                                            
                                            
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Item Is Saleable<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" id="switch4" name="status" switch="bool" />
                                                    <label for="switch4" data-on-label="Yes"
                                                       data-off-label="No"></label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Select Item Unit<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2 unitPrice" name="item_unit" disabled="disabled">
                                                        <option selected disabled="disabled">Select Item Category</option>
                                                        
                                                        <option value="Box">Box</option>
                                                        <option value="Kilogram">Kilogram</option>
                                                        <option value="Gram">Gram</option>
                                                        <option value="Liter">Liter</option>
                                                        <option value="Mililiter">Mililiter</option>
                                                        <option value="Mon">Mon</option>
                                                        <option value="Ton">Ton</option>
                                                        <option value="Meter">Meter</option>
                                                        <option value="centimeter">centimeter</option>
                                                        <option value="Inch">Inch</option>
                                                        <option value="Feet">Feet</option>
                                                        <option value="sq.meter">sq.meter</option>
                                                        <option value="sq.feet">sq.feet</option>
                                                        <option value="Bundle">Bundle</option>
                                                        <option value="Bulk">Bulk</option>
                                                        <option value="KiloMeter">KiloMeter</option>
                                                        

                                                                
                                                    </select>
                                                        
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-2">Unit<span class="text-danger">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="number" id="unit_nmbr" parsley-trigger="change"
                                                       class="form-control unitPrice" value="1" disabled="disabled" />
                                                        
                                                </div>
                                                <label for="item_name" class="col-sm-2">Price<span class="text-danger">*</span></label>
                                                <div class="col-sm-4">
                                                    <input type="number" id="unit_price" name="unit_price" parsley-trigger="change" 
                                                       class="form-control unitPrice" disabled="disabled" value="{{ old('unit_price') }}"  />
                                                        
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10">
                                                    <p>Total Price per Unit <span id="totalpricing">0</span>.(Your currency)</p>
                                                </div>
                                            </div>
                                            
                                        
                                    </div>

                                </div>

                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <hr>
                                    <h4>Saleable Item</h4>
                                    <hr>

                                    <div class="p-20">
                                            
                                            
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Item Is Saleable<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" id="switch3" name="status" switch="bool"/>
                                                    <label for="switch3" data-on-label="Yes"
                                                       data-off-label="No"></label>
                                                </div>
                                            </div>

                                            
                                        
                                    </div>

                                </div>

                            </div>
                            <!-- end row -->

                           
                        </div> <!-- end ard-box -->
                    </div><!-- end col-->
                </form>
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