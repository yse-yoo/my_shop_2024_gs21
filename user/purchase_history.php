<?php
// データベースに接続
require_once '../db.php';

session_start();
session_regenerate_id(true);

// セッションからユーザ情報取得
$user = $_SESSION['my_shop']['user'];

// もしユーザ情報がなければ、ログインページにリダイレクト
if (!$user) {
    header('Location: ../login/');
}

// 購入履歴 user_items をすべて取得するSQL
$sql = "SELECT * FROM user_items WHERE user_id = {$user['id']};";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$items = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $items[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="p-3">
            <a href="../item/">商品一覧</a>
            |
            <a href="../item/cart.php">カート</a>
            |
            <a href="./">ユーザホーム</a>
            |
            <a href="purchase_history.php">購入履歴</a>
            <a class="btn btn-sm btn-outline-primary" href="logout.php">Sign out</a>
        </div>
        <h2>購入履歴</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>価格</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['price'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>