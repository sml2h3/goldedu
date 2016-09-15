@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{asset('assets/css/context.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/loaders.css')}}">
    <body class="page-body skin-white new-quest">
    @endsection
@section('content1')
    <link rel="stylesheet" href="{{ asset('assets/ueditor/themes/default/css/ueditor.min.css') }}">
    <div class="main-content">
        <div class="content-box">
            {{csrf_field()}}
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
                    <div class="col-md-3">
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
    <script type="text/javascript" src="{{asset('assets/ueditor/ueditor.config.js')}}"></script>
    <script src="{{asset('assets/ueditor/ueditor.all.min.js')}}"></script>
    <script src="{{asset('assets/js/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/js/centext.js')}}"></script>
    <script>
        context.init({preventDoubleContext: false});
        context.settings({compress: true});
        $(function () {
            ue = UE.getEditor("titleEditor");
            ue2 = UE.getEditor("content-editor");
            ue3 = UE.getEditor("content-editor2");
            $("#answer").sortable();
        });
        function addAnswer() {
            if(!confirm("您确定要添加这个答案吗？"))
            {
                return;
            }
//            var choice = $("#xx").val();
//            var content =  ue2.getContent();
//            $("#answer").append('<div class="answer" onclick="editAnswer(this)"><span>'+ choice + '</span><input type="hidden"  name="" value="'+ content +'"></div>');
//            $("#xx").val("");
//            ue2.setContent("");
            var choice = $('#xx').val();
            if($('input[value='+choice+']').length>0) {
                alert('已存在相同选项,请重新输入');
                return;
            };
            var content = ue2.getContent();
            sessionStorage.setItem(choice,content);
            if ($('.answer_box').length<=0) {
                $('#sort').append('<div class="col-md-3 answer_box answer_'+choice+'"><div class="answer">选项<span class="xx_'+choice+'">'+choice+'</span><span class="cc_'+choice+'">已添加</span></div></div>');
            }else{
                var num = $('.answer_box').length-1;
                $('.answer_box:eq('+num+')').after('<div class="col-md-3 answer_box answer_'+choice+'"><div class="answer">选项<span class="xx_'+choice+'">'+choice+'</span><span class="cc_'+choice+'">已添加</span></div></div>');
            }
            $('.answer_'+choice).append("<input hidden class='asr_arr' name='asr_arr[]' value='"+choice+"'>");
            attachContext(".answer_"+choice);

            $('#xx').val("");
            ue2.setContent("<p>请填写答案内容</p>");
        }
        function insertEdit() {
            //修改答案
            if(confirm("您确定要修改这个答案吗？"))
            {
                var xuanxiang = $('#xx2').val();
                var content = ue3.getContent();
                var editxx = $('#editxx').val();
                sessionStorage.setItem(xuanxiang,content);
                $("input[value="+editxx+"]").val(xuanxiang);
                // $('#sort').append("<input hidden class='asr_arr' name='asr_arr[]' value='"+xuanxiang+"'>");
                attachContext(".answer_"+xuanxiang);
                $('.answer_'+editxx).removeClass('answer_'+editxx).addClass('answer_'+xuanxiang);
                $('cc_'+editxx).removeClass('cc_'+editxx).addClass('cc_'+xuanxiang).html("已修改");
                $('xx_'+editxx).removeClass('xx_'+editxx).addClass('xx_'+xuanxiang).html(xuanxiang);
                ue3.setContent('<p>请填写答案内容</p>');
                setTimeout(function(){
                    $('.cc_'+xuanxiang).html("已添加");
                },2000);
            }else{
                return;
            }
        }
        $('#send_right').click(function(){
            $('.text').toggle();
            $('#loading').toggle();
            var asrNum = $('input[class=asr_arr]').length;
            var asr = [];
            var data_arr = {};

            for (var i = 0; i <asrNum; i++) {
                var asr_xx = $('input[class=asr_arr]:eq('+i+')').val();
                var asr_id = $('input[id='+asr_xx+']').val();
                if (typeof(asr_id) == 'undefined') {
                    var asrid = "0";
                }else{
                    var asrid = asr_id;
                }
                asr[asr_xx] = {"Id":asrid,"content":sessionStorage.getItem(asr_xx)};
                data_arr["asr["+asr_xx.replace("'","").replace('"',"")+"]"] = asr[asr_xx];//添加json字符串对
            };//添加答案进入json
            //题目名称
            //题目标题
            var title = ue.getContent();
            var ques_name = $('#name').val();
            if (ques_name == "") {
                ques_name = prompt("您尚未给这个题目拟定一个标题",title);
            };
            //题目类型
            var type = $('#ques_type').val();
            //是否公开
//            var isOpen = $('#isopen').is(':checked')?"1":"0";
            //题目标签
            var tag = $('#tag_input').val().replace("'","").replace('"',"").replace("，",",");
            var realasr = $('#realasr').val();
            var realrsn = $('#realrsn').val();
            data_arr["name"] = ques_name;
            data_arr["title"] = title;
            data_arr['type'] = type;
//            data_arr['isopen'] = isOpen;
            data_arr['tag'] = tag;//将配置加入json
            data_arr['realasr'] = realasr;
            data_arr['realrsn'] = realrsn;
            console.log(data_arr);
            var edit = $('#edit_id').val();
            if (typeof(edit)=="undefined") {
                var url2 = "ques/add";
            }else{
                var url2 = "function/addques.php?action=edit&Id="+$('#edit_id').val();
            }
            $.ajax({
                url:url2,
                type:"post",
                data:data_arr,
                success:function(result){
                    var data = jQuery.parseJSON(result);
                    $('.text').toggle();
                    $('#loading').toggle();
                    if (data.result=="1") {
                        alert("发布成功");
                    }else{
                        alert("发布失败")
                    }
                    $('#name').val("");
                    $('#ques_type').val("");
                    $('#tag_input').val("");
                    $('#sort').empty();
                    sessionStorage.clear();
                    ue.setContent("");
                }
            })
        })
        function attachContext(selector) {
            var val = $(selector).find("span").html();
//            console.log(val);
            context.attach(selector,[
                {header:'操作'},
                {
                    text:"查看/编辑",
                    action:function(e){
                        e.preventDefault();
                        var content = sessionStorage.getItem(val);

//                        $(".edui-body-container").css("width", "98%");//设置编辑器宽度
                        $('#xx2').val(val);
                        ue3.setContent(content);
                        $('#editxx').val(val);
                        $("#edit").modal();
                    }
                },{
                    text:"删除",
                    action:function(e){
                        e.preventDefault();
                        $(selector).remove();
                        sessionStorage.removeItem(val);
                        $("input[value="+val+"]").remove();
                    }
                }
            ])
        }
    </script>
    @endsection
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
                            <input type="text" id="xx2" placeholder="选项名" class="form-control" style="margin:15px 0;" disabled>
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