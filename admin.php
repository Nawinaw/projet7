<?php
session_start(); // permet de démarrer la session soit utilisation des cookies

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {//le isset ici permet de verifier que la variable existe puis je verifie qu'il y a une donnee dans le login
    header('Location: exos.php');//redirection vers l'autre page quand les conditions ok
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {// verifications des identifiants
    $username = 'meddah'; // nom d'utilisateur
    $password = 'meddah123'; //mot de passe

    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    if ($inputUsername === $username && $inputPassword === $password) {
        // Authentification réussie, définir les informations de session
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

             header('Location: index.php');// Redirection vers la page d'accueil

        exit;
    } else {
        $errorMessage = 'Identifiants incorrects, veuillez réessayer.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
    <p class>Connexion</p>
    <ul>
        <li><a href="#accueil">Accueil</a></li>
        <li><a href="#utilisateurs">Utilisateurs</a></li>
        <li><a href="#parametres">Paramètres</a></li>
        <li><a href="#connexion">Connexion</a></li>
    </ul>
    <!--PHP-->
    <?php if (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>
    <form action="" method="POST"><!--Action permet de rediriger vers une page pour faire un traitement// method post permet de mettre le mdp dans les variables sessions(cookies) -->
        <label for="username">Identifiant :</label><!--le label= div mais en une seule ligne -->
        <input type="text" id="username" name="username" required><br> <!-- input permet de creer une zone de saisie//ID= identifiant de ma zone de texte/ le nom de inuot est username-->
    <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>
    <br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
