    <div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <?php
    foreach($comments as $comment): ?>

        <table class="tableComment">
            <thead>
                <tr>
                    <th>pseudo</th>
                </tr>
            </thead>
            <tbody> 
                <td><a class="commentsHref"href="editCommentsController.php?Id_comments=<?=$comment->Id_comments?>"><h3><?=$comment->comm_slot?></h3></a></td>
                <td><a class="deleteComment"href="deleteController.php?Id_comments=<?=$comment->Id_comments?>">Supprimer</a></td>
            </tbody>

        </table>
    <?php endforeach ?>