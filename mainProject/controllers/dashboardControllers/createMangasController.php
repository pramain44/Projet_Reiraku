<?php
require_once(__DIR__.'/../../config/data.php');
require_once(__DIR__.'/../../helpers/database.php');
require_once(__DIR__.'/../../helpers/sessionFlash.php');
require_once(__DIR__.'/../../models/Manga.php');


$id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));

try{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $error = [];
        $title = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($title)){
            $error['title'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($title,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['title'] = 'la donnée n\'est pas conforme';
            }
        }
        $anime = trim(filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($anime)){
        $error['anime'] = 'ce champ est obligatoire';
        }//else{
        // $isOk = filter_var($anime,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
        //     if($isOk == false){
        //     $error['anime'] = 'la donnée n\'est pas conforme';
        //     }
        // }
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($description)){
        $error['description'] = 'ce champ est obligatoire';
        }//else{
        // $isOk = filter_var($description,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
        //     if($isOk == false){
        //     $error['description'] = 'la donnée n\'est pas conforme';
        //     }
        // }
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($lastname)){
            $error['lastname'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($lastname,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['lastname'] = 'la donnée n\'est pas conforme';
            }
        }
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($firstname)){
            $error['firstname'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($firstname,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['firstname'] = 'la donnée n\'est pas conforme';
            }
        }
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($name)){
            $error['name'] = 'ce champ est obligatoire';
        }else{
            $isOk = filter_var($name,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_NO_NUMBER.'/')));
            if($isOk == false){
                $error['name'] = 'la donnée n\'est pas conforme';
            }
        }
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_SPECIAL_CHARS));
        if(empty($image)){
            $error['image'] = 'ce champ est obligatoire';
        }
        //else{
        //     $isOk = filter_var($image,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>'/'.REGEX_WHATEVER.'/')));
        //     if($isOk == false){
        //         $error['image'] = 'la donnée n\'est pas conforme';
        //     }
        // }
        
        $title = $_POST['title'];
        $lastname = $_POST['lastname']; 
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];   
        $anime = $_POST['anime'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        if(empty($error)){
            $sql = 'BEGIN;
            INSERT INTO `categories` (name) VALUES (:name);
            INSERT INTO `authors` (firstname, lastname) VALUES (:firstname, :lastname);
            INSERT INTO `mangas` (description, anime, title, image, Id_authors,Id_categories) VALUES (:description, :anime, :title, :image,@authors_id:=LAST_INSERT_ID(),LAST_INSERT_ID());
            COMMIT;';
            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':lastname',$lastname);
            $sth->bindValue(':firstname',$firstname);
            $sth->bindValue(':name',$name);
            $sth->bindValue(':description',$description);
            $sth->bindValue(':anime',$anime);
            $sth->bindValue(':title',$title);
            $sth->bindValue(':image',$image);
            $response = $sth->execute();
            if($response){
                SessionFlash::set('Manga Ajouter');
                header('location: /mainProject/controllers/dashboardControllers/createMangasController.php');
                exit();
            }
        }
    }

}catch(PDOException $e){
     die('error'.$e->getMessage());
}

include __DIR__.'/../../views/dashboardViews/createMangas.php';



// BEGIN;
//             INSERT INTO `authors` (firstname, lastname) VALUES ('kentaro', 'miura');
//             INSERT INTO `mangas` (Id_authors) VALUES (LAST_INSERT_ID());
//             INSERT INTO `categories` (name) VALUES ('bangers');
//             INSERT INTO `mangas` (description, anime, title, image, Id_categories) VALUES ('test', 'oui', 'berserk', 'url',LAST_INSERT_ID());
//             COMMIT;

//http://projet_2.0.localhost/mainProject/controllers/dashboardControllers/createMangasController.php

//Si je devais dire ce qui fait de FMA une œuvre particulièrement bonne ça serait surement à cause des thèmes abordés et de l'émotion véhiculé. En effet on commence tout de suite avec des héros qui ont perdu leur membre/corps pour essayer de retrouver leur mère décédé. Ensuite on parle de guerre et notamment de génocide au travers de scar et de son peuple les ishval, et même au seins de l'armée qui emplois des alchimistes et donc nos personnages ont trouvent beaucoup d'histoire très touchantes et surtout très humaine. J'aime beaucoup le faite qu'on voit beaucoup la mauvaise utilisation de l'alchimie c'est très crédible pour le monde car l'homme fait toujours le meilleur et le pire avec ses créations. Sinon l’œuvre reste très cool niveau combat et histoire(la géopolitique peut être un peu sous exploité au niveau des autres pays) notamment du au thème principale l'alchimie qui permet des styles de combat assez divers et très sympa à découvrir. Évidemment comme on parle d'alchimie même si cette œuvre a son interprétation on retrouve des sujets/thèmes assez courant comme la pierre philosophale, l'immortalité et la création de l'homme (avec les homonculus notamment) et donc forcement qui dit création dit rapport a dieu. Point positif même si la fin n'est pas parfaite le manga ne tombe dans la longueur et les sous intrigues inutiles.


// Bon une grand œuvre assurément avec deux grand points, un univers post apo super qui fourmille de détail, le monde qui nous est présenté est vivant avec des supers idées comme le faite de pouvoir se connecter a la vision d’athlète dans un sport semis inventé, la dualité certes classique entre le bidonville en bas et la ville 'rêver' en haut tres symbolique. Tout cela crée un monde très pertinent et très intéressant qui permet aux deuxième grand point du manga d'être d'autant plus pertinent j'ai nommé les personnage. Car en effet on suis un personnage en recherche identitaire mais pas que car étant un robot doté de penser tout du moins de réflexion, notre personnage principal sera souvent confronté a ses interrogation intérieurs face aux humains et les conditions de vie compliqué du bidonville poussant les gens aux crimes. Compliqué de vraiment parler de ce manga et de ce qu'il fait ressentir personnellement c'est plus de la réflexion qui m'a été apporté mais je pense qu’émotionnellement on peut être très pris aussi, je parlerais vite fait des défauts enfin du défaut qui est discutable la fin. La fin de l'histoire a connue des problèmes car l'auteur du a des problèmes personnel a dit qu'il ne pouvait plus continuer a dessiner du coup il s'est contenté d'une fin raccourcis et donc peut être incomplète sur certains aspect cependant elle reste plutôt correct même si on ressent que certains point manque de détail qu'ils auraient pu avoir.