<?php
session_start();
require_once '../config.php';
$user_id = $_SESSION['user_id'] ?? 0;
$isAdmin = !empty($_SESSION['admin']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Arphya</title>
    <link class="logo-title" rel="icon" href="../static/logohosthome.webp" type="img-icon">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <!--------------------------- H    E    A    D    E    R --------------------------->
    <!--Logo e Nome-->
    <header>
        <div class="logo-name-pages">
            <a href="/">
                <img src="/static/arphya_name_logowhite.png" alt="Arphya">
            </a>
        </div>

        <div class="header-actions">
            <!---Menu header-->
            <nav>
                <ul class="menu">
                    <li><a href="/">Início</a></li>
                    <li><a href="/pages/publications.php">Publicações</a></li>
                    <li><a href="/pages/add_publication.php">Publicar</a></li>
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

    <!------------------------- B    O    D    Y --------------------------->

    <div class="sidebar-lateral">
        <nav>
            <ul class="sidebar-actions">
                <h3>Sobre as publicações</h3>
                <li><a href="/pages/timeline.php">Timeline</a></li>
                <li><a href="#">Apagadas</a></li>
                <li><a href="#">Favoritas</a></li>
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

    <div class="profile-user">
        <div class="data-user">
            <?php


            if ($user_id > 0) {

                $stmt = $pdo->prepare("SELECT name, email, age, sex, phone, avatar, data_cadastro, about, type FROM users WHERE id = ?");
                $stmt->execute([$user_id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    ?>

            <img class="img-user"
                src="<?= $user['avatar'] ? '/uploads/avatars/' . htmlspecialchars($user['avatar']) : '/static/person-icon.png' ?>"
                alt="avatar">

            <p class="data-about"><strong>Sobre mim:</strong>
                <span>
                    <?= htmlspecialchars($user['about'] ?? 'Você ainda não falou sobre você') ?>
                </span>
                <a class="edit-field" href="/pages/edit_user.php?field=about" title="Editar sobre">
                    <img src="../static/edit-button.png" alt="editar">
                </a>
            </p>




            <p><strong>Nome:</strong>
                <span>
                    <?= htmlspecialchars($user['name']) ?>
                </span>
                <a class="edit-field" href="/pages/edit_user.php?field=name" title="Editar nome">
                    <img src="../static/edit-button.png" alt="editar">
                </a>
            </p>
            <p><strong>Email:</strong>
                <span>
                    <?= htmlspecialchars($user['email']) ?>
                </span>
                <a class="edit-field" href="/pages/edit_user.php?field=email" title="Editar email">
                    <img src="../static/edit-button.png" alt="editar">
                </a>
            </p>
            <p><strong>Idade:</strong>
                <span>
                    <?= htmlspecialchars($user['age'] ?? 'dado não encontrado') ?>
                </span>
                <a class="edit-field" href="/pages/edit_user.php?field=age" title="Editar idade">
                    <img src="../static/edit-button.png" alt="editar">
                </a>
            </p>
            <p><strong>Sexo:</strong>
                <span>
                    <?= htmlspecialchars($user['sex'] ?? 'dado não encontrado') ?>
                </span>
                <a class="edit-field" href="/pages/edit_user.php?field=sex" title="Editar sexo">
                    <img src="../static/edit-button.png" alt="editar">
                </a>
            </p>
            <p><strong>Telefone:</strong>
                <span>
                    <?= htmlspecialchars($user['phone'] ?? 'dado não encontrado') ?>
                </span>
                <a class="edit-field" href="/pages/edit_user.php?field=phone" title="Editar telefone">
                    <img src="../static/edit-button.png" alt="editar">
                </a>
            </p>
            <p><strong>Tipo:</strong>
                <span>
                    <?= htmlspecialchars($user['type']) ?>
                </span>
            </p>
            <p><strong>Img:</strong>
                <span>
                    <?= htmlspecialchars($user['avatar'] ?? 'Sem foto') ?>
                </span>
                <a class="edit-field" href="/pages/edit_user.php?field=avatar" title="Editar imagem">
                    <img src="../static/edit-button.png" alt="editar">
                </a>
            </p>
            <p><strong>Cadastro:</strong>
                <span>
                    <?= date('d/m/Y', strtotime($user['data_cadastro'])) ?>
                </span>
            </p>


            <?php } else {
                    echo "<p>USUARIO NAO ECONTRADO</p>";
                }
            } else {
                echo "<p>Você não está logado, faça login para poder visualizar! </p>";
            } ?>
        </div>

    </div>

    <!------------------------- F    O    O    T    E    R --------------------------->

    <div class="footer-container">
        <p>
            <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
        </p>
    </div>

</body>