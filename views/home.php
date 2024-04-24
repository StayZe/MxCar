<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <title>MxCar | Home</title>
</head>

<body>
    <div class="main-content">
        <?php if (isset($_SESSION['pseudo']) or isset($_COOKIE['pseudo'])) {
            include './views/headerConnected.php';
        } else {
            include './views/header.php';
        } ?>
    </div>
    </div>

    <div class="start">
        <h1>Home</h1>
        <?php if (isset($_SESSION['pseudo'])) : ?>
            <p>Hi <?php echo $_SESSION['pseudo']; ?>!</p>
        <?php elseif (isset($_COOKIE['pseudo'])) : ?>
            <p>Hi <?php echo $_COOKIE['pseudo']; ?>!</p>
        <?php else : ?>
            <p>Hi guest !</p>
        <?php endif; ?>
    </div>

    <div id="slider">
        <div class="slider">
            <div class="slider_content">
                <div class="slider_content_item">
                    <img src="../assets/img/1.jpeg">
                    <img src="../assets/img/2.jpeg">
                    <img src="../assets/img/3.jpeg">
                    <img src="../assets/img/4.jpeg">
                    <img src="../assets/img/5.jpeg">
                </div>
            </div>

            <div class="slider_nav">
                <button onclick="left()" class="left-arrow"><img src="../assets/img/left.png"></button>
                <button onclick="right()" class="right-arrow"><img src="../assets/img/right.png"></button>
            </div>
        </div>
    </div>
</body>

</html>