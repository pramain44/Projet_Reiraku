

<div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <?php
    foreach($mangas as $manga): ?>
    
        <div>
            <a href="editMangasController.php?id=<?=$manga->Id_mangas?>"><h3><?=$manga->title?></h3></a>
            <a href="deleteController.php?id=<?=$manga->Id_mangas?>">Supprimer</a>
        </div>
    <?php endforeach ?>

    
