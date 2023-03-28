<?php
/*
* Mise à jour d'un film
*/
include '../inc/fonctions.php';

(isGetIdValid()) ? $id = $_GET['id'] : error404();

$titreDb = getArticleById($id)['titre'];
$contenuDb = getArticleById($id)['contenu'];
$imageUrlDb = getArticleById($id)['image'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $titre = cleanData($_POST['titre']);
    $contenu = cleanData($_POST['contenu']);
    $image = cleanData($_POST['image']);

    updateArticle($id, $titre, $contenu, $image);

    header('Location: ./index.php');
    exit();
endif;

require '../view/adminBlog/edit.view.php';
