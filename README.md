# Arphya

**Arphya** é um projeto de código aberto desenvolvido por **Myguel-H**. Ele foi criado para incentivar o desenvolvimento de software livre e fornecer uma base para que outras pessoas construam seus próprios sistemas, aplicações e projetos.

A proposta da plataforma é reunir pessoas interessadas em tecnologia, oferecendo um espaço onde os usuários possam **publicar conteúdos, compartilhar conhecimento, ler artigos e aprender** sobre diferentes áreas da tecnologia e do desenvolvimento de software.

Esta documentação apresenta os requisitos necessários, o passo a passo para executar a aplicação corretamente em um ambiente local e os principais pontos de configuração.

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
git clone https://github.com/Myguel-H/hosthome.git
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
- O projeto funciona com PHP embutido para desenvolvimento local.
- O banco recomendado é PostgreSQL.
- Use um editor como VS Code para facilitar a edição e testes.
