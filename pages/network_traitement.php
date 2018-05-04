
<?php
session_start();
/*
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Ajouter en ami':
        
    echo "The select function is calleddddddddddddddddd.";    
        add();
            break;
    }
}

function add() {
    */
    echo "The select function is called.";
    echo $_POST['id_user'];
		
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        $sql="INSERT INTO invitation (ID_user1, status1, invitation.text, ID_user2, status2) 
        VALUES('".$_SESSION['ID_user']."', '1', 'hey' ,'".$_POST['id_user']."','0')";
        echo $sql;
        $bdd->exec($sql);
        echo "Demande envoyée!";
    
	//
//}

?>