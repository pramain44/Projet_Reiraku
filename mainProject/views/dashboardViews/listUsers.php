<?php
   if (SessionFlash::exist()) {
                ?>
        <div class="alert" style="position: absolute; left: 48rem; top: 2rem;">
            <strong><?= SessionFlash::get() ?></strong>
        </div>
<?php } ?>

    <h1>Users List</h1>
    <section class="userContainer">
        <?php
        foreach($users as $user): ?>
        <div>
            <div class="table nameAccount">
                <h3>Name Account</h3>
                <p><?=$user->name_account?></p>
            </div>
            <div class="table email">
                <h3>Email</h3>
                <p><?=$user->email?></p>
            </div>
            <div class="table createdDate">
                <h3>Created At</h3>
                <p><?=$user->created_at?></p>
            </div>
            <div class="modify">
                <a href="deleteController.php?Id_users=<?=$user->Id_users?>">Supprimer</a>
            </div>
        </div>
        <?php endforeach ?>

    </section>
