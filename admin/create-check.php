<?php
session_start();
if(empty($_SESSION['count'])) {
	$_SESSION['count'] = 1;
} else {
	$_SESSION['count']++;
}
$num = "task".$_SESSION['count'];
$_SESSION[$num] = array(
	'task-name' => $_POST['task-name'],
	'task-tag' => $_POST['task-tag'],
	'user-name' => $_POST['user-name'],
	'task-status' => $_POST['task-status'],
	'task-limit' => $_POST['task-limit'],
	'task-details' => $_POST['task-details'],
	'task-end' => $_POST['task-end'],
	'task-content' => $_POST['task-content'],
);
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
    <p>完了</p>
    <a href="./task.php">task</a>
  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>