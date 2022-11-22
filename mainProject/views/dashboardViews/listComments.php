    <div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <?php
    foreach($comments as $comment): ?>
    
        <div>
            <a href="editCommentsController.php?Id_comments=<?=$comment->Id_comments?>"><h3><?=$comment->comm_slot?></h3></a>
            <a href="deleteController.php?Id_comments=<?=$comment->Id_comments?>">Supprimer</a>
        </div>
    <?php endforeach ?>