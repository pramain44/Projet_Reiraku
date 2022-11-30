
<div class="modal">
        <div class="modalContent">
            <h2>Souhaitez-vous vraiment supprimer ?</h2>
                <a class="deleteComment" href=""><button>OUI</button></a>
                <button id="closeBtn" class="closeBtn">NON</button>
        </div>
</div>
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
            <div>  
                <button id="confirmDelete" class="myBtn" data-id="<?=$manga->Id_mangas?>">Supprimer</button>
            </div>
        </div>
    <?php endforeach ?>
    <script src="../../public/assets/js/modal.js"></script>

    
