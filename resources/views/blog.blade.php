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
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 blog-posts-area">
                    <h2>Right Sidebar Blog Template</h2>
                    <div class="row blog-posts">
                        @foreach($posts as $post)
                            <div class="blog-single-post clearfix">
                                <div class="col-md-1 post-dates">
                                    <span><i class="fa fa-calendar"></i> {{ $post->post_date->month }}</span>
                                    <strong>{{ $post->post_date->day }}</strong>
                                </div>
                                <div class="col-md-3 post-thumbnails">
                                    @foreach($post->attachment as $attachment)
                                        <a href="{{ $attachment->guid }}">
                                            <img src="{{ $attachment->guid }}" alt="" class="img-responsive">
                                        </a>
                                    @endforeach
                                </div>
                                <div class="col-md-8 single-post-content">
                                    <h3 class="post-title">
                                        <a href="{{ route('posts.show', ['id' => $post->ID]) }}">{{ $post->post_title }}</a>
                                    </h3>
                                    <p>{{ $post->post_excerpt }}</p>
                                    <a href="{{ route('posts.show', ['id' => $post->ID]) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $posts->links() }}
                </div><!-- Blog Post Area Ends -->
                <div class="col-md-3 blog-sidebar">
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Useful Links</h3>
                        <div class="widget-content">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Terms & onditions</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">FAQ and Help</a></li>
                                <li><a href="">Mortgage Calculator</a></li>
                                <li><a href="">Tips for better living</a></li>
                                <li><a href="">Login</a></li>
                                <li><a href="">Signup</a></li>
                            </ul>
                        </div>
                    </div><!-- Sidebar Widget Ends -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Contact</h3>
                        <div class="widget-content">
                            <div class="address-widget">
                                <address>
                                    <strong>Example, Inc.</strong><br><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                </address>
                                <address>
                                    <abbr title="Phone">Phone:</abbr> 661-999-6483<br>
                                    <abbr title="Email">Email:</abbr> <a href="mailto:">hello@yourcompany.com</a><br>
                                    <abbr title="Skype">Skype:</abbr> (123) 456-7890<br>
                                </address>
                                <a class="btn btn-primary" href="#">Contact page</a>
                            </div>
                        </div>
                    </div><!-- Sidebar Widget Ends -->
                </div><!-- Blog Sidebar ends -->
            </div>
        </div>
    </section><!-- Blog content ends -->
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
