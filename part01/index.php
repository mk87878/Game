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
<form action="" method="post">
    <h3>注册</h3>
    <p>用户名: <input type="text" name="userName" placeholder=""><span>仅支持邮箱作为用户名</span></p>
    <p>姓名: <input type="text" name="name" placeholder=""><span>仅支持字母</span></p>
    <p>手机: <input type="text" name="tel" placeholder=""><span>11位数字</span></p>
    <p>密码: <input type="text" name="passWord" placeholder=""><span>8个或以上,不重复字符数字和字母</span></p>
    <p><button type="submit" name="signUp">注册</button></p>
</form>
</body>
</html>