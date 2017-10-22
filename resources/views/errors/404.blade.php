@extends('layouts.errorMain')



@section('content')            
    <!-- Start content -->
<section>
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-12 text-center">

                <div class="wrapper-page">
                    <img src="assets/images/animat-search-color.gif" alt="" height="120">
                    <h2 class="text-uppercase text-danger">Page Not Found</h2>
                            <p class="text-muted">It's looking like you may have taken a wrong turn. Don't worry... it
                                happens to the best of us. You might want to check your internet connection. Here's a
                                little tip that might help you get back on track.</p>

                    <a class="btn btn-success waves-effect waves-light m-t-20" href="{{ url('/') }}"> Return Home</a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection