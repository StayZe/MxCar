<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MxCar | Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="main-container">
    <?php if (isset($_SESSION['pseudo']) OR isset($_COOKIE['pseudo'])){
            include './views/headerConnected.php'; 
        } else {
            include './views/header.php';
        } ?>
    <h1>Login</h1>
        <div class="box-form">
            <form action="index.php?action=loginProcess" method="post">
                <div class="titleLog">
                    <h2>Login</h2>
                </div>
                <div class="DoubleBoxInput">
                    <div class="boxInput">
                        <input type="text" class="input" id="pseudo" name="pseudo" placeholder="Pseudo" required><br>
                    </div>
                    <div class="boxInput">
                        <input type="password" class="input" id="psw" name="psw" placeholder="Password" required><br>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" class="loginButton" name="submit">Login</button>
                    <input type="hidden" name="form_type" value="login">
                </div>
            </form>
            <div class="creatAccount">
                <p><a href="index.php?action=register">Create an account ?</a></p>
            </div>
        </div>
    </div>
</body>
</html>