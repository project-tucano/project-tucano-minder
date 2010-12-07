<?php
session_start();
include "../../config/include.php";
$msg = "";

$u_id = $_SESSION['u_id'];
$p_id = $_SESSION['p_id'];
$d_title = $_POST['d_title'];
$r_body = $_POST['r_body'];

$sql  = "INSERT INTO discussions (d_title, u_id, p_id, created, modified) VALUES ('{$d_title}', {$u_id}, {$p_id}, now(), now())";
//最初にdiscussionsテーブルにinsertしないとresponsesにinsert出来ない。

$result = db_result($sql);

if ($result) {
	$sql = "SELECT MAX(d_id) FROM discussions";//d_idがMAXなのが最近作られたスレッド

    $dis = db_data($sql);

	$sql = "INSERT INTO responses (d_id, r_body, u_id, created, modified) VALUES ({$dis['MAX(d_id)']}, '{$r_body}', {$u_id}, now(), now())";

    $result = db_result($sql);

	if ($result) {
		$msg .= "<p>新規スレッド作成しました。</p>";
		$msg .= "<a href=\"./discussion.php\">スレッドに戻る</a>";
	} else {
		$msg .= "<p>新規スレッドに投稿出来ませんでした。</p>";
		$msg .= "<a href=\"./discussion.php\">スレッドに戻る</a>";
	}

} else {
    $msg .= "<p>新規スレッドを作成出来ませんでした。</p>";
	$msg .= "<a href=\"./discussion.php\">スレッドに戻る</a>";
}

if ( !empty($_POST['f_name']) ) {
    $f_name = $_POST['f_name'];
    $f_tag = $_POST['f_tag'];
    $f_size = $_FILES['upfile']['size'];
    $tmp_name = $_FILES['upfile']['tmp_name'];
    $f_content = file_get_contents($tmp_name);
    $f_content = base64_encode($f_content);
    $f_content = mysql_real_escape_string($f_content);

    $sql = "INSERT INTO files (f_name, u_id, f_size, f_content, p_id, created, modified) VALUES ('{$f_name}', '{$u_id}', {$f_size}, '{$f_content}', {$p_id}, now(), now())";

    $result = db_result($sql);

    if ($result) {
        $msg .= "<p>さらにアップロードも成功・・・!!</p>";
    } else {
        $msg .= "<p>だがアップロードは出来ず・・・!!</p>";
    }
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
