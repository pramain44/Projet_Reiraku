<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/profile.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>logo nomsite - nomProfil</title>
</head>
<body>
    <div class="profilInfo">
        <div class="registerTitle">
                    <a href="homeController.php"><img class="logoImg" src="../public/assets/img/logoVeibae.png" alt="logo"></a>
                <div class="mainTitle">
                    <h1>Informations de compte</h1>
                </div>
        </div>
        <?php
            if (SessionFlash::exist()) {
        ?>
            <?php $message = SessionFlash::get('message') ?>
            <?= ($message == '') ? '' : '<div class="messageContainer"><div class="message">'.$message.'</div></div>'; ?>
            <?php } ?>
        <div class="mainInfo">
            <div class="imgAndPseudo">
                <img class="profilImg" src="../public/assets/img/albedo_14060.jpg" alt="">
                <div class="userInfo">
                    <form method="post">
                        <ul>
                            <li>Nom de compte :<input type="text" name="name_account" value="<?=$_SESSION['user']->name_account?>"></li>
                        </ul>
                        <ul>
                            <button type="submit">Modifier</button>
                        </ul>
                    </form>
                    <ul>
                        <li>Mail : <?=$_SESSION['user']->email?></li>
                    </ul>
                    <ul>
                        <li><a href=""></a>Compte crée depuis le <?=date('d/m/Y', strtotime($_SESSION['user']->created_at))?></li>
                    </ul>
                </div>
                <div>
                    <h3>Choisir une image profile</h3>
                    <form method="post" enctype="multipart/form-data">
                        <label for="upload"></label>
                        <input name="profilPic" id="upload" class="file"  type="file" placeholder="Photo de profil"><br>
                        <input name="uploadButton" type="submit" value="Upload">
                   </form>
                   <a href="">Supprimer mon compte</a>
                </div>
            </div>
        </div>
    </div>
    <div class="watchList">
        <h2>Nombres de commentaires : <?=$commentsNb?></h2>
        <div class="oeuvreItemContainer">
            <?php foreach($mangas as $manga): ?>
            <div class="oeuvreItem">
                <h2><?=$manga->title?></h2>
                <div>
                <a href="ficheController.php?id=<?=$manga->Id_mangas?>"><img class="" src="<?=$manga->image?>" alt=""></a>
                </div>
                <div>
                    <?php
                        $Id_mangas = $manga->Id_mangas;
                        $comments = Comment::countComments($Id_users,$Id_mangas);
                    ?>
                    <p><?=$comments?> Commentaire</p>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <?php
                for($pages=0;$pages<= ($commentsNb/5);$pages++){ ?>
                    <a href="http://projet_2.0.localhost/mainProject/controllers/profileController.php?pages=<?=($pages*5)?>"><button><?=$pages?></button></a>
                    <?php
                }
                ?>
    </div>


