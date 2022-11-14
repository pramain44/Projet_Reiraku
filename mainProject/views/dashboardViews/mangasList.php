<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangas Liste</title>
</head>
<body>
    <?php
    foreach($mangas as $manga): ?>
        <div>
            <div>
                <h2><?=$manga->title?></h2>
            </div>
            <p><?=$authors->firstname.' '.$authors->lastname?></p>
            <textarea cols="30" rows="10"><?=$manga->description?></textarea>
            <a href="mangasListController.php?id=<?=$mangas->id?>">DELETE</a>
        </div>
    <?php endforeach ?>
</body>
</html>
    
