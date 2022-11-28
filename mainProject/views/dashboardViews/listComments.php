    <div>
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
                <td><a class="commentsHref"href="editCommentsController.php?Id_comments=<?=$comment->Id_comments?>"><h3><?=$comment->comm_slot?></h3></a></td>
            </div>
            <div class="delete">
                <td><a class="deleteComment"href="deleteController.php?Id_comments=<?=$comment->Id_comments?>">Supprimer</a></td>
            </div>
        </div>
    <?php endforeach ?>
    </section>