<?php
$file_data = $_FILES["upfile"]["tmp_name"];
//$destination = "./upload/test.jpg";
$destination = "./upload/" . $_FILES["upfile"]["name"];
$msg = "";
if ( move_uploaded_file( $file_data, $destination ) ) {
//chmod($destination, 0777);
$msg .= <<< END
<p>{$_FILES["upfile"]["name"]}をアップロードしました。</p>
<a href="./uploader.html">戻る</a>
END;
} else {
$msg .= <<< END
<p>ファイルをアップロードできません。</p>
<a href="./uploader.html">戻る</a>
END;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../main.css">
<title>uploader</title>
</head>
<body>

<div id="header">
  <div id="logo"></div>

  <div id="head-menu">
    <ul>
      <li>メッセージ１件</li>
      <li>タスク２件</li>
      <li>メッセージ</li>
      <li><a href="./setting.html">setting</a></li>
      <li><a href="../index.html">logout</a></li>
      <li><img id="src" src="../img/src.jpg"></li>
    </ul>
  </div>
</div>

<div id="nav">
  <ul>
    <li><a href="./index.html">home</a></li>
    <li><a href="./discussion.html">dis</a></li>
    <li><a href="./task.php">task</a></li>
    <li><a href="./uploader.html">file</a></li>
    <li><a href="./members.html">project</a></li>
  </ul>
</div>

<!--
<div id="search">
  <input type="text">
</div>
-->

<div id="content">
  <div id="main">
    <?php echo $msg; ?>
  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
