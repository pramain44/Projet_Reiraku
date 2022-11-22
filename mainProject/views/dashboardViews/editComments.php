<div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form novalidate method="post">
        <div>
            <h3>Description</h3>
            <textarea name="description" cols="100" rows="10"><?=$comments->comm_slot ?? ''?></textarea>
            <small><?= $error['comment'] ?? '';?></small>
        </div>

        <input class="btn" type="submit" value="Modifier">
    </form>