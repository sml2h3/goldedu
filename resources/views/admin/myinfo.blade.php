<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="金考卷 一站式试卷成型系统"/>
    <meta name="author" content="ztone"/>

    <title>金考卷</title>

    <link rel="stylesheet" href="assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/xenon-core.css">
    <link rel="stylesheet" href="assets/css/xenon-forms.css">
    <link rel="stylesheet" href="assets/css/xenon-components.css">
    <link rel="stylesheet" href="assets/css/xenon-skins.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/main-style.css">


    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body skin-white private-set">
<div class="page-container">
    <div class="sidebar-menu toggle-others fixed">

        <div class="sidebar-menu-inner">

            <header class="logo-env">
                <div class="logo" style="height: 10px">
                    <!-- logo -->
                    <a href="" class="logo-expanded">
                        <img src="assets/images/logo.png" width="130" alt="金考卷" style="position:relative;top: -16px;">
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
                <li class="has-sub">
                    <a href="#">
                        <i class="fa-cloud"></i>
                        <span class="title">题库系统</span>
                    </a>
                    <ul style="display: none;">
                        <li class="">
                            <a href="#">
                                <i class="iconfont" style="font-size: 13px;"></i>
                                <span class="title">云题库</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="iconfont" style="font-size: 13px;"></i>
                                <span class="title">私有题库</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="iconfont"></i>
                                <span class="title">选题记录</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub expanded">
                    <a href="#">
                        <i class="fa-users"></i>
                        <span class="title">用户面板</span>
                    </a>
                    <ul style="display: block;">
                        <li class="active">
                            <a href="#">
                                <i class="iconfont"></i>
                                <span class="title">个性设置</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="iconfont"></i>
                                <span class="title">收藏夹</span>
                            </a>
                        </li>
                    </ul>
                </li>
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
                            <a href="#">
                                <i class="iconfont">&#xe605;</i>
                                <span class="title">用户管理</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--侧边栏-->

        </div>

    </div>

    <div class="main-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <h3>用户中心</h3>
                <hr>
                <div class="col-md-1 col-xs-12">
                    <div class="col-md-12 col-xs-12">
                        <img src="assets/images/user-4.png">
                    </div>
                    <div class="col-md-11 col-xs-12 col-md-offset-1">
                        <button type="button" class="btn btn-link">修改头像</button>
                    </div>
                </div>
                <div class="col-md-11 col-xs-12">
                    <ul>
                        <li>用户名:1</li>
                        <li>账户Id:1</li>
                        <li>手机号 : <a data-toggle="modal" data-target="#checkphone" style="color: #0061ac">未绑定手机号码</a></li>
                        <li>注册时间:2015-12-01 16:35:14</li>
                        <li>用户等级:超级管理员</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid userset">
            <div class="col-md-12">
                <h3>设置中心</h3>
                <hr>
            </div>
            <div class="col-md-12 setlist">
                <div class="col-md-11">
                    <strong>登陆密码：</strong>
                    <p>修改更复杂的密码有助于您的账号被盗用,建议您定期更换密码，设置一个包含字母，符号或数字中至少两项且长度超过6位的密码。</p>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-link" type="button">修改密码</button>
                </div>
            </div>
            <div class="col-md-12 setlist">
                <div class="col-md-11">
                    <strong>密保问题：</strong>
                    <p>是您找回登录密码的方式之一。建议您设置三个容易记住，且最不容易被他人获取的问题及答案，更有效保障您的密码安全。</p>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-link" type="button">修改密保</button>
                </div>
            </div>
            <div class="col-md-12 setlist">
                <div class="col-md-11">
                    <strong>个人信息：</strong>
                    <p>个人信息管理，包括昵称，自我描述等</p>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-link" type="button">修改信息</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="checkphone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">验证并绑定手机</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="phone" class="form-control" placeholder="手机号码">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js" defer async></script>
<script src="assets/js/TweenMax.min.js" defer async></script>
<script src="assets/js/resizeable.js" defer async></script>
<!--<script src="assets/js/joinable.js" defer async></script>-->
<script src="assets/js/xenon-api.js" defer async></script>
<script src="assets/js/xenon-toggles.js" defer async></script>
<!--<script src="assets/js/xenon-widgets.js" defer async></script>-->
<script src="assets/js/toastr/toastr.min.js" defer async></script>
<script src="assets/js/xenon-custom.js" defer async></script>

</body>
</html>