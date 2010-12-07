<?php
session_start();
include "../../config/include.php";
$msg = "";

$sql = "SELECT f_id, f_name, user.u_name, f_size "
     . "FROM files AS file, users AS user "
	 . "WHERE user.u_id = file.u_id AND f_id = {$_GET['f_id']}";

$data = db_data($sql);

if ($data) {
	$msg .= <<< END
<table border="1">
<tr>
<th>投稿者</th>
<th>タグ</th>
<th>名前</th>
<th>サイズ</th>
</tr>
<tr>
<td>{$data['u_name']}</td>
<td>タグ</td>
<td>{$data['f_name']}</td>
<td>{$data['f_size']}</td>
</tr>
</table>
<form method="POST" action="./upload-del-done.php">
<input type="hidden" name="f_id" value="{$data['f_id']}">
END;
	if ($data['u_name'] != $_SESSION['u_name']) {
		$msg .= "<p>このファイルはあなたがアップロードしたファイルではありません。</p>";
	}
	$msg .= <<< END
<p>削除しますか？</p>
<input type="submit" value="はい">
<input type="button" onclick="javascript:history.back();" value="いいえ">
</form>
END;
} else {
	$msg .= "ファイルを取得出来ませんでした。";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
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

  <div id="side">
<!--<div class="side-button"><a href="./upload">ファイル一覧</a></div>-->
  </div>
</div>

<div id="footer"></div>

</body>
</html>
