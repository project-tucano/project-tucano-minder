<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";


$sql = "SELECT t_id, t_name, u_name, t_limit, t_priority, s_status "
     . "FROM tasks as t, users as u, statuses as s "
     . "WHERE t.p_id = {$_SESSION["p_id"]} "
     . "AND u.u_id = t.u_id AND s.s_id = t.s_id ORDER BY t_limit DESC";

$result = db_result($sql);

if ($result){
    $msg .= <<< END
<table border="1">
<tr>
  <th>タスク名</th>
  <th>担当者</th>
  <th>状態</th>
  <th>期限</th>
  <th>優先度</th>
</tr>
END;
    while($data = mysqli_fetch_array($result)){
        $msg .= <<< END
<tr>
<td><a href="./task-detail.php?t_id={$data["t_id"]}">{$data["t_name"]}</a></td>
<td>{$data["u_name"]}</td>
<td>{$data["s_status"]}</td>
<td>{$data["t_limit"]}</td>
<td>{$data["t_priority"]}</td>
</tr>
END;
    }

} else {
    $msg .= "タスクはありません";
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


<div id="content">
  <div id="main">
    <?php print $msg; ?>
  </div>

  <div id="side">
    <div class="side-button"><a href="./task-create.php">タスク生成</a></div>
  </div>
</div>

<div id="footer">

</div>

</body>
</html>
