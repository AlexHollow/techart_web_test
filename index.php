<?php require "./components/database.php"; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="icon" href="./images/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./vendor/normalize.css">
    <link rel="stylesheet" href="./index.css?<?php echo time(); ?>">
</head>
<body class="page">
    <?php require_once "./components/header.php"; ?>

    <main class="content">
        
        <?php require_once "./components/banner.php"; ?>

        <section class="news">
            <div class="wrapper">
                <h2 class="news__title">Новости</h2>

                <?php require_once "./components/news-container.php"; ?>

                <?php require_once "./components/nav-menu.php"; ?>
                
            </div>
        </section>
    </main>
    
    <div class="wrapper">
        <div class="line"></div>
        <?php require_once "./components/footer.php"; ?>
    </div>
</body>
</html>