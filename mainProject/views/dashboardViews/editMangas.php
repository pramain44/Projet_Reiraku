
<div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="inputContainer">
            <div class="oneInput">
                    <label for="title">Titre</label>
                    <input class="createForm" type="text" name="title"  placeholder="title" value="<?=$authors->title?>">
                    <small><?= $error['title'] ?? '';?></small>         
            </div>

            <div class="oneInput">
                <label for="lastname">Nom de l'auteur</label>
                <input class="createForm" type="text" name="lastname" placeholder="lastname" value="<?=$authors->lastname ?? ''?>">
                <small><?= $error['lastname'] ?? '';?></small>
            </div>

            <div class="oneInput">
                <label for="firstname">Prénom de l'auteur</label>
                <input class="createForm" type="text" name="firstname" placeholder="firstname" value="<?=$authors->firstname ?? ''?>">
                <small><?= $error['firstname'] ?? '';?></small>
            </div>

            <div class="oneInput">
                <label for="name">Catégorie</label>
                <select class="editSelect" name="name">
                    <option value="Bangers">Bangers</option>
                    <option value="Hidden Gems">Hidden Gems</option>
                    <option value="Classiques">Classiques</option>
                </select>
            </div>

            <div class="oneInput">
                <label for="anime">Animé</label>
                <input class="createForm" type="text" name="anime" placeholder="anime" value="<?=$authors->anime ?? ''?>">
                <small><?= $error['anime'] ?? '';?></small>
            </div>
            
            <div class="oneInput">
                <label for="upload">Choisir une image</label>
                <input class="profileUpload" name="image" type="file">
                <small><?= $error['image'] ?? '';?></small>
            </div>
        </div>
        <div>
            <h2>Description</h2>
            <textarea class="textareaCreateForm" name="description" cols="100" rows="10"><?=$authors->description ?? ''?></textarea>
            <small><?= $error['description'] ?? '';?></small>
        </div>

        <div class="textareaBtnCreateForm">
            <input class="btn" type="submit" value="Modifier">
        </div>
    </form>
