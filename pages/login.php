<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hosthome</title>
    <link class="logo-title" rel="icon" href="../static/logohosthome.webp" type="img-icon">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="container-account">
        <div class="account-box">
            <h2>Login</h2>

            <?php if (isset($GET['error'])): ?>
                <div class="error">Email ou senha invalida !</div>
            <?php endif; ?>

            <?php if (isset($GET['registered'])): ?>
                <div class="error">Registrado com sucesso !</div>
            <?php endif; ?>

            <form action="../auth.php" class="form-box" method="POST">

                <input type="hidden" name="action" value="login">
                
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">password</label>
                    <input type="password" name="password" required>
                </div>

                <button class="btn" type="submit">Logar-se</button>

            </form>

        </div>
        <p class="link-account">Não possui conta ? <a href="/pages/register.php">Cadastre-se aqui</a></p>
        <p class="link-account"><a href="/">Voltar à página principal</a></p>
    </div>
</body>

</html>