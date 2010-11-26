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
          <td><input type="text" name="task-name"></td>
        </tr>
        <tr>
          <th>タグ</th>
          <td><input type="text" name="task-tag"></td>
        </tr>
        <tr>
          <th>担当者</th>
          <td>
		    <select name="user-name">
              <option value="皆川">皆川</option>
              <option value="澤井">澤井</option>
              <option value="広沢">広沢</option>
              <option value="未設定">未設定</option>
			</select>
          </td>
        </tr>
        <tr>
          <th>タスク状態</th>
          <td><input type="text" name="task-status" value="作業中"></td>
        </tr>
        <tr>
          <th>タスク期限</th>
          <td><input type="text" name="task-limit"></td>
        </tr>
        <tr>
          <th>タスク優先度</th>
          <td><input type="text" name="task-details"></td>
        </tr>
        <tr>
          <th>終了条件</th>
          <td><input type="text" name="task-end"></td>
        </tr>
        <tr>
          <th>詳細</th>
          <td><textarea name="task-content" rows="4" cols="40"></textarea></td>
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
