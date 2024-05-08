<?php
// データベースに接続
require_once '../db.php';

// POSTデータ取得
$item = $_POST;

// 指定した商品IDで、データ更新するSQL
$sql = "UPDATE items SET 
            code = :code,
            name = :name,
            price = :price,
            stock = :stock
        WHERE id = :id
        ";

// SQLを実行
$stmt = $pdo->prepare($sql);
$stmt->execute($item);

// 一覧画面に戻る（リダイレクト）
header('Location: ./');