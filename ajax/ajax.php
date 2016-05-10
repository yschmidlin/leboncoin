Début du fichier
<?php
print_r($_GET);
print_r($_POST);

if (isset($_GET['action']) && $_GET['action'] == 'A'){
	echo '<img id="logo" src="logo.jpg" alt="logo"/>';
}

if (isset($_GET['action']) && $_GET['action'] == 'B'){
	echo 'Action B';
}

if (isset($_POST['action']) && $_POST['action'] == 'C'){
	echo '<div>
			<p>ccc</p>
			<p>cc</p>
			<p>c</p>
		  </div>';
			
}

?>
Fin du fichier