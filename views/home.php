<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>MxCar | Home</title>
</head>

<body>
    <div class="main-content">
    <?php if (isset($_SESSION['pseudo']) OR isset($_COOKIE['pseudo'])){
            include './views/headerConnected.php'; 
        } else {
            include './views/header.php';
        } ?>
        <h1>Home</h1>

        <?php if (isset($_SESSION['pseudo'])) : ?>
            <p>Hi <?php echo $_SESSION['pseudo']; ?>!</p>
        <?php elseif (isset($_COOKIE['pseudo'])) : ?>
            <p>Hi <?php echo $_COOKIE['pseudo']; ?>!</p>
        <?php else : ?>
            <p>Hi guest !</p>
        <?php endif; ?>
    </div>
    </div>
</body>

</html>