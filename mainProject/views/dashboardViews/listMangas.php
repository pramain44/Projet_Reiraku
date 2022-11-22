

<div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <div>
        <form method="get">
            <div class="wrap">
                <input class="searchBar" type="search" name="search" placeholder="Rechercher une oeuvre" aria-label="search" name="search">
                <button class="searchBtn" type="submit">GO</button>    
            </div>
        </form>
    </div>
    <?php
    foreach($mangas as $manga): ?>
    
        <div>
            <a href="editMangasController.php?id=<?=$manga->Id_mangas?>"><h3><?=$manga->title?></h3></a>
            <a href="deleteController.php?id=<?=$manga->Id_mangas?>">Supprimer</a>
        </div>
    <?php endforeach ?>

    
