<?php session_start(); ?>
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
    <h3>个人信息</h3>
    <?php while ($loginInfo = $loginRe -> fetch()) {
        if(!empty($loginInfo['icon'])){
            $iconImg = $loginInfo['icon'];
        }else{
            $iconImg = "<span style='color: gray'>未上传头像</span>";
        }
        ?>
        <p>头像:<?php echo $iconImg; ?></p>
        <p>用户名: <?php echo $loginInfo['userName']; ?></p>
        <p>姓名: <?php echo $loginInfo['name']; ?></p>
        <p>手机: <?php echo $loginInfo['tel']; ?></p>
        <p><button type="submit" name="signUp"  style="color: blue">修改</button>
        </p>
    <?php } ?>
</body>
<script>

</script>
</html>