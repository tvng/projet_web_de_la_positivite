<!DOCTYPE html>
<html>
    <body>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <p> Nom : <input type="text" name="name" /></p><br>
            <p> Prénom : <input type="text" name="first_name" /></p><br>
            <p> Adresse e-mail : <input type="text" name="email" /></p><br>
            <p> Mot de passe : <input type="password" name="password" /></p><br>
            Statut : <select name="type">
                <option value="student">Etudiant</option>
                <option value="professor">Professeur</option>
                </select><br>
            <p> Pseudo : <input type="text" name="pseudo" /></p><br>    
            <input type="submit" value="Soumettre" />
        </form>
    </body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try
        {
            $empty = true;
            if($_POST['name'] != null AND $_POST['first_name'] != null AND $_POST['email'] != null AND $_POST['password'] != null AND $_POST['pseudo'] != null)
            {
                $empty = false;
            }

            $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $emailvalide = true;
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo "Le mail est invalide.";
                $emailvalide = false;
            }

            if($emailvalide == true AND $empty == false)
            {
                $sql="INSERT INTO user (name, first_name, email, password, type, pseudo, creation_date)
                VALUES('" . $_POST['name'] . "','" . $_POST['first_name'] . "','" . $_POST['email'] . "','" .
                    password_hash($_POST['password'],PASSWORD_DEFAULT) . "','" . $_POST['type'] . "','" . $_POST['pseudo'] . "','" . date('Y-m-d') . "')";
                $bdd->exec($sql);

                /*
                $coregister = $bdd->prepare("INSERT INTO user (name, firstname, email, password, type, pseudo, creation_date) VALUES(?,?,?,?,?,?,?)");
                $colog = $coregister->execute($_POST['name'],$_POST['firstname'],$_POST['email'], password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['type'],$_POST['pseudo'],date('Y-m-d'));
                */
                echo "L'inscription est complète. Bienvenue sur ECEperanto !";
                //rediriger vers connexion une fois que c'est fait
            }

        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

