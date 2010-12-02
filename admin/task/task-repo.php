<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";
$t_id = $_GET["t_id"];

$sql = "SELECT t_id, t_body, t_name, u_name, t_limit, t_priority, s_status "
     . "FROM tasks as t, users as u, statuses as s "
     . "WHERE t_id = {$t_id} AND t.p_id = {$_SESSION["p_id"]} "
     . "AND u.u_id = t.u_id AND s.s_id = t.s_id ORDER BY t_limit DESC";

$data = db_data($sql);

$msg .= <<< END
<h1>タスク報告</h1>
<form action="task-repo-check.php" method="POST">
  <select name="s_id">
    <option value="none">報告状態</option>
    <option value="5">未完了</option>
    <option value="6">完了</option>
  </select><br />
  <textarea name="c_comment" cols="30" rows="4"></textarea><br />
  <input type="hidden" name="t_id" value="{$t_id}" />
  <input type="submit" value="送信" />
  <input type="button" value="戻る" onclick="history.back()" />
</form>

<h2>タスク詳細</h2>
<table>
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
END;

//コメントを取得
$sql = "SELECT u_name, c_comment FROM comments, users WHERE t_id = {$t_id} AND comments.u_id = users.u_id";

$result = db_result($sql);

$msg .= "<h2>コメント</h2>";
while( $data = mysqli_fetch_array($result) ){
    $msg .= <<< END
<table>
  <tr>
   <td>{$data["u_name"]}</td>
  </tr>
  <tr>
   <td></td><td>{$data["c_comment"]}</td>
  </tr>
</table>
END;
}

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
