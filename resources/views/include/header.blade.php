<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>Al <span>Invento </span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->

                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            
                        </ul>                   

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">

                             @if(Auth::user()->role_id == 1)
        
        <!--================== PURCHASE =================-->

                             <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-cart"></i>
                                    <span class="badge up bg-primary">
                                        @php $i=0; @endphp
                                @foreach(purchase_note() as $purchase)
                                    @if($purchase->approved == 0 && $purchase->rejected == 0)
                                        @php $i++ @endphp
                                    @endif
                                @endforeach
                                        {{$i}}
                                    </span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Pending PO</h5>
                                    </li>
                                    @foreach(purchase_note() as $purchase)
                                     @if($purchase->approved == 0 && $purchase->rejected == 0)
                                    <li>
                                        <a href="{{url('purchase/'.$purchase->id )}}" class="user-list-item">
                                            <div class="icon">
                                                <i><img src="{{asset('uploads/'.$purchase->users->profile_image)}}" style="width:30px;border-radius:500px;"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">{{$purchase->users->username}}   </span>
                                                <span class="time">{{$purchase->created_at->diffForHumans()}}</span>
                                            </div>
                                        </a>
                                    </li>
                                     @endif
                                    @endforeach
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="{{url('purchase')}}">See all Notification</a></p>
                                    </li>
                                </ul>

                            </li>

            <!--================== REQUESITION =================-->
                            
                            <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-note-text"></i>
                                    <span class="badge up bg-primary">
                                        @php $i=0; @endphp
                                @foreach(request_note() as $requisition)
                                    @if($requisition->approved == 0 && $requisition->rejected == 0)
                                        @php $i++ @endphp
                                    @endif
                                @endforeach
                                        {{$i}}
                                    </span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Pending Requisition</h5>
                                    </li>
                                    @foreach(request_note() as $requisition)
                                     @if($requisition->approved == 0 && $requisition->rejected == 0 && $requisition->issued == 0)
                                    <li>
                                        <a href="{{url('requisition/'.$requisition->id )}}" class="user-list-item">
                                            <div class="icon">
                                                <i><img src="{{asset('uploads/'.$requisition->users->profile_image)}}" style="width:30px;border-radius:500px;"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">{{$requisition->users->username}}</span>
                                                <span class="desc">{{$requisition->reason}}</span>
                                                <span class="time">{{$requisition->created_at->diffForHumans()}}</span>
                                            </div>
                                        </a>
                                    </li>
                                     @endif
                                    @endforeach
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="{{url('requisition')}}">See all Notification</a></p>
                                    </li>
                                </ul>
                            </li>

                           @endif

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="{{ asset('uploads/'.Auth::user()->profile_image) }}" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, {{ Auth::user()->first_name }} </h5>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="ti-power-off m-r-5"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>