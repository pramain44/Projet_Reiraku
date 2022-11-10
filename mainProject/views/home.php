<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/home.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <title>logo nomsite - Accueil</title>
</head>
<body>
    <header>
        <div class="navBar">
            <a href="homeController.php"><img class="logoImg" src="../public/assets/img/VeibaeHome.png" alt="logo"></a>
            <div class="mainNav">
                <ul>
                    <li"><a class="inherit" href="profileController.php">Profile</a></li>
                </ul>
                <ul>
                    <li><a class="inherit connect" href="inscriptionController.php">Inscription</a></li>
                </ul>
                <a href="connectionController.php"><img class="connectImg" src="../public/assets/img/VeibaeConnection.png" alt="logo"></a>
            </div>
        </div>
        <div class="title">
            <h1>Nom Du Site</h1>
        </div>
        <div class="divideContainer">
            <div class="whiteDivider"></div>
        </div>
        </div>
        <div class="formContainer">
            <form class="" action="" method="">
                    <div class="wrap">
                    <input class="searchBar" type="search" placeholder="Rechercher une oeuvre" aria-label="search" name="search">
                    <button class="searchBtn" type="submit"><img src="" alt="">GO</button>
                    </div>
                </form>
        </div>
    </header>
    <section class="jsonFetch">
        <div class="categoryBtn">
            <div class="categoriesTitle">
                <h2>Triez par Catégorie</h2>
            </div>
            <div class="categories">
                <button class="btn" data-sort="banger">Bangers</button><button class="btn" data-sort="classique">Classiques</button><button class="btn" data-sort="hiddenGem">Hidden Gems</button>
            </div>
        </div>
        <div class="divideContainer">
            <div class="pinkDivider"></div>
        </div>
        <div class="cards">
            
        </div>
    </section>
