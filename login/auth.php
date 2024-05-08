<?php
require_once "../db.php";

$login = $_POST;
$email = $login['email'];
$password = $login['password'];

$sql = "SELECT * FROM users WHERE email = :email;";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    header('Location: ../user/');
} else {
    header('Location: input.php');
}
