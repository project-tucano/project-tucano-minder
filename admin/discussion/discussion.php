<?php
session_start();
include "../../config/include.php";
$msg = "";

$sql = "SELECT dis.d_id, dis.d_title, user.u_name, dis.created "
     . "FROM discussions AS dis, users AS user "
     . "WHERE dis.u_id = user.u_id AND dis.p_id = {$_SESSION['p_id']}";

$result = db_result($sql);

if ($result) {
	$msg .= <<< END
<table border="1">
<tr>
<th>送信者</th>
<th>タイトル</th>
<th>日付</th>
<th>削除</th>
</tr>
END;

    while ($data = mysqli_fetch_array($result)) {
		$msg .= <<< END
<tr>
<td>{$data['u_name']}</td>
<td><a href="./res-select.php?d_id={$data['d_id']}">{$data['d_title']}</a></td>
<td>{$data['created']}</td>
<td><a href="./dis-del.php?d_id={$data['d_id']}">削除</a></td>
</tr>
END;
    }
	$msg .= "</table>";
} else {
    $msg .= "discussionsテーブルのselectに失敗しました。";
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

  <div id="side">
    <div class="side-button"><a href="./dis-post.php">新規投稿</a></div>
<!--    <div class="side-button"><a href="./dis-del.php">投稿削除</a></div>-->
  </div>
</div>

<div id="footer"></div>

</body>
</html>
