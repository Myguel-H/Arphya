<?php
$host = 'localhost';
$dbname = 'arphya_db';
$user = 'nygts';
$password = 'admin';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo('Erro na conexão: '.$e->getMessage());
    }
?>