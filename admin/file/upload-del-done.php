<?php
session_start();
include "../../config/include.php";
$msg = "";

$sql = "DELETE FROM files WHERE f_id = {$_POST['f_id']}";

$result = db_result($sql);

if ($result) {
	$msg .= <<< END
<p>ファイルを削除しました。</p>
<a href="./upload.php">fileに戻る</a>
END;
} else {
	$msg .= <<< END
<p>ファイルを削除出来ませんでした。</p>
<a href="./upload.php">fileに戻る</a>
END;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
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
      <li><a href="../setting/setting.html">setting</a></li>
      <li><a href="../../index.php">logout</a></li>
      <li><img id="src" src="../../img/src.jpg"></li>
    </ul>
  </div>
</div>

<div id="nav">
  <ul>
    <li><a href="../index.html">home</a></li>
    <li><a href="../discussion/discussion.php">dis</a></li>
    <li><a href="../task/task.php">task</a></li>
    <li><a href="./upload.php">file</a></li>
    <li><a href="../project/members.html">project</a></li>
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

  <div id="side">
<!--<div class="side-button"><a href="./upload">ファイル一覧</a></div>-->
  </div>
</div>

<div id="footer"></div>

</body>
</html>
