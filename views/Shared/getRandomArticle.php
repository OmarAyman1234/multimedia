<?php
require_once '../../models/article.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$articles = article::getAllArticles();
$articlesShuffled = article::getShuffledArticles($articles);
$article = $articlesShuffled[0];
$_SESSION['selected_article'] = $article;

header('Content-Type: application/json');
echo json_encode($article);
exit;
