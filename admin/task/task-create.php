<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";

//ユーザ一覧取得
$users = "";
$sql = "SELECT u_id, u_name FROM users WHERE u_project = {$_SESSION["u_project"]}";
$result = db_result($sql);

$users = "<select name=\"u_id\">";
while( $data = mysqli_fetch_array($result) ){
        $users .= "<option value=\"{$data["u_id"]}\">{$data["u_name"]}</option>";
       }
$users .= "<option value=\"未設定\">未設定</option>"
        . "</select>";

//タグ一覧取得
$tags = "";
$sql = "SELECT tag_id, tag_name FROM tags WHERE p_id = {$_SESSION["u_project"]} AND place = 'tasks'";
$result = db_result($sql);

$tags = "<select name=\"tag_id\">";
$tags .= "<option value=\"none\">未設定</option>";
while( $data = mysqli_fetch_array($result) ){
        $tags .= "<option value=\"{$data["tag_id"]}\">{$data["tag_name"]}</option>";
       }
$tags .= "</select>";

//タスク状態一覧取得
$task = "";
$sql = "SELECT s_id, s_status FROM statuses";
$result = db_result($sql);

$task = "<select name=\"s_id\">";
$task .= "<option value=\"1\">未設定</option>";
while( $data = mysqli_fetch_array($result) ){
        $task .= "<option value=\"{$data["s_id"]}\">{$data["s_status"]}</option>";
       }
$task .= "</select>";

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

<!--
<div id="search">
  <input type="text">
</div>
-->

<div id="content">
  <div id="main">
    <form action="./task-create-check.php" method="POST">
      <table>
        <tr>
          <th>タスク名</th>
          <td><input type="text" name="t_name"></td>
        </tr>
        <tr>
          <th>タグ</th>
          <td><?php print $tags ?><input type="text" name="tag_name"><input type="button" value="追加"></td>
        </tr>
        <tr>
          <th>担当者</th>
          <td><?php print $users ?></td>
        </tr>
        <tr>
          <th>タスク状態</th>
          <td><?php print $task ?></td>
        </tr>
        <tr>
          <th>タスク期限</th>
          <td><input type="text" name="t_limit"></td>
        </tr>
        <tr>
          <th>タスク優先度</th>
          <td><input type="text" name="t_priority"></td>
        </tr>
        <tr>
          <th>終了条件</th>
          <td><input type="text" name="t_end"></td>
        </tr>
        <tr>
          <th>詳細</th>
          <td><textarea name="t_body" rows="4" cols="40"></textarea></td>
        </tr>
        <tr>
          <td><input type="submit" value="確認"></td>
        </tr>
      </table>
    </form>
  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
