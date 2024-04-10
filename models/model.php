<?php

// Connection à la DB 
try {
    $db = new PDO('mysql:host=localhost;dbname=streamviewbdd;charset=utf8', 'root', '');
} catch (Exception $e) {
    echo "PROBLEME DE CO A LA base de donnnée";
}

function LoginProcessDB(){
    global $db;

    if(isset($_POST['email']) && isset($_POST['mdp'])){
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);

        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $db->prepare($sql);
        $statement->bindParam(":email", $email);
        
        if ($statement->execute()) {
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($mdp, $user['mdp'])) {
                $_SESSION["pseudo"] = $user['pseudo'];
                $_SESSION["email"] = $user['email'];
                setcookie("pseudo", $user['pseudo'], time() + (3600 * 6), "/");
                header("Location: index.php?action=home");
                exit();
            } else {
                echo "L'identifiant ou le mot de passe n'est pas bon";
            }
        } else {
            echo "Erreur de connexion à la base de données";
        }
    }
}

function RegisterProcessDB(){
    global $db;

    if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['checkMdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $checkMdp = htmlspecialchars($_POST['checkMdp']);

        $query = $db->prepare("SELECT email FROM users WHERE email = :email");
        $query->bindParam(":email", $email);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result){
            echo "Cet e-mail est déjà utilisé. Veuillez en choisir un autre.";
        } else {
            if($mdp == $checkMdp){
                $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (pseudo, email, mdp, DateCreaCompte) VALUES (:pseudo, :email, :mdp, CURRENT_TIMESTAMP())";
                $statement = $db->prepare($sql);
                $statement->bindParam(":pseudo", $pseudo);
                $statement->bindParam(":email", $email);
                $statement->bindParam(":mdp", $mdp_hash);

                if($statement->execute()){
                    echo "Votre compte a bien été créé";
                    header("Location: ./index.php?action=login");
                    exit();
                }else{
                    echo "Une erreur est survenue lors de l'inscription.";
                }
            } else {
                echo "Les mots de passe ne correspondent pas";
            }
        }
    }
}

function LogoutDB(){
    session_destroy();
    setcookie("pseudo", "", time() - (3600 * 6), "/");
    header("Location: index.php?action=home");
    exit();
}

function ChangePseudoDB(){
    global $db;

    if(isset($_POST['pseudo']) && isset($_SESSION["email"])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_SESSION["email"]);

        try {
            $sql = "UPDATE users SET pseudo = :pseudo WHERE email = :email";
            $statement = $db->prepare($sql);
            $statement->bindParam(":pseudo", $pseudo);
            $statement->bindParam(":email", $email);

            if($statement->execute()){
                $_SESSION["pseudo"] = $pseudo;
                setcookie("pseudo", $pseudo, time() + (3600 * 6), "/");
                header("Location: index.php?action=account-home");
                exit();
            } else {
                echo "Une erreur est survenue lors de l'exécution de la requête SQL.";
            }
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
