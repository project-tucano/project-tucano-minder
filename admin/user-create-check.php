<?php
$msg = "";
if ($_POST['user-pass'] == $_POST['pass-check']) {
$msg .= <<< END
<form action="./user-create.php" method="POST">
<table>
<tr>
<th>user-name</th>
<td><input type="text" name="user-name" value="{$_POST['user-name']}"></td>
</tr>
<tr>
<th>user-pass</th>
<td><input type="password" name="user-pass" value="{$_POST['user-pass']}"></td>
</tr>
<tr>
<th>user-email</th>
<td><input type="text" name="user-mail" value="{$_POST['user-mail']}"></td>
</tr>
<tr>
<td><input type="submit" value="create"></td>
</tr>
</table>
</form>
END;
} else {
$msg .= <<< END
<p>passが違います。</p>
END;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../main.css">
<script src="./jquery.js"></script>
<title>project</title>
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
    <?php echo $msg; ?>
  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
