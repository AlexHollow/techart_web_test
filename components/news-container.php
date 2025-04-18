<?php require "./components/pagination.php"; ?>

<ul class="news__container">

    <?php 
    
    $news_query = $database->prepare("SELECT * FROM news ORDER BY date DESC LIMIT $news_per_page OFFSET $offset");
    $news_query->execute();
    $news_data = $news_query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($news_data as $news) { 
        
    ?>

    <li>
        <a class="card card_type_hovered"
            href="./work_news.php?id=<?php echo($news['id']); ?>">

            <div class="card__time">
                <?php

                $date = date_create_from_format('Y-m-d H:i:s', $news['date']);
                echo($date->format('d.m.Y'));

                ?>
            </div>

            <h3 class="card__title"><?php echo($news['title']); ?></h3>

            <p class="card__announce">
                <?php echo(trim($news['announce'], '<p>/')); ?>
            </p>

            <button class="button button_size_large">
                Подробнее&nbsp;
                <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z" fill="#841844" />
                </svg>
            </button>
        </a>
    </li>

    <?php } ?>
</ul>