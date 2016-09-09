@extends('layouts.admin')
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
                                <input type="text" class="form-control" id="main-keywords" placeholder="搜索...">
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
                    <tr id="item-89">
                        <td>89</td>
                        <td class="item-tittle">智力测试</td>
                        <td><a></a>&nbsp;</td>
                        <td>客观题</td>
                        <td>0</td>
                        <td>0</td>
                        <td>60</td>
                        <td>20160810</td>
                        <td>
                            <button type="button" class="btn btn-link" onclick="collect(89)">收藏</button>
                            <button type="button" class="btn btn-link" onclick="getinfo(89)">查看详情</button>
                            <button type="button" class="btn btn-link addcart" onclick="addToCart(89,event)">添加至待选区</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <ul class="pagination flexed-center">
                    <li class="paginate_button previous">
                        <a href="#" onclick="prew()">上一页</a>
                    </li>
                    <li class="paginate_button next">
                        <a href="#" onclick="next()">下一页</a></li>
                </ul>
            </div>
        </div>
        @endsection