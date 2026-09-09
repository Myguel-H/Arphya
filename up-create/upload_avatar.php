<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /pages/login.php');
    exit();
}

if ($_FILES['avatar']['error'] != 0) {
    header('Location: /pages/profile.php?error=1');
    exit();
}

$arquivo = $_FILES['avatar'];
$tipos = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

if (!in_array($arquivo['type'], $tipos)) {
    header('Location: /pages/profile.php?error=tipo');
    exit();
}

if ($arquivo['size'] > 2 * 1024 * 1024) {
    header('Location: /pages/profile.php?error=tamanho');
    exit();
}

$stmt = $pdo->prepare("SELECT avatar FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$avatarAntigo = $stmt->fetchColumn();

if ($avatarAntigo && file_exists('uploads/avatars/' . $avatarAntigo)) {
    unlink('uploads/avatars/' . $avatarAntigo);
}

$ext = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
$nome = 'avatar_' . $_SESSION['user_id'] . '_' . time() . '.' . $ext;
$caminho = 'uploads/avatars/' . $nome;

if (!move_uploaded_file($arquivo['tmp_name'], $caminho)) {
    header('Location: /pages/profile.php?error=upload');
    exit();
}

$stmt = $pdo->prepare("UPDATE users SET avatar = ? WHERE id = ?");
$stmt->execute([$nome, $_SESSION['user_id']]);

header('Location: /pages/profile.php?success=1');
exit();
?>