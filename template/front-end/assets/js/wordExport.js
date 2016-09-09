/**
* Required by Vanny on 2016-08-05
* Reference：tableExport.js
* Source：https://github.com/kayalshri/tableExport.jquery.plugin
*/
 
(function($){
    $.fn.extend({
        tableExport: function(options) {
            var defaults = {
                separator: ',',
                ignoreColumn: [],
                tableName:'TableName',
                filename:'filename',
                type:'img',
                escape:'true',
                htmlContent:'false',
            };
 
            var options = $.extend(defaults, options);
            var el = this;
 
            if(defaults.type == 'doc'){
                console.log($(this).html());
                var word = $(this).html();
                var file = "";
                file += "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:"+defaults.type+"' xmlns='http://www.w3.org/TR/REC-html40'>";
                file += "<head>";
                file += "<!--[if gte mso 9]>";
                file += "<xml>";
                file += "<x:ExcelWorkbook>";
                file += "<x:ExcelWorksheets>";
                file += "<x:ExcelWorksheet>";
                file += "<x:Name>";
                file += "{worksheet}";
                file += "</x:Name>";
                file += "<x:WorksheetOptions>";
                file += "<x:DisplayGridlines/>";
                file += "</x:WorksheetOptions>";
                file += "</x:ExcelWorksheet>";
                file += "</x:ExcelWorksheets>";
                file += "</x:ExcelWorkbook>";
                file += "</xml>";
                file += "<![endif]-->";
                file += "</head>";
                file += "<body>";
                file += word;
                file += "</body>";
                file += "</html>";
                var base64data = "base64," + $.base64({ data: file, type: 0 });
                
                window.open('data:application/msword;filename=' + defaults.filename + '.' + defaults.type+';' + base64data);
                
            }else if(defaults.type == 'png'){
                html2canvas($(el), {
                    onrendered: function(canvas) {
                        var img = canvas.toDataURL("image/png");
                        window.open(img); 
                    }
                });
            }
        }
    });
})(jQuery);