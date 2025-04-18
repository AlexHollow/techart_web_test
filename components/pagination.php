<?php

$news_per_page = 4;
$current_page = $_GET['page'];

if (!isset($current_page)) {
    $current_page = 1;
}

$offset = ($current_page * $news_per_page) - $news_per_page;

?>