
    <div style="display:flex;justify-content:center;font-size: 2rem;padding-bottom:2rem;">
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form method="post" enctype="multipart/form-data">

        <input class="createForm" type="text" name="title"  placeholder="title" value="">
        <small><?= $error['title'] ?? '';?></small>

        <input class="createForm" type="text" name="lastname" placeholder="lastname" value="<?=$lastname ?? ''?>">
        <small><?= $error['lastname'] ?? '';?></small>

        <input class="createForm" type="text" name="firstname" placeholder="firstname" value="<?=$firstname ?? ''?>">
        <small><?= $error['firstname'] ?? '';?></small>

        <select name="name">
            <option value="Bangers">Bangers</option>
            <option value="Hidden Gems">Hidden Gems</option>
            <option value="Classiques">Classiques</option>
        </select>

        <input class="createForm" type="text" name="anime" placeholder="anime" value="<?=$anime ?? ''?>">
        <small><?= $error['anime'] ?? '';?></small>
        

            <label for="upload"></label>
            <input class="profileUpload" name="image" type="file">
            <small><?= $error['image'] ?? '';?></small>

        <div>
            <h3>Description</h3>
            <textarea class="textareaCreateForm" name="description" cols="100" rows="10"></textarea>
            <small><?= $error['description'] ?? '';?></small>
        </div>
        <div class="textareaBtnCreateForm">
            <input class="btn" type="submit" value="Valider">
        </div>
    </form>
