<?php
include '../config/include.php';

$msg = "";
$sql = "";

$p_name = $_POST['p_name'];
$p_content = $_POST['p_content'];
$p_goal = $_POST['p_goal'];
$u_name = $_POST['u_name'];
$u_mail = $_POST['u_mail'];
$u_password = $_POST['u_password'];
/*
var_dump($p_name);
var_dump($p_content);
var_dump($p_goal);

var_dump($u_name);
var_dump($u_mail);
var_dump($u_password);
*/

/////会員登録をまず先に行う

$sql = "INSERT INTO users(u_name,u_mail,u_password)"
     . "VALUES ('{$u_name}', '{$u_mail}', '{$u_password}')";

$data = db_result($sql);

/////続いてプロジェクトの登録、の前にリーダーのIDを取得しておく。

$sql = "SELECT u_id FROM users WHERE u_mail = '{$u_mail}'";
$data = db_data($sql);
$u_id = $data["u_id"];

/////いざプロジェクトの登録
$sql = "INSERT INTO projects(p_name,p_content,p_goal,u_id)"
     . "VALUES('{$p_name}','{$p_content}','{$p_goal}',{$u_id})";

$data = db_result($sql);

$sql = "SELECT p_id FROM projects WHERE u_id = {$u_id}";

$data = db_data($sql);
$p_id = $data["p_id"];


    
//$sql = "INSERT INTO members (u_id, p_id, created, modified)VALUES({$u_id}, {$p_id}, now(), now() )";
$sql = "INSERT INTO members (u_id, p_id)VALUES({$u_id}, {$p_id})";
$result = db_result($sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<script src="../js/jquery.js"></script>
<title>tucano-minder</title>
</head>
<body>

<div id="content">
    <div id="main">
        <h1><p>新規プロジェクト作成おつかれさまです。</p></h1>
  <h1>tucano minder</h1>

  <form action="../login-check.php" method="POST">
    user-mail<input type="text" name="u-mail"><br>
    user-pass<input type="password" name="user-password"><br>
    <input type="submit" value="login">
  </form>
    </div>
</div>
<a href="../index.php">トップへ</a>
</body>
</html>
