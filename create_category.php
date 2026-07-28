<?php
require_once 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';


    if ($action == 'create') {
        $name = $_POST['name'] ?? '';
        $link = $_POST['link'] ?? '';
        $description = $_POST['description'] ?? '';

        try {
            $stmt = $pdo->prepare('INSERT INTO categories (name, link, description) VALUES (?, ?, ?)');
            $stmt->execute([$name, $link, $description]);
            header('Location: /pages/add_categories.php?registered=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /pages/add_categories.php?error=1') . $e->getMessage();
            exit();
        }
    }
}
header('Location: /');
exit();
?>