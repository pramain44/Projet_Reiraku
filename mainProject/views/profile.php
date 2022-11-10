<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/profile.css">
    <link rel="stylesheet" href="../public/assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>logo nomsite - nomProfil</title>
</head>
<body>
    <div class="profilInfo">
        <div class="registerTitle">
                    <a href="homeController.php"><img class="logoImg" src="../public/assets/img/logoVeibae.png" alt="logo"></a>
                <div class="mainTitle">
                    <h1>Informations de compte</h1>
                </div>
        </div>
        <div class="mainInfo">
            <div class="imgAndPseudo">
                <img class="profilImg" src="../public/assets/img/albedo_14060.jpg" alt="">
                <div class="userInfo">
                <ul>
                    <li>Mail :</li>
                </ul>
                <ul>
                    <li>Nom de compte :</li>
                </ul>
                <ul>
                    <li><a href=""></a>Changement de mot de passe</li>
                </ul>
                <ul>
                    <li><a href=""></a>Pseudo</li>
                </ul>
                </div>
                <div>
                    <h3>Choisir une image profile</h3>
                    <form method="post" enctype="multipart/form-data">
                        <label for="upload"></label>
                        <input name="profilPic" id="upload" class="file"  type="file" placeholder="Photo de profil"><br>
                        <input name="uploadButton" type="submit" value="Upload">
                   </form>
                </div>
            </div>
        </div>
    </div>
    <div class="watchList">
        <h2>Watchlist</h2>
        <div class="oeuvreItem">
            <h2>titre</h2>
            <div>
            <img class="" src="./assets/img/albedo_14060.jpg" alt="">
            </div>
            <button>upvoter</button><button>downvote</button><button>delete</button>
        </div>
    </div>

