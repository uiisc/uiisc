themeSelectorInit('theme-selector');

$(".language-change-click").click(function (x) {
    // console.log('language-change-click');
    change_language(x.target.dataset.language);
})

if (document.getElementsByName("jump-ifastnet").length) {
    document.getElementsByName("jump-ifastnet")[0].onclick = function (x) {
        jumpLink("https://ifastnet.com/portal/aff.php?aff=" + ifastnet_aff, null, "_target");
        x.preventDefault();
        x.stopPropagation();
    };
}

function change_language(lang) {
    setCookie('lang', lang, 10, '/', site_domain, false);
    // console.log(cur_lang, lang);
    if (cur_lang != lang) {
        // console.log('to reload after changed');
        window.location.href = window.location.href;
    }
}

function jumpLink(action, params, target) {
    var fm = document.createElement("form");
    var params = params || {};
    fm.action = action;
    fm.method = "post";
    fm.target = target || "";
    fm.style.display = "none";
    for (var x in params) {
        var opt = document.createElement("input");
        opt.name = x;
        opt.value = params[x];
        fm.appendChild(opt);
    }
    document.body.appendChild(fm);
    fm.submit();
    document.body.removeChild(fm); // remove form after submit
}

/**
 * 设置 Cookie
 * @param {string} name 字段
 * @param {string} value 值
 * @param {string|number} expires 时长,单位天
 * @param {string} path 路径
 * @param {string} domain 域名
 * @param {string} secure
 */
function setCookie(name, value, expires, path, domain, secure) {
    var today = new Date();
    today.setTime(today.getTime());
    if (expires) {
        expires = expires * 1000 * 60 * 60 * 24;
    }
    var expires_date = new Date(today.getTime() + (expires));
    document.cookie = name + '=' + escape(value) +
        ((expires) ? ';expires=' + expires_date.toGMTString() : '') + //expires.toGMTString()
        ((path) ? ';path=' + path : '') +
        ((domain) ? ';domain=' + domain : '') +
        ((secure) ? ';secure' : '');
}