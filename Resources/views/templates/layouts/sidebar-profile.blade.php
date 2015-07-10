@layout('templates.layouts.base')

@section('header-extra')
    <div class="page-header parallax" style="background-image:url(/static/assets/images/top-catogory-2560.jpg);" default="http://placehold.it/1200x300&amp;text=51LAWFIRM">
        <div class="container">
            <h1 class="page-title">{{ cutlass_title() }}</h1>
        </div>
    </div>
    <div class="utility-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="{{ home_url() }}">{{ __('Home') }}</a></li>
                        <li class="active">{{ cutlass_title() }}</li>
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

@section('content')
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <!-- 边栏 start -->
                <div class="col-md-3 sidebar" role="complementary">
                    <div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 405px;">
                        <div class="users-sidebar tbssticky">
                            @if(is_user_logged_in())
                                <ul class="list-group">
                                    <li class="list-group-item {{ $leftact['user-dashboard']}}" active><span class="badge hide">5</span> <a href="/user-dashboard"><i class="fa fa-home"></i> {{ __('个人信息') }}</a></li>
                                    <li class="list-group-item {{ $leftact['lawyer-profile']}}"><span class="badge hide">5</span> <a href="/lawyer-profile"><i class="fa fa-folder-o"></i> {{ __('律师资料') }}</a></li>
                                    <li class="list-group-item {{ $leftact['user-posts']}}"><span class="badge ">12</span> <a href="/user-posts"><i class="fa fa-star-o"></i> {{ __('我的帖子') }}</a></li>
                                    <li class="list-group-item {{ $leftact['user-reply']}}"><span class="badge ">12</span> <a href="/user-reply"><i class="fa fa-plus-square-o"></i> {{ __('我的回复') }}</a></li>
                                    <li class="list-group-item"><span class="badge hide ">2</span> <a href="{{ wp_logout_url('/login') }}"><i class="fa fa-edit"></i> {{ __('退出') }}</a></li>
                                    <!--{demo}-->
                                    <li class="list-group-item"><a href="user-dashboard-profile.html"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="list-group-item"><a href="user-dashboard-settings.html"><i class="fa fa-cog"></i> Account Settings</a></li>
                                    <li class="list-group-item"><a href="javascript:void(0)"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                    <!--{/demo}-->
                                </ul>
                            @else
                                <a href="/register" class="btn btn-block btn-primary add-listing-btn">{{ __('注册新账号') }}</a>
                                <a href="/login" class="btn btn-block btn-default add-listing-btn">{{ __('登录') }}</a>

                            @endif
                        </div>
                    </div>
                    @eval(dynamic_sidebar('sidebar-profile'))
                </div>
                <!-- 边栏 end -->
                <!-- 内容 start-->
                <div class="col-md-9 single-post main-content">
                    <div class="row box">
                        @yield('page-content')
                    </div>
                </div>
                <!-- // 内容 end -->

            </div>
        </div>
    </div>  <!--//.content-->

@endsection
