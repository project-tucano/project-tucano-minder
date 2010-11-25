<?php
session_start();
if($_POST['user-mail'] == $_SESSION['admin']['user-mail']) {
	$url = "./admin/index.html";
} else if ($_POST['user-mail'] == $_SESSION['user']['user-mail']) {
	$url = "./user/index.html";
} else {
	$url = "./index.html";
}

header("Location: $url");
?>
