// admin
function logout() {
    layer.confirm('确定退出登录 ？', {
        icon: 3,
        btn: ['确定', '取消']
    }, function() {
        var ii = layer.load(2);
        $.ajax({
            type: 'POST',
            url: 'api/logout.php',
            dataType: 'json',
            success: function(data) {
                layer.close(ii);
                if (data.code == 0) {
                    layer.msg('退出登录成功');
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 2000);
                } else {
                    layer.alert(data.msg, {
                        icon: 2
                    });
                }
            },
            error: function(data) {
                layer.close(ii);
                layer.msg('服务器错误');
            }
        });
    });
}
