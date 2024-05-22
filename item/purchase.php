<?php
//セッションを開始
session_start();
session_regenerate_id(true);

if (empty($_SESSION['my_shop']['user'])) {
    header('Location: ../login/');
    exit;
}
?>