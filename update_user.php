<?php
require_once 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'update') {
        $id = $_POST['id'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            header('Location: /pages/edit_user.php?error=1');
            exit();
        }
//verifica se as variaveis estao vazias, se estiver eles mandam a propria variavel, assim nao deixando um dado em branco
        $name = !empty($_POST['name']) ? $_POST['name'] : $user['name'];
        $email = !empty($_POST['email']) ? $_POST['email'] : $user['email'];
        $age = !empty($_POST['age']) ? $_POST['age'] : $user['age'];
        $sex = !empty($_POST['sex']) ? $_POST['sex'] : $user['sex'];
        $phone = !empty($_POST['phone']) ? $_POST['phone'] : $user['phone'];
        $about = !empty($_POST['about']) ? $_POST['about'] : $user['about'] ?? '';

        try {
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, age = ?, sex = ?, phone = ?, about = ? WHERE id = ?");
            $stmt->execute([$name, $email, $age, $sex, $phone, $about, $id]);

            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;

            header('Location: /pages/edit_user.php?update=1');
            exit();
        } catch (PDOException $e) {
            header('Location: /pages/edit_user.php?error=1');
            exit();
        }
    }
}

header('Location: /');
exit();
?>