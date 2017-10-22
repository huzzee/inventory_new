

@extends('layouts.errorMain')



@section('content')            
    <!-- Start content -->
<section>
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-12 text-center">

                <div class="wrapper-page">
                    <img src="assets/images/animat-search-color.gif" alt="" height="120">
                    <h2 class="text-uppercase text-danger">You are not Authorized!</h2>
                    <p class="text-muted">It's looking like you may have taken a wrong turn. Don't worry.</p>

                    <a class="btn btn-success waves-effect waves-light m-t-20" href="{{ url()->previous() }}"> Return Home</a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

