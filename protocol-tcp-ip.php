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

    <header>
        <div class="logo-name">
            <a href="/">
                <img src="/static/arphya_logo.png" alt="Arphya">
            </a>
        </div>

        <div class="header-actions">
            <nav>
                <ul class="menu">
                    <li><a href="/">Início</a></li>
                    <li><a href="/pages/publications.php">Publicações</a></li>
                    <li><a href="#">Tags</a></li>
                    <li><a href="/pages/timeline.php">Timeline</a></li>
                </ul>
            </nav>

            <div class="user-info">
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

    <nav class="sumary">
        <h3>Sumário</h3>
        <ul>
            <li><a href="#secao1">Historia do TCP/IP</a></li>
            <li><a href="#secao2">Desenvolvimento do TCP/IP</a></li>
            <li><a href="#secao3">Funcionamento do TCP e IP</a></li>
            <li><a href="#secao4">Fluxo dos protocolos TCP e IP</a></li>
            <li><a href="#secao5">Interoperabilidade sobre TCP/IP</a></li>
            <li><a href="#secao6">Modelo OSI e datagrama IP</a></li>
            <li><a href="#secao7">Referências</a></li>


        </ul>
    </nav>

    <div class="publi-content">
        <h2 id="secao1">Protocolo TCP/IP</h2>

        <div class="content">
            <h3>A história um pouco antes do protocolo mais importante do mundo, o TCP/IP</h3>

            <p>
                Historicamente, entendendo um pouco, tudo começou alguns anos depois do início da Guerra Fria
                (1947–1991). Por volta da década de 1950, foi criado um órgão de pesquisa pelo Departamento de
                Defesa dos E.U.A., chamado de ARPA, hoje conhecido como
                <a title="Saber mais sobre o DARPA"
                    href="https://pt.wikipedia.org/wiki/Ag%C3%AAncia_de_Projetos_de_Pesquisa_Avan%C3%A7ada_de_Defesa">DARPA</a>
                - Defense Advanced Research Projects Agency. Uma agência americana que visava inicialmente ao
                desenvolvimento de projetos e tecnologias avançadas para a área militar.
            </p>

            <p>
                Esse mesmo orgão, no final dos anos 1960, criou um projeto chamado
                <a href="https://pt.wikipedia.org/wiki/ARPANET">ARPANET</a>
                - <span style="font-style: italic;">Advanced Research Projects Agency Network</span>,
                que era responsável pelo desenvolvimento de novas tecnologias que idealizavam maior segurança
                e menos riscos na comunicação militar, principalmente por meio da descentralização da comunicação.
                Na época em que surgiu, a Guerra Fria estava em seu auge, o que possibilitou avanços tecnológicos
                que, posteriormente, seriam considerados futuristas.
            </p>

            <p>
                Já nessa mesma época, mais especificamente em 1979, a ARPANET e o governo militar se depararam
                com um problema relacionado aos limites de comunicação entre os computadores. Naquela época,
                era utilizado, como padrão, o <a title="Saber mais sobre NCP"
                    href="https://www.geeksforgeeks.org/computer-networks/network-control-protocol-ncp/">NCP</a>
                - <span style="font-style: italic;">Network Control Protocol</span>,
                o primeiro protocolo de rede para comunicação entre computadores que funcionava a longa
                distância (ponta a ponta).
            </p>

            <p>
                O NCP era "revolucionário" para a época, pois as máquinas já podiam se comunicar a longas
                distâncias, com altas chanches de entrega do pacote. Porém, existiam muitos limites.
                Alguns deles eram: funcionava apenas dentro de uma rede
                "interna",
                não era aberta ao público e apenas computadores específicos podiam se comunicar.
                Além disso, softwares diferentes muitas vezes não conseguiam se comunicar entre si e dependiam
                de hardwares muito específicos para transmitir as mensagens, como os IMPs
                - <span style="font-style: italic;">Interface Message Processor</span>, entre outros.
            </p>

            <p>
                Assim, com as limitações do NCP, surgiu o modelo atual e mais importante para a comunicação
                na Internet: o TCP/IP, que hoje é utilizado como base para a comunicação na Internet e substituiu
                o NCP. Como era comum utilizar o NCP, o TCP/IP ainda não era uma opção imediata para substituição do
                protocolo.
            </p>

            <h3 id="secao2">Surgimento do modelo TCP/IP</h3>

            <p>
                Originalmente não havia TCP nem IP, os dois foram sendo arquitetados durante os anos de 1973 e 1974 onde
                a DARPA financiava o estudo e desenvolvimento dessas tecnologias e protocolos, com seus cientistas
                chefes
                Vint Cerf e Robert Kahn. O TCP/IP teve seus primeiros passos em 1969 pelo DARPA, e era apenas um
                complemento/recurso do projeto ARPANET.
                Hoje em dia muitos entendem e veem ele como um protocolo, não está errado! Porém ele mais é um modelo do
                que um protocolo por si só, pois ele utiliza dois protocolos: TCP -
                <span style="font-style: italic;">Protocol Comunication Transport</span>
                e IP - <span style="font-style: italic;">Protocol Internet</span>, assim surgindo da junção desses
                dois protocolos o que conhecemos hoje como TCP/IP. O TCP/IP foi arquitetado utilizando um método muito
                conhecido
                como <a href="/">packet switching</a>
                - <span style="font-style: italic;">comutação de pacotes</span>, que seguia um passo simples:
                enviava um pacote individualmente pela rede, assim se caso um pacote for "destruído" ele seguiria
                com outras rotas, também buscando o caminho mais rápido até o destinatário.
                <strong>Curiosidade</strong>:
                O objetivo principal surgiu do temor de acontecer uma guerra nuclear, então assim os cientistas
                procuravam um método que mesmo em caso de guerra, com um ataque e a queda da comunicação ainda sim
                continuasse
                funcionando.
            </p>

            <p>
                Alguns anos depois do surgimento do modelo ele se tornou conhecido entre a comunidade, em 1973 quando
                ainda estava
                sendo projetado e desenhado, já era conhecido mundialmente. Em 1974 houve a 'primeira' apresentação
                oficial sobre o modelo TCP/IP escrito
                por Vint Cerf e Robert Kahn, apresentando que o conceito do modelo TCP/IP demonstrou que poderia
                funcionar em diferentes redes e suportar múltiplas interconexões, algo muito superior para as
                arquiteturas e modelos da época.
            </p>

            <div class="publi-destaque">
                <img src="/static/pubs-img/plaque-TCP-IP.png" alt="Placa de reconhecimento do TCP/IP">
                <p style="font-style: italic; font-size: 10px;">
                    Marco do IEEE reconhecendo o TCP/IP como avanço tecnológico mundial - fonte:
                    ethw.org/File:TCP-Plaque.png
                </p>
            </div>

            <p>
                Desde 1973 a Darpa, Vint Cerf e Robert Kahn submeteram um grande esforço junto do grupo internacional de
                pesquisa e desenvolvimento da internet INWG -
                <span style="font-style: italic;">International Network Working Group</span> aos quais colaboravam com
                ideias
                e desenhos de arquitetura para o desenvolvimento do TCP/IP. Na época, eles tinham quase tudo pronto:
                o modelo, desenhos, ideias e dinheiro para criar. Então em 1975 a DARPA contratou a BBN Technologies,
                a Universidade de Stanford e a Universidade de College London para aplicar tudo isso em hardware.
                Assim foram desenvolvidas algumas versões operacionais do protocolo em diversas plataformas.
                Quatro versões foram desenvolvidas durante 7 anos com diferentes versões, sendo elas TCP v1, TCP v2,
                TCP v3, v3 IP e o finalista TCP/IP v4 sendo o único continuado e em uso até os dias de hoje.
                Inicialmente os cientistas dos órgãos acima criaram tudo em um, a primeira versão foi chamada de TCP V1
                e era responsável por fazer tudo, desde envio/entrega e roteamento sozinho, ainda não havia IP.
                A versão TCP V2 era utilizada apenas testes práticos sem muita diferença. Nas versões TCP v3 e IP v3
                os pesquisadores perceberam que não compensava sobrecarregar um protocolo com roteamento e checagem de
                erros, era ineficiente. Assim em 1978 eles dividiram as funções em dois protocolos, sendo o IP para
                roteamento e endereçamento e o TCP para transmissão do pacote de ponta a ponta. Assim entre 1978 e 1980
                eles conseguiram estabilizar esses dois protocolos unindo-os em "um só", ficando conhecido como
                TCP/IP v4. E em 1º de janeiro de 1983 foi implementada na rede ARPANET tornando mundial e padronizando a
                internet com o TCP/IP.
            </p>

            <div class="publi-destaque">
                <img style="max-width: 600px ;" src="/static/pubs-img/vint-e-robert.jpg" alt="Foto_de_Vint_e_Robert">
                <p style="font-style: italic; font-size: 10px;">Principais criadores do modelo TCP/IP, Robert Kahn
                    (esquerda) e Vint
                    Cerf (direita)</p>
            </div>

            <h3 id="secao3">Como os protocolos TCP e IP funcionam?</h3>

            <p>
                O protocolo TCP trabalha de maneira similar a um entregador de cartas, responsável por capturar a carta,
                caminhar até o destinatário, entregar a carta, receber a carta de novo e devolver a carta aos correios
                com as informações do processo. É o padrão de comunicação mais utilizado no mundo,
                o mesmo tem possui regras de internet definidos pela IETF -
                <span style="font-style: italic;">Internet Engineering Task Force</span>.
            </p>

            <p>
                O TCP organiza os dados para que possam ser transmitidos entre um servidor e um cliente, garantindo a
                integridade dos pacotes a serem enviados e recebidos. Antes de enviar um pacote ele cria uma conexão com
                o receptor, que garante que a mensagem não vai se perder em algum momento e que vai ser entregue
                inteira. O conjunto de formas que o protocolo garante essa segurança é:
            </p>

            <ul>
                <li>
                    <strong>Checksum</strong>: para cada segmento enviado vai um código matemático gerado com base no
                    conteúdo do pacote, o receptor (máquina do usuário) recalcula esse código, se o valor da soma não
                    bater, o pacote foi corrompido no caminho e assim se torna descartável. Mesma ideia de uma carta,
                    caso ela tenha sido aberta, ou rasgada durante o caminho a mesma se torna inválida, pois o conteúdo
                    de dentro é afetado.
                </li>
                <br>
                <li>
                    <strong>Confirmação (ACK)</strong>: é a confirmação que o receptor recebeu os dados corretamente. O
                    receptor envia uma resposta (<span style="font-style: italic;">Acknowledge</span>) para o emissor,
                    informando que recebeu os dados corretamente.
                </li>
                <br>
                <li>
                    <strong>Retransmissão Automática</strong>: se o receptor notar uma falha no checksum, um pacote
                    faltando ou se o emissor não recebeu o ACK a tempo corrido, o TCP reenvia o pacote danificado ou
                    perdido.
                </li>
            </ul>

            <div id="secao4" class="publi-destaque">
                <p style="font-style: italic; font-size: 15px; padding-bottom: 15px; color: red;">Abra a imagem em outra página, caso queria ver melhor </p>
                <div class="publi-cards">
                    <img src="/static/pubs-img/checksum.png" alt="funcionamento-checksum">
                    <p style="font-style: italic; font-size: 10px;">Funcionamento do checksum</p>

                    <span id="pub-img-ip"></span>
                    <img src="/static/pubs-img/fluxo-ip.png" alt="Fluxo-do-protocolo-ip-redes">
                    <p style="font-style: italic; font-size: 10px;">Fluxo do protocolo IP até o destino</p>

                    <span id="pub-img-tcp"></span>
                    <img src="/static/pubs-img/fluxo-tcp.png" alt="Fluxo-do-protocolo-tcp">
                    <p style="font-style: italic; font-size: 10px;">Fluxo do protocolo TCP</p>

                </div>
            </div>

            <h3 id="secao5">Interoperabilidade entre o TCP/IP e a rede</h3>

            <p>
                O TCP/IP trabalha com 4 camadas, são elas:
            </p>

            <ul>
                <li>
                    <strong style="font-style: italic;">Aplicação</strong>: responsável por estabelecer uma conexão
                    entre
                    um programa e a camada de transporte que está abaixo da camada de aplicação. Captura uma requisição
                    de um programa, pois cada programa pode conversar com protocolos diferentes. Após processar essa
                    requisição, normalmente utilizando TCP, a camada de aplicação envia os dados para a camada de baixo
                    através do chamado <em>socket</em>. A camada manda para baixo os dados brutos (HTML, img, JSON
                    etc.).
                    Quando bate no socket da camada de transporte, a mesma processa esses dados e passa assim por
                    diante.
                    Um exemplo de um programa seria uma página/aplicação no navegador. Nessa camada existem muitos
                    outros
                    protocolos, como HTTP responsável pelo envio e recebimento de dados na internet entre um
                    servidor-cliente. O DNS que traduz o nome, domínio do site correto (nome da página), para o IP
                    público. Exemplo disso é uma aplicação com IP público 142.250.65.78, você procura Google.com na URL.
                    SMTP para envio de email, entre outros como FTP, SNMP e Telnet (semelhante com o SSH porém sem
                    criptografia).
                </li>

                <div id="secao6" class="publi-destaque">
                    <div class="publi-cards">
                        <img style="max-width: 580px;"  src="/static/pubs-img/modelo-socket.png" alt="Modelo-socket-entre-camadas">
                    </div>
                </div>

                <br>
                <li>
                    <strong style="font-style: italic;">Transporte</strong>: responsável por capturar os dados que vem
                    da
                    camada de aplicação e transformá-los em pacotes a serem encaminhados para a camada de internet. Usam
                    protocolos como <a href="#pub-img-tcp" title="Ver Fluxo TCP">TCP</a> e UDP.
                </li>
                <br>
                <li>
                    <strong style="font-style: italic;">Internet/Rede</strong>: responsável pelo roteamento desses
                    pacotes que vem da camada de transporte, ele adiciona ao datagrama informações sobre o caminho que
                    deve percorrer. Utiliza protocolos como IP que cuida do redirecionamento até a chegada do pacote no
                    destinatário <a href="#pub-img-ip" title="Ver Fluxo IP">IP</a>, ICMP, ARP e RARP.
                </li>
                <br>
                <li>
                    <strong style="font-style: italic;">Acesso/interface a rede</strong>: responsável por enviar o
                    datagrama que vem da camada de internet para o destinatário, cuida da parte física do fluxo de
                    pacotes. Considerada a camada mais baixa e "bruta" do modelo TCP/IP, ela recebe encapsulado um
                    quadro
                    que a camada de internet manda com o <a
                        href="https://wiki.foz.ifpr.edu.br/wiki/index.php/Datagrama_IP">datagrama IP</a>,
                    a camada de interface/física lê isso, compila para bits/sinais físicos transformando os dados e
                    informações em sinais elétricos, luz e sinais de rádio.
                </li>
            </ul>

            <p>
                Alguns anos depois surgiu o modelo OSI -
                <span style="font-style: italic;">Open System Interconnection</span>, reconhecido por ser baseado no
                modelo TCP/IP, tem a mesma função praticamente, serve para mesma coisa, funciona igual, porém é
                utilizado
                mais na parte teórica para explicar como funciona o TCP/IP detalhadamente, pois diferente do modelo
                TCP/IP o modelo OSI possui 7 camadas. A real é que o OSI surgiu para substituir o padrão universal que
                era o TCP/IP, porém o mesmo se tornou muito complexo e deixou de ser implementado na internet.
                <a href="https://aws.amazon.com/pt/what-is/osi-model/">Saiba mais sobre o OSI</a>
            </p>

            <div id="secao6" class="publi-destaque">
                <div class="publi-cards">
                    <img src="/static/pubs-img/modelo-tcp-ip-osi.png" alt="Modelo-de-camadas-TCP/IP-e-OSI">
                    <img src="/static/pubs-img/datagrama-ip.png" alt="Datagrama-IP">
                </div>
            </div>

            <p style="style-font: italic;">Fonte: <a href="https://www.vivaolinux.com.br/artigo/Datagramas/">Protocolo IP e datagrama</a></p>

            <p>
                As camadas mais perto do topo como aplicação e transporte estão mais perto do usuário, enquanto as mais
                baixas estão mais perto da transmissão de dados físicos. Cada camada tem seus próprios protocolos, e em
                nenhuma hipótese uma camada pode utilizar protocolos de outra camada, pois cada protocolo tem sua
                própria
                arquitetura e fluxo de funcionamento para ser utilizado de maneira correta.
            </p>


            <div id="secao7" class="publi-references">
                <h3>Referências</h3>
                <ul>
                    <li>E. FERREIRA, Rubem. Linux: Guia do Administrador do Sistema. 2ª ed. São Paulo: Novatec, 2013.
                        ISBN 9788575221778</li>
                    <li> TANENBAUM, Andrew S.; WETHERALL, David. Redes de Computadores. 5ª ed. São Paulo: Pearson
                        Education do Brasil, 2011. p. 28-29, 46-47, 223, 291, 384-478.</li>
                    <li>KUROSE, James F.; ROSS, Keith W. Redes de computadores e a internet. 6ª ed. São Paulo: Pearson
                        Education do Brasil, 2014. ISBN 9788543014432.</li>
                    <li>TORRES, Gabriel. Redes de Computadores Curso Completo. Rio de Janeiro: Axcel Books, 2001. ISBN
                        9788573231441. p. 46-47, 68.</li>
                    <li>TURBAN, Efraim; VOLONINO, Linda. Tecnologia da Informação para Gestão. 8ª ed. Porto Alegre:
                        Bookman, 2013. p. 103-104.</li>
                    <li><a href="https://datatracker.ietf.org/doc/html/rfc675" target="_blank">RFC 675</a> — Internet
                        Engineering Task Force (IETF).</li>
                    <li>WIKIPÉDIA. TCP/IP. Disponível em: https://pt.wikipedia.org/wiki/TCP/IP. Acesso em: 20 de agosto
                        de 2026.</li>
                </ul>
            </div>

        </div>
    </div>

    <div class="footer-container">
        <div class="container-about">
            <h3>Sobre o desenvolvedor</h3>
            <a href="http://github.com/myguel-h"><img src="/static/icons/github.png" alt="icone-github">Github -
                myguel-h</a>
            <a href="mailto:myguelhenry05@gmail.com"><img src="/static/icons/gmail.png" alt="icone-gmail">Gmail -
                myguelhenry05@gmail.com</a>
            <a href="http://lattes.cnpq.br/3171242305410582"><img src="/static/icons/lattes.png"
                    alt="icone-lattes">Lattes - Myguel</a>
            <a href="https://www.linkedin.com/in/myguel-henryque-1160b72a1"><img src="/static/icons/linkedin.png"
                    alt="icone-linkedin">Linkedin - Myguel Henryque</a>
            <a href="https://arphya.com.br/myguel_henryque.php"><img src="/static/icons/pessoal.png"
                    alt="icone-blog">Pessoal - Myguel Henryque</a>
        </div>

        <div class="container-about">
            <h3>Mapa do Site</h3>
            <a href="https://arphya.com.br/">Home</a>
            <a href="https://arphya.com.br/about.php">Sobre Arphya</a>
            <a href="https://arphya.com.br/pages/timeline.php">Timeline</a>
        </div>

        <div>
            <p><img src="/static/copyleft-icon.png" alt="icone-copyleft">copyleft 2026 - Myguel Henryque | All lefts
                reserved</p>
            <p></p>
        </div>
    </div>

</body>

</html>