<?php
session_start();
include "../../config/include.php";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.3w.prg/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../../css/main.css">
<script src="../../js/jquery.js"></script>
<title>discussion</title>
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
    <h1>新規投稿</h1>
    <form action="./dis-post-check.php" method="POST">
      <table>
        <tr>
          <th>タイトル</th>
          <td><input type="text" name="d_title"></td>
        </tr>
        <tr>
          <th>タグ</th>
          <td>
            <select name="tag">
              <option value="その他">その他
              <option value="大航海">大航海
              <option value="空腹">空腹
              <option value="黒">黒
            </select>
          </td>
          <td>新規タグ<input type="text" name="" /></td>
        </tr>
        <tr>
          <th>本文</th>
          <td colspan="3"><textarea name="r_body" rows="7" cols="40"></textarea></td>
        </tr>
        <tr>
<!--          <th><div id="upload">添付</div></th> -->
        </tr>
      </table>

      <div id="tenpu" style="display: none;">
      <table>
        <tr>
          <th>ファイル選択</th>
          <td colspan="2"><input type="file" name="upfile"></td>
        </tr>
        <tr>
          <th>タグ</th>
          <td>
            <select name="f-tag">
              <option value="なし">なし</option>
              <option value="img">img</option>
              <option value="html">html</option>
            </select>
          </td>
          <td>新規タグ<input type="text" value="" /></td>
        </tr>
        <tr>
          <th>名前</th>
          <td colspan="2"><input type="text" name="f-name"></td>
        </tr>
        <tr>
          <td><input type="submit" value="アップロード"></td>
        </tr>
      </table>
    </div>
     <input type="submit" value="確認">
   </form>


    <script type="text/javascript">
      $('#upload').click(function(){
        if ($('#tenpu').css('display') == 'none') {
          $('#tenpu').slideDown('slow');
        } else {
          $('#tenpu').slideUp('slow');
         }
       });
    </script>

  </div>

  <div id="side"></div>
</div>

<div id="footer"></div>

</body>
</html>
