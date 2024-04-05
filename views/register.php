<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MxCar | Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php if (isset($_SESSION['pseudo']) OR isset($_COOKIE['pseudo'])){
            include './views/headerConnected.php'; 
        } else {
            include './views/header.php';
        } ?>
    <div class="main-container">
        <div class="box-form">
            <form action="index.php?action=registerProcess" method="post">
                <div class="boxTitle">
                    <h2>Create an account for MxCar</h2>
                </div>
                <div class="form">
                    <div class="boxInput">
                        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required><br>
                    </div>
                    <div class="boxInput">
                        <input type="text" id="email" name="email" placeholder="E-Mail" required><br>
                    </div>
                    <div class="boxInput">
                        <input type="password" id="psw" name="psw" placeholder="Password" required><br>
                    </div>
                    <div class="boxInput">
                        <input type="password" id="checkPsw" name="checkPsw" placeholder="Confirm your password" required><br>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" class="registerButton" name="submit">Register</button>
                    <input type="hidden" name="form_type" value="register">
                </div>
            </form>
            <div class="login">
                <p><a href="index.php?action=login">You have an account ?</a></p>
            </div>
        </div>
    </div>

</body>
</html>