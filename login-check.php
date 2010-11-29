<?php
session_start();
include "./config/include.php";

$msg = "";
//print $_POST["u_mail"].$_POST["u_password"];
if (isset($_SESSION["u_name"])) {
    $url = "./index.php";
} else {
    if (!empty($_POST["u_mail"]) && !empty($_POST["u_password"]) ){
        $sql = "SELECT u_id, u_name,u_project  FROM users "
             . "WHERE u_mail = '{$_POST["u_mail"]}' AND u_password = '{$_POST["u_password"]}'";
        $data = db_data($sql);
        if ($data) {
            $_SESSION["u_name"] = $data["u_name"];
            $_SESSION["u_project"] = $data["u_project"];
            $_SESSION["u_id"] = $data["u_id"];

            $u_id = $data["u_id"]; //ユーザIDを取得しておく
            $u_project = $data["u_project"]; //所属プロジェクトを取得
            $sql = "SELECT u_id FROM projects WHERE p_id = {$u_project}"; //プロマネのユーザIDを収得する
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