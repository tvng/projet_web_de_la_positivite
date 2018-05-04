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
