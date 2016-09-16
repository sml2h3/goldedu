<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Ques;
use App\Http\Model\Asr;
use App\Http\Model\Tag;
use App\Http\Model\TagList;
class QuesController extends CommonController
{
    //
    public function quesAction($action){
        switch ($action){
            case 'add':
                //待处理的数据
                $asr_Array = Input::get('asr');
                $name = Input::get('name');
                $title = Input::get('title');
                $tag = Input::get('tag');
                $realasr = Input::get('realasr');
                $realrsn = Input::get('realrsn');
                $type = Input::get('type');
                //处理数据
                $ques = array(
                    "qs_title" => $title,
                    "qs_name" => $name,
                    "qs_type" =>$type,
                    "qs_status" => "1",
                    "qs_owner" => session('username'),
                    "qs_addtime" => time(),
                    "qs_edittime" => time(),
                    "realasr" => $realasr,
                    "realrsn" => $realrsn
                );
                $Id = Ques::insertGetId($ques);
                //答案处理
                foreach($asr_Array as $xx => $cc){
                    $array = array(
                        "asr_name" => $xx,
                        "asr_content" => $cc['content'],
                        "asr_parent" => $Id
                    );
                    Asr::insert($array);
                }
                //处理标签
                $tag_list = explode(",",$tag);
                $tagid = array();
                foreach ($tag_list as $i => $item){
                    //如果之前已经存在这个标签,则获取标签的Id,如果不存在,则获取插入后的Id,然后存入tid数组统一保管
                    $result = Tag::where("tagname",$item)->first();
                    if ($result == null){
                        $array = array(
                            "tagname" => $item
                        );
                        $tid = Tag::insertGetId($array);
                    }else{
                        $tid = $result->Id;
                    }
                    $tagid[] = $tid;
                }
                foreach ($tagid as $i => $tid){
                    $taglist = array(
                        "qtnId" => $Id,
                        "tagId" => $tid
                    );
                    TagList::insert($taglist);
                }
                $back = array(
                    "result" => "200",
                    "reason" => "成功"
                );
                return json_encode($back,JSON_UNESCAPED_UNICODE);
                break;
        }
    }
}
