<?php
session_start();
$user_id = $_SESSION['user_id'] ?? 0;

if ($user_id > 0) {
  $profile = "/pages/profile.php";
} else {
  $profile = "/pages/login.php";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HostHome - Home</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!--------------------------- H    E    A    D    E    R --------------------------->
  <!--Logo e Nome-->
  <header>
    <div class="logo-name">
      <img class="logo-icon" src="/static/logohosthome.webp" alt="Logo">
      <a href="/">
        <h2>HostHome - <strong style="color: #dd1e1e; text-decoration: none">Fase Beta, ainda em teste!</strong></h2>
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

      <!--Icone de person-->
      <div class="person-icon"></div>
      <button class="btn-login" id="menu">
        <a href="<?= $profile ?>">
          <img src="/static/person-icon.png" alt="icon-login">
        </a>
      </button>

      <!--Input de busca-->
      <div class="search-container">
        <input id="search" type="text" placeholder="O que é UDP ?" class="search-input">
        <label for="search" class="search-icon">
          <img src="/static/search-icon.webp" alt="Search Icon">
        </label>
      </div>
    </div>
  </header>

  <!------------------------- B    O    D    Y --------------------------->
  <!--Table sidebar category/down-header-->
  <table class="sidebar-down-header">
    <tbody>
      <tr>
        <td>
          <a href="/teste">Protocolos</a>
        </td>
        <td>
          <a href="">GNU/Linux</a>
        </td>
        <td>
          <a href="">Softwares Livres</a>
        </td>
        <td>
          <a href="">Linux</a>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="main-wrapper">
    <div class="content">
      <h2>Bem vindo, nesta aplicação você consegue encontrar conteúdo autentico para aprender sobre tecnologia</h2>
      <div class="content-text">
        <h3>Importancia do GNU/Linux no mundo</h3>
        <p>O GNU/Linux não é apenas um sistema operacional; é um pilar fundamental da infraestrutura tecnológica global.
          Muitas vezes invisível para o usuário comum, ele sustenta desde a bolsa de valores até o smartphone na sua
          mão,
          representando um dos exemplos mais bem-sucedidos de colaboração em massa e liberdade digital.

          Em primeiro lugar, sua importância reside na estabilidade e segurança. Diferente de sistemas proprietários que
          dependem de um único fornecedor, o Linux é auditado por milhares de desenvolvedores ao redor do mundo. Por
          isso,
          ele é o coração da internet: cerca de 90% dos servidores web rodam Linux. A Nasa, o Google, a bolsa de Nova
          York
          e a defesa de diversos países confiam nele justamente pela capacidade de operar por anos sem reinicializações
          e
          com resistência superior a malwares.

          Em segundo lugar, o GNU/Linux é o pilar da inovação tecnológica moderna. O sistema Android, que domina o
          mercado
          de smartphones, é construído sobre o kernel Linux. Praticamente todos os supercomputadores do mundo (100% da
          lista TOP500) utilizam Linux. A computação em nuvem (Amazon AWS, Microsoft Azure, Google Cloud) e o
          ecossistema
          de contêineres (Docker, Kubernetes) são nativos do Linux. Sem ele, a revolução da inteligência artificial, da
          ciência de dados e da Internet das Coisas (IoT) seria extremamente limitada.

          Além disso, existe um impacto filosófico e econômico. O GNU/Linux popularizou o conceito de software livre,
          garantindo ao usuário quatro liberdades essenciais: executar, estudar, modificar e distribuir o código. Isso
          quebrou monopólios, permitiu que países em desenvolvimento tivessem acesso a tecnologia de ponta sem pagar
          licenças caríssimas, e fomentou uma economia bilionária de serviços e suporte, criando empregos em todo o
          mundo.

          Por fim, para o usuário comum, o Linux oferece diversidade e liberdade de escolha. Existem centenas de
          distribuições (Ubuntu, Fedora, Debian, Mint) que permitem reviver computadores antigos, personalizar
          totalmente
          o ambiente ou focar em privacidade. Enquanto outros sistemas tratam o usuário como produto, o Linux trata o
          usuário como agente livre.

          Concluindo, o GNU/Linux é um patrimônio da humanidade. Ele representa a prova de que a colaboração aberta pode
          vencer o desenvolvimento fechado, oferecendo ao mundo uma plataforma mais justa, segura e poderosa. Sem ele, a
          tecnologia seria mais cara, menos segura e concentrada nas mãos de poucos. Portanto, cada vez que você navega
          na
          web, envia uma mensagem ou usa um serviço na nuvem, é muito provável que esteja, silenciosamente, sendo
          atendido
          pelo GNU/Linux.
        </p>

        <p>O que é GNU/Linux ? <a href="https://www.vivaolinux.com.br/linux/">clique aqui</a></p>
        <p>Historia do GNU/Linux ? <a href="https://www.vivaolinux.com.br/artigo/Historia-do-GNU-Linux-1965-assim-tudo-comecou/">clique aqui</a></p>
        <p>Porque GNU/Linux ? <a href="https://www.vivaolinux.com.br/artigo/GNU-Linux-Depois-dele-o-mundo-nao-e-mais-o-mesmo/">clique aqui</a></p>

      </div>
    </div>

    <!--Card da descrição do GNU/Linux-->
    <div class="description-linux">
      <div class="description-name-card">GNU/Linux</div>
      <img src="/static/gnulinux-img.svg.png" alt="Gnu/Linux">
      <div class="description-text">
        <p>O GNU/Linux é um sistema operacional livre e gratuito, baseado no kernel Linux e no software livre do GNU.
        </p>
      </div>
    </div>

    <!--Card API de notícias-->
    <div class="notice-container">
      <?php include 'api-notice.php'; ?>
    </div>


    <!------------------------- F    O    O    T    E    R --------------------------->

    <div class="footer-container">
      <p>
        <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
      </p>
    </div>
  </div>



</body>

</html>