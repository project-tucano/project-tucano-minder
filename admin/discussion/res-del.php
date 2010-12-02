<?php
session_start();
include "../../config/include.php";
$msg = "";

$sql = "SELECT MAX(r_id), r_body, u_name, res.created "
     . "FROM responses AS res, users "
     . "WHERE d_id = {$_GET['d_id']} GROUP BY r_id DESC LIMIT 1";

$data = db_data($sql);

if ($data) {
	$msg .=<<< END
<table border="1">
<tr>
<th>投稿者</th>
<td>{$data['u_name']}</td>
<th>投稿日時</th>
<td>{$data['created']}</td>
</tr>
<tr>
<td colspan="4">{$data['r_body']}</td>
</tr>
</table>
<p>削除しますか？</p>
<a href="./res-del-done.php?r_id={$data['MAX(r_id)']}">はい</a>
<a href="javascript:history.back();">いいえ</a>
END;
} else {
	$msg .= "レスの取得に失敗しました。<br>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<title>Discussion</title>
</head>
<body>

<div id="header">
  <div id="logo"></div>

  <div id="head-menu">
    <ul>
      <li>メッセージ２件</li>
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

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
