<?php
if(isset($_POST['submit'])){
	// Required field names
	$required = array('nom', 'passw');
	// Loop over field names, make sure each one exists and is not empty
	$error = false;
    foreach($required as $field) 
    {
        if (empty($_POST[$field])) 
        {
			$error = true;
			echo "Le champ ". $field. " est vide". "<br>";
		}
	}
}
?>