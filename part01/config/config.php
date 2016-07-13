
    <?php
    /**
     * Created by PhpStorm.
     * User: zhangmingwen
     * Date: 15/9/29
     * Time: 19:27
     */
    date_default_timezone_set("Asia/Shanghai");//时区

    $dsn = 'mysql:dbname=personalVote;host=127.0.0.1';//定义数据源
    $user = 'root';//用户名
    $passWord = '';//密码
    try{
        $db = new PDO($dsn, $user,$passWord);//连接数据库
        $db -> query('set names utf8');//设置编码
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置关联索引获取数据集的时候，关联索引是大写还是小写,不设置就为默认
    }
    catch(PDOException $e){
        die("Error:".$e -> getMessage());
    }


      //测试
//    $re = $db -> query('SELECT * FROM userInfo');
//    $re -> setFetchMode(PDO::FETCH_ASSOC);//setFetchMode设置获取结果集的返回值的类型,当前设置为关联数组类型,为减少服务器资源损耗
//    $result = $re -> fetchAll();
//    echo "<pre>";//格式化数组
//    print_r($result);
    ?>

