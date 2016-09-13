@extends('layouts.admin')
@section('content1')
    <link rel="stylesheet" href="{{ asset('assets/ueditor/themes/default/css/ueditor.min.css') }}">
    <div class="main-content">
        <div class="content-box">
            <div class="col-sm-8">
                <h3>
                    添加新题目
                </h3>
                <div class="form-group">
                    <label for="name">新题目名称</label>
                    <input type="text" class="form-control" id="name" placeholder="为这个题目命名吧！" value="">
                </div>
                <div class="" style="width:100%;">
                    <label for="titleEditor">新题目标题</label>
                    <script id="titleEditor" name="content" type="text/plain" style="width:100%;"></script>
                </div>
                <div class="form-group">
                    <label>选择题目类型</label>
                    <select class="form-control">
                        <option value="1">选择题</option>
                        <option value="2">填空题</option>
                        <option value="3">客观题</option>
                    </select>
                </div>
                <div class="form-group" id="choice">
                    <label>添加答案(拖动可排序)</label><br>
                    <div id="sort" class="answersort ui-sortable">
                    </div>
                    <div class="col-md-3" id="answer">
                        <div class="answer add" data-toggle="modal" data-target="#addanswer">
                            <span class="fa fa-plus"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">操作中心</h3>
                    </div>
                    <div class="box-body">
                        <div class="checkbox">
                            <label>
                                <div class="cbr-replaced cbr-success"
                                     onclick="$('.cbr-replaced').toggleClass('cbr-checked')">
                                    <div class="cbr-input"><input type="checkbox" class="cbr cbr-done"></div>
                                    <div class="cbr-state"><span></span></div>
                                </div>
                                Success color
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="tag_input">添加题目标签</label>
                            <input type="text" class="form-control" id="tag_input" placeholder="题目分类标签" value="">
                            <span style="font-size:12px;color:#969696">(多个标签时请使用英文的标签进行分隔)</span>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">正确答案是？</h3>
                        </div>
                        <div class="box-body">
                            <form>
                                <div class="form-group">
                                    <label for="realasr">正确答案(序号)</label>
                                    <input type="text" class="form-control" id="realasr" placeholder="正确答案(序号)"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="realrsn">答案分析</label>
                                    <textarea id="realrsn" placeholder="答案分析" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">发布</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <button type="button" class="btn btn-default">保存为草稿</button>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary pull-right" id="send_right">
                                    <div class="loader">
                                        <div class="text">
                                            立即发布
                                        </div>
                                        <div class="loader-inner ball-grid-pulse" id="loading" hidden="">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addanswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">添加答案</h3>
                </div>
                <div class="box-body">
                    <form>
                        <div class="form-group">
                            <label for="xx">选项名</label>
                            <input type="text" id="xx" placeholder="选项名" class="form-control" style="margin:15px 0;">
                            <script id="content-editor" name="content" type="text/plain" style="width:100%;"></script>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addbutton" data-dismiss="modal" onclick="addAnswer()">添加答案</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">修改答案</h3>
                </div>
                <div class="box-body">
                    <form>
                        <div class="form-group">
                            <label for="xx">选项名</label>
                            <input type="text" id="xx2" placeholder="选项名" class="form-control" style="margin:15px 0;">
                            <script id="content-editor2" name="content" type="text/plain" style="width:100%;"></script>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editInsert" data-dismiss="modal" onclick="insertEdit()">修改答案</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/ueditor/ueditor.config.js')}}"></script>
    <script src="{{asset('assets/ueditor/ueditor.all.min.js')}}"></script>
    <script src="{{asset('assets/js/toastr/toastr.min.js')}}"></script>
    <script>
        $(function () {
            ue = UE.getEditor("titleEditor");
            ue2 = UE.getEditor("content-editor");
            ue3 = UE.getEditor("content-editor2");
            $("#answer").sortable();
        });
        function addAnswer() {
            var choice = $("#xx").val();
            var content =  ue2.getContent();
            $("#answer").append('<div class="answer" onclick="editAnswer(this)"><span>'+ choice + '</span><input type="hidden"  name="" value="'+ content +'"></div>');
            $("#xx").val("");
            ue2.setContent("");
        }
        function editAnswer(e) {
            $(e).addClass("will-edit");
            var choice = $(e).find("span").html();
            var content = $(e).find("input").val();
            $("#xx2").val(choice);
            ue3.setContent(content);
            $("#edit").modal();
        }
        function insertEdit() {
            var choice = $("#xx2").val();
            var content = ue3.getContent();
            $(".will-edit").find("span").html(choice);
            $(".will-edit").find("input").val(content);
            $(".will-edit").removeClass("will-edit");
        }
    </script>
    @endsection