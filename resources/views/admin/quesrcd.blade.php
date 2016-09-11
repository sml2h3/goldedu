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
<body class="page-body skin-white quest-record">
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
                <li class="has-sub expanded">
                    <a href="#">
                        <i class="fa-cloud"></i>
                        <span class="title">题库系统</span>
                    </a>
                    <ul style="display: block;">
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
                        <li class="active">
                            <a href="#">
                                <i class="iconfont"></i>
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
        <table class="table table-hover main-table">
            <tbody>
            <tr>
                <th>ID</th>
                <th>题目备注标题</th>
                <th>选题状态</th>
                <th>评分</th>
                <th>使用时间</th>
                <th>操作</th>
            </tr>
            <tr>
                <td>5</td>
                <td>C/C++面试题</td>
                <td id="st_5">已评分</td>
                <td class="text-center" id="status_5">35</td>
                <td>1471160528</td>
                <td id="action_5">
                    <button class="btn btn-link">添加到待选区</button>
                </td>
            </tr>
            <tr>
                <td>23</td>
                <td>C/C++面试题</td>
                <td id="st_23">未评分</td>
                <td class="text-center" id="status_23"><input class="form-control getgold" placeholder="得分（1-100"
                                                              id="23"></td>
                <td>1471162125</td>
                <td id="action_23">
                    <button class="btn btn-primary" onclick="up(23,32)">提交分数</button>
                    <button class="btn btn-link">添加到待选区</button>
                </td>
            </tr>
            </tbody>
        </table>
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