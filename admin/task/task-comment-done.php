<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";

$u_id = $_SESSION["u_id"];
$t_id = $_POST["t_id"];
$c_comment = $_POST["c_comment"];

$sql = "INSERT INTO comments(t_id, c_comment, u_id)VALUES({$t_id}, '{$c_comment}',{$u_id})";


$result = db_result($sql);
if ($result) {
    $msg .= "<a href=\"./task-detail.php?t_id={$t_id}\">ok</a>";
} else {
    $msg .= "<a href=\"./task-detail.php?t_id={$t_id}\">oops</a>";
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
    <li><a href="../discussion/discussion.html">dis</a></li>
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

  </div>
</div>

<div id="footer">

</div>

</body>
</html>
