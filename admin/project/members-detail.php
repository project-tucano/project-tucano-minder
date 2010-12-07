<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";

$sql = "SELECT u.u_id, u_name FROM users as u, members as m "
     . "WHERE u.u_id = m.u_id AND u.u_id = {$_GET["u_id"]}";
$data = db_data($sql);

if($data){
    $msg .= "{$data["u_name"]}";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<title>members-detail</title>
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
    <?php print $msg; ?>
  </div>

  <div id="side">
    <div class="side-button"><a href="./task-create.php">タスク生成</a></div>
  </div>
</div>

<div id="footer">

</div>

</body>
</html>
