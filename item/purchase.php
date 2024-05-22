<?php
//セッションを開始
session_start();
session_regenerate_id(true);

// ログインユーザがいなければ、ログイン画面にリダイレクト
if (empty($_SESSION['my_shop']['user'])) {
    header('Location: ../login/');
    exit;
}

// ユーザ情報取得
$user = $_SESSION['my_shop']['user'];
var_dump($user);

?>