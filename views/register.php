<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MxCar | Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include_once 'header.php';?>
    <div class="main-container">
        <div class="box-form">
            <form action="index.php?action=registerProcess" method="post">
                <div class="boxTitle">
                    <h2>Create an account in LockHash</h2>
                </div>
                <div class="form">
                    <div class="boxInput">
                        <img src="./assets/pictures/icone-utilisateur-gris.png" alt="Icone de pseudo">
                        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required><br>
                    </div>
                    <div class="boxInput">
                        <img src="./assets/pictures/arobase.png" alt="Icone d'arobase"><br>
                        <input type="text" id="email" name="email" placeholder="E-Mail" required><br>
                    </div>
                    <div class="boxInput">
                        <img src="./assets/pictures/icone-cadenas-ouvert2.png" alt="Icone de cadenas ouvert">
                        <input type="password" id="psw" name="psw" placeholder="Password" required><br>
                    </div>
                    <div class="boxInput">
                        <img src="./assets/pictures/icone-de-cadenas-de-securite-gris.png" alt="Icone de cadenas fermé">
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