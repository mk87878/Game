<?php
/**
 * Author: http://hizip.net
 * Date: 16/7/19
 * Time: 15:12
 */

$fileInfo = $_FILES['uploadFile'];//文件信息放入$fileInfo
function upload($fileInfo,$imgFlag = true,$allowExt = array('jpeg','jpg','gif','png'),$maxSize = 2097152,$uploadPath = 'uploads'){
    //判断文件上传错误信息
    if($fileInfo['error'] > 0){//当错误信息为0时,为上传成功
        switch($fileInfo['error']){
            case 1:
                $msg = "上传文件超过PHP配置文件中的值";
                break;
            case 2:
                $msg = "超过表单MAX_FILE_SIZE限制文件大小";
                break;
            case 3:
                $msg = "文件部分被上传";
                break;
            case 4:
                $msg = "没有选择上传文件";
                break;
            case 6:
                $msg = "未找到上传临时目录";
                break;
            case 7:
            case 8:
                $msg = "系统错误";
                break;
        }
        exit($msg);//输出错误信息
    }

    //检测文件是否为真实图片文件
//    $imgFLag = true;//规定是否打开真实图片检测功能
    if($imgFlag){
        if(!getimagesize($fileInfo['tmp_name'])){
            exit('非真实图片类型');
        }
    }

    $ext = pathinfo($fileInfo['name'],PATHINFO_EXTENSION);//获取文件文件类型（文件后缀）
//    $allowExt = array('jpeg','jpg','gif','png');//被允许的格式
    //检测文件上传类型
    if(!in_array($ext,$allowExt)){//in_array检测数组内是否含有相应内容,返回TRUE|FALSE
        exit('非法文件类型');
    }

//    $maxSize = 2097152;//2M
    //检测上传文件大小
    if($fileInfo['size'] > $maxSize){
        exit('上传文件过大');
    }

    //检测是否为http post方式上传
    if(!is_uploaded_file($fileInfo['tmp_name'])){
        exit('文件不是通过http post方式上传');
    }

//    $uploadPath = 'uploads';//上传文件目录
    //检测上传文件目录是否存在
    if(!file_exists($uploadPath)){
        mkdir($uploadPath,0777,true);//创建文件
        chown($uploadPath,0777);//配置权限
    }
    $uniName = md5(uniqid(microtime(true),true)).'.'.$ext;//生成一个唯一的文件名
    $destination = $uploadPath.'/'.$uniName;//保存文件的具体目录
    //移动保存文件
    if(@!move_uploaded_file($fileInfo['tmp_name'],$destination)){
        exit('文件保存错误');
    }
    $uploadStatus = 1;
    return array(
        'newName' => $uniName,
        'size' => $fileInfo['size'],
        'status' => $uploadStatus,
        'type' => $fileInfo['type']

    );
}