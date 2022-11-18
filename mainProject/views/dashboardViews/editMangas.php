
<div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form novalidate method="post">
        <input type="text" name="title"  placeholder="title" value="<?=$authors->title?>">
        <small><?= $error['title'] ?? '';?></small>

        <input type="text" name="lastname" placeholder="lastname" value="<?=$authors->lastname ?? ''?>">
        <small><?= $error['lastname'] ?? '';?></small>

        <input type="text" name="firstname" placeholder="firstname" value="<?=$authors->firstname ?? ''?>">
        <small><?= $error['firstname'] ?? '';?></small>

        <input type="text" name="name" value="<?=$categories->name ?? ''?>">


        <input type="text" name="anime" placeholder="anime" value="<?=$authors->anime ?? ''?>">
        <small><?= $error['anime'] ?? '';?></small>
        
        <input type="text" name="image" placeholder="Url img" value="<?=$authors->image ?? ''?>">
        <small><?= $error['image'] ?? '';?></small>

        <div>
            <h3>Description</h3>
            <textarea name="description" cols="100" rows="10"><?=$authors->description ?? ''?></textarea>
            <small><?= $error['description'] ?? '';?></small>
        </div>

        <input class="btn" type="submit" value="Modifier">
    </form>
