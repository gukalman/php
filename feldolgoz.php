<?php
require_once 'connect.php';


if(isset($_POST['ok']) && $_POST['accept'] == 'on'){

	
	
	if(isset($_POST['name'], $_POST['f_name'], $_POST['email'], $_POST['password'], $_POST['comment']) && !empty($_POST['name']) && !empty($_POST['f_name']) && !empty($_POST['email']) && !empty($_POST['password']) ){
		
		
		$veznev = htmlentities(htmlspecialchars($db->real_escape_string(trim($_POST['name']))));
		$f_name = htmlentities(htmlspecialchars($db->real_escape_string(trim($_POST['f_name']))));
		$email = htmlentities(htmlspecialchars($db->real_escape_string(trim($_POST['email']))));
		$password = htmlentities(htmlspecialchars($db->real_escape_string(trim($_POST['password']))));
		$comment = htmlentities(htmlspecialchars($_POST['comment']));
		
		
		
			
			if(preg_match('/^.+@.+\.[a-z]{2,}$/',$email)){
				$db->query("
				INSERT INTO `users_data`
				(`id`,`veznev`,`kernev`,`email`,`password`,`megjegyzes`) 
				VALUES (null,'{$veznev}','{$f_name}','{$email}','{$password}','{$comment}')");
				
				echo "</ br> Az adat rögzités sikeres! ";
			}
			
			else{
				echo "Kérjük helyes email címet adjon meg!";
			}
	
		
	}

	
		if(isset($_FILES['imag'])){
		  
		  	   $filetype = pathinfo($_FILES['imag']['name'], PATHINFO_EXTENSION);
	   $filetype = strtolower($filetype);
	   $error = array();
	   $is=true;
	   
	 /*  echo '<pre />'.$filetype.':<br />';
	   print_r ($_FILES['imag']); */
	   
		if(!($filetype == 'jpg' || $filetype == 'gif' || $filetype == 'png')){
			array_push($error, "A file, csak jpg, gif vagy png formátum lehet.");
			$is=false;
		}
		
		if($_POST['imag']['size'] > 512000){
			array_push($error, "A kép mérete 500kb nem lehet nagyobb.");
			$is = false;
		}
		//a $_FILES[ meg kapja a post tól a fájlt, ez globális változó. az images mappában keresi van e már ilyen nevű
		if(file_exists("images/".$_FILES['imag']['name'])){
			array_push($error, "Ilyen nevű fájl már létezik.");
			$is = false;
		}
		
		
		if($is){
			move_uploaded_file($_FILES['imag']['tmp_name'],"images/".$_FILES['imag']['name']);
			echo '</ br> A kép feltőltés sikeres!';
		}
		else{
			echo '<br />HIBA: <br />';
			print_r ($error);
		}
		
		  
	}

	
	
}

?>