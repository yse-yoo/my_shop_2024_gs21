<?php 
// セッションを開始
session_start();
// セッションIDを再発行
session_regenerate_id(true);

// セッションがあれば取得
if (!empty($_SESSION['my_shop']['regist'])) {
    $regist = $_SESSION['my_shop']['regist'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Register</h2>
    <form action="confirm.php" method="post">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="<?= @$regist['name'] ?>">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" value="<?= @$regist['email'] ?>">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <button>Next</button>
        </div>
    </form>
</body>
</html>