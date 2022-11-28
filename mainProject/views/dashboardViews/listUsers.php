<?php
   if (SessionFlash::exist()) {
                ?>
        <div class="alert" style="position: absolute; left: 48rem; top: 2rem;">
            <strong><?= SessionFlash::get() ?></strong>
        </div>
<?php } ?>

    <h1>Users List</h1>

    <form method="get">
        <div class="wrap">
            <input class="searchBar" type="search" name="search" placeholder="chercher par mail ou nom" aria-label="search" name="search">
            <button class="searchBtn" type="submit">GO</button>    
        </div>
   </form>
    <section>
        <?php
        foreach($users as $user): ?>
        <div class="userContainer">
            <div class="tableUsers">
                <h2>Name Account</h2>
                <p><?=$user->name_account?></p>
            </div>
            <div class="tableUsers">
                <h2>Email</h2>
                <p><?=$user->email?></p>
            </div>
            <div class="tableUsers">
                <h2>Created At</h2>
                <p><?=$user->created_at?></p>
            </div>
            <div class="delete">
             <td><a class="deleteComment"href="deleteController.php?Id_users=<?=$user->Id_users?>">Supprimer</a></td>
            </div>
        </div>
        <?php endforeach ?>

    </section>
