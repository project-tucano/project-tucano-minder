<?php
session_start();
$msg = "";
include "../../config/include.php";
//$_POST["d_body"];
//$_SESSION["u_id"] = $data["u_id"];
//$_SESSION["u_name"] = $data["u_name"];
//$_SESSION["p_id"] = $data["u_project"];

$sql = "INSERT INTO discussions ( d_title, u_id, p_id ) VALUES ( "
     . "'{$_POST['d_title']}', {$_SESSION["u_id"]}, {$_SESSION["p_id"]} )";
$result = db_result($sql);
if ($result) {
    $msg .= "discussionsテーブルにinsertしました。";
} else {
    $msg .= "insertに失敗しました。";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<script src="../../js/jquery.js"></script>
<title>discussion</title>
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
