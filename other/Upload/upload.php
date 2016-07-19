<?php
/**
 * Author: http://hizip.net
 * Date: 16/7/19
 * Time: 15:23
 */
include_once 'upload.func.php';
$fileInfo = $_FILES['uploadFile'];//文件信息放入$fileInfo
$uploadFIle = upload($fileInfo);
echo $uploadFIle['status'];