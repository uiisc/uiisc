jQuery.i18n.properties({
    name: 'lang',
    path: './locales/',
    mode: 'both',
    // language: 'zh_CN',
    checkAvailableLanguages: true,
    async: true,
    callback: function () {
        $("[data-i18n]").each(function () {
            var elem = $(this),
                localizedValue = jQuery.i18n.map[elem.data("i18n")];
            if (elem.is("input[type=text]") || elem.is("input[type=password]") || elem.is("input[type=email]")) {
                elem.attr("placeholder", localizedValue);
            } else if (elem.is("input[type=button]") || elem.is("input[type=submit]")) {
                elem.attr("value", localizedValue);
            } else {
                elem.text(localizedValue);
            }
        });
    }
});
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