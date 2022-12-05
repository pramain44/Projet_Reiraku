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
                <h1>Récupérer votre login et votre mot de passe</h1>
            </div>
        </div>
        <div class="divideContainer">
            <div class="pinkDivider"></div>
        </div>
        <div>
            <h2>Entrez votre email pour recevoir votre login et un lien pour modifier votre mot de passe</h2>
        </div>
        <form method="post">
            <input require type="email" class="formMail" placeholder="Adresse Mail" name="emailAddress">
            <small><?= $error['email'] ?? '' ?></small>

            <input class="btn" type="submit" ="Connexion">
        </form>
    </section>
</body>
</html>