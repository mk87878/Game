<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息</title>
    <style>

    </style>
    <script src="js/jquery-1.11.0.js"></script>
</head>

<?php
include_once 'config/config.php';//连接数据库
/**
 * 修改信息
 */

?>

<body>
    <h3>个人信息</h3>
    <p>用户名:</p>
    <p>姓名: </p>
    <p>手机: <input type="text" name="tel" placeholder=""><span>11位数字</span></p>
    <p><button type="submit" name="signUp"  style="color: blue">注册</button>
        <button type="button" name="signIn" style="color: #28af43">登录</button>
    </p>

</body>
<script>

</script>
</html>