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
    <script src="js/jquery-1.11.0.js"></script>
</head>

<?php
include_once 'config/config.php';//连接数据库
if(isset($_POST['signUp'])){//当获取到提交动作
    $userName = $_POST['userName'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $passWord = md5($_POST['passWord']);//获取所有提交的信息
    $sql = "INSERT INTO users (userName,name,tel,passWord) VALUES ('$userName','$name','$tel','$passWord')";//sql插入语句
    $result = $db -> query($sql);
    $row = $result -> rowCount();
    if($row){
        echo "<script>alert('注册成功');location.href='xxx.php';</script>";
    }else{
        echo "<script>alert('注册失败');history.back();</script>";
    }
}
?>

<body>
<form action="" id="signUp" method="post">
    <h3>注册</h3>
    <p>用户名: <input type="text" name="userName" placeholder=""><span>仅支持邮箱作为用户名</span></p>
    <p>姓名: <input type="text" name="name" placeholder=""><span>仅支持字母</span></p>
    <p>手机: <input type="text" name="tel" placeholder=""><span>11位数字</span></p>
    <p>密码: <input type="password" name="passWord" placeholder=""><span>8个或以上,不重复字符数字和字母</span></p>
    <p><button type="submit" name="signUp">注册</button></p>
</form>
</body>
<script>
    $('#signUp').submit(function() {
//        获取输入框的值
        var userName = $('input[name="userName"]').val();
        var name = $('input[name="name"]').val();
        var tel = $('input[name="tel"]').val();
        var passWord = $('input[type="Password"]').val();
//        正则表达式检测
        var checkUserName = /^[a-zA-Z0-9\-]+@\w+(\.\w+)+$/;
        var checkName = /[a-zA-Z]/;
        var checkTel = /^[0-9]{11}$/;
        var checkPassWord = /^[a-zA-Z0-9]{8,100}$/;
        var checkRepeat = /(.).*\1/g;//重复内容检测
//        判断是否输入内容是否符合要求
        if(!checkUserName.test(userName)){
            alert("仅支持邮箱作为用户名");
            return false;
        }
        if(!checkName.test(name)){
            alert("仅支持字母作为姓名");
            return false;
        }
        if(!checkPassWord.test(passWord)) {
            alert("8个或以上,不重复字符数字和字母");
            return false;
        }else{
            if(!checkRepeat.test(passWord)){
                alert("8个或以上,不重复字符数字和字母");
                return false;
            }
        }
        if(!checkTel.test(tel)){
            alert("请输入正确的11位手机号");
            return false;
        }
    });
</script>
</html>