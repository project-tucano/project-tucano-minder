<?php
session_start();
include "../../config/include.php";

$msg = "";
$sql = "";

$sql = "SELECT u.u_id, u_name FROM users as u, members as m "
     . "WHERE u.u_id = m.u_id AND m.p_id = {$_SESSION["p_id"]}";
$result = db_result($sql);

while($data = mysqli_fetch_array($result)){
    $msg .= "<a href=\"./members-detail.php?u_id={$data["u_id"]}\">{$data["u_name"]}</a><br>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<script src="../../js/jquery.js"></script>
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
      <li><a href="../setting/setting.html">setting</a></li>
      <li><a href="../../index.php">logout</a></li>
      <li><img id="src" src="../../img/src.jpg"></li>
    </ul>
  </div>
</div>

<div id="nav">
  <ul>
    <li><a href="../index.html">home</a></li>
    <li><a href="../discussion/discussion.php">dis</a></li>
    <li><a href="../task/task.php">task</a></li>
    <li><a href="../file/uploader.html">file</a></li>
    <li><a href="./members.html">project</a></li>
  </ul>
</div>

<div id="content">

  <div id="main">
    <?php print $msg; ?>
  </div>

  <div id="side">
  <div class="side-button"><a href="./project.html">プロジェクト</a></div>
    <div id="member-add"><div class="side-button">メンバー招待</div></div>

    <div id="member-list" style="display: none;">
      <form action="./user-create-check.php" method="POST">
        <table>
          <tr>
            <th>メールアドレス</th>
          </tr>
          <tr>
            <td><input type="text" name="user-mail"></td>
          </tr>
          <tr>
            <th>あなたの名前</th>
          </tr>
          <tr>
            <td><input type="text" name="user-pass"></td>
          </tr>
<!--          <tr>
            <th>pass-check</th>
            <td><input type="password" name="pass-check"></td>
          </tr>-->
          <tr>
            <th>メッセージ</th>
          </tr>
          <tr>
            <td><textarea></textarea></td>
          </tr>
          <tr>
            <td><input type="submit" value="check"></td>
          </tr>
        </form>
      </table>
    </div>

    <script type="text/javascript">
      $('#member-add').click(function(){
        if ($('#member-list').css('display') == 'none') {
          $('#member-list').slideDown('slow');
        } else {
          $('#member-list').slideUp('slow');
         }
       });
    </script>

  </div>
</div>

<div id="footer"></div>

</body>
</html>
