<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";
$t_id = $_GET["t_id"];

$sql = "SELECT * FROM tasks, users, statuses WHERE t_id = {$t_id}";
$data = db_data($sql);

$msg .= <<< END
<table>
<tr>
<th colspan="4">タスク画面作成</th>
</tr>
<tr>
<th>担当者</td>
<td>{$data["t_name"]}</td>
<th>タグ</th>
<td>tag</td>
</tr>
<tr>
<th>状態</td>
<td>{$data["s_status"]}</td>
<th>開始日</th>
<td>2010/11/20</td>
</tr>
<tr>
<th>優先度</td>
<td>{$data["t_priority"]}</td>
<th>期日</th>
<td>{$data["t_limit"]}</td>
</tr>
</table>
<pre>
<h2>内容</h2>
{$data["t_body"]}
</pre>
</table>

<h1>コメント</h1>
広沢　2010/11/11 11:11<br>
はいよー

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

<!--
<div id="search">
  <input type="text">
</div>
-->

<div id="content">
  <div id="main">
    <h1>タスク詳細</h1>
    内容
<?php print $msg; ?>

  </div>

  <div id="side">
    <div class="side-button"><a href="#">コメントする</a></div>
    <div class="side-button"><a href="./repo.html">完了報告</a></div>
  </div>
</div>

<div id="footer"></div>

</body>
</html>
