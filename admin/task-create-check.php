<?php
$msg = "";
$msg .= <<< END
<form action="./create-check.php" method="POST">
<table>
<tr>
<th>タスク名</th>
<td><input type="text" name="task-name" value="{$_POST['task-name']}"></td>
</tr>
<tr>
<th>タグ</th>
<td><input type="text" name="task-tag" value="{$_POST['task-tag']}"></td>
</tr>
<tr>
<th>担当者</th>
<td><input type="text" name="user-name" value="{$_POST['user-name']}"></td>
</tr>
<th>タスク状態</th>
<td><input type="text" name="task-status" value="{$_POST['task-status']}"></td>
</tr>
<tr>
<tr>
<th>タスク期限</th>
<td><input type="text" name="task-limit" value="{$_POST['task-limit']}"></td>
</tr>
<tr>
<th>タスク優先度</th>
<td><input type="text" name="task-details" value="{$_POST['task-details']}"></td>
</tr>
<tr>
<th>終了条件</th>
<td><input type="text" name="task-end" value="{$_POST['task-end']}"></td>
</tr>
<tr>
<th>詳細</th>
<td><textarea name="task-content" rows="4" cols="40">{$_POST['task-content']}</textarea></td>
</tr>
<tr>
<td><input type="submit" value="生成"></td>
</tr>
</table>
</form>
END;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../main.css">
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