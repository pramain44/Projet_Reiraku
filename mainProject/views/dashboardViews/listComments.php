    <div class="modal">
        <div class="modalContent">
            <h2>Souhaitez-vous vraiment supprimer ?</h2>
            <a class="deleteComment" href=""><button>OUI</button></a>
                <button id="closeBtn" class="closeBtn">NON</button>
        </div>
    </div>
    <div style="font-size: 2rem; display:flex; justify-content:center;">
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <h1>Listes des Commentaires</h1>

    <section>
    <?php
    foreach($comments as $comment): ?>
        <div class="userContainer">
            <div class="nameComment">
                <h2>Posted by</h2>
                <p><?=$comment->name_account?></p>
            </div>
            <div class="contentComment">
                <h2>Commentaire</h2>
                <a class="commentsHref"href="editCommentsController.php?Id_comments=<?=$comment->Id_comments?>"><h3><?=$comment->comm_slot?></h3></a>
            </div>
            <div class="delete">  
                <button id="confirmDelete" class="myBtn" data-id="<?=$comment->Id_comments?>">Supprimer</button> 
            </div>
        </div>
    <?php endforeach ?>
    </section>
    <script src="../../public/assets/js/modal.js"></script>

    