<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');

if(isset($_FILES['music']) && !empty($_FILES['music']) 
&& isset($_POST['title'])  && !empty($_POST['title']))
{
	
	$file = $_FILES['music'];

	// Si le "fichier" reçu est bien un fichier
		$ext = strtolower(substr(strrchr($file['name'], '.')  ,1));
		// Vérification des extentions
		if (preg_match('/\.(mp3|ogg)$/i', $file['name'])) {
			$filename = md5(uniqid(rand(), true));
			$destination = "musics/{$filename}.{$_SESSION['id']}.{$ext}";

			// TODO
			$user_id=$_SESSION['id'];

			$addmusic = addMusic($db, $user_id, $_POST['title'], $destination);
	
			if(move_uploaded_file($file['tmp_name'], $destination))
				header('Location: dashboard.php');
			else $error = "impossible de bouger le fichier";
		} else {
			$error = 'Erreur, le fichier n\'a pas une extension autorisée !';
		}
	// }
}
/*?>
<prev>
<?php var_dump($resultat); ?>
<prev>
<?php*/
include 'view/_header.php';
include 'view/add_music.php';
include 'view/_footer.php';
?>