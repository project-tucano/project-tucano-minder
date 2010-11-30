<?php

//DB接続＆文字コードを設定する。
function db_con() {
    $con = mysqli_connect("localhost", "root", "hoge", "tucano");
    if ($con) {
        if (mysqli_set_charset($con, "utf8")) {
            //文字コード変更完了。何もしない。
        } else {
            print "文字コード変更エラー";
            mysqli_close($con);
            exit();
        }
    } else {
        print "DB接続エラー";
        exit();
    }
    return $con;
}

//DB接続とSQLを実行し、結果セットを返す。
function db_result($sql) {
    $con = db_con();
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}

//DBと接続し、SQLの結果件数(行数)を返す。
function db_rows($sql) {
    $con = db_con();
    $result = mysqli_query($con, $sql);
    if ($result) {
        $rows = mysqli_num_rows($result);
    } else {
        $rows = false;
    }
    mysqli_close($con);
    return $rows;
}

//DBと接続し、結果を一件返す。
function db_data($sql) {
    $con = db_con();
    $result = mysqli_query($con, $sql);
    if ($result) {
        $data = mysqli_fetch_array($result);
    } else {
        $data = false;
    }
    mysqli_close($con);
    return $data;
}

?>
