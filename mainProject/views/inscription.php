<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/inscription.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <title>logo nomsite - Enregistrement</title>
</head>
<body>
    <section class="mainContainer">
        <div class="registerTitle">
            <div class="titleAndLogo">
                <a href="homeController.php"><img class="logoImg" src="../public/assets/img/logoVeibae.png" alt="logo"></a>
                <div class="mainTitle">
                    <h1>Créer un compte</h1>
                </div>
            </div>
            <div class="divideContainer">
                <div class="pinkDivider"></div>
            </div>
            <h2>Veuillez entrez vos informations pour créer un compte</h2>
        </div>
        <form method="post">
            <input require title="3 caractères minimum" type="text" class="formName" placeholder="Nom de compte" name="nameAccount" pattern=".{3,}">
            <small><?= $error['inscription'] ?? '' ?></small>

            <input require title="8 caractères minimum" type="password" class="formPassword" placeholder="Mot de Passe" name="password" pattern=".{8,}">
            <small><?= $error['password'] ?? '' ?></small>
            <input require type="password" class="formPassword" placeholder="Confirmer le Mot de Passe" name="confirmPassword">
            <small></small>
            <input require type="email" class="formMail" placeholder="Adresse Mail" name="emailAddress">
            <small><?= $error['email'] ?? '' ?></small>

            <input class="btn" type="submit" value="Valider">
        </form>
        <div class="padding"></div>
    </section>
