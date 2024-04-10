<?php

// Connection à la DB 
try {
    $db = new PDO('mysql:host=localhost;dbname=mxcar;charset=utf8', 'root', '');
} catch (Exception $e) {
    echo "PROBLEME DE CO A LA base de donnnée";
}

function loginProcessDB() {
    global $db;

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $psw = htmlspecialchars($_POST['psw']);

    $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
    $statement = $db->prepare($sql);
    $statement->bindParam(":pseudo", $pseudo);
    
    if ($statement->execute()) {
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (password_verify($psw, $user['psw'])) {
            $_SESSION["pseudo"] = $pseudo; // Définition de la variable de session

            // Création du cookie pseudo
            setcookie("pseudo", $user['pseudo'], time() + (600), "/"); 

            header("Location: index.php?action=home");
            exit(); // Terminer le script après la redirection
        } else {
            echo "L'identifiant ou le mot de passe n'est pas bon";
        }
    }
}



function registerProcessDB(){
    global $db;

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $psw = htmlspecialchars($_POST['psw']);
    $pswHash = password_hash($_POST['psw'], PASSWORD_BCRYPT); // On hash le psw avec BCRYPT
    $checkPsw = htmlspecialchars($_POST['checkPsw']);

    // Vérifier si le pseudo est déjà présent dans la base de données
    $query = $db->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
    $query->bindParam(":pseudo", $pseudo);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result){
        // Si le pseudo existe déjà, afficher un message d'erreur
        echo "Ce pseudo est déjà utilisé. Veuillez en choisir un autre.";
    } else {
        if($psw == $checkPsw){
            //On vérifie que les deux mots de passe soient les mêmes, si oui, on crypte et insère dans la db
            $sql = ("INSERT INTO users (pseudo, email, psw) VALUES (:pseudo, :email, :psw)");
            $statement = $db->prepare($sql);

            $statement->bindParam(":pseudo", $pseudo);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":psw", $pswHash);

            if($statement->execute()){
                echo "Votre compte a bien été créé";
                header("Location: ./index.php?action=login");
            }else{
                echo "Une erreur est survenue lors de l'inscription.";
            }
        } else {
            echo "Les mots de passe ne correspondent pas";
        }
    }
}


function  logOutDB(){
    session_destroy(); //destruction de la session
    setcookie("pseudo", $_COOKIE['pseudo'], time() - 600, "/"); // Et du cookie pseudo 
    header("Location:./index.php?action=home");
}
