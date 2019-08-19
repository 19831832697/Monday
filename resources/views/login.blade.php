<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/login_do" method="post">
    <p>
        用户名：<input type="text" name="user_name" id="user_name">
    </p>
    <p>
        密码：<input type="password" name="user_pwd" id="user_pwd">
    </p>
    <p>
        <input type="button" id="btn" value="登录">
    </p>
</form>
</body>
</html>
<script src="js/jquery.js"></script>
<script>
    $('#btn').click(function () {
        var user_name = $('#user_name').val();
        var user_pwd = $('#user_pwd').val();
        var data = {};
        data.user_name = user_name;
        data.user_pwd = user_pwd;
        $.ajax({
            url:"/login_do",
            method:"POST",
            data:data,
            dataType:"JSON",
            success:function(res){
                if(res.code == 0){
                    alert(res.msg);
                    window.location.href="wel";
                }else if(res.code == 1){
                    alert(res.msg);
                }
            }
        })
    })
</script>