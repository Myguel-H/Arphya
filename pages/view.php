<?php
session_start();
require_once '../config.php';

$id = $_GET['id'] ?? 0;

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM publications WHERE id = ?");
    $stmt->execute([$id]);
    $pub = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?= htmlspecialchars($pub['title'] ?? 'Publicação') ?></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="publication-view">
    <?php if ($pub): ?>
        <h1><?= htmlspecialchars($pub['title']) ?></h1>
        <p><strong>Resumo:</strong> <?= htmlspecialchars($pub['resume'] ?? '') ?></p>
        <p><strong>Sobre:</strong> <?= htmlspecialchars($pub['about'] ?? '') ?></p>
        <div class="content"><?= nl2br(htmlspecialchars($pub['content'] ?? '')) ?></div>
        <small><?= date('d/m/Y', strtotime($pub['created_at'])) ?></small>
        <a href="/pages/timeline.php">← Voltar</a>
    <?php else: ?>
        <h1>Publicação não encontrada</h1>
    <?php endif; ?>
</div>

</body>
</html>