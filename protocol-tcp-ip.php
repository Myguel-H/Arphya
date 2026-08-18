<?php
session_start();
require_once 'config.php';
$user_id = $_SESSION['user_id'] ?? '';

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
    <title>Protocolo TCP/IP</title>
    <link class="logo-title" rel="icon" href="../static/logohosthome.webp" type="img-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!--------------------------- H    E    A    D    E    R --------------------------->
    <!--Logo e Nome-->
    <header>
        <div class="logo-name">

            <a href="/">
                <img src="/static/arphya_logo.png" alt="Arphya">
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
                <button class="btn-login" title="">
                    <a href="<?= $profile ?>" title="Entrar">
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
                    <label for="search" class="search-icon" title="Pesquisar">
                        <button class="search-icon" type="submit"><img src="/static/search-icon.webp"
                                alt="Search Icon"></button>
                    </label>

                </form>
            </div>
        </div>


    </header>

    <div class="publis-content">
        <h1>Protocolo TCP/IP</h1>

        <div class="content">
            <h3>A história um pouco antes do protocolo mais importante do mundo, o TCP/IP</h3>

            <p>
                Historicamente, entendendo um pouco, tudo começou alguns anos depois do início da Guerra Fria
                (1947–1991). Por volta da década de 1950, foi criado um órgão de pesquisa pelo Departamento de
                Defesa
                dos E.U.A., chamado de ARPA, hoje conhecido como
                <a title="Saber mais sobre o DARPA" href="/">DARPA</a>
                (Defense Advanced Research Projects Agency). Uma agência americana que visava inicialmente ao
                desenvolvimento de projetos e tecnologias avançadas para a área militar.
            </p>

            <p>
                Essa mesma agência, no final dos anos 1960, criou um projeto chamado
                <a href="/">ARPANET</a>
                (<span style="font-style: italic;">Advanced Research Projects Agency Network</span>),
                que era responsável pelo desenvolvimento de uma nova tecnologia que idealizava maior segurança
                e menores riscos na comunicação, principalmente por meio da descentralização da comunicação.
                Na época em que surgiu, a Guerra Fria estava em seu auge, o que possibilitou avanços tecnológicos
                que, posteriormente, seriam considerados futuristas.
            </p>

            <p>
                Já nessa mesma época, mais especificamente em 1979, a ARPANET e o governo militar se depararam
                com um problema relacionado aos limites de comunicação entre os computadores. Naquela época,
                era utilizado, como padrão, o <a title="Saber mais sobre NCP" href="/">NCP</a>
                (<span style="font-style: italic;">Network Control Protocol</span>),
                um dos primeiros protocolos de rede para comunicação entre computadores que funcionava a longa
                distância (ponta a ponta).
            </p>

            <p>
                O NCP era "revolucionário" para a época, pois as máquinas já podiam se comunicar a longas
                distâncias.
                Porém, existiam muitos limites. Alguns deles eram: funcionava apenas dentro de uma rede "interna",
                não era aberta ao público e apenas computadores específicos podiam se comunicar.
                Além disso, softwares diferentes muitas vezes não conseguiam se comunicar entre si e dependiam
                de hardwares muito específicos para transmitir as mensagens, como os IMPs
                (<span style="font-style: italic;">Interface Message Processor</span>), entre outros.
            </p>

            <p>
                Assim, com as limitações do antigo NCP, surgiu o modelo atual e mais importante para a comunicação
                na Internet: o TCP/IP, que hoje é utilizado como base para a comunicação na Internet e substituiu
                o NCP. O TCP/IP foi desenvolvido na mesma época de criação do DARPA e teve seu desenvolvimento
                impulsionado pela própria agência. Como era comum utilizar o NCP, o TCP/IP ainda não era uma opção
                imediata para substituição do protocolo.
            </p>



            <h3>Surgimento do modelo TCP/IP</h3>

            <p>
                O TCP/IP teve seus priemiro passos em 1969 pelo DARPA, e era apenas um complementou/recurso do projeto
                ARPANET,
                hoje em dia muitos entende e ve ele como um protocolo, nao esta errado ! Porem ele mais é um modelo do
                que um protoclo
                por si só, pois ele utiliza dois protoclos, TCP -
            <p style="font-style: italic;">Protocol Comunication Transport</p>
            e IP - <p style="font-style: italic;">Protocol Internet</p> assim surgindo da junção desses
            dois protocolos o
            que conhecemos hoje como TCP/IP. Ele foi arquitetado com uma maniera genial chamada de <a href="/">packet
                switching</a>
            (<span style="font-style: italic;">comutação de pacotes</span>) que seguia uma passo simples,
            enviava um pacote individualmente pela rede, asssim se caso um pacote for "destruido" ele seguiria
            com outras rotas, assim tambem buscando a rota mais rapida ate o destinatário. <strong>Curiosidade</strong>:
            O objetivo principal surgiu
            do temor de acontecer uma guerra nuclear, entao assim os cientistas procuravam um metodo que mesmo em caso
            de guerra,
            com a queda da comunicação eles conseguissem se comunicar.
            </p>

            <p>
                Alguns anos depois do surgimentos do modelo ele se tornou conhecido entre a comunidade, em 1972 ja era
                conhecido mundialmente.
                Em 1974 houve a 'primeira' apresentação oficial sobre o modelo TCP/IP escrito por
                Vint Cerf e Robert Kahn, apresentando que conceito do modelo TCP/IP demonstoru que ele poderia
                funcionar em diferentes redes e suportar múltiplas interconexões, algo muito superior para as
                arquiteturas e modelos da epoca.
            </p>


            <div class="publi-destaque">
                <img src="/static/pubs-img/plaque-TCP-IP.png" alt="Placa de reconhecimento do TCP/IP">
                <p style="font-style: italic; font-size: 10px;">
                    Marco do IEEE reconhecendo o TCP/IP como avanço tecnológico mundial - fonte:
                    ethw.org/File:TCP-Plaque.png
                </p>
            </div>

            <p>Originalmente não havia TCP nem IP, os dois foram sendo arqutietados durante s anos de 1969 e 1974
                onde DARPA financiava o estudo e desenvolvimentos dessas tecnologias e protocolos, com seus cientistas
                chefes
                Vint Cerf e Robert Kahn, eles trbalhavam em conjunto com o grupo internacional de pesquisa e
                desenvolvimentos da internet
                INWG -
            <p style="font-style: italic">International Network Working Group</p> aos quaisa colaboravam com ideias
            e desenhos de arquitetura para o desnvolvimetnos do TCP/IP. Na epoca, eles tinha quase tudo pronto
            o modelo, desnhos, ideias e dinheiro para criar, entaoa em 1972 DARPA contratou a BBN Technologies,
            a universidadeStanford e a UNiversiade de College London para
            aplicar tudo isso em hardwar. Assim foram desenvolvidas algumas versoes operacionas do protoloco em diversas
            plataformas.
            Quatro versoes foram desenvolvidas durante 7 anos com diferentes versoes, sendo elas TCP v1, TCP v2, TCP v3,
            v3 IP e o
            finalista TCP / IP v4 sendo o unico continuado e em uso ate os dias de hoje. Inicialmente os cientistas dos
            orgaos acima
            criar tudo em um, a primeira versao foi chamada de TCP V1 e era repsonvael por fazer tudo, desde
            enviou/entrega e roteamento
            sozinho, ainda nao havia IP. A versao TCP V2 era utilizado apenas testes praicos sem muita diferenca. NAs
            versoes TCP v3 e IP v3
            os pesuqisadores perceberam que nao compensava sobrecarregar um protocolo com roteamente e checagem de erros
            era ineficiente.
            ASsim em 1978 eles dividiram as funcoes em dois protoclos, sendo o IP para rteamente e endereçamento e o TCP
            para transmissao do
            pacote de ponta aponta. Assim entre 1978 e 1980 eles conseguiram estabilizar esses dois protoclos unido-os
            em "um só", ficando conhecido como
            TCP/IP v4. E em 1º janeiro de 1983 foi impementada na rrede ARPANET tornanod mundial e padroznizando a
            internet com o TCP/IP.
            </p>

            <div class="publi-destaque">
                <img src="/static/pubs-img/vicent_e_robert.jpg" alt="Foto_de_Vicent_e_Robert">
                <p style="font-style: italic; font-size: 10px;">Criador do modelo TCP/IP, Roberth Kahn (esquerda) e Vint
                    Cerf (Direita)</p>
            </div>

            <h3>Como os protocolos TCP e IP funcionam ?</h3>
            <p>
                O protocolos TCP funciona de maneira similar a um entregador de cartas, repsonavel por capturar a carta,
                caminhar ate o destinario entregar a carta, receber a carta de novo e devolver a carta aos correios com
                as informção do
                processo. É o apadrõa de comunicção mais utilizado no mundo e o padrao na internet, o mesmo define as
                regras de internet
                definidos pela IETF -
            <p style="font-style: italic;">Internet Engineering Task Force</p>. <br><br />
            O TCP organiza os dados para
            que possam ser transmitdos entre um servior e um cleinte, garantindo a integridade dos pacotes a serem
            enviados e recebidos. Antes de enviar um pacote ele criar um caminho com o recptor, que garante que a
             mensagem nao vai se perder em algum momento e que via ser entregue inteira.  
            A fforma que o protocolo garante essa seguranca é: <br><br /> <strong>CheckSum</strong>, para cada segmentos
            enviado vai um código matematico gerado com base no conteudo do
            pacote, o receptor (maquina do usuario) reaclcula esse codigo, se o valor da soma nao bater, o pacote foi
            corropdio no
            cvaminhos e assim tornase descartavel ---
            mesma ideia de uma carta, caso ela tenha sido aberta, ou rasgada durante o caminho a mesma se torna
            invalida, pois o conteudo de dentro
            é afetado. <br><br />
            <strong>Confirmação(ACK)</strong>, é a confrima~çao que o recptor recebeu os dados corretamente. O recptor
            envia uma reposta
            (<p style="font-style: italic;">Acknowledge</p>) para o emissor, informando que recebeu os dados corretamente.
            <br><br/>
            <strong>Retransmissão Automatica</strong>, se o receptor notar uma flaha no checksum, um pacote faltando ou se o emissor nao recebeu o ACK
            a tempo corrido, o TCP reenvia o pacote danificado ou perdido. 

            
            </p>
        </div>
    </div>




    <div class="footer-container">
        <p>
            <img src="/static/copyleft-icon.png" alt="icon-copyleft"> Myguel Henryque Dachery do Prado | HTML5/CSS3
        </p>
    </div>

</html>