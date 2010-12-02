<?php
session_start();
$msg = "";
include "../../config/include.php";

$sql = "SELECT res.r_body, user.u_name, res.created "
     . "FROM responses AS res, users AS user "
     . "WHERE res.u_id = user.u_id AND res.d_id = {$_GET['d_id']}";

$result = db_result($sql);

if ($result) {
	$msg .= "<table border=\"1\">";

	while ($data = mysqli_fetch_array($result)) {
		$msg .= <<< END
<tr>
<th>投稿者</th>
<td>{$data['u_name']}</td>
<th>投稿日時</th>
<td>{$data['created']}</td>
</tr>
<tr>
<td colspan="4">{$data['r_body']}</td>
</tr>
END;
	}
	$msg .= "</table>";
} else {
	$msg .= "responsesテーブルのselectに失敗しました。";
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
    <div class="side-button"><a href="./res-reply.php?d_id=<?php echo $_GET['d_id']; ?>">返信</a></div>
    <div class="side-button"><a href="./res-del.php?d_id=<?php echo $_GET['d_id']; ?>">投稿削除</a></div>
  </div>
</div>

<div id="footer"></div>

</body>
</html>
