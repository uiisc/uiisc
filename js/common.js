var ifastnet_aff = 19474;


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