<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册与登录</title>
    <style>
        form p span{
            color: #ee281d;
            font-size: 62.5%;
            padding-left: 10px;
        }
        #signUp{
            display: none;
        }
    </style>
    <script src="js/jquery-1.11.0.js"></script>
</head>

<?php
include_once 'config/config.php';//连接数据库
/**
 * 注册
 */
if(isset($_POST['signUp'])){//当获取到注册提交动作
    $userName = $_POST['userName'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $passWord = md5($_POST['passWord']);//获取所有提交的信息
    $sql = "INSERT INTO users (userName,name,tel,passWord) VALUES ('$userName','$name','$tel','$passWord')";//sql插入语句
    $result = $db -> query($sql);
    $row = $result -> rowCount();
    if($row){
        echo "<script>alert('注册成功');location.href='index.php';</script>";
    }else{
        echo "<script>alert('注册失败');history.back();</script>";
    }
}
/**
 *
 * 登录
 */
if(isset($_POST['signIn'])){//当获取登录到提交动作
    $userName = $_POST['userName'];
    $passWord = md5($_POST['passWord']);//获取所有提交的信息
    $sql = "SELECT * FROM users WHERE userName = '$userName' AND passWord = '$passWord'";//sql插入语句
    $result = $db -> query($sql);
    $row = $result -> rowCount();
    if($row){
        $_SESSION['loginUser'] = $userName;
        echo "<script>alert('登录成功');location.href='profile.php';</script>";
    }else{
        echo "<script>alert('登录失败');history.back();</script>";
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
    <p><button type="submit" name="signUp"  style="color: blue">注册</button>
        <button type="button" name="signIn" style="color: #28af43">登录</button>
    </p>
</form>
<form action="" id="signIn" method="post">
    <h3>登录</h3>
    <p>用户名: <input type="text" name="userName" placeholder="邮箱"><span></span></p>
    <p>密码: <input type="password" name="passWord" placeholder=""><span> </span></p>
    <p><button type="submit" name="signIn"  style="color: #28af43">登录</button>
        <button type="button" name="signUp" style="color: blue">注册</button>
    </p>
</form>
</body>
<script>
    /**
     * 登录注册切换按钮
     */
    $('button[name="signUp"]').click(function(){
        $('#signUp').show();
        $('#signIn').hide();
    });
    $('button[name="signIn"]').click(function(){
        $('#signIn').show();
        $('#signUp').hide();
    });
    
    /**
     *注册表单验证
     */
    $('#signUp').submit(function() {
//        获取输入框的值
        var userName = $('#signUp input[name="userName"]').val();
        var name = $('#signUp input[name="name"]').val();
        var tel = $('#signUp input[name="tel"]').val();
        var passWord = $('#signUp input[type="Password"]').val();
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
            if(checkRepeat.test(passWord)){
                alert("密码不可以有重复字符数字和字母");
                return false;
            }
        }

        if(!checkTel.test(tel)){
            alert("请输入正确的11位手机号");
            return false;
        }
    });
    /**
     *登录表单验证
     */
    $('#signIn').submit(function() {
//        获取输入框的值
        var userName = $('#signIn input[name="userName"]').val();
        var passWord = $('#signIn input[type="Password"]').val();
//        正则表达式检测
        var checkUserName = /^[a-zA-Z0-9\-]+@\w+(\.\w+)+$/;
        var checkPassWord = /^[a-zA-Z0-9]{8,100}$/;
        var checkRepeat = /(.).*\1/g;//重复内容检测
//        判断是否输入内容是否符合要求
        if(!checkUserName.test(userName)){
            alert("用户名输入错误,用户名应该为邮箱!");
            return false;
        }
        if(!checkPassWord.test(passWord)) {
            alert("密码错误");
            return false;
        }else{
            if(checkRepeat.test(passWord)){
                alert("密码错误");
                return false;
            }
        }
    });
</script>
</html>