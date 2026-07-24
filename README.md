# Arphya

**Arphya** é um projeto de código aberto desenvolvido por **Myguel-H**, criado com o objetivo de incentivar o desenvolvimento de software e fornecer uma base para que outras pessoas possam criar seus próprios sistemas, aplicações e projetos.

A proposta da plataforma é reunir pessoas interessadas em tecnologia, oferecendo um espaço onde os usuários possam **publicar conteúdos, compartilhar conhecimento, ler artigos e aprender** sobre diferentes áreas da tecnologia e do desenvolvimento de software.

Esta documentação foi criada para orientar a instalação e configuração do projeto **Arphya** em uma máquina local, apresentando os requisitos necessários e o passo a passo para executar a aplicação corretamente em um ambiente de desenvolvimento.

---

## Índice

- [Sobre o projeto](#sobre-o-projeto)
- [Como iniciar](#como-iniciar)
- [Requisitos](#requisitos)
- [Banco de dados](#banco-de-dados)
- [Ajuste do config.php](#ajuste-do-configphp)
- [Estrutura do projeto](#estrutura-do-projeto)
- [Rotas principais](#rotas-principais)
- [Observações extras](#observações-extras)

---

## Sobre o projeto

Arphya é uma plataforma web em PHP que permite publicar conteúdos, gerenciar categorias e administrar usuários.

Principais funcionalidades:

- painel administrativo;
- páginas públicas para publicações e timeline;
- login e registro de usuários;
- upload de avatar de usuário;
- integração de notícias por `api-notice.php`.

---

## Requisitos

- PHP 8.0 ou superior
- PostgreSQL
- Editor/IDE recomendado: VS Code, PHPStorm, Sublime Text ou similar
- Navegador moderno

---

## Como iniciar

### 1. Clonar o repositório

```bash
git clone <seu-repositorio>
cd <sua-pasta-do-projeto>
```

### 2. Iniciar o servidor PHP

Escolha uma porta de preferência. Exemplo:

```bash
php -S localhost:2002
```

### 3. Abrir no navegador

Acesse:

```text
http://localhost:2002
```

---


## Banco de dados

### Criar banco e usuário

No PostgreSQL, use estes comandos como modelo:

```sql
CREATE DATABASE "seu_banco";
CREATE USER "seu_usuario" WITH PASSWORD 'sua_senha';
GRANT ALL PRIVILEGES ON DATABASE "seu_banco" TO "seu_usuario";
```

### Importar a estrutura

O arquivo `banco.db` contém o schema do banco. Importe-o com:

```bash
psql -U seu_usuario -d seu_banco -f banco.db
```

Ou usando host:

```bash
psql -U seu_usuario -d seu_banco -h localhost
```

---

## Ajuste do config.php

Abra `config.php` e preencha os dados do seu ambiente:

```php
$host = 'localhost';
$dbname = 'seu_banco';
$user = 'seu_usuario';
$password = 'sua_senha';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo('Erro na conexão: ' . $e->getMessage());
}
```

---

## Estrutura do projeto

- `admin/` – páginas administrativas
- `pages/` – páginas de usuário e conteúdo
- `static/` – imagens e ícones usados pela aplicação
- `uploads/avatars/` – avatares de usuários
- `api-notice.php` – integração de notícias
- `auth.php` – autenticação e sessão
- `config.php` – configuração da conexão com o banco
- `banco.db` – schema do banco
- `index.php` – página inicial
- `logout.php` – logout
- `otario.php` – página de acesso restrito
- `style.css` – estilos visuais

---

## Rotas principais

| Rota | Descrição |
|------|-----------|
| `/` | Página inicial |
| `/pages/login.php` | Login |
| `/pages/register.php` | Registro |
| `/pages/profile.php` | Perfil |
| `/pages/publications.php` | Lista de publicações |
| `/pages/add_publication.php` | Criar publicação |
| `/pages/add_categories.php` | Criar categoria |
| `/admin/conf_users.php` | Gerenciar usuários |
| `/admin/conf_publications.php` | Gerenciar publicações |
| `/admin/conf_categories.php` | Gerenciar categorias |

---

## Observações extras

- O upload de imagens de perfil é salvo em `uploads/avatars/`.
- Imagens e ícones da interface estão em `static/`.
- A aplicação foi desenvolvida para PHP 8.0 ou superior.
- O banco de dados usado é PostgreSQL.
- Use um editor/IDE como VS Code ou PHPStorm para editar o código.
- O arquivo `config.php` deve ser ajustado conforme o seu ambiente local.
- `banco.db` contém a estrutura do banco de dados e deve ser usado para importar o schema.
- Você pode iniciar o servidor de desenvolvimento local com `php -S localhost:2002` ou outra porta livre.
- Execute os comandos no terminal a partir da pasta raiz do projeto após clonar o repositório.
- As rotas principais e a organização de pastas estão listadas acima para facilitar a navegação.

## Sobre o criador

**Myguel Henryque**

- Localização: Paraná, Brasil
- E-mail: Myguelhenry05@gmail.com
- LinkedIn: https://www.linkedin.com/in/myguel-henryque-1160b72a1
- Currículo Lattes: http://lattes.cnpq.br/3171242305410582
- Site pessoal: https://arphya.com.br
    
