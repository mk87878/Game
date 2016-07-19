<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件上传</title>
</head>

<?php
/**
 * Author: http://hizip.net
 * Date: 16/7/19
 * Time: 15:09
 */

?>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    选择文件: <input type="file" name="uploadFile"><br/>
    <button type="submit" name="upload">上传</button>
</form>
</body>
</html>