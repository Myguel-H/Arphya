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
    <title>Administrador - Arphya</title>
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
                <h2><strong>Arphya</strong> - <strong style="color: #dd1e1e; text-decoration: none;">Administrador</strong></h2>
            </a>
        </div>

        <div class="header-actions">
            <!---Menu header-->
            <nav>
                <ul class="menu">
                    <li><a href="/">Início</a></li>
                    <li><a href="/pages/profile.php">Perfil</a></li>
                    <li><a href="/admin/conf_categories.php"><strong style="color: #dd1e1e;">*</strong>Category</a></li>
                    <li><a href="/admin/conf_publications.php"><strong style="color: #dd1e1e;">*</strong>Publicações</a></li>
                </ul>
            </nav>

            <div class="user-info">
                <!--Icone de person-->
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
                        <p><strong style="color: #dd1e1e;"><?= htmlspecialchars($user['name']) ?></strong></p>
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
                <li><a href="/pages/add_publication.php">Publicar</a></li>
                <li><a href="#">Apagadas</a></li>
                <li><a href="#">Favoritas</a></li>
                <li><a href="/pages/timeline.php">Timeline</a></li>
                <?php if ($isAdmin): ?>
                <h3>Administrador</h3>
                <li><a href="/admin/conf_users.php">Usuarios</a></li>
                <li><a href="/admin/conf_publications.php">Publicações</a></li>
                <li><a href="/admin/conf_categories.php">Categorias</a></li>
                <?php endif; ?>
                <h3>Sobre</h3>
                <li><a href="#">Configurações</a></li>
                <li><a href="#">Ajuda</a></li>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>

    <div class="tables">
        <!--Tabela usuarios-->
        <div class="user-list">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $stmt = $pdo->query("SELECT id, name, email, type FROM users");
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($users as $row):
                        ?>
                        <tr>
                            <td>
                                <?= $row['id'] ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['email']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['type']) ?>
                            </td>
                            <td>
                                <form action="../delete_user.php" method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit">Deletar</button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!------------------------- F    O    O    T    E    R --------------------------->

</body>