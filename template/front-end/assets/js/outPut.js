/**
 * Created by wanqianjun on 16/8/8.
 */

$(function () {
    var LS = readLS();
    $(".right-box").droppable({
        tolerance: "pointer",
        drop: function (event, ui) {
            $(".over").remove();
            var key = $(ui.draggable[0]).find(".LSkey").html();
            var addTime = LS[key].addTime;
            addTime = new Date(addTime).toLocaleString();
            var name = LS[key].title;
            var content = LS[key].content;
            var answer = LS[key].answer;
            var analyze = LS[key].analyze;
            var contentStr = "";
            var str = "";
            $.each(content, function (i, n) {
                contentStr += "<div class='col-md-4 col-xs-12'><h5 style='font-weight:bold'>" + n.xuhao + "</h5><hr><div>" + n.content + "</div></div>";
            });
            console.log(LS[key].type);
            switch (LS[key].type) {
                case 0:
                    str = '题目已关闭';
                    break;
                case 1:
                    str = '<div class="each-box"> <div class="box-head"> <div class="name">' + name + '</div> </div> <div class="content">' + contentStr + '</div> <div class="answer">' + answer + '</div><div class="analyze">' + analyze + '</div><div class="remove" onclick="removeEach(event)"><span class="glyphicon glyphicon-remove-sign"></span></div></div>';
                    break;
                case 2:
                    str = '<div class="each-box"> <div class="box-head"> <div class="name">' + name + '</div><span class="underline"></span>  </div> <div class="content">' + contentStr + '</div><div class="answer">' + answer + '</div><div class="analyze">' + analyze + '</div> <div class="remove" onclick="removeEach(event)"><span class="glyphicon glyphicon-remove-sign"></span></div></div>';
                    break;
                case 3:
                    str = '<div class="each-box"> <div class="box-head"> <div class="name">' + name + '</div> </div> <div class="content">' + contentStr + '</div><div class="answer">' + answer + '</div><div class="analyze">' + analyze + '</div> <div class="remove" onclick="removeEach(event)"><span class="glyphicon glyphicon-remove-sign"></span></div></div>';
                    break;
            }
            $(".right-box").append(str);
        },
        over: function (event, ui) {
            var key = $(ui.draggable[0]).find(".LSkey").html();
            var addTime = LS[key].addTime;
            addTime = new Date(addTime).toLocaleString();
            var name = LS[key].title;
            var content = LS[key].content;
            var contentStr = "";
            var str = "";
            $.each(content, function (i, n) {
                contentStr += "<div class='col-md-4 col-xs-12'><h5 style='font-weight:bold'>" + n.xuhao + "</h5><hr><div>" + n.content + "</div></div>";
            });
            console.log(LS[key].type);
            switch (LS[key].type) {
                case 0:
                    str = '题目已关闭';
                    break;
                case 1:
                    str = '<div class="each-box over"> <div class="box-head"> <div class="name">' + name + '</div><div class="addTime">' + addTime + '</div> </div> <div class="content">' + contentStr + '</div> <div class="remove" onclick="removeEach(event)"><span class="glyphicon glyphicon-remove-sign"></span></div></div>';
                    break;
                case 2:
                    str = '<div class="each-box over"> <div class="box-head"> <div class="name">' + name + '</div><span class="underline"></span> <div class="addTime">' + addTime + '</div> </div> <div class="content">' + contentStr + '</div> <div class="remove" onclick="removeEach(event)"><span class="glyphicon glyphicon-remove-sign"></span></div></div>';
                    break;
                case 3:
                    str = '<div class="each-box over"> <div class="box-head"> <div class="name">' + name + '</div><div class="addTime">' + addTime + '</div> </div> <div class="content">' + contentStr + '</div> <div class="remove" onclick="removeEach(event)"><span class="glyphicon glyphicon-remove-sign"></span></div></div>';
                    break;
            }
            $(".right-box").append(str);
        },
        out: function () {
            $(".over").fadeOut();
        },
        accept: ".left-box div"
    }).sortable({
        revert: true
    });
    $(".left-box div").draggable({
        scroll: false,
        revert: true,
    });
});

function readLS() {
    var LS = jQuery.parseJSON(localStorage.saves);
    $.each(LS, function (key, val) {
        $(".left-box").append("<div>" + val.name + "<span class='LSkey'>" + key + "</span></div>");
    });
    return LS;
}

function removeEach(e) {
    $(e.toElement).parent().parent().fadeOut();
}

function save2word() {
    $(".remove").toggle();
    $(".each-box").css({
        border: "none"
    });
    $(".right-box").tableExport({
        type: 'doc',
        escape: 'false'
    });
    setTimeout(function () {
        $(".each-box").css({
            border: "1px dashed #e7e7e7"
        });
        $(".remove").toggle();
    }, 500);

    localStorage.removeItem("saves");
}

function save2img() {
    $(".remove,.answer,.analyze").toggle();

    $(".right-box").tableExport({
        type: 'png',
        escape: 'false'
    });
    $(".each-box").css({
        border: "none"
    });
    setTimeout(function () {
        $(".each-box").css({
            border: "1px dashed #e7e7e7"
        });
        $(".remove,.answer,.analyze").toggle();

    }, 500);

    localStorage.removeItem("saves");
}

function save2imgwithAnswer() {
    $(".remove").toggle();
    $(".right-box").tableExport({
        type: 'png',
        escape: 'false'
    });
    $(".each-box").css({
        border: "none"
    });
    setTimeout(function () {
        $(".each-box").css({
            border: "1px dashed #e7e7e7"
        });
        $(".remove").toggle();
    }, 500);

    localStorage.removeItem("saves");
}
function removeAlert(e) {
    $(e.toElement).parentsUntil(".box").parent().parent().fadeOut();
}