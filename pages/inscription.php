<!DOCTYPE html>
<html>
    <body>
        <form action="inscriptionTraitement.php" method="POST">
            <p> Nom : <input type="text" name="firstName" /></p><br>
            <p> Prénom : <input type="text" name="name" /></p><br>
            <p> Adresse e-mail : <input type="text" name="email" /></p><br>  
            <p> Mot de passe : <input type="password" name="passw" /></p><br>
            Statut : <select name="type">
                <option value="student">Etudiant</option>
                <option value="professor">Professor</option>
                </select><br>
            <p> Pseudo : <input type="text" name="pseudo" /></p><br>    
            <input type="submit" value="Soumettre" name="submit" />
        </form>
    </body>
</html>