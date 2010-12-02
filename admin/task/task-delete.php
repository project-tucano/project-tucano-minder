<?php
session_start();
$id = $_POST['task-id'];
$msg = "";
$msg .= <<< END
<form action="./delete-check.php" method="POST">
<table>
<tr>
<th>タスク名</th>
<td>
<input type="text" name="task-name" value="{$_SESSION[$id]['task-name']}"></td>
</tr>
<tr>
<th>タグ</th>
<td>
<input type="text" name="task-tag" value="{$_SESSION[$id]['task-tag']}">
</td>
</tr>
<tr>
<th>担当者</th>
<td>
<input type="text" name="user-name" value="{$_SESSION[$id]['user-name']}">
</td>
</tr>
<tr>
<th>タスク状態</th>
<td>
<input type="text" name="task-status" value="{$_SESSION[$id]['task-status']}">
</td>
</tr>
<tr>
<th>タスク期限</th>
<td>
<input type="text" name="task-limit" value="{$_SESSION[$id]['task-limit']}">
</td>
</tr>
<tr>
<th>タスク優先度</th>
<td>
<input type="text" name="task-details" value="{$_SESSION[$id]['task-details']}">
</td>
</tr>
<tr>
<th>終了条件</th>
<td>
<input type="text" name="task-end" value="{$_SESSION[$id]['task-end']}">
</td>
</tr>
<tr>
<th>詳細</th>
<td>
<input type="text" name="task-content" value="{$_SESSION[$id]['task-content']}">
</td>
</tr>
</table>
<input type="hidden" name="task-id" value="{$id}">
<input type="submit" value="削除">
</form>
END;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<title>task</title>
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
    <li><a href="./task.php">task</a></li>
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

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
