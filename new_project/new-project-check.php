<?php
$msg = "";

if ($_POST['u_password'] == $_POST['u_password2']) {
  $msg .= <<< END

<table>
<tr>
  <th>プロジェクトの名前</th>
</tr>
<tr>
  <td>{$_POST['p_name']}</td>
</tr>

<tr>
  <th>プロジェクトの内容</th>
</tr>
<tr>
  <td>{$_POST['p_content']}</td>
</tr>
<tr>
  <th>プロジェクトの目標</th>
</tr>
<tr>
  <td>{$_POST['p_goal']}</td>
</tr>
<tr>
  <th>あなたの名前</th>
</tr>
<tr>
  <td>{$_POST['u_name']}</td>
</tr>
<tr>
  <th>メールアドレス</th>
</tr>
<tr>
  <td>{$_POST['u_mail']}</td>
</tr>
<tr>
  <th>パスワード</th>
</tr>
<tr>
  <td>{$_POST['u_password']}</td>
</tr>
</table>
  
<form action="./new-project-create.php" method="POST">
<input type="hidden" name="p_name" value="{$_POST['p_name']}">
<input type="hidden" name="p_content" value="{$_POST['p_content']}">
<input type="hidden" name="p_goal" value="{$_POST['p_goal']}">
<input type="hidden" name="u_name" value="{$_POST['u_name']}">
<input type="hidden" name="u_mail" value="{$_POST['u_mail']}">
<input type="hidden" name="u_password" value="{$_POST['u_password']}">

<input type="submit" value="確定">
<input type="button" value="戻る" onClick="history.back()">
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
<script src="../js/jquery.js"></script>
<title>new-project</title>
</head>
<body>

<div id="content">
  <h1>登録内容の確認</h1>
  <?php echo $msg; ?>
</div>

</body>
</html>
