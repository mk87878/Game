<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册与登录</title>
    <style>
        p span{
            color: #ee281d;
            font-size: 62.5%;
            padding-left: 10px;
        }
    </style>
</head>

<?php
include_once 'config/config.php';

?>

<body>
<form action="" method="post">
    <h3>注册</h3>
    <p>用户名: <input type="text" name="userName" placeholder=""><span>仅支持邮箱作为用户名</span></p>
    <p>姓名: <input type="text" name="name" placeholder=""><span>仅支持字母</span></p>
    <p>手机: <input type="text" name="tel" placeholder=""><span>11位数字</span></p>
    <p>密码: <input type="text" name="passWord" placeholder=""><span>8个或以上,不重复字符数字和字母</span></p>
    <p><button>注册</button></p>
</form>
</body>
</html>