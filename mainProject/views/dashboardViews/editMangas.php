<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editez Mangas</title>
</head>
<body>
<div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form novalidate method="post">
        <input type="text" name="title"  placeholder="title" value="<?=$mangas->title?>">
        <small><?= $error['title'] ?? '';?></small>

        <input type="text" name="lastname" placeholder="lastname" value="<?=$authors->lastname ?? ''?>">
        <small><?= $error['lastname'] ?? '';?></small>

        <input type="text" name="firstname" placeholder="firstname" value="<?=$authors->firstname ?? ''?>">
        <small><?= $error['firstname'] ?? '';?></small>

        <select name="name">
            <option value="Bangers">Bangers</option>
            <option value="Hidden Gems">Hidden Gems</option>
            <option value="Classiques">Classiques</option>
        </select>

        <input type="text" name="anime" placeholder="anime" value="<?=$mangas->anime ?? ''?>">
        <small><?= $error['anime'] ?? '';?></small>
        
        <input type="text" name="image" placeholder="Url img" value="<?=$mangas->image ?? ''?>">
        <small><?= $error['image'] ?? '';?></small>

        <div>
            <h3>Description</h3>
            <textarea name="description" cols="100" rows="10"><?=$mangas->description ?? ''?></textarea>
            <small><?= $error['description'] ?? '';?></small>
        </div>

        <input class="btn" type="submit" value="Valider">
    </form>
    
</body>
</html>