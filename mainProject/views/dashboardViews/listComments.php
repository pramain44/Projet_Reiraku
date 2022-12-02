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
    <h1>Liste des Commentaires</h1>

    <section>
    <?php
    foreach($comments as $comment): ?>
        <div class="userContainer">
            <div class="nameComment">
                <h2>Posté par</h2>
                <p><?=$comment->name_account?></p>
                <p>Le <?=date('d/m/Y',strtotime($comment->created_at))?></p>
            </div>
            <div class="contentComment">
                <h2>Commentaire</h2>
                <p><?=$comment->comm_slot?></p>
            </div>
            <div class="delete">  
                <button id="confirmDelete" class="myBtn" data-id="<?=$comment->Id_comments?>">Supprimer</button> 
            </div>
        </div>
    <?php endforeach ?>
    </section>
    <script src="../../public/assets/js/modal.js"></script>

    