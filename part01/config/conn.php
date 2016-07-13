<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 15/9/29
 * Time: 19:27
 */
date_default_timezone_set("Asia/Shanghai");
//1.连接数据库服务器
$con = @mysql_connect("localhost","root");
//判断是否连接成功
if(!$con){
    echo "Database Connection  Error.";
    exit;
}else{
    //echo "Links successfully.";
}

//2.连接数据库表
mysql_select_db("personalVote");

//3.指定编码
mysql_query("set names utf8");

?>