@extends('layouts.app')

@section('extra-styles')
    <!-- =========================
        STYLESHEETS
    ============================== -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="css/owl.carousel.css">
@endsection

@section('content')
    <!-- =========================
 Simple Page Header
============================== -->
    <section class="header-banner">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h2>Simple Page</h2>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="">Home</a></li>
                            <li><a class="active" href="">Simple Page</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 content-page-inner-area">
                    {!! $post->post_content !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mixitup.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
@endsection
