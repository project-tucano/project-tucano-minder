<?php
session_start();
$_SESSION['user'] = array(
	'user-name' => $_POST['user-name'],
	'user-pass' => $_POST['user-pass'],
	'user-mail' => $_POST['user-mail'],
	'project-name' => $_SESSION['admin']['project-name']
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<script src="../../js/jquery.js"></script>
<title>project</title>
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
    <li><a href="../discussion/discussion.html">dis</a></li>
    <li><a href="../task/task.php">task</a></li>
    <li><a href="../file/uploader.html">file</a></li>
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
    <p>complete!</p>
<!--
    < echo $_SESSION['user']['user-id']; ?>
    < echo $_SESSION['user']['user-name']; ?>
    < echo $_SESSION['user']['user-pass']; ?>
    < echo $_SESSION['user']['user-mail']; ?>
    < echo $_SESSION['user']['project-name']; ?>
-->
    <a href="./members.html">project</a>
  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
