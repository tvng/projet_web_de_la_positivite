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
        /*
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
        */
        $_POST['name']="Loul";
        $_POST['first_name']="Loul1";
        $_POST['email']="riendutout";
        $_POST['password']="test4";
        $_POST['type']="etudiant";
        $_POST['pseudo']="freezos";
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql="INSERT INTO user (name, first_name, email, password, type, pseudo, creation_date, profile_pic, header_pic)
            VALUES('" . $_POST['name'] . "','" . $_POST['first_name'] . "','" . $_POST['email'] . "','" .
                password_hash($_POST['password'],PASSWORD_DEFAULT) . "','" . $_POST['type'] . "','" . $_POST['pseudo'] . "','" . date('Y-m-d') . "','". NULL . "','" . NULL . "')";
            $bdd->exec($sql);

            /*
            $coregister = $bdd->prepare("INSERT INTO user (name, firstname, email, password, type, pseudo, creation_date) VALUES(?,?,?,?,?,?,?)");
            $colog = $coregister->execute($_POST['name'],$_POST['firstname'],$_POST['email'], password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['type'],$_POST['pseudo'],date('Y-m-d'));
            */
            echo "L'inscription est complète. Bienvenue sur ECEperanto !";
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

