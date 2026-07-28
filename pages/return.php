<?php
session_start();
require_once '../config.php';

$resultados = $_SESSION['resultados'] ?? [];
$termo = $_SESSION['termo'] ?? '';

unset($_SESSION['resultados']);
unset($_SESSION['termo']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Arphya - Pesquisa</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="search-results">
        <h2>Resultados para: <?= htmlspecialchars($termo) ?></h2>

        <?php if (count($resultados) > 0): ?>
            <p class="search-info"><?= count($resultados) ?> resultado(s) encontrado(s)</p>

            <?php foreach ($resultados as $item): ?>
                <div class="resultado-item">

                    <?php if ($item['tipo'] == 'category'): ?>
                        <h3>
                            <a href="<?= htmlspecialchars($item['link'] ?? '#') ?>">
                                <?= htmlspecialchars($item['name']) ?>
                            </a>
                        </h3>
                        <p><?= htmlspecialchars($item['description'] ?? '') ?></p>
                        <a href="<?= htmlspecialchars($item['link'] ?? '#') ?>" class="btn">Ler Publicação</a>

                    <?php else: ?>
                        <h3>
                            <a href="/pages/view.php?id=<?= $item['id'] ?>">
                                <?= htmlspecialchars($item['title']) ?>
                            </a>
                        </h3>
                        <p><?= htmlspecialchars($item['about'] ?? '') ?></p>
                        <small><?= date('d/m/Y', strtotime($item['created_at'])) ?></small>
                        <a href="/pages/view.php?id=<?= $item['id'] ?>" class="btn">Ler Publicação</a>

                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <p>Nenhum resultado encontrado para "<?= htmlspecialchars($termo) ?>"</p>
        <?php endif; ?>

        <a href="/">← Voltar</a>
    </div>

</body>

</html>