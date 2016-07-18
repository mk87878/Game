<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息</title>
    <style>
        form p span{
            color: #ee281d;
            font-size: 62.5%;
            padding-left: 10px;
        }
        #profile{
            display: none;
        }
    </style>
    <script src="js/jquery-1.11.0.js"></script>
</head>

<?php
include_once 'config/config.php';//连接数据库
/**
 *
 * 显示用户信息
 */
$loginName = $_SESSION['loginUser'];
$loginSql = "SELECT * FROM users WHERE userName = '$loginName' ";
$loginRe = $db -> query($loginSql);


/**
 * 修改信息
 */

?>

<body>
<!--个人信息显示-->
<?php while ($loginInfo = $loginRe -> fetch()) {
    $iconImg = isset($loginInfo['icon']) ? $loginInfo['icon'] : "<span style='color: gray'>未上传头像</span>";
    ?>
    <div id="profileShow">
        <h3>个人信息</h3>
        <p>头像:<?php echo $iconImg; ?></p>
        <p>用户名:<?php echo $loginInfo['userName']; ?></p>
        <p>姓名: <?php echo $loginInfo['name']; ?></p>
        <p>手机: <?php echo $loginInfo['tel']; ?></p>
        <p>密码: **************</p>
        <p><button type="submit" id="edit"  style="color: blue">修改个人信息</button></p>
    </div>

<!--个人信息修改-->
    <form action="" id="profile" method="post">
        <h3>个人信息修改</h3>
        <p>头像: <input type="file" name="icon"></p>
        <p>用户名: <input type="text" name="userName" placeholder="" value="<?php echo $loginInfo['userName']; ?>"><span>仅支持邮箱作为用户名</span></p>
        <p>姓名: <input type="text" name="name" placeholder="" value="<?php echo $loginInfo['name']; ?>"><span>仅支持字母</span></p>
        <p>手机: <input type="text" name="tel" placeholder="" value=" <?php echo $loginInfo['tel']; ?>"><span>11位数字</span></p>
        <p>密码: <input type="password" name="passWord" placeholder=""><span>8个或以上,不重复字符数字和字母</span></p>
        <p><button type="submit" name="profileEdit"  style="color: blue">确认修改</button>
            <button type="button" id="cancel" style="color: #28af43">返回</button>
        </p>
    </form>
<?php } ?>

</body>

<script>

    /**
     * 登录注册切换按钮
     */
    $('#edit').click(function(){
        $('#profileShow').hide();
        $('#profile').show();
    });
    $('#cancel').click(function(){
        $('#profileShow').show();
        $('#profile').hide();
    });

    /**
     *修改个人信息表单验证
     */
    $('#profile').submit(function() {
//        获取输入框的值
        var userName = $('#profile input[name="userName"]').val();
        var name = $('#profile input[name="name"]').val();
        var tel = $('#profile input[name="tel"]').val();
        var passWord = $('#profile input[type="Password"]').val();
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
</script>
</html>