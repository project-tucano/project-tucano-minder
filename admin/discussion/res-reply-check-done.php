<?php
session_start();
$msg = "";
include "../../config/include.php";

$sql = "INSERT INTO responses ( d_id, r_body, u_id ) VALUES ( "
     . "{$_SESSION['d_id']}, '{$_POST['r_body']}', {$_SESSION['u_id']} )";

$result = db_result($sql);

if ($result) {
	$msg .= "投稿しました。<br>"
	      . "<a href=\"./res-select.php?d_id={$_SESSION['d_id']}\">スレッドに戻る</a>";
} else {
	$msg .= "responsesテーブルにinsert失敗しました。";
}

unset($_SESSION['d_id']);
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
  </div>
</div>

<div id="footer"></div>

</body>
</html>
