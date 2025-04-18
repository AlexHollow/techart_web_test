<?php

$last_news_query = $database->prepare('SELECT * FROM news ORDER BY date DESC LIMIT 1');
$last_news_query->execute();
$last_news_data = $last_news_query->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="banner">
    <div class="overlay"></div>

    <img class="banner__img"
    src="./images/<?php echo($last_news_data[0]['image']); ?>"
    alt="Фантастическое фото">

    <div class="wrapper wrapper_type_banner">
        <h1 class="banner__title">
            <?php echo($last_news_data[0]['title']); ?>
        </h1>

        <p class="banner__announce">
            <?php echo(trim($last_news_data[0]['announce'], '<p>/')); ?>
        </p>
    </div>
</section>