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
                {!! Form::model($user, ['method' => 'PATCH','url' => ['users', $user->id], 'files'=>true]) !!}

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
                                    
                                    
                                    <a class="btn btn-danger" href="{{ url('users') }}">User Lists</a>
                                    <a class="btn btn-pink" href="{{ url('users/create') }}">Create User</a>
                                    
                                    <hr>
                                    
                                    <div class="p-20" style="clear: both;">
                                            
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">User Designation<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    
                                                    {!!Form::select('role_id',$roles,null ,['class' => 'form-control select2'])!!}
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">User Department<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    {!!Form::select('department_id',$departments,null ,['class' => 'form-control select2'])!!}
                                                        
                                                </div>
                                            </div>
                                                
                                            <div class="form-group row">
                                                <label for="item_name" class="col-sm-3">First Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    {!!Form::text('first_name',null ,['class' => 'form-control'])!!}
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_code" class="col-sm-3">Last Name<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    {!!Form::text('last_name',null ,['class' => 'form-control'])!!}
                                                        
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="item_code" class="col-sm-3">Username<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    {!!Form::text('username',null ,['class' => 'form-control'])!!}
                                                        
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="item_image" class="col-sm-3">Profile Image</label>
                                                <div class="col-sm-9">
                                                    
                                                    <input type="file" class="filestyle" placeholder="Not Important" name="profile_image" data-placeholder="{{$user->profile_image}}" data-buttonname="btn-inverse">

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Gender<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="radio radio-info radio-inline">
                                                        {!! Form::radio('gender', 0,['id' => 'inlineRadio1']) !!}
                                                        
                                                        <label for="inlineRadio1"> Male </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        {!! Form::radio('gender', 1,['id' => 'inlineRadio2']) !!}
                                                        <label for="inlineRadio2"> Female </label>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3">Active<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    @if($user->status == 1)
                                                    <input type="checkbox" id="switch3" name="status" switch="bool" checked/>

                                                    @else

                                                    <input type="checkbox" id="switch3" name="status" switch="bool" />

                                                    @endif
                                                    <label for="switch3" data-on-label="Yes"
                                                       data-off-label="No"></label>
                                                </div>
                                            </div>
                                            <hr>
                                                <h3>Change Password If needed</h3>
                                            <hr>
                                            <div class="form-group row">
                                                <label for="item_code" class="col-sm-3">New Password</label>
                                                <div class="col-sm-9">
                                                   <input type="password" name="password" parsley-trigger="change"
                                                       placeholder="Enter Password" class="form-control" />
                                                        
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
                                    <h3>User Permissions</h3>
                                    <hr>

                                    <div class="p-20" style="clear: both;">
                                        
                                        <div class="form-group row">
                                            
                                            <div class="col-sm-9">
                                                @foreach($permissions as $menu)
                                                @if($menu->menus->parent_menu_id == null)
                                                <div class="checkbox checkbox-success checkbox-circle">
                                                    @if($menu->status == 1)
                                                    <input id="checkbox{{ $menu->menus->id }}" name="menus[]" type="checkbox"
                                                     value="{{ $menu->menus->id }}" checked="checked" />
                                                    @else
                                                    <input id="checkbox{{ $menu->menus->id }}" name="menus[]" type="checkbox" value="{{ $menu->menus->id }}" />
                                                    @endif
                                                    <label for="checkbox{{ $menu->menus->id }}" style="font-weight: bold">
                                                        {{ $menu->menus->menu_name }}
                                                    </label>
                                                    
                                                    @foreach($permissions as $submenu)
                                                    @if($submenu->menus->parent_menu_id == $menu->menus->id)
                                                        
                                                            <div class="checkbox checkbox-success checkbox-circle">
                                                                @if($submenu->status == 1)
                                                                <input id="checkbox-{{ $submenu->menus->id }}" value="{{ $submenu->menus->id }}" type="checkbox" name="menus[]" checked="checked">
                                                                @else
                                                                <input id="checkbox-{{ $submenu->menus->id }}" value="{{ $submenu->menus->id }}" type="checkbox" name="menus[]">
                                                                @endif
                                                                <label for="checkbox-{{ $submenu->menus->id }}" style="font-weight: bold">
                                                                    {{ $submenu->menus->menu_name }}
                                                                </label>
                                                            </div>
                                                        
                                                    @endif
                                                    @endforeach
                                                    

                                                </div>
                                                <div class="row" style="width: 5px"></div>
                                                @endif
                                                @endforeach
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