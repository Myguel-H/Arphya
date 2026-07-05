# HostHome 🏠

Acesso para o projeto arphya: http://www.arphya.com.br

Uma plataforma web para compartilhar conhecimento sobre **GNU/Linux** e **Software Livre**. Permite que usuários criem, compartilhem e gerenciem conteúdo educativo em um ambiente colaborativo.

---

## 📋 Índice

- [Instalação](#instalação)
- [Configuração](#configuração)
- [Estrutura](#estrutura)
- [Banco de Dados](#banco-de-dados)
- [Segurança](#segurança)
- [Stack Tecnológico](#stack-tecnológico)

---

## 📦 Instalação

### 1. Clonar o Repositório

```bash
git clone https://github.com/Myguel-H/hosthome.git
cd hosthome
```

### 2. Iniciar o Servidor

```bash
php -S localhost:2002
```

### 3. Acessar

```
http://localhost:2002
```

---

## ⚙️ Configuração

### Banco de Dados PostgreSQL

#### Criar Banco de Dados

```bash
psql -U postgres
```

```sql
CREATE DATABASE #nome_do_seu_banco;
CREATE USER #seu_usuario WITH PASSWORD '#sua_senha';
GRANT ALL PRIVILEGES ON DATABASE #nome_do_seu_banco TO #nome_do_usuario;
```
#### Configurar `config.php`

```php
<?php
$host = '#localhost';
$dbname = '#nomedoseubanco';
$user = '#nome do usuário '(não esqueça que ele deve ser dono ou ter acesso para alterar o banco); 
$password = 'senha do usuario do banco';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo('Erro na conexão: '.$e->getMessage());
}
?>
```

---

## 📁 Estrutura

```
hosthome/
├── admin/                    # Painel administrativo - apenas o usuario que possui admin tem acesso/visualiza
│   ├── conf_categories.php   # Gerenciar categorias
│   ├── conf_publications.php # Gerenciar publicações
│   └── conf_users.php        # Gerenciar usuários
├── pages/                    # Páginas públicas
│   ├── add_categories.php    # Criar categoria + listar categorias
│   ├── add_publication.php   # Criar publicação
│   ├── admin.php             # Painel do usuário / admin
│   ├── edit_user.php         # Editar usuário
│   ├── login.php             # Login
│   ├── profile.php           # Perfil do usuário
│   ├── publications.php      # Lista de publicações
│   ├── register.php          # Registro
│   └── timeline.php          # Timeline pública
├── static/                   # Imagens e ícones
├── auth.php                  # Autenticação e sessão
├── create_post.php           # Criar publicação
├── create_category.php       # Criar categoria
├── delete_post.php           # Deletar publicação
├── delete_category.php       # Deletar categoria
├── delete_user.php           # Deletar usuário
├── index.php                 # Página inicial
├── logout.php                # Logout
├── otario.php                # Redirecionamento de acesso não autorizado
└── style.css                 # Estilos
```

---

## 🗄️ Banco de Dados

### `users`
```sql
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    type VARCHAR(20) DEFAULT 'comum',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### `publications`
```sql
CREATE TABLE publications (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    resume TEXT NOT NULL,
    about TEXT NOT NULL,
    content TEXT NOT NULL,
    user_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

### `categories`
```sql
CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
## 🛠️ Stack Tecnológico

### Frontend
- **HTML5** - Estrutura
- **CSS3** - Estilos
  - **80% desenvolvido com assistência de IA** (Claude + DeepSeek)
  - Responsividade adaptativa
  - Animações e transições suaves
  - Grid layout moderno
  - Design mobile-first

### Backend
- **PHP 7.4+** - Lógica 100% desenvolvida manualmente
  - 📚 Documentação oficial PHP
  - 🔍 Stack Overflow
  - 💬 Reddit
  - 👥 Comunidade de programação
  - 📖 Boas práticas e padrões de design - eu acho

### Database 
- **PostgreSQL 15+**

---

## 🔗 Rotas Principais

| Rota | Descrição |
|------|-----------|
| `/` | Página inicial |
| `/pages/login.php` | Login |
| `/pages/register.php` | Registro |
| `/pages/profile.php` | Perfil |
| `/pages/publications.php` | Publicações |
| `/pages/add_publication.php` | Criar publicação |
| `/pages/add_categories.php` | Criar categoria e listar categorias |
| `/admin/conf_users.php` | Gerenciar usuários (admin) |
| `/admin/conf_publications.php` | Gerenciar publicações (admin) |
| `/admin/conf_categories.php` | Gerenciar categorias (admin) |

---

## 👤 Autor

- GitHub: [@Myguel-H](https://github.com/Myguel-H)

---

## 📝 Licença

GNU General Public License - GPL
