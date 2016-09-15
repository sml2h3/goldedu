<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="金考卷 一站式试卷成型系统" />
    <meta name="author" content="ztone" />

    <title>金考卷</title>

    <link rel="stylesheet" href="{{asset('assets/css/fonts/linecons/css/linecons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/xenon-core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/xenon-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/xenon-components.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/xenon-skins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main-style.css')}}">
    {{--<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">--}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
@yield('content')
<div class="page-container">
    <div class="sidebar-menu toggle-others fixed">

        <div class="sidebar-menu-inner">

            <header class="logo-env">
                <div class="logo" style="height: 10px">
                    <!-- logo -->
                    <a href="" class="logo-expanded">
                        <img src="{{asset('assets/images/logo.png')}}" width="130" alt="金考卷" style="position:relative;top: -16px;">
                    </a>
                </div>

                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                <div class="mobile-menu-toggle visible-xs">

                    <a href="#" data-toggle="mobile-menu">
                        <i class="fa-bars"></i>
                    </a>
                </div>
            </header>

            <ul id="main-menu" class="main-menu">
                <li>
                    <a href="#">
                        <i class="fa-cloud"></i>
                        <span class="title">题库系统</span>
                    </a>
                    <ul>
                        <li>
                            <a href="dash">
                                <i class="iconfont" style="font-size: 13px;">&#xe606;</i>
                                <span class="title">云题库</span>
                            </a>
                        </li>
                        <li>
                            <a href="nques">
                                <i class="iconfont" style="font-size: 13px;">&#xe608;</i>
                                <span class="title">私有题库</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="iconfont">&#xe601;</i>
                                <span class="title">选题记录</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-users"></i>
                        <span class="title">用户面板</span>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="iconfont">&#xe607;</i>
                                <span class="title">个性设置</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="iconfont">&#xe603;</i>
                                <span class="title">收藏夹</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @if($user['is_super'] == '1'||$user['permission'] <= 1)
                <li>
                    <a href="#">
                        <i class="fa-gear"></i>
                        <span class="title">控制面板</span>
                    </a>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="iconfont">&#xe600;</i>
                                <span class="title">系统设置</span>
                            </a>
                        </li>
                        <li>
                            <a href="user">
                                <i class="iconfont">&#xe605;</i>
                                <span class="title">用户管理</span>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endif
            </ul>
            <!--侧边栏-->

        </div>

    </div>
    @yield('content1')

</div>

<!-- Bottom Scripts -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
<script src="{{asset('assets/js/resizeable.js')}}"></script>
<script src="{{asset('assets/js/joinable.js')}}"></script>
<script src="{{asset('assets/js/xenon-api.js')}}"></script>
<script src="{{asset('assets/js/xenon-toggles.js')}}"></script>
<script src="{{asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{asset('assets/js/xenon-custom.js')}}"></script>

</body>
</html>