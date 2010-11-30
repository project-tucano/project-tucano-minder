<?php
session_start();
$msg = "";
include "../../config/include.php";

$sql = "DELETE FROM responses WHERE d_id = {$_GET['d_id']}";
$result = db_result($sql);
//最初にresponsesテーブルを削除しないとdiscussionsテーブルが削除できない。

if ($result) {
	$sql = "DELETE FROM discussions WHERE d_id = {$_GET['d_id']}";
	$result = db_result($sql);

	if ($result) {
		$msg .= "削除しました。<br>"
		      . "<a href=\"./discussion.php\">disに戻る</a>";
	} else {
		$msg .= "削除できませんでした。<br>"
		     . "<a href=\"./discussion.php\">disに戻る</a>";
	}
} else {
	$msg .= "削除できませんでした。<br>"
	     . "<a href=\"./discussion.php\">disに戻る</a>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<title>Discussion</title>
</head>
<body>

<div id="header">
  <div id="logo"></div>

  <div id="head-menu">
    <ul>
      <li>メッセージ２件</li>
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
    <li><a href="./discussion.php">dis</a></li>
    <li><a href="../task/task.php">task</a></li>
    <li><a href="../file/uploader.html">file</a></li>
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
    <div class="side-button"><a href="./dis-post.html">新規投稿</a></div>
    <div class="side-button"><a href="#">投稿削除</a></div>
  </div>
</div>

<div id="footer"></div>

</body>
</html>
