<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";

$t_id = $_POST["t_id"];
$s_id = $_POST["s_id"];
$c_comment = $_POST["c_comment"];

$msg .= <<< END
<h1>以下の内容で報告してよろしいですか？</h1>
<table>
<tr><td colspan="2"><h3>タスク名</h3></td></tr>
<tr>
  <td>状態</td><td>{$s_id}</td>
</tr>
<tr>
  <td>コメント</td><td>{$c_comment}</td>
</tr>
<tr>
  <td></td>
</tr>
</table>
<form action="task-repo-done.php" method="POST">
<input type="hidden" name="s_id" value="">
<input type="hidden" name="c_comment" value="">
<input type="submit" name="" value="送信">
<input type="button" value="戻る" onclick="history.back">
</form>

END;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<script src="../../js/jquery.js"></script>
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
      <li><a href="../setting.html">setting</a></li>
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