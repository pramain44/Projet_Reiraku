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

                <!-- boutons de vote sous l'image -->
                <?php if(isset($_SESSION['user'])){ ?>
                    <form class="voteBtn" method="post">
                        <input type="hidden" value="3" name="vote">
                        <button name="up" value="1" class="upVote">Recommander(<?=$upVotes?>)</button>
                        <button name ="down" value="1" class="downVote">Déconseiller(<?=$downVotes?>)</button>
                    </form>
                    <div class="errorVote"><?= $error['vote'] ?? ''?></div>
                <?php } ?>
            </div>

            <!-- Fiche de l'oeuvre -->
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

    <!--  Début des commentaires -->

    <section class="Commentary">
        <h3>Commentaires</h3>
        <div class="divideContainer">
            <div class="pinkDivider2"></div>
        </div>
            <div class="comments">

                <!-- Text Area pour entrer un commentaire -->
            <?php
            if(isset($_SESSION['user'])){ ?>
                <form method="post">
                    <input type="hidden" value="2" name="vote">
                    <textarea class="textArea" name="comm_slot" id="comm" maxlength="500"></textarea>
                    <button class="btn" type="submit">Commenter !</button>
                    <div><small><?= $error['comm'] ?? '' ?></small></div>
                </form>
            <?php 
            }else{?>
                <form method="post">
                    <textarea disabled="" class="textArea" name="comm_slot" id="comm">Il faut se connecter pour commenter</textarea>
                    <div><small><?= $error['comm'] ?? '' ?></small></div>
                </form>
           <?php } ?>

            <!-- zone d'un commentaire type -->
             <?php
            if(!empty($comments)){
            foreach($comments as $comment): ?> 
            
            <div class="commRow">
                <div class="profilImg">
                    <img class="profilImage" src="../public/upload/<?=$comment->Id_users?>_resampled.jpg" alt="">
                    <div class="commName">
                        <h4><?=$comment->name_account?></h4>
                    </div>
                </div>
                <div class="commText">
                    <div class="dateComm">
                        <small>Le <?=date('d F Y', strtotime($comment->created_at))?></small>
                    </div>
                    <div>
                        <p><?=$comment->comm_slot?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php } ?>
            
        </div>
    </section>
    <script src="../public/assets/js/fiche.js"></script>