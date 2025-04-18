<?php require "./components/database.php";

$id = $_GET['id'];

$work_news_query = $database->prepare("SELECT * FROM news WHERE id = $id");
$work_news_query->execute();
$work_news_data = $work_news_query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($work_news_data[0]['title']); ?></title>
    <link rel="icon" href="./images/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./vendor/normalize.css">
    <link rel="stylesheet" href="./work_news.css?<?php echo time(); ?>">
</head>
<body class="page">
    <?php require_once "./components/header.php"; ?>

    <div class="line"></div>

    <main class="content">
        <section class="news news_type_work-news">
            <div class="wrapper">
                <div class="news__ref-container">
                    <p class="news__ref-text">
                        <a class="news__ref" href="./index.php">Главная / </a>
                        <?php echo($work_news_data[0]['title']); ?>
                    </p>
                </div>

                <h2 class="news__title">
                    <?php echo($work_news_data[0]['title']); ?>
                </h2>

                <ul class="news__container">
                    <li>
                        <div class="card">
                            <div class="card__time">
                                <?php

                                $date = date_create_from_format('Y-m-d H:i:s', $work_news_data[0]['date']);
                                 echo($date->format('d.m.Y'));

                                ?>
                            </div>

                            <h3 class="card__title">
                                <?php echo(trim($work_news_data[0]['announce'], '<p>/')); ?>
                            </h3>

                            <div class="card__announce">
                                <?php echo($work_news_data[0]['content']); ?>
                            </div>
                            
                            <a class="button button_size_large"
                            href="<?php echo($_SERVER['HTTP_REFERER']); ?>" >
                                <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    transform="matrix(-1,1.2246467991473532e-16,-1.2246467991473532e-16,-1,0,0)">
                                    <path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565 11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878 3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973 17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466 11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z" fill="#841844"></path>
                                </svg>
                                &nbsp;Назад к новостям
                            </a>
                        </div>
                    </li>

                    <li class="news__img">
                        <img src="./images/<?php echo($work_news_data[0]['image']); ?>"
                        alt="Фото из новости">
                    </li>
                </ul>
            </div>
        </section>
    </main>
    
    <div class="wrapper">
        <div class="line"></div>
        <?php require_once "./components/footer.php"; ?>
    </div>
</body>
</html>