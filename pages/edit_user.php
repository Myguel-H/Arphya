<?php
require_once '../config.php';
session_start();
$user_id = $_SESSION['user_id'] ?? 0;
$isAdmin = !empty($_SESSION['admin']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Hosthome</title>
    <link class="logo-title" rel="icon" href="../static/logohosthome.webp" type="img-icon">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!--------------------------- H    E    A    D    E    R --------------------------->
    <!--Logo e Nome-->
    <header>
        <div class="logo-name">
            <img class="logo-icon" src="/static/logohosthome.webp" alt="Logo">
            <a href="/">
                <h2>HostHome - Perfil</h2>
            </a>
        </div>

        <div class="header-actions">
            <!---Menu header-->
            <nav>
                <ul class="menu">
                    <li><a href="/">Início</a></li>
                    <li><a href="/pages/publications.php">Publicações</a></li>
                    <li><a href="#">Tags</a></li>
                </ul>
            </nav>

            <div class="user-info">
                <!--Icone de person-->
                <div class="person-icon"></div>
                <button class="btn-login" id="menu">
                    <a href="/pages/profile.php">
                        <img src="/static/person-icon.png" alt="icon-login">
                    </a>
                </button>
                <?php
                if ($user_id > 0) {
                    $stmt = $pdo->prepare("SELECT name FROM users WHERE id = ?");
                    $stmt->execute([$user_id]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user) {
                        ?>
                        <p><?= htmlspecialchars($user['name']) ?></p>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </header>


    <div class="sidebar-lateral">
        <nav>
            <ul class="sidebar-actions">
                <h3>Sobre as publicações</h3>
                <li><a href="/pages/add_publication.php">Publicar</a></li>
                <li><a href="/pages/publications.php">Publicações</a></li>
                <li><a href="/pages/timeline.php">Timeline</a></li>
                <?php if ($isAdmin): ?>
                <h3>Administrador</h3>
                <li><a href="/admin/conf_users.php">Usuarios</a></li>
                <li><a href="/admin/conf_publications.php">Publicações</a></li>
                <li><a href="/admin/conf_categories.php">Categorias</a></li>
                <?php endif; ?>
                <h3>Sobre</h3>
                <li><a href="#">Configurações</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>

    <div class="update-user">
        <form action="../upload_avatar.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="avatar" >
            <button class="btn" type="submit">Enviar</button>
        </form>
</body>