<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/Reiraku_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/assets/css/about.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">

    <title>logo ReiRaku - Mentions Légales</title>
</head>
<body>
<div class="registerTitle">
                <a href="homeController.php"><img class="logoImg" src="../public/assets/img/logoVeibae.png" alt="logo"></a>
            <div class="mainTitle">
                <h1>Mentions Légales</h1>
            </div>
        </div>
        <div class="divideContainer">
            <div class="pinkDivider"></div>
        </div>
    <div>
        <p>© les illustrations sont la propriété de leurs auteurs et éditeurs respectifs.</p>
        <?php foreach($mangas as $manga): ?>
            <p><?=$manga->title.': '.$manga->firstname.' '.$manga->lastname?></p>

        <?php endforeach ?>
       
        
        <p>
        Ce site appartient à Paul Ramain, domicilié aux 9 rue delahaye a amiens 80080, paulramain6@gmail.com.
        le site est héberger par : 
        </p>
    </div>
</body>
