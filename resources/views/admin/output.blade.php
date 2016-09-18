@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{asset('assets/css/outPut.css')}}">
    <body class="out-put page-body skin-white">
    @endsection
@section('content1')
    <header>
        <div class="logo">
            金考卷系统
        </div>
    </header>
    <div class="main-box">
        <div class="left">
            <div class="left-box">

            </div>
            <div class="alert-box">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">提示</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-danger" onclick="removeAlert(event)"><i class="fa-close"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        将题目拖至右边编辑
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="right-box">
            </div>
            <div class="alert-box">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">提示</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-danger" onclick="removeAlert(event)"><i class="fa-close"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        编辑区可以自由拖动来改变题目的顺序
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <button class="btn btn-info btn-icon" onclick="save2word()">保存为word</button>
        <button class="btn btn-info btn-icon" onclick="save2img()">保存为图片</button>
        <button class="btn btn-info btn-icon" onclick="save2imgwithAnswer()">保存为图片(带答案)</button>
    </footer>
    <script src="{{asset('assets/js/outPut.js')}}"></script>
    <script src="{{asset('assets/js/wordExport.js')}}"></script>
    <script src="{{asset('assets/js/html2canvas.min.js')}}"></script>
    <script src="{{asset('assets/js/mybase.js')}}"></script>
    @endsection
