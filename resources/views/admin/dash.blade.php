@extends('layouts.admin')
    @section('content')
        <body class="page-body skin-white main-page">
        @endsection
    @section('content1')
        <div class="main-content">

            <div class="search-ini">
                <h2>
                    <img src="{{asset('assets/images/logo.png')}}" alt="金考卷" width="130"><i class="icon-rights"></i>️ 智能搜题
                </h2>
                <div class="search-box">
                    <form action="" class="form-horizontal">
                        <div class="form-group has-info flexed-center">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="main-keywords" name="seek" placeholder="搜索..." value="{{ $seek or '' }}" autocomplete="off">
                                <div class="suggestion">
                                    <ul>
                                        <li>语文</li>
                                        <li>数学</li>
                                        <li>英语</li>
                                    </ul>
                                </div>
                                <div class="hot">
                                    <ul class="flexed-center">
                                        <li>热词 :</li>
                                        <li>语文</li>
                                        <li>数学</li>
                                        <li>英语</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="main-result">
                <table class="table table-hover main-table">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>题目名称</th>
                        <th>题目标签</th>
                        <th>题目类型</th>
                        <th>题目公开者</th>
                        <th class="point">使用次数<i class="fa fa-angle-down"></i></th>
                        <th class="point">反馈评分<i class="fa fa-angle-down"></i></th>
                        <th class="point">添加时间<i class="fa fa-angle-down"></i></th>
                        <th>操作</th>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        @endsection
        <div class="cart-fixed">
            <div class="left">
                <i class="fa-shopping-cart" style="position: relative;top: 2px;"></i>
            </div>
            <div class="right">您的待选区是空的</div>
            <div class="right-open">
                隐藏 <i class="fa-toggle-off"></i>
            </div>
            <div class="cart-main">
                <ul id="cart-items">

                </ul>
            </div>
            <div class="bottom" onclick="goToEdit()">
                去编辑
            </div>
        </div>
