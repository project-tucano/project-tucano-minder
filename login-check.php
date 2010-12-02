<?php
session_start();
include "./config/include.php";

$msg = "";
//print $_POST["u_mail"].$_POST["u_password"];
if (isset($_SESSION["u_name"])) {
    $url = "./index.php";
} else {
    if (!empty($_POST["u_mail"]) && !empty($_POST["u_password"]) ){
        $sql = "SELECT users.u_id, u_name, p_id FROM users, members "
             . "WHERE u_mail = '{$_POST["u_mail"]}' AND u_password = '{$_POST["u_password"]}'";
        $data = db_data($sql);
        if ($data) {
            $_SESSION["u_name"] = $data["u_name"];
            $_SESSION["u_id"] = $data["u_id"];
            $_SESSION["p_id"] = $data["p_id"];

            $sql = "SELECT u_id FROM projects WHERE p_id = {$_SESSION["p_id"]}"; //プロマネのユーザIDを収得する
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