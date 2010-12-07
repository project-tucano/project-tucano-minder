<?php
session_start();
include "../../config/include.php";
$msg = "";

$sql = "SELECT f_id, f_name, u_name, f_size, f_content, file.created "
     . "FROM files AS file, users AS user "
	 . "WHERE file.u_id = user.u_id AND p_id = {$_SESSION['p_id']}";

$result = db_result($sql);

if ($result) {
	$msg .= <<< END
<table border="1">
<tr>
<th>投稿者</th>
<th>タグ</th>
<th>名前</th>
<th>サイズ</th>
<th>投稿日</th>
<th>削除</th>
</tr>
END;

	while ($data = mysqli_fetch_array($result)) {
		$msg .= <<< END
<tr>
<td>{$data['u_name']}</td>
<td>タグ</td>
<td><a href="./download.php?f_id={$data['f_id']}">{$data['f_name']}</a></td>
<td>{$data['f_size']}</td>
<td>{$data['created']}</td>
<td><a href="./upload-del.php?f_id={$data['f_id']}">削除</a></td>
</form>
</tr>
END;
	}
	$msg .= "</table>";
} else {
	$msg .= "ファイルを取得出来ませんでした。";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<title>uploader</title>
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
    <li><a href="./upload.php">file</a></li>
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
    <form method="POST" enctype="multipart/form-data" action="./upload-done.php">
      <table>
        <tr>
          <th>ファイル選択</th>
          <td colspan="2"><input type="file" name="upfile"></td>
        </tr>
        <tr>
          <th>タグ</th>
          <td>
            <select name="f_tag">
              <option value="なし">なし</option>
              <option value="img">img</option>
              <option value="html">html</option>
            </select>
          </td>
          <td>新規タグ<input type="text" value="" /></td>
        </tr>
        <tr>
          <th>名前</th>
          <td colspan="2"><input type="text" name="f_name"></td>
        </tr>
        <tr>
          <td><input type="submit" value="アップロードする"></td>
        </tr>
      </table>
    </form>
	<?php echo $msg; ?>
  </div>

  <div id="side">
<!--<div class="side-button"><a href="./upload">ファイル一覧</a></div>-->
  </div>
</div>

<div id="footer"></div>

</body>
</html>
