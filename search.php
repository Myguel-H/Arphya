<?php
require_once 'config.php';
session_start();

$termo = $_GET['search'] ?? '';

if (!empty($termo)) {
    try {
        $termo_busca = "%$termo%";

        // BUSCA EM PUBLICAÇÕES - title OU about OU resume OU content
        $stmt_pub = $pdo->prepare("
            SELECT id, title, resume, about, content, creation_date as created_at, 'publication' as tipo 
            FROM publications 
            WHERE title ILIKE ? OR about ILIKE ? OR resume ILIKE ? OR content ILIKE ?
        ");
        $stmt_pub->execute([$termo_busca, $termo_busca, $termo_busca, $termo_busca]);
        $publicacoes = $stmt_pub->fetchAll();

        // BUSCA EM CATEGORIAS
        $stmt_cat = $pdo->prepare("
            SELECT id, name, description, link, 'category' as tipo 
            FROM categories 
            WHERE name ILIKE ? OR description ILIKE ?
        ");
        $stmt_cat->execute([$termo_busca, $termo_busca]);
        $categorias = $stmt_cat->fetchAll();

        $resultados = array_merge($categorias, $publicacoes);

        $_SESSION['resultados'] = $resultados;
        $_SESSION['termo'] = $termo;

        header('Location: /pages/return.php?success=1');
        exit();
    } catch (PDOException $e) {
        header('Location: /pages/return.php?error=1');
        exit();
    }
}

header('Location: /');
exit();
?>