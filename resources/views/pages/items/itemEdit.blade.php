@extends('layouts.mainHome')



@section('content')            
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">

                        <h4 class="page-title">Edit Item</h4>
                        
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                {!! Form::model($item, ['method' => 'PATCH','url' => ['items', $item->id], 'files'=>true]) !!}

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
                                    
                                    
                                    <a class="btn btn-danger" href="{{ url('items') }}">Items Lists</a>
                                    <a class="btn btn-pink" href="{{ url('items/create') }}">Create Items</a>
                                    
                                    <hr>
                                    <h4>General Info</h4>
                                    <hr>
                                    <div class="p-20" style="clear: both;">
                                            
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Type<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    
                                                    {!!Form::select('type_id',$item_types,null ,['class' => 'form-control select2'])!!}
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Category<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    {!!Form::select('catagory_id',$item_cats,null ,['class' => 'form-control select2'])!!}
                                                        
                                                </div>
                                            </div>
                                                
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Item Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    {!!Form::text('item_name',null ,['class' => 'form-control'])!!}
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="description" class="col-sm-3">Description</label>
                                                <div class="col-sm-9">
                                                    
                                                    {!!Form::textarea('description',null ,['class' => 'form-control','maxlength' => '225','rows' => '5', 'id' => 'textarea'])!!}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_image" class="col-sm-3">Item Image</label>
                                                <div class="col-sm-9">
                                                    
                                                    <input type="file" class="filestyle" placeholder="Not Important" name="item_image" data-placeholder="{{$item->item_image}}" data-buttonname="btn-inverse">

                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Active<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    @if($item->status == 1)
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

                    <!--new col-->
                    <div class="col-xs-5">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-12 col-md-12">

                                    <h4>Saleable Item</h4>
                                    <hr>

                                    <div class="p-20">
                                            
                                            
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Is Item Saleable</label>
                                                <div class="col-sm-9">
                                                    @if($item->is_saleable == 1)
                                                    <input type="checkbox" id="switch4" name="is_saleable" switch="bool" checked/>

                                                    @else

                                                    <input type="checkbox" id="switch4" name="is_saleable" switch="bool" />

                                                    @endif
                                                    
                                                    <label for="switch4" data-on-label="Yes"
                                                       data-off-label="No"></label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">Select Item Unit<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                   
                                                    {!! Form::select('item_unit', ['Box' => 'Box', 'Kilogram' => 'Kilogram' ,'Gram' => 'Gram', 'Liter' => 'Liter', 'Mililiter' => 'Mililiter', 'Mon' => 'Mon', 'Ton' => 'Ton', 'Meter' => 'Meter', 'centimeter' => 'centimeter','Inch' => 'Inch', 'Kilogram' => 'Kilogram' ,'Gram' => 'Gram', 'Feet' => 'Feet', 'sq.meter' => 'sq.meter', 'sq.feet' => 'sq.feet', 'Bundle' => 'Bundle', 'Bulk' => 'Bulk', 'KiloMeter' => 'KiloMeter'], null, ['placeholder' => 'Select Unit Price', 'class' => 'form-control select2 unitPrice' ,'disabled' => 'disabled'])
                                                    !!}
                                                        
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                
                                                <label for="item_name" class="col-sm-3">Per Unit Price<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    

                                                       {!! Form::number('unit_price' , null ,['class' => 'form-control unitPrice','disabled' => 'disabled', 'placeholder' => 'Enter Per unit Price', 'id' => 'unit_price','parsley-trigger' => 'change']) !!}
                                                        
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                            
                                                <label for="item_name" class="col-sm-3">Discount In %</label>
                                                <div class="col-sm-9">
                                                    

                                                    {!! Form::number('discount_percent' , null ,['class' => 'form-control unitPrice','disabled' => 'disabled', 'placeholder' => 'Enter Disscount in %', 'id' => 'discount_percent','parsley-trigger' => 'change']) !!}
                                                        
                                                </div>

                                            </div>
                                            
                                            <div class="form-group row">
                                            
                                                <label for="discount_price" class="col-sm-3">After Discount Price</label>
                                                <div class="col-sm-9">
                                                    <input type="number" id="discount_price" parsley-trigger="change" 
                                                       class="form-control" disabled="disabled" value="{{$item->discount_price}}" />

                                                       <input type="hidden" name="discount_price" id="discount_price1" value="{{$item->discount_price}}">
                                                        
                                                </div>
                                            </div>    
                                        
                                    </div>

                                </div>

                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <hr>
                                    <h4>Quantity</h4>
                                    <hr>

                                    <div class="p-20">
                                            
                                        <div class="form-group row">
                                            
                                            <label for="opening_qnt" class="col-sm-3">Opening Quantity<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                
                                                   {!! Form::number('opening_qnt' , null ,['class' => 'form-control', 'id' => 'opening_qnt','parsley-trigger' => 'change']) !!}
                                                    
                                            </div>
                                            
                                        </div>

                                        <div class="form-group row">
                                            
                                            <label for="current_qnt" class="col-sm-3">Current Quantity<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                
                                                   {!! Form::number('current_qnt' , null ,['class' => 'form-control', 'id' => 'current_qnt','parsley-trigger' => 'change']) !!}
                                                    
                                            </div>
                                            
                                        </div>

                                        <div class="form-group row">
                                            
                                            <label for="min_qnt" class="col-sm-3">Notify Quantity<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                
                                                   {!! Form::number('min_qnt' , null ,['class' => 'form-control', 'id' => 'min_qnt','parsley-trigger' => 'change']) !!}
                                                    
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

<!--*********Page Scripts End*********-->