<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";

//タグまだ入れてないよ

$u_project = $_SESSION["u_project"];

$t_name = $_POST['t_name'];
$tag_id = $_POST['tag_id'];
$u_id = $_POST['u_id'];
$s_id = $_POST['s_id'];
$t_limit = $_POST['t_limit'];
$t_priority = $_POST['t_priority'];
$t_end = $_POST['t_end'];
$t_body = $_POST['t_body'];

$sql = "INSERT INTO tasks(p_id, t_name, u_id, s_id, t_limit, t_priority, t_end, t_body )VALUES("
     . "{$u_project}, '{$t_name}', {$u_id}, {$s_id}, '{$t_limit}', '{$t_priority}', '{$t_end}'"
     . ", '{$t_body}' )";
     
$result = db_result($sql);
if ($result) {
    print "ok";
} else {
    print "oops";
}

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

<div id="content">
  <div id="main">
    <p>complete!</p>
    <a href="./task.php">task</a>
  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
