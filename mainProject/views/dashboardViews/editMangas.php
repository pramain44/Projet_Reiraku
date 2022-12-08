
<div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form novalidate method="post">
        <input class="createForm" type="text" name="title"  placeholder="title" value="<?=$authors->title?>">
        <small><?= $error['title'] ?? '';?></small>

        <input class="createForm" type="text" name="lastname" placeholder="lastname" value="<?=$authors->lastname ?? ''?>">
        <small><?= $error['lastname'] ?? '';?></small>

        <input class="createForm" type="text" name="firstname" placeholder="firstname" value="<?=$authors->firstname ?? ''?>">
        <small><?= $error['firstname'] ?? '';?></small>

        <select name="name">
            <option value="Bangers">Bangers</option>
            <option value="Hidden Gems">Hidden Gems</option>
            <option value="Classiques">Classiques</option>
        </select>


        <input class="createForm" type="text" name="anime" placeholder="anime" value="<?=$authors->anime ?? ''?>">
        <small><?= $error['anime'] ?? '';?></small>
        
        <input class="createForm" type="text" name="image" placeholder="Url img" value="<?=$authors->image ?? ''?>">
        <small><?= $error['image'] ?? '';?></small>

        <div>
            <h3>Description</h3>
            <textarea class="textareaCreateForm" name="description" cols="100" rows="10"><?=$authors->description ?? ''?></textarea>
            <small><?= $error['description'] ?? '';?></small>
        </div>

        <div class="textareaBtnCreateForm">
            <input class="btn" type="submit" value="Modifier">
        </div>
    </form>
