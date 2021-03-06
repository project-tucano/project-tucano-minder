<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";

$tag_id = $_POST['tag_id'];
$u_id = $_POST["u_id"];
if ($u_id === "none"){
    $u_id = NULL;
}
$s_id = $_POST["s_id"];

$sql = "SELECT u_id, u_name "
     . "FROM users "
     . "WHERE u_id = {$u_id}";
$data = db_data($sql);
$u_id = $data["u_id"];
$u_name = $data["u_name"];

$sql = "SELECT s_status FROM statuses WHERE s_id = {$s_id}";
$data = db_data($sql);
$s_status = $data["s_status"];

$msg .= <<< END
<table>
<tr>
<th>タスク名</th>
<td>{$_POST['t_name']}</td>
</tr>
<tr>
<th>タグ</th>
<td>{$_POST['tag_id']}</td>
</tr>
<tr>
<th>担当者</th>
<td>{$u_name}</td>
</tr>
<th>タスク状態</th>
<td>{$s_status}</td>
</tr>
<tr>
<tr>
<th>タスク期限</th>
<td>{$_POST['t_limit']}</td>
</tr>
<tr>
<th>タスク優先度</th>
<td>{$_POST['t_priority']}</td>
</tr>
<tr>
<th>終了条件</th><td>{$_POST['t_end']}</td>
</tr>
<tr>
<th>詳細</th>
<td>{$_POST['t_body']}</td>
</tr>
</table>
END;

$msg .= <<< END
<form action="./task-create-done.php" method="POST">
<input type="hidden" name="t_name" value="{$_POST['t_name']}">
<input type="hidden" name="tag_id" value="{$_POST['tag_id']}">  <!-- タグ -->
<input type="hidden" name="u_id" value="{$u_id}">
<input type="hidden" name="s_id" value="{$s_id}">
<input type="hidden" name="t_limit" value="{$_POST['t_limit']}">
<input type="hidden" name="t_priority" value="{$_POST['t_priority']}">
<input type="hidden" name="t_end" value="{$_POST['t_end']}">
<input type="hidden" name="t_body" value="{$_POST['t_body']}">
<input type="submit" value="生成">
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
