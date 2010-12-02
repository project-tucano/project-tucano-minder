<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<title>discussion-compose</title>
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
	<h1>投稿</h1>
    <form action="./dis-post-check-done.php" method="POST">
      <table>
        <tr>
          <th>タイトル</th>
          <td><input type="text" name="d_title" value="<?php echo $_POST['d_title'] ?>"></td>
        </tr>
        <tr>
          <th>タグ</th>
          <td><input type="text" name="tag" value="<?php echo $_POST['tag'] ?>"></td>
        </tr>
        <tr>
          <th>本文</th>
          <td><textarea name="r_body" rows="7" cols="40"><?php echo $_POST['r_body'] ?></textarea></td>
        </tr>
      </table>
      <input type="submit" value="投稿">
    </form>
  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
