<?php
session_start();
include "../../config/include.php";
$msg = "";

$u_id = $_SESSION['u_id'];
$f_name = $_POST['f_name'];
$f_tag = $_POST['f_tag'];
$f_size = $_FILES['upfile']['size'];
$tmp_name = $_FILES['upfile']['tmp_name'];
$f_content = file_get_contents($tmp_name);
$f_content = base64_encode($f_content);
$f_content = mysql_real_escape_string($f_content);

$sql = "INSERT INTO files ( f_name, u_id, f_size, f_content, p_id, created, modified ) "
     . "VALUES ( '{$f_name}', '{$u_id}', {$f_size}, '{$f_content}', {$_SESSION['p_id']}, now(), now() ) ";

$result = db_result($sql);

if ($result) {
	$msg .= <<< END
<table>
<tr>
<th>タグ</th>
<td>{$f_tag}</td>
</tr>
<tr>
<th>ファイル名</th>
<td>{$f_name}</td>
</tr>
<tr>
<th>サイズ</th>
<td>{$f_size}</td>
</tr>
</table>
<a href="./upload.php">アップロードしました。</a>
END;
} else {
	$msg .= <<< END
<a href="./upload.php">アップロード出来ませんでした。</a>
END;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<title>uploader</title>
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
    <li><a href="../task/task.php">task</a></li>
    <li><a href="./upload.php">file</a></li>
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
