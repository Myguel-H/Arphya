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
    <title>Timeline - Arphya</title>
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
                <h2><strong>Arphya</strong></h2>
            </a>
        </div>

        <div class="header-actions">
            <!---Menu header-->
            <nav>
                <ul class="menu">
                    <li><a href="/">Início</a></li>
                    <li><a href="/pages/add_publication.php">Publicar</a></li>
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
    <!------------------------- B    O    D    Y --------------------------->

    <div class="sidebar-lateral">
        <nav>
            <ul class="sidebar-actions">
                <h3>Sobre as publicações</h3>
                <?php if(!empty($_SESSION['user_id'])): ?>
                <li><a href="/pages/add_categories.php">Criar Categoria</a></li>
                <?php endif; ?>
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

    <div class="add-publication timeline-page">
        <?php
        require_once '../config.php';

        $stmt = $pdo->prepare("SELECT p.id, p.title, p.resume, p.about, u.name as criador, c.name as categoria, p.content, p.creation_date FROM publications p JOIN users u ON p.user_id = u.id JOIN categories c ON p.category_id = c.id");
        $stmt->execute();
        $publications = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($publications) > 0) {
            ?>
        <div class="pub-container">
            <?php
            foreach ($publications as $pub) {
                ?>
            <div class="pub-itens">

                <p><strong>Titulo
                        <?php if ($isAdmin): ?>-<strong style="color: #dd1e1e; text-decoration: none;"> #ID
                            <?= htmlspecialchars($pub['id']) ?>
                        </strong>
                        <?php endif; ?>
                    </strong>
                    <?= htmlspecialchars($pub['title']) ?>
                </p>

                <p><strong>Resumo</strong>
                    <?= htmlspecialchars($pub['resume']) ?>
                </p>

                <p><strong>Sobre</strong>
                    <?= htmlspecialchars($pub['about']) ?>
                </p>

                <p><strong>Criador</strong>
                    <?= htmlspecialchars($pub['criador']) ?>
                </p>

                <p><strong>Categoria</strong>
                    <?= htmlspecialchars($pub['categoria']) ?>
                </p>

                <p><strong>Conteudo</strong>
                    <span class="content-nl">
                        <?= htmlspecialchars($pub['content']) ?>
                    </span>
                </p>

                <p><strong>Cadastro:</strong>
                    <?= date('d/m/Y', strtotime($pub['creation_date'])) ?>
                </p>

            </div>
            <?php
            }
            ?>
        </div>
        <?php
        } elseif ($user_id > 0) {
            
            echo "<p>Nada foi publicado ainda ! Seja o primeiro a publicar, <a href='/pages/add_publication.php'>Clique aqui</a>.</p>";
        }  else {
            
            echo "<p>Nada foi publicado ainda ! Seja o primeiro a publicar, <a href='/pages/login.php'>Clique aqui</a>.</p>";
        }
        ?>

    </div>

    <!------------------------- F    O    O    T    E    R --------------------------->

    <div class="footer-container">
        <p>
            <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
        </p>
    </div>
    </div>

</body>