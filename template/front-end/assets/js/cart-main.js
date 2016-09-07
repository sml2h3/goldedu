/**
 * Created by wanqianjun on 16/8/5.
 */

$(function () {
    bindCart();
    cartInI();
    setCartTittle();
});
function bindCart() {
    $(".cart-fixed").click(function () {
        $(this).css({
            "cursor": "default"
        });
        $(".cart-main").css({
            height:"300px",
            "max-height":"inherit",
            "borderTop": "1px solid #333"
        });
        $(".cart-fixed .bottom").css({
            "height": "30px",
            "borderTop": "1px solid #333"
        });
        $(".cart-fixed .right").fadeOut(500);
        $(".cart-fixed .right-open").fadeIn(500);
        $(this).off("click");
    });
    $(".cart-fixed .right-open").click(function () {
        $(".cart-fixed").css({
            "cursor": "pointer"
        });
        $(".cart-main").css({
            "height": "0px",
            "borderTop": "1px solid transparent"
        }).on("transitionend", function () {
            $(".cart-fixed").click(function () {
                $(this).css({
                    "cursor": "default"
                });
                $(".cart-main").css({
                    height:"300px",
                    "max-height":"inherit",
                    "borderTop": "1px solid #333"
                });
                $(".cart-fixed .bottom").css({
                    "height": "30px",
                    "borderTop": "1px solid #333"
                });
                $(".cart-fixed .right").fadeOut(500);
                $(".cart-fixed .right-open").fadeIn(500);
                $(this).off("click");
                $(".cart-main").off("transitionend");
            });
        });
        $(".cart-fixed .bottom").css({
            "height": "0",
            "borderTop": "1px solid transparent"
        });
        $(".cart-fixed .right").fadeIn(500);
        $(".cart-fixed .right-open").fadeOut(500);
    });
}
function addToCart(id, event) {
    addItems($("#item-" + id + " .item-tittle").html(),id);
    saveInfo(id);
    $(event.target).attr("disabled", "disabled").html("已添加进待选区");
    function getLeft(e){
        var offset=e.offsetLeft;
        if(e.offsetParent!=null) offset+=getLeft(e.offsetParent);
        return offset;
    }
}
function cartInI() {
    var LS = jQuery.parseJSON(localStorage.saves);
    $.each(LS,function (key,val) {
        var tittle = val.name;
        var Id = val.Id;
        var num = $(".cart-main ul").children().length + 1;
        var model = '<li><div class="No">' + num + '.</div><div class="tittle">' + tittle + '</div><div hidden class="Id">'+ Id +'</div><div class="remove" onclick="removeThis(event)"><i class="fa-remove">&#xe670;</i></div></li>';
        $("#cart-items").append(model);
    });

}
function addItems(tittle,Id) {
    var alreadyExist = false;
    $("#cart-items .Id").each(function () {
        if($(this).html() == Id){
            alreadyExist = true;
        }
    });
    if(alreadyExist){
        return;
    }
    var num = $(".cart-main ul").children().length + 1;
    var model = '<li><div class="No">' + num + '.</div><div class="tittle">' + tittle + '</div><div hidden class="Id">'+ Id +'</div><div class="remove" onclick="removeThis(event)"><i class="fa-remove"></i></div></li>';
    $("#cart-items").append(model);
    setCartTittle();
}
function setCartTittle() {
    var num = $(".cart-main ul").children().length;
    if (num != 0) {
        $(".cart-fixed .right").html("您的待选区有" + num + "份题目");
    }
}
function removeThis(e) {
    var Id = parseInt($(e.target).parent().parent().find(".Id").html());
    var LS = jQuery.parseJSON(localStorage.saves);
    var theKey;
    $.each(LS, function (key, val) {
        if (val.Id == Id) {
            theKey = key;
        }
    });
    if(theKey != "undefined"){
        LS.splice(theKey, 1);
    }
    localStorage.saves = JSON.stringify(LS);
    $(e.target).parent().parent().fadeOut();
}
function saveInfo(id) {
    $.ajax({
        url: "function/cloud.php?action=read&Id=" + id,
        success: function (result) {
            var data = jQuery.parseJSON(result);
            // console.log(data);
            var localSaveObj = {
                Id:data.ques.Id,
                name: data.ques.name,
                title:data.ques.title,
                // addTime: data.ques.addtime,
                content: data.asr,
                type:data.ques.type,
                answer:data.ques.realasr,
                analyze:data.ques.realrsn
            };
            var LS = localStorage.getItem("saves");
            if (LS == null) {
                LS = [];
            } else {
                LS = jQuery.parseJSON(LS)
            }
            var alreadyExist = 0;
            $.each(LS, function (key, val) {
                if (val.Id == localSaveObj.Id) {
                    alreadyExist = 1;
                    // console.log("already")
                }
            });
            if (!alreadyExist) {
                LS.push(localSaveObj);
            }
            localStorage.saves = JSON.stringify(LS);
        }
    })
}

function goToEdit() {
    var ids = [];
    var LS = $.parseJSON(localStorage.saves);
    $.each(LS,function (key,val) {
        ids.push(val.Id);
    });
    console.log(ids);
    $.ajax({
        url:"function/record.php?action=set",
        type:"post",
        data:{
            record:ids
        },
        success:function (data) {
            location.href = "outPut.html"
        }
    });
}

function collect(id){
    $.ajax({
        url:"function/cloud.php?action=collect&Id="+id,
        success:function(result){
            var data = jQuery.parseJSON(result);
            if (data.result == "1") {
                alert("添加收藏成功");
            }else{
                alert("添加收藏失败");
            }
        }
    });

}
// function getinfo(id){
//     $.ajax({
//         url:"function/cloud.php?action=read&Id="+id,
//         success:function(result){
//             var data = jQuery.parseJSON(result);
//             var ques = data.ques;
//             var asr = data.asr;
//             var title = ques.title;
//             var name = ques.name;
//             var type = ques.type;
//             var usenum = ques.usenum;
//             var ownerId = ques.ownerId;
//             var addtime = ques.addtime;
//             var str ="";
//             var gold = ques.gold;
//             if (type=="1") {
//                 type = "选择题";
//             }else if (type=="2") {
//                 type = "填空题";
//             }else{
//                 type = "客观题";
//             }
//             var info = "题型： "+type+ "   使用量: "+usenum+ "   添加时间： "+getLocalTime(addtime)+"   评分："+gold;
//             $('#quesname').html(name);
//             $('#info').html(info);
//             $('#owner').html(ownerId);
//             $('#questitle').html(title);
//             $.each(asr,function(i,n){
//                 str += "<div class='col-md-4 col-xs-12'><h5 style='font-weight:bold'>"+n.xuhao+"</h5><hr><div>"+n.content+"</div></div>";
//             })
//             $('#asr').html(str);
//             $('#readQues').modal({
//                 keyboard: false
//             });
//
//         }
//     })
// }
