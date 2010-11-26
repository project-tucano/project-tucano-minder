<?php
session_start();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<title>tucano-minder</title>
</head>
<body>
<div id="content">
  <h1>tucano minder</h1>
  <form action="login-check.php" method="POST">
    mail<input type="text" name="u_mail"><br>
    pass<input type="password" name="u_password"><br>
    <input type="submit" value="login"><br>
	<a href="./new-project.html">new project</a>
  </form>
</div>

</body>
</html>
