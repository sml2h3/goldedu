@extends('layouts.admin')
@section('content')
    <body class="page-body skin-white userSet">
    @endsection
@section('content1')
    <div class="main-content">
        <div class="container-fluid">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-body box-profile">
                        <h4>用户管理</h4>
                        <hr>
                        <div class="col-md-12 col-xs-12">
                            <button class="btn btn-primary" type="button" id="adduser_button" onclick="$('#addUsermodal').modal()"><i class="fa fa-plus"></i>添加用户</button>
                        </div>
                        <table class="table table-hover user_list">
                            <tbody>
                            <tr>
                                <th>Id</th>
                                <th>用户名</th>
                                <th>用户级别</th>
                                <th>操作</th>
                            </tr>
                            @foreach($list as $l)
                            <tr class="table_tr_{{ $l['Id'] }}">
                                <td>{{ $l['Id'] }}</td>
                                <td>{{ $l['edu_name'] }}</td>
                                @if( $l['edu_is_super'] == '1' )
                                    <td><span class="label label-success label_{{ $l['Id'] }}">超级管理员</span></td>
                                @elseif( $l['edu_permission'] == '1' )
                                    <td><span class="label label-primary label_{{ $l['Id'] }}">HR</span></td>
                                @else
                                    <td><span class="label label-warning label_{{ $l['Id'] }}">项目组</span></td>
                                    @endif
                                <td><button type="button" class="btn btn-link" onclick="deluser({{ $l['Id'] }})">删除</button><button type="button" class="btn btn-link" onclick="change({{ $l['Id'] }},0)">变更权限</button></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" style="text-align: center;">
                            <div hidden="" class="pageCount">1</div>
                            {!! $list->links() !!}
                        </div>
                        <input id="changeId" type="hidden" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="power_change_box">
        <div class="modal-dialog">
            <div class="box box-warning">
                <div class="box-body box-profile">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <select class="form-control" id="power_change_select">
                                        @if($user['is_super'] == '1')
                                            <option value="0">超级管理员</option>
                                        @endif
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

    <div class="modal fade" id="addUsermodal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="box box-success">
                <div class="box-body box-profile">
                    <div class="modal-content">
                        <div class="modal-header" style="border:none">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">添加用户</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="user_input">新用户名</label>
                                    <input type="text" class="form-control" placeholder="新用户名" id="user_input">
                                </div>
                                <div class="form-group">
                                    <label for="pwd_input">密码</label>
                                    <input type="password" class="form-control" placeholder="密码" id="pwd_input">
                                </div>
                                <div class="form-group">
                                    <label for="power_select">用户权限</label>
                                    <select class="form-control" id="power_select">
                                        @if($user['is_super'] == '1')
                                            <option value="0">超级管理员</option>
                                        @endif
                                        <option value="1">普通管理员</option>
                                        <option value="2">普通用户</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary" id="adduser">提交注册</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div>
    <script>
        function change(Id,type){
            $('#changeId').val(Id);
            $('#power_change_select').val(type);
            $('#power_change_box').modal({
                keyboard:false
            });
        }
        function deluser(Id){
            $.ajax({
                url:"user/del",
                type:"post",
                data:{
                    Id:Id
                },
                success:function (result) {
                    alert(result)
                }
            })
        }
        $('#adduser').click(function(){
            $.ajax({
                url:"user/add",
                type:"post",
                data:{
                    username:$('#user_input').val(),
                    password:$('#pwd_input').val(),
                    permission:$('#power_select').val()
                },
                success:function(result){
                    alert(result);
                }
            })
        });
    </script>
    @endsection