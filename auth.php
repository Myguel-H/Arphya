<?php
session_start();
require_once 'config.php'; //pede ao config acessos

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //veio metodo POST de outro arquivo enviado para auth.php, se veio ele percorre o código 
    $action = $_POST['action'] ?? '';

    if ($action == 'login') { //se a ação for login
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';



        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?'); //prepare o banco de dados
        $stmt->execute([$email]); //envia o valor da variavel/percorre o banco
        $user = $stmt->fetch(); //pega o valor (pedro, joao)


        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            if ($user['type'] === 'admin') {
                $_SESSION['admin'] = true;
            } else {
                $_SESSION['admin'] = false;
            }

            header('Location: /pages/profile.php?logado'); //se os dados tiverem corretos manda para a location
            exit();
        } else {
            header('Location: /pages/login.php?error=1'); //dads incorretos, permanecem no login e na url retorna erro
            exit();
        }
    }

    if ($action == 'register') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $hashPassword = password_hash($password, PASSWORD_DEFAULT); //criptografa a senha do usuario

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_NUM);

        if ($row[0] > 0) {
            header('Location: /pages/register.php?error=email-ja-cadastrado');
            exit();
        }

        try {
            $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, $hashPassword]);
            header('Location: /pages/login.php?registered=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /pages/register.php?error=1');
            exit();
        }
    }
}
header('Location: /pages/login.php');
exit();
?>