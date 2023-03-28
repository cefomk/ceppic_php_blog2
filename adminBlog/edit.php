<?php
/*
* Mise à jour d'un film
*/
include '../inc/fonctions.php';

(isGetIdValid()) ? $id = $_GET['id'] : error404();

$titreDb = getArticleById($id)['titre'];
$contenuDb = getArticleById($id)['contenu'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $titre = cleanData($_POST['titre']);
    $contenu = cleanData($_POST['contenu']);
   
    $target_dir = "../uploads/";
    $imageName = $_FILES["image"]["name"];
    $target_file = $target_dir . basename($imageName);
    move_uploaded_file($_FILES['image']['tmp_name'],$target_file);

    $titre = cleanData($_POST['titre']);
    
    if ($imageName):
        $image = "./uploads/".$imageName;
    endif;

    updateArticle($id, $titre, $contenu, $image);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminBlog/edit.view.php';
