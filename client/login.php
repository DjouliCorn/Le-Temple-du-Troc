<?php
session_start();

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'trocdetrucs');
define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';port=3306;charset=UTF8');

//$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$errors=[];

if (isset($_POST['connexion'])) {
    if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Veuillez entrer votre pseudo';
    }
    if (empty($_POST['motDePasse'])) {
        $errors['motDePasse'] = 'Veuillez entrer le mot de passe';
    }
    $username = $_POST['pseudo'];
    $password = $_POST['motDePasse'];

    
    var_dump($password);

    if (count($errors) === 0) {
        $query = "SELECT userName, motDePasse FROM clients WHERE userName = $username";
        $stmt = $dbh->prepare($query);
        $stmt = $this->dbh->error_list;

        var_dump($stmt);
        var_dump($username);
        
        $stmt->bind_param('ss',$username, $password);

        var_dump($stmt);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['motDePasse'])) { // if password matches
                $stmt->close();

                $_SESSION['idClient'] = $user['idClient'];
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['message'] = 'Vous êtes connecté !';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Les informations sont incorrectes";
            }
        } else {
            $_SESSION['message'] = "Erreur de base de données";
            $_SESSION['type'] = "alert-danger";
        }
    }
}
