<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire gestion Mangas</title>
</head>
<body>
    <div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form action="">
        <input type="text" name="title"  placeholder="title" value="<?=$title ?? ''?>">
        <small><?= $error['title'] ?? '';?></small>

        <input type="text" name="author" placeholder="author" value="<?=$author ?? ''?>">
        <small><?= $error['author'] ?? '';?></small>

        <input type="text" name="categorie" placeholder="categorie" value="<?=$categorie ?? ''?>">
        <small><?= $error['categorie'] ?? '';?></small>

        <input type="text" name="anime" placeholder="anime" value="<?=$anime ?? ''?>">
        <small><?= $error['anime'] ?? '';?></small>

        <div>
            <h3>Description</h3>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <small><?= $error['description'] ?? '';?></small>
        </div>

        <input class="btn" type="submit" value="Valider">
    </form>
</body>
</html>