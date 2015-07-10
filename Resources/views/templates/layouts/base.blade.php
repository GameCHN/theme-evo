@include('templates.includes.head')

@section('page-title')
    {{ cutlass_title() }}
@endsection

@section('header-extra')
    <div class="page-header parallax" style="background-image:url(/static/assets/images/top-catogory-2560.jpg);" __style="background-image:url(http://placehold.it/1200x300&amp;text=IMAGE+PLACEHOLDER);">
        <div class="container">
            <h1 class="page-title">@yield('page-title')</h1>
        </div>
    </div>
    <div class="utility-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="{{ home_url() }}">Home</a></li>
                        <li class="active">@yield('page-title')</li>
                    </ol>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                    <ul class="utility-icons social-icons social-icons-colored">
                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

<body {{ body_class() }} >

<!--[if lt IE 8]>
<div class="alert alert-warning">
    {{ _e('You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'cutlass') }}
</div>
<![endif]-->
<div class="body">

    @include('templates.includes.header')

    @yield('page-header')


    <div class="wrap" role="document">
        <!-- Start Body Content-->
        <div class="main" role="main">
            @yield('content')
        </div>
        <!-- End Body Content -->
    </div>
    <!-- /.wrap -->

    {{ wp_footer() }}

    @include('templates.includes.footer')

</div>
</body>
</html>


