<?php

$last_news_query = $database->prepare('SELECT * FROM news ORDER BY date DESC LIMIT 1');
$last_news_query->execute();
$last_news_data = $last_news_query->fetchAll(PDO::FETCH_ASSOC);

$news_count_query = $database->prepare('SELECT COUNT(id) as count FROM news');
$news_count_query->execute();
$news_count = $news_count_query->fetchAll(PDO::FETCH_ASSOC)[0]['count'];

$max_pages_count = ceil($news_count / $news_per_page);

$prev_page = $current_page - 1;
$next_page = $current_page + 1;

?>

<nav class="news__nav-menu">

    <?php 

    if ($current_page > 1) {
        echo('<a class="button button_size_large" href="./index.php?page=' . $prev_page . '">
            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" transform="matrix(-1,1.2246467991473532e-16,-1.2246467991473532e-16,-1,0,0)">
                <path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z" fill="#841844"></path>
            </svg>
        </a>
        ');
    }

    for ($i = 1; $i <= $max_pages_count; ++$i) {
        if ($i == $current_page) {
            echo('<div class="button button_size_small button_type_active">' . $i . '</div>');
        } else {
            echo('<a class="button button_size_small" href="./index.php?page=' . $i . '">' . $i . '</a>');
        }
    }

    if ($current_page != $max_pages_count) {
        echo('
        <a class="button button_size_large" href="./index.php?page=' . $next_page . '">
            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z" fill="#841844"/>
            </svg>
        </a>
        ');
    }

    ?>
</nav>