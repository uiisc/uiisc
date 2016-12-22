function turnPage(url) {
    $.ajax({
        url: url,
        cache: false,
        success: function (html) {
            $("#content").html(html);
        },
        error: function () {
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                dataType: "jsonp",
                jsonp: "callback", // 传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
                jsonpCallback: "success_jsonpCallback", // 自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
                success: function (html) {
                    $("#content").html(html);
                },
                error: function () {
                    alert('fail');
                }
            });
        }
    });
}