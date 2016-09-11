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
<body class="page-body skin-white userSet">
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
                <li class="has-sub">
                    <a href="#">
                        <i class="fa-users"></i>
                        <span class="title">用户面板</span>
                    </a>
                    <ul style="display: none;">
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
                <li class="has-sub expanded">
                    <a href="#">
                        <i class="fa-gear"></i>
                        <span class="title">控制面板</span>
                    </a>
                    <ul style="display: block;">
                        <li class="">
                            <a href="#">
                                <i class="iconfont"></i>
                                <span class="title">系统设置</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="iconfont"></i>
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
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <h4>用户管理</h4>
                        <hr>
                        <div class="col-md-12 col-xs-12">
                            <button class="btn btn-primary" type="button" id="adduser_button"><i class="fa fa-plus"></i>添加用户</button>
                        </div>
                        <table class="table table-hover user_list">
                            <tbody><tr>
                                <th>Id</th>
                                <th>用户名</th>
                                <th>用户级别</th>
                                <th>操作</th>
                            </tr>
                            <tr class="table_tr_1">
                                <td>1</td>
                                <td>1</td>
                                <td><span class="label label-success label_1">超级管理员</span></td>
                                <td><button type="button" class="btn btn-link" onclick="deluser(1)">删除</button><button type="button" class="btn btn-link" onclick="change(1,0)">变更权限</button></td>
                            </tr><tr class="table_tr_3">
                                <td>3</td>
                                <td>dq</td>
                                <td><span class="label label-success label_3">超级管理员</span></td>
                                <td><button type="button" class="btn btn-link" onclick="deluser(3)">删除</button><button type="button" class="btn btn-link" onclick="change(3,0)">变更权限</button></td>
                            </tr><tr class="table_tr_31">
                                <td>31</td>
                                <td>HR</td>
                                <td><span class="label label-primary label_31">HR</span></td>
                                <td><button type="button" class="btn btn-link" onclick="deluser(31)">删除</button><button type="button" class="btn btn-link" onclick="change(31,1)">变更权限</button></td>
                            </tr><tr class="table_tr_32">
                                <td>32</td>
                                <td>项目组</td>
                                <td><span class="label label-warning label_32">项目组</span></td>
                                <td><button type="button" class="btn btn-link" onclick="deluser(32)">删除</button><button type="button" class="btn btn-link" onclick="change(32,2)">变更权限</button></td>
                            </tr>                  </tbody></table>
                        <div class="dataTables_paginate paging_simple_numbers" style="text-align: center;">
                            <div hidden="" class="pageCount">1</div>
                            <ul class="pagination">
                                <li class="paginate_button previous">
                                    <a href="#" onclick="prew()">上一页</a>
                                </li><li class="paginate_button next">
                                <a href="#" onclick="next()">下一页</a></li>
                            </ul>
                        </div>
                        <input id="changeId" type="hidden" value="">
                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="power_change_box">
                            <div class="modal-dialog">
                                <div class="box box-warning">
                                    <div class="box-body box-profile">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    ×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <select class="form-control" id="power_change_select">
                                                            <option value="0">超级管理员</option>
                                                            <option value="1">普通管理员</option>
                                                            <option value="2">普通用户</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>
                                                <button type="button" class="btn btn-primary" id="change_button">
                                                    提交更改
                                                </button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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