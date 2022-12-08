
<div class="modal">
        <div class="modalContent">
            <h2>Souhaitez-vous vraiment supprimer ?</h2>
                <a class="deleteComment" href=""><button>OUI</button></a>
                <button id="closeBtn" class="closeBtn">NON</button>
        </div>
</div>
<h1>Liste des Mangas</h1>
    <div style="display:flex;justify-content:center;font-size: 2rem;padding-bottom:2rem;>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    


    <!-- searchbar -->
    <div>
        <div class="wrap">
                <form method="get">
                    <input class="searchBar" type="search" name="s" placeholder="Rechercher une oeuvre" aria-label="search" name="search">
                    <button class="searchBtn" type="submit">GO</button>    
                </form>
            </div>
    </div>
    <!-- pagination -->
    <div class="pagination">
            <?php
            for ($i = 1; $i <= $nbPages; $i++) {
                if ($i == $currentPage) { ?>
                    
                        <span class="page-link">
                            <?= $i ?>
                            <span class="visually-hidden"></span>
                        </span>
                    
                <?php } else { ?>
                    <a class="page-links" href="?currentPage=<?= $i ?>&s=<?= $s ?>"><button class="page-link"><?= $i ?></button></a>
                    <?php }
            } ?>
        </div>

    <div class="oeuvreItemContainer">
    <?php
        foreach($mangas as $manga): ?>   
            <div class="oeuvreItem">
                <h2><?=$manga->title?></h2>
                <div>
                <a href="editMangasController.php?id=<?=$manga->Id_mangas?>"><img class="listMangas" src="../../public/assets/img/<?=$manga->title?>_resampled.jpg?>" alt=""></a>
                </div>
                <button id="confirmDelete" class="myBtn" data-id="<?=$manga->Id_mangas?>">Supprimer</button>
            </div>

        <?php endforeach ?>
    </div>
        
        
    <script src="../../public/assets/js/modalMangas.js"></script>

    
