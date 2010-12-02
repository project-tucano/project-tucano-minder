<?php
session_start();
include "./config/include.php";

$msg = "";
//print $_POST["u_mail"].$_POST["u_password"];
if (isset($_SESSION["u_name"])) {
    $url = "./index.php";
} else {
    if (!empty($_POST["u_mail"]) && !empty($_POST["u_password"]) ){
<<<<<<< HEAD
        $sql = "SELECT users.u_id, u_name, p_id FROM users, members "
=======
        $sql = "SELECT u_id, u_name, u_project  FROM users "
>>>>>>> 3ba7cedf04ba94a2c1a4dd3e6c7dc2d40b1ba682
             . "WHERE u_mail = '{$_POST["u_mail"]}' AND u_password = '{$_POST["u_password"]}'";
        $data = db_data($sql);
        if ($data) {
            $_SESSION["u_id"] = $data["u_id"];
            $_SESSION["u_name"] = $data["u_name"];
<<<<<<< HEAD
            $_SESSION["u_id"] = $data["u_id"];
            $_SESSION["p_id"] = $data["p_id"];

            $sql = "SELECT u_id FROM projects WHERE p_id = {$_SESSION["p_id"]}"; //プロマネのユーザIDを収得する
=======
<<<<<<< HEAD:login-check.php
            $_SESSION["p_id"] = $data["u_project"];
=======
            $_SESSION["u_project"] = $data["u_project"];
            $_SESSION["u_id"] = $data["u_id"];
<<<<<<< HEAD:login-check.php
<<<<<<< HEAD:login-check.php
>>>>>>> 642ab20b61fa226df9df594cd38320d520e607ff:login-check.php
=======
>>>>>>> 642ab20b61fa226df9df594cd38320d520e607ff:login-check.php
=======
>>>>>>> 642ab20b61fa226df9df594cd38320d520e607ff:login-check.php

            $u_id = $data["u_id"]; //ユーザIDを取得しておく
            $p_id = $data["u_project"]; //所属プロジェクトを取得
            $sql = "SELECT u_id FROM projects WHERE p_id = {$p_id}"; //プロマネのユーザIDを収得する
>>>>>>> 3ba7cedf04ba94a2c1a4dd3e6c7dc2d40b1ba682
            $data = db_data($sql);
            $pm_id = $data["u_id"];

            if($_SESSION["u_id"] === $pm_id){ //ログインするユーザと所属プロジェクトのマネージャーのIDを比較
                $_SESSION["who"] = "leader"; //リーダーかメンバーかを保存しておく
                $url = "./admin/index.html";
            } else {
                $_SESSION["who"] = "member";
                $url = "./admin/index.html";
            }
            
        } else {
            $url = "./index.php";
        }

        } else {
            $url = "./index.php";
        }
}
header("Location: $url");
?>
