<?php
// セッション開始
session_start();
session_regenerate_id(true);

// DB接続
require_once '../db.php';

if (isset($_GET['item_id'])) {
    // 商品IDを取得
    $item_id = $_GET['item_id'];

    // items.id で検索して商品を取得
    $sql = "SELECT * FROM items WHERE id = {$item_id};";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    //データを１つとる
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        // セッションにカート情報を登録する
        $_SESSION['my_shop']['cart'][$item['id']] = $item;
    }
}

$cart_items = [];
if (isset($_SESSION['my_shop']['cart'])) {
    $cart_items = $_SESSION['my_shop']['cart'];
}
// var_dump($_SESSION['my_shop']['cart']);

$amount_list = range(1, 10);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <h2 class="p-2 text-center">ショッピングカート</h2>

        <a href="./">商品一覧へ</a>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if ($cart_items) : ?>
                <?php foreach ($cart_items as $cart_item) : ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= $cart_item['name'] ?></h5>
                                <p class="card-text text-danger">&yen;<?= $cart_item['price'] ?></p>
                                <div class="d-flex">
                                    <a href="delete.php?item_id=<?= $cart_item['id'] ?>">削除</a>
                                    <div class="ms-3">
                                        <form action="" method="get">
                                            <select name="amount">
                                                <option value="">-- 個数 --</option>
                                                <?php foreach ($amount_list as $amount):  ?>
                                                <option value="<?= $amount ?>"><?= $amount ?></option>
                                                <?php endforeach  ?>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>

        <div class="mt-4">
            <p>
                商品を購入しますか？
            </p>
            <form action="purchase.php" method="post">
                <button class="btn btn-primary">購入</button>
            </form>
        </div>
    </main>
</body>

</html>