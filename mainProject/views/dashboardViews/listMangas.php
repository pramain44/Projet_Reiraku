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
            <a href="editMangasController.php?id=<?=$manga->Id_mangas?>"><?=$manga->title?></a>
            <a href="mangasListController.php?id=<?=$manga->Id_mangas?>">DELETE</a>
        </div>
    <?php endforeach ?>
</body>
</html>
    
