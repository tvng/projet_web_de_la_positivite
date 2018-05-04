<div class="container">
    <div class="inscription col-lg-6 mx-auto">
        <h2 class="text-center">Inscrivez-vous!</h2>
        <h4 class="text-center">Bâtissez votre réseau avec des milliers d'utilisateurs.</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            
                
            <div class="row">
            <div class="col">
            <div class="form-group">  
            <label> Nom :</label> <input type="text" class="form-control" placeholder="Doe" name="name" />
            </div>
            </div>
            <div class="col">
            <div class="form-group">        
            <label> Prénom :</label> <input type="text" class="form-control" placeholder="John" name="first_name" />
            </div>    
            </div>
            </div>
           
          
            <div class="form-group">        
            <label> Adresse e-mail :</label> <input type="text" class="form-control" placeholder="mail@mail.com" name="email" />
            </div>
            <div class="form-group">        
            <label> Mot de passe :</label> <input type="password" class="form-control" name="password" />
            </div>

            <div class="form-group">        
            <label> Statut au sein de l'Ecole :</label> 
            <select class="form-control" name="type">
                <option value="student">Etudiant</option>
                <option value="professor">Professeur</option>
            </select>
            </div>
            <div class="form-group">        
            <label> Pseudo :</label>  <input type="text" class="form-control" name="pseudo" />
            </div>    
            <input class="btn" type="submit" name="Inscription" value="Inscription" />
            <br /><br />
        </form>
    </div>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Inscription'])) {
        echo "INSCRIPTION !";
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

                echo "L'inscription est complète. Bienvenue sur ECEperanto !";
                //rediriger vers connexion une fois que c'est fait
                header("localhost/projet_web_de_la_positivite/pages/connexion.php");
                exit;
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

