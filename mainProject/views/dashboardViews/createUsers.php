<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire gestion Users</title>
</head>
<body>
    <div>
        <?php
        if(SessionFlash::exist()){ 
            echo SessionFlash::get();
        }
        ?>
    </div>
    <form novalidate method="post">
        <input type="text" name="email"  placeholder="email" value="<?=$email ?? ''?>">
        <small><?= $error['email'] ?? '';?></small>

        <input type="text" name="name_account" placeholder="name_account" value="<?=$name_account ?? ''?>">
        <small><?= $error['name_account'] ?? '';?></small>

        <input type="text" name="password" placeholder="password" value="<?=$password ?? ''?>">
        <small><?= $error['password'] ?? '';?></small>


        <input type="hidden" name="created_at" placeholder="created_at" value="<?=$created_at ?? ''?>">
        <small><?= $error['created_at'] ?? '';?></small>
        
        <input type="hidden" name="validated_at" placeholder="Url img" value="<?=$validated_at ?? ''?>">
        <small><?= $error['validated_at'] ?? '';?></small>


        <input class="btn" type="submit" value="Valider">
    </form>
</body>
</html>