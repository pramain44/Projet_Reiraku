<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/Reiraku_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/assets/css/profile.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <title>ReiRaku - <?=$_SESSION['user']->name_account?></title>
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
                <div class="imgDiv">
                    <img class="profilImg" src="../public/upload/<?=$Id_users?>_resampled.jpg" alt="">
                </div>
                <div class="userInfo">
                    <form method="post">
                        <input type="hidden" value="3" name="test">                     
                        <ul>
                            <li>Nom de compte :<input type="text" name="name_account" value="<?=$_SESSION['user']->name_account?>"></li>
                            <small><?=$error['inscription'] ?? ''?></small>
                        </ul>
                        <ul>
                            <button class="modifyBtn" type="submit">Modifier</button>
                        </ul>
                    </form>
                    <ul>
                        <li>Mail : <?=$_SESSION['user']->email?></li>
                    </ul>
                    <ul>
                        <li><a href=""></a>Compte crée depuis le <?=date('d/m/Y', strtotime($_SESSION['user']->created_at))?></li>
                    </ul>
                </div>

                <!-- zone du form pour changer d'img de profile -->
                <div class="changeImg">
                    <h2>Choisir une image profile</h2>
                    <form method="post" enctype="multipart/form-data">
                    <input type="hidden" value="2" name="test">
                        <label for="upload"></label>
                        <input class="profileUpload" name="profile" class="file" type="file"><br>
                        <div class="uploadBtn">
                            <input class="profileUpload" type="submit" value="Upload">
                        </div>
                   </form>
                   <small><?=$errors ?? '';?></small>
                   <br>
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
                    <p><?=$comments?> <?= $comments > 1 ? 'Commentaires' : 'Commentaire'; ?></p>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="pagesBtnContainer">
        <?php
                for ($i = 1; $i <= $nbPages; $i++) {
                     ?>
                        <a href="profileController.php?currentPage=<?=$i?>"><button class="pagesBtn"><?=$i?></button></a>
            <?php
                    }
                
                ?>
        </div>
    </div>


