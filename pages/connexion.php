<!DOCTYPE html>
<html>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <p> Adresse e-mail : <input type="text" name="email"></p><br>
            <p> Mot de passe : <input type="password" name="password"></p><br>
            <input type="submit" value="Soumettre">
        </form>
    </body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    echo $email.$mdp;

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    //on verifie que le mail est correct
    $instruct = $bdd->prepare('SELECT password FROM user WHERE email = ?');
    $colog = $instruct->execute(array($email));//Ca devrait pas juste être $email?
    $info = array();
    $coreussi = false;

    if($colog != null)
    {
        $data = $instruct->fetch();
        $mdp_vrai=password_verify($mdp,$data['password']);

        if($mdp_vrai)
        {
            $coreussi = true;
            $coid = $bdd->prepare('SELECT * FROM user WHERE email = ?');
            $coid->execute(array($email));//attention il faut bien blinder pour n'avoir que des emails différents dans la bdd, sinon ça plante

            $result = $coid->fetch();
            var_dump($_POST);

            $_SESSION['ID_user'] = $result['ID_user'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['first_name'] = $result['first_name'];
            $_SESSION['pseudo'] = $result['pseudo'];
            $_SESSION['email'] = $result['email'];
            /*
            echo "ID USER : " .$_SESSION['ID_user'];
            echo "nom : " .$_SESSION['name'];
            echo "fnom : " .$_SESSION['first_name'];
            echo "pseu : " .$_SESSION['pseudo'];
            echo "mail : " .$_SESSION['email'];
            */
            header("http://localhost/projet_web_de_la_positivite/pages/home.php");
            exit;
        }
        else
        {
            echo "Mot de passe incorrect."."/br";
        }

    }
    else
    {
        echo "Identifiant inexistant."."/br";
    }
    $instruct->closeCursor();

    //On a plus qu'a recuperer les info de l'id qu'on a pour afficher les infos en permanence
}


?>