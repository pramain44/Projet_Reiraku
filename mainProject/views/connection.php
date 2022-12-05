<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/Reiraku_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/assets/css/connection.css">
    <title>ReiRaku - Connexion</title>
</head>
<body>
    <section class="mainContainer">
        <?php
        if (SessionFlash::exist()) {
         ?>
            <div class="alert" style="position: absolute; left: 42.5rem; top: 2rem;color: aliceblue;font-size: 1.2rem;">
                <strong><?= SessionFlash::get() ?></strong>
            </div>
        <?php } ?>
        <div class="registerTitle">
                <a href="homeController.php"><img class="logoImg" src="../public/assets/img/logoVeibae.png" alt="logo"></a>
            <div class="mainTitle">
                <h1>Connexion</h1>
            </div>
        </div>
        <div class="divideContainer">
            <div class="pinkDivider"></div>
        </div>
        <form method="post">
            <input require type="text" class="formName" placeholder="Adresse email" name="email">
            <small><?= $error['email'] ?? '' ?></small>
            <input require type="password" class="formPassword" placeholder="Mot de Passe" name="password">
            <small><?= $error['password'] ?? '' ?></small>
            <small><?= $errors['password'] ?? '' ?></small>
            <input class="btn" type="submit" ="Connexion">
            <div class="hyperText">
            <p>
                <a href="inscriptionController.php">Pas encore de Compte?</a>
            </p>
                <a id="myBtn" href="passwordForgottenController.php">Mot de passe oublié?</a>
            </div>
        </form>
    </section>
    <script src="../public/assets/js/modal.js"></script>
</body>
</html>
