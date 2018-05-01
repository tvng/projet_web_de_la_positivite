<?php
?>

<html>
    <body>
        <form action="" method="POST">
            <p> Nom : <input type="text" name="name" /></p><br>
            <p> Prenom : <input type="text" name="first_name" /></p><br>
            <p> Statut :
            <select name="status">
                <option value="student" selected>Etudiant</option>
                <option value="teacher">Enseignant</option>
                <option value="partner">Partenaire</option>
            </select>
            </p>
            <p> Pseudo : <input type="text" name="pseudo" /></p><br>
            <p> E-mail : <input type="text" name="email" /></p><br>
            <p> Mot de passe : <input type="password" name="password" /></p><br>
            <input type="submit" value="Soumettre" name="submit" />
        </form>
    </body>
</html>
