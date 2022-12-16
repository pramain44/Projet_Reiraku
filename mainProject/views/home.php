<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/Reiraku_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/assets/css/home.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <title> ReiRaku - Accueil</title>
</head>
<body>
    <header>
        <div class="navBar">
            <a href="homeController.php"><img class="logoImg" src="../public/assets/img/VeibaeHome.png" alt="logo"></a>
            <div class="mainNav">
                <ul>
                    <li class="profile"><a class="inherit" href="profileController.php">Profile</a></li>
                    <?php 
                        if(isset($_SESSION['user']) && $_SESSION['user']->role == 0){
                            echo "<li class=\"profileD\"><a class=\"inherit\" href=\"dashboardControllers/listMangasController.php\">Dashboard</a></li>";
                        }
                    ?>
                </ul>
                <ul>
                    <?php
                    if(isset($_SESSION['user'])){
                        echo "<li class=\"connect\"><a class=\"inherit\" href=\"signOut.php\">Deconnexion</a></li>";
                    }else{
                        echo "<li class=\"connect\"><a class=\"inherit\" href=\"inscriptionController.php\">Inscription</a></li>";
                    }
                    ?>
                </ul>
                <?php
                if(!isset($_SESSION['user'])){ ?>
                <a href="connectionController.php"><img class="connectImg" src="../public/assets/img/VeibaeConnection.png" alt="logo"></a>
                <?php } else{ ?>
                <img class="connectImg" src="../public/assets/img/VeibaeConnection.png" alt="logo">
                <?php } ?>

            </div>
            <?php
                if (SessionFlash::exist()) {
                ?>
                    <div class="alert" style="display:flex; justify-content:center;">
                        <strong><?= SessionFlash::get() ?></strong>
                    </div>
            <?php } ?>
        </div>
        <div class="title">
            <h1>Bienvenue Sur ReiRaku</h1> 
            <p class="underText">Un blog de partage d'avis et de réflexion sur nos mangas favoris</p>
        </div>
        <div class="divideContainer">
            <div class="whiteDivider"></div>
        </div>
        </div>
        <div class="formContainer">
            <form method="get">
                <div class="wrap">
                    <input class="searchBar" type="search" name="search" placeholder="Rechercher une oeuvre" aria-label="search" name="search">
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
                <a href="homeController.php?search=bangers"><button class="btn" value="bangers">Bangers</button></a>
                <a href="homeController.php?search=classiques"><button class="btn" type="submit" value="Classiques">Classiques</button></a>
                <a href="homeController.php?search=hidden"><button class="btn" type="submit" value="Hidden" >Hidden Gems</button></a>              
            </div>
        </div>
        <div class="divideContainer">
            <div class="pinkDivider"></div>
        </div>
        <div class="cards">
            <?php foreach($mangas as $manga): ?>
                <div class="card <?=$manga->name?>">
                    <div class="textContainer">
                        <h3 class="titleProducts"><?=$manga->title?></h3>
                    </div>
                    <a class="ficheLink" href="ficheController.php?id=<?=$manga->Id_mangas?>"><img class="img<?=$manga->name?>" src="../public/assets/img/<?=$manga->title?>_resampled.jpg" alt="<?=$manga->title?>"></a>
                </div>
            <?php endforeach ?>
        </div>
    </section>


