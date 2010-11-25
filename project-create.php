<?php
session_start();
$_SESSION['admin'] = array(
	'user-name' => $_POST['user-name'],
	'user-pass' => $_POST['user-pass'],
	'user-mail' => $_POST['user-mail'],
	'project-name' => $_POST['project-name']
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="./admin.css">
<script src="./jquery.js"></script>
<title>tucano-minder</title>
</head>
<body>

<div id="content">
  <h1>tucano minder</h1>
  <p>complete!</p>
<!--
  < echo $_SESSION['admin']['user-name']; ?>
  < echo $_SESSION['admin']['user-pass']; ?>
  < echo $_SESSION['admin']['user-mail']; ?>
  < echo $_SESSION['admin']['project-name']; ?>
-->
  <form action="./login-check.php" method="POST">
    user-mail<input type="text" name="user-mail"><br>
    user-pass<input type="password" name="user-pass"><br>
    <input type="submit" value="login">
  </form>
</div>

</body>
</html>
