<?php
session_start();
include "./config/include.php";

$msg = "";
//print $_POST["u_mail"].$_POST["u_password"];
if (isset($_SESSION["u_name"])) {
    $url = "./index.php";
} else {
    if (!empty($_POST["u_mail"]) && !empty($_POST["u_password"]) ){
        $sql = "SELECT u_id, u_name, u_project  FROM users "
             . "WHERE u_mail = '{$_POST["u_mail"]}' AND u_password = '{$_POST["u_password"]}'";
        $data = db_data($sql);
        if ($data) {
            $_SESSION["u_id"] = $data["u_id"];
            $_SESSION["u_name"] = $data["u_name"];
<<<<<<< HEAD:login-check.php
            $_SESSION["p_id"] = $data["u_project"];
=======
            $_SESSION["u_project"] = $data["u_project"];
            $_SESSION["u_id"] = $data["u_id"];
<<<<<<< HEAD:login-check.php
>>>>>>> 642ab20b61fa226df9df594cd38320d520e607ff:login-check.php
=======
>>>>>>> 642ab20b61fa226df9df594cd38320d520e607ff:login-check.php

            $u_id = $data["u_id"]; //ユーザIDを取得しておく
            $p_id = $data["u_project"]; //所属プロジェクトを取得
            $sql = "SELECT u_id FROM projects WHERE p_id = {$p_id}"; //プロマネのユーザIDを収得する
            $data = db_data($sql);
            $pm_id = $data["u_id"]; //プロジェクトマネージャーのIDという変数

            if($u_id === $pm_id){ //ログインするユーザと所属プロジェクトのマネージャーのIDを比較
                $url = "./admin/index.html";
            } else {
                $url = "./user/index.html";
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
