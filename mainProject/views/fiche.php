<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/fiche.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <title>logo ReiRaku - <?=$mangas->title?></title>
</head>
<body>
    <section class="cardForm">
        <div class="cardContent">
            <div class="imageFiche">
                <a href="homeController.php"><img class="imgFiche" src="<?=$mangas->image?>" alt=""></a>
            </div>
            <div class="textFiche">
                <div class="titleFiche">
                    <h2><?=$mangas->title?></h2>
                </div>
                <div class="infoFiche">
                    <p><strong>Auteur</strong> : <?=$mangas->firstname.' '.$mangas->lastname?></p>
                    <p><strong>Animé </strong> : <?=$mangas->anime?></p>
                </div>
                <div class="descriptionFiche">
                    <p><?=$mangas->description?></p>
                </div>
            </div>
        </div>
    </section>

    <div class="divideContainer">
        <div class="pinkDivider"></div>
    </div>
    <section class="Commentary">
        <h3>Commentaires</h3>
        <div class="divideContainer">
            <div class="pinkDivider2"></div>
        </div>
            <div class="comments">

                <!-- Text Area pour entrer un commentaire -->
            <form method="post">
                <textarea class="textArea" name="comm_slot" id="comm"></textarea>
                <button class="btn" type="submit">Commenter !</button>
                <div><small><?= $error ?? '' ?></small></div>
            </form>

            <!-- zone d'un commentaire type -->
            <div class="commRow">
                <div class="profilImg">
                    <img class="profilImage" src="../public/assets/img/albedo_14060.jpg" alt="">
                </div>
                <div class="commName">
                    <h4>Pseudo</h4>
                </div>
                <div class="commText">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus enim magnam, unde reiciendis voluptatum ab recusandae quisquam, consequuntur exercitationem nobis dolorem beatae dignissimos architecto voluptate excepturi! Ad iste eveniet obcaecati!
                </div>
            </div>
            <div class="commRow">
                <div class="profilImg">
                    <img class="profilImage" src="./assets/img/albedo_14060.jpg" alt="">
                </div>
                <div class="commName">
                    <h4>Pseudo</h4>
                </div>
                <div class="commText">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus enim magnam, unde reiciendis voluptatum ab recusandae quisquam, consequuntur exercitationem nobis dolorem beatae dignissimos architecto voluptate excepturi! Ad iste eveniet obcaecati!
                </div>
            </div>
        </div>
    </section>
    <script src="../public/assets/js/fiche.js"></script>