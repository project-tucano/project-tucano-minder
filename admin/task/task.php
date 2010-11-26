<?php
session_start();
$msg = "";
$msg .= <<< END
<table border="1">
<tr>
<th>タスク名</th>
<th>タグ</th>
<th>担当者</th>
<th>状態</th>
<th>期限</th>
<th>優先度</th>
<th>詳細</th>
<th>変更</th>
<th>削除</th>
</tr>
END;
if(isset($_SESSION['count'])){
for($a = 1; $a <= $_SESSION['count']; $a++){
$num = "task".$a;
if(@count($_SESSION[$num]) > 1 ){
$i = count($_SESSION[$num])-1;
$msg .= <<< END
<tr>
<td>{$_SESSION[$num]['task-name']}</td>
<td>{$_SESSION[$num]['task-tag']}</td>
<td>{$_SESSION[$num]['user-name']}</td>
<td>{$_SESSION[$num]['task-status']}</td>
<td>{$_SESSION[$num]['task-limit']}</td>
<td>{$_SESSION[$num]['task-details']}</td>
<td><a href="./task-detail.html">詳細</a></td>
<td>
<form action="./task-change.php" method="POST">
<input type="hidden" name="task-id" value="{$num}">
<input type="submit" value="変更">
</form>
</td>
<td>
<form action="./task-delete.php" method="POST">
<input type="hidden" name="task-id" value="{$num}">
<input type="submit" value="削除">
</form>
</td>
</tr>
END;
}
}
}
$msg .= <<< END
</table>
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
<!--<a href="./task-detail.html"><img src="../img/admin-task.png" width="500"></a>-->
    <?php echo $msg; ?><br>
    <h1>澤井</h1>
    <table border="1">
      <tr>
        <th>タスク名</th>
        <th>タグ</th>
        <th>状態</th>
        <th>期限</th>
        <th>優先度</th>
        <th>詳細</th>
        <th>変更</th>
        <th>削除</th>
      </tr>
      <tr>
        <td>実装</td>
        <td>[開発]</td>
        <td>作業中</td>
        <td>11/24</td>
        <td>早く!!</td>
        <td><a href="./task-detail.html">詳細</a></td>
        <td><input type="button" value="変更"></td>
        <td><input type="button" value="削除"></td>
      </tr>
      <tr>
        <td>サーバ</td>
        <td>[構築]</td>
        <td>作業中</td>
        <td>12/01</td>
        <td>のんびり</td>
        <td><a href="./task-detail.html">詳細</a></td>
        <td><input type="button" value="変更"></td>
        <td><input type="button" value="削除"></td>
      </tr>
    </table><br>
    <h1>皆川</h1>
    <table border="1">
      <tr>
        <th>タスク名</th>
        <th>タグ</th>
        <th>状態</th>
        <th>期限</th>
        <th>優先度</th>
        <th>詳細</th>
        <th>変更</th>
        <th>削除</th>
      </tr>
      <tr>
        <td>デザイン</td>
        <td>[開発]</td>
        <td>作業中</td>
        <td>11/24</td>
        <td>早く!!</td>
        <td><a href="./task-detail.html">詳細</a></td>
        <td><input type="button" value="変更"></td>
        <td><input type="button" value="削除"></td>
      </tr>
    </table>
  </div>

  <div id="side">
    <div class="side-button"><a href="./task-create.php">タスク生成</a></div>
  </div>
</div>

<div id="footer"></div>

</body>
</html>
