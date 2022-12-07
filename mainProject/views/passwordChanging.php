<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/Reiraku_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/assets/css/passwordForgotten.css">
    <title>Mot de passe oublié</title>
</head>
<body>
<section class="mainContainer">
        <div class="registerTitle">
                <a href="homeController.php"><img class="logoImg" src="../public/assets/img/logoVeibae.png" alt="logo"></a>
            <div class="mainTitle">
                <h1>Changer votre mot de passe</h1>
            </div>
        </div>
        <div class="divideContainer">
            <div class="pinkDivider"></div>
        </div>
        <div>
            <h2>Modifier votre mot de passe</h2>
        </div>
        <form method="post">
            <input require title="8 caractères minimum" type="password" placeholder="Mot de Passe" name="password" pattern=".{8,}">
            <small><?= $error['password'] ?? '' ?></small>
            <input require type="password" class="formPassword" placeholder="Confirmer le Mot de Passe" name="confirmPassword">
            <small></small>

            <input class="btn" type="submit" ="Modifier">
        </form>
    </section>
</body>
</html>