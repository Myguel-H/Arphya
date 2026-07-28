<?php
require_once 'config.php';
session_start();

$user_id = $_SESSION['user_id'] ?? 0;
$profile = ($user_id > 0) ? '/pages/profile.php' : '/pages/login.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre Arphya</title>
  <link class="logo-title" rel="icon" href="/static/logohosthome.webp" type="image/webp">
  <link rel="stylesheet" href="/style.css">
  <!-- Splide carousel CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css">
  <!-- Página usa o estilo padrão do projeto com pequenas regras via `.about-page` -->
</head>

<body>

  <!--Logo e Nome-->
  <header>
    <div class="logo-name">

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
          <li><a href="#">Tags</a></li>
          <li><a href="/pages/timeline.php">Timeline</a></li>
        </ul>
      </nav>

      <div class="user-info">
        <!--Icone de person-->
        <div class="person-icon"></div>
        <button class="btn-login" id="menu">
          <a href="<?= $profile ?>">
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

      <!--Input de busca-->
      <div class="search-container">
        <form method="GET" action="/search.php">
          <input type="text" name="search" placeholder="O que é UDP ?" class="search-input">


          <label for="search" class="search-icon">
            <button class="search-icon" type="submit"><img src="/static/search-icon.webp" alt="Search Icon"></button>
          </label>

        </form>
      </div>
  </header>

  <main class="about-page">
    <h2>Sobre o projeto Arphya</h2>

    <p>
      <strong>O que é o projeto Arphya?</strong>
      É um website com o objetivo de promover a divulgação e o conhecimento sobre tecnologia por meio de
      publicações. O foco é permitir que um usuário interessado em uma área específica encontre conteúdo dentro
      do Arphya. Por exemplo: se alguém quer saber mais sobre protocolos de internet ou redes, no Arphya o
      usuário pode publicar ou ler conteúdo relacionado e usar a barra de pesquisa para encontrar posts relevantes.
    </p>

    <p>
      <strong>Por que desenvolver algo assim?</strong>
      Hoje, com o fácil acesso à internet, podemos consultar Wikipedia, mecanismos de busca e comunidades como
      Stack Overflow. Ainda assim, o Arphya busca simplicidade e agilidade: alguns sites exigem cadastro, exibem
      anúncios ou não têm o conteúdo desejado. No Arphya, você pode ler e também adicionar conteúdo gratuitamente —
      funciona como um repositório comunitário de publicações.
    </p>

    <p>
      <strong>Por que Arphya?</strong>
      Ao escolher o nome quis fazer uma referência à maior rapina do mundo originária do Brasil — a harpia
      (Harpia harpyja). O nome 'Arphya' tem inspiração na sonoridade de 'harpia'.
    </p>

    <p>
      O projeto é software livre; você pode encontrá-lo no GitHub: <a href="https://github.com/Myguel-H/Arphya"
        target="_blank" rel="noopener">Projeto-Arphya</a>.
    </p>

    <p><strong>Desenvolvedor</strong>: Myguel Henryque</p>

    <section>
      <h2>Contatos</h2>
      <div class="social-links">
        <div>
          <img src="/static/icons/gmail.png" alt="gmail" width="20" height="20">
          <a href="mailto:myguelhenry05@gmail.com">myguelhenry05@gmail.com</a>
        </div>
        <div>
          <img src="/static/icons/github.png" alt="github" width="20" height="20">
          <a href="https://github.com/Myguel-H" target="_blank" rel="noopener">GitHub</a>
        </div>
        <div>
          <img src="/static/icons/linkedin.png" alt="linkedin" width="20" height="20">
          <a href="https://www.linkedin.com/in/myguel-henryque-1160b72a1" target="_blank" rel="noopener">LinkedIn</a>
        </div>
        <div>
          <img src="/static/icons/lattes.png" alt="lattes" width="20" height="20">
          <a href="http://lattes.cnpq.br/3171242305410582" target="_blank" rel="noopener">Lattes</a>
        </div>
      </div>
    </section>
  </main>


  <div class="splide" id="carousel-empresas">
    <h2 class="carousel-title">Ferramentas Utilizadas</h2>
    <div class="splide__track">
      <div class="splide__list">

        <div class="splide__slide">
          <img src="/static/tools/github.png" alt="GitHub Tool">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/debian.png" alt="Debian">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/php.png" alt="PHP">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/vscode.png" alt="VSCode">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/postgresql.png" alt="PostgreSQL">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/cloudflare.png" alt="Cloudflare">
        </div>
        <!-- UTFPR slide (adicionar arquivo /static/tools/utfpr.png) -->
        <div class="splide__slide">
          <img src="/static/tools/utfpr.png" alt="UTFPR">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/github.png" alt="GitHub Tool">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/debian.png" alt="Debian">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/php.png" alt="PHP">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/vscode.png" alt="VSCode">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/postgresql.png" alt="PostgreSQL">
        </div>
        <div class="splide__slide">
          <img src="/static/tools/cloudflare.png" alt="Cloudflare">
        </div>
        <!-- UTFPR slide (adicionar arquivo /static/tools/utfpr.png) -->
        <div class="splide__slide">
          <img src="/static/tools/utfpr.png" alt="UTFPR">
        </div>
      </div>
    </div>
  </div>


  <!-- Splide JS and initialization -->
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var splide = new Splide('#carousel-empresas', {
        type: 'loop',
        perPage: 4,
        perMove: 1,           // ← move 1 slide por vez, fica mais fluido com o loop
        gap: '1.5rem',
        autoplay: true,
        interval: 3000,
        speed: 1200,
        easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
        pauseOnHover: true,
        pagination: false,    // ← com loop + duplicatas, a paginação por bolinhas fica confusa; desative
        arrows: false,
        breakpoints: {
          1200: { perPage: 5 },
          992: { perPage: 4 },
          768: { perPage: 3 },
          576: { perPage: 2 },
          400: { perPage: 1 }
        }
      });

      splide.mount();
    });
  </script>

  <footer class="footer-container">
    <p>
      <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
    </p>
  </footer>

</body>

</html>