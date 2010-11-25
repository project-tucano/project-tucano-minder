<?php
$msg = "";
if ($_POST['user-pass'] == $_POST['pass-check']) {
$msg .= <<< END
<form action="./project-create.php" method="POST">
<table>
<tr>
<th>project-name</th>
<td><input type="text" name="project-name" value="{$_POST['project-name']}"></td>
</tr>
<tr>
<th>content</th>
<td><textarea name="content" rows="4" cols="40">{$_POST['content']}</textarea></td>
</tr>
<tr>
<th>target</th>
<td><input type="text" name="target" value="{$_POST['target']}"></td>
</tr>
<tr>
<th>user-name</th>
<td><input type="text" name="user-name" value="{$_POST['user-name']}"></td>
</tr>
<tr>
<th>email</th>
<td><input type="text" name="user-mail" value="{$_POST['user-mail']}"></td>
</tr>
<tr>
<th>password</th>
<td><input type="password" name="user-pass" value="{$_POST['user-pass']}"></td>
</tr>
</table>
<input type="submit" value="create">
</form>
END;
} else {
$msg .= <<< END
<p>passwordが違います。</p>
END;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="">
<script src="./jquery.js"></script>
<title>new-project</title>
</head>
<body>

<div id="content">
  <h1>input check</h1>
  <?php echo $msg; ?>
</div>

</body>
</html>
