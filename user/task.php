<?php
session_start();
$msg = "";
$msg .= <<< END
<table border="1">
<tr>
<th>タスク名</th>
<th>タグ</th>
<th>状態</th>
<th>期限</th>
<th>優先度</th>
<th>詳細</th>
<th>報告</th>
</tr>
END;
if (isset($_SESSION['count'])) {
for ($a = 1; $a <= $_SESSION['count']; $a++) {
$num = "task".$a;
if (@count($_SESSION[$num]) > 1 ) {
if ($_SESSION[$num]['user-name'] == $_SESSION['user']['user-name']) {
$i = count($_SESSION[$num])-1;
$msg .= <<< END
<tr>
<td>{$_SESSION[$num]['task-name']}</td>
<td>{$_SESSION[$num]['task-tag']}</td>
<td>{$_SESSION[$num]['task-status']}</td>
<td>{$_SESSION[$num]['task-limit']}</td>
<td>{$_SESSION[$num]['task-details']}</td>
<td><a href="./task-detail.html">詳細</a></td>
<td><a href="./discussion-compose-check.html">報告</a></td>
END;
}
}
}
}
$msg .= <<< END
</tr>
</table>
END;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../main.css">
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
      <li><a href="./setting.html">setting</a></li>
      <li><a href="../index.html">logout</a></li>
      <li><img id="src" src="../img/src.jpg"></li>
    </ul>
  </div>
</div>

<div id="nav">
  <ul>
    <li><a href="./index.html">home</a></li>
    <li><a href="./discussion.html">dis</a></li>
    <li><a href="./task.php">task</a></li>
    <li><a href="./uploader.html">file</a></li>
    <li><a href="./members.html">project</a></li>
  </ul>
</div>

<!--
<div id="search">
  <input type="text">
</div>
-->

<div id="content">
  <div id="main">
<!--
    <a href="./task-detail.html"><img src="../img/user-task.png" width="500px"></a>
-->
    <?php echo $msg; ?><br><br>
     <table border="1">
      <tr>
        <th>タスク名</th>
        <th>タグ</th>
        <th>状態</th>
        <th>期限</th>
        <th>優先度</th>
        <th>詳細</th>
        <th>報告</th>
      </tr>
      <tr>
        <td>実装</td>
        <td>[開発]</td>
        <td>作業中</td>
        <td>11/24</td>
        <td>早く!!</td>
        <td><a href="./task-detail.html">詳細</a></td>
        <td><a href="./discussion-compose-check.html">報告</a></td>
      </tr>
      <tr>
        <td>サーバ</td>
        <td>[構築]</td>
        <td>作業中</td>
        <td>12/01</td>
        <td>のんびり</td>
        <td><a href="./task-detail.html">詳細</a></td>
        <td><a href="./discussion-compose-check.html">報告</a></td>
      </tr>
    </table>
 </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
