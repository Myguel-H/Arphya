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
    <title>Editar Perfil - Arphya</title>
    <link class="logo-title" rel="icon" href="../static/logohosthome.webp" type="img-icon">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!--------------------------- H    E    A    D    E    R --------------------------->
    <header>
        <div class="logo-name-pages">
            <a href="/">
                <img src="/static/arphya_name_logowhite.png" alt="Arphya">
            </a>
        </div>

        <div class="header-actions">
            <nav>
                <ul class="menu">
                    <li><a href="/">Início</a></li>
                    <li><a href="/pages/publications.php">Publicações</a></li>
                    <li><a href="#">Tags</a></li>
                </ul>
            </nav>

            <div class="user-info">
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
                <p>
                    <?= htmlspecialchars($user['name']) ?>
                </p>
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
                <li><a href="/about.php">Sobre</a></li>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>

    <div class="update-user">

        <?php

        $user_id = $_SESSION['user_id'] ?? 0;

        if ($user_id > 0) {
            ?>
        <div class="update-user-card">

            <!-- coluna esquerda: upload de avatar -->
                <div class="update-user-avatar">
                    <form action="../upload_avatar.php" method="POST" enctype="multipart/form-data">
                        <label class="file-label" for="avatar-input" id="avatar-label">
                            Escolher imagem
                        </label>
                        <input type="file" name="avatar" id="avatar-input"
                            onchange="document.getElementById('avatar-label').textContent = this.files[0] ? this.files[0].name : 'Escolher imagem'; document.getElementById('avatar-label').classList.toggle('has-file', !!this.files[0]);">
                        <button class="btn" type="submit">Enviar imagem</button>
                    </form>
                </div>

                <!-- coluna direita: dados do usuário -->
                <div class="update-user-fields">
                    <form action="../update_user.php" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $user_id ?>">

                        <label>Nome:</label>
                        <input type="text" name="name" placeholder="Altere seu nome">

                        <label>Email:</label>
                        <input type="email" name="email" placeholder="Altere seu email">

                        <label>Idade:</label>
                        <input type="number" name="age" placeholder="Altere sua idade">

                        <label>Sexo:</label>
                        <select name="sex">
                            <option value="">Manter o atual</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>

                        <label>Telefone:</label>
                        <input type="text" name="phone" placeholder="Altere seu telefone">

                        <label>Sobre você:</label>
                        <textarea name="about" placeholder="Atualize seu sobre"></textarea>

                        <button type="submit">Salvar</button>
                    </form>
                </div>

            </div>
        <?php } else { ?>
            <div class="login-message">
                <p>Por favor, faça login para alterar seus dados.</p>
            </div>
        <?php } ?>
    </div>

</body>

</html>