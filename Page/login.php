<?php

	// LOGIN.PHP
	$email_error = $passw_error = $fname_error = $lname_error = $create_email_error = $create_passw_error ="";
	$email = $passw = $fname = $lname = $create_email =$create_passw = "";
	//muutujad ab väärtuste jaoks
	$name="";
	//echo $_POST["email"];
	// kontrollime et keegi vajutas input nuppu
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		//kontrollin millist nuppu vajutati
		if(isset($_POST["login"])){
		//kontrollin et e-post ei ole tühi
			if (empty($_POST["email"])){
			$email_error = "see väli on kohustulik";	
			} else {
				$email=test_input($_POST["email"]);
			}
			//kontrollin et parool ei ole tühi
			if (empty($_POST["password"])){
			$passw_error = "see väli on kohustulik";
			} else {
			
				//kui oleme siia jõudnud, siis parool pole tühi
				if(strlen($_POST["password"]) < 8){
				$passw_error="peab olema vähemalt 8 tähemärki";
				} else {
					$passw=test_input($_POST["password"]);
				}
			}
		}
		
		elseif((isset($_POST["submit"]))){
		//kontrollin et eesnimi ei ole tühi
			if (empty($_POST["first name"])){
			$fname_error = "see väli on kohustulik";
			}else{
				$fname=test_input($_POST["first name"]);
			}
		//kontrollin et perekonnanimi ei ole tühi
			if (empty($_POST["last name"])){
			$lname_error = "see väli on kohustulik";
			}else{
				$lname=test_input($_POST["last name"]);
			}
			if (empty($_POST["create email"])){
			$create_email_error = "see väli on kohustulik";			
			} else {
				$create_email=test_input($_POST["create email"]);
				}
			if (empty($_POST["create password"])){
			$create_passw_error = "see väli on kohustulik";	
			} else {			
				if(strlen($_POST["create password"]) < 8){
				$create_passw_error="peab olema vähemalt 8 tähemärki";
				
				} else{
				$create_passw = test_input($_POST['create password']);
				//kõik korras
				//test_input eemaldab pahatahlikud osad
				
			}
			if($name_error==""){
				echo "salvestan andmebaasi";
			}
			}
			}	
	}
function test_input($data) {
	//võtab ära tühikud,enterid jne
	$data = trim($data);
	//võtab ära tagurpidi kaldkriipsud
	$data = stripslashes($data);
	//teeb html-i tekstiks
	$data = htmlspecialchars($data);
	return $data;
}
	
	

?>
<?php
	$page_title = "Login" ;
	$page_file_name = "login.php";
?>
<?php require_once("../header.php");?>
	<h2>Log in</h2>
	
		<form action="login.php" method="post">
			<input name="email" type="email" placeholder="E-post"> <?php echo $email_error; ?><br><br>
			<input name="password" type="password" placeholder="Parool"> <?php echo $passw_error; ?> <br><br>
			<input name="login" type="submit" value="log in"> <br><br>
		</form>
		
	<h2>Create user</h2>
	
		<form action="login.php" method="post">
			<input name="create email" type="email" placeholder="E-post" <?php echo $create_email_error; ?> ><br><br>
			<input name="create password" type="password" placeholder="Parool"> <?php echo $create_passw_error; ?> <br><br>
			<input name="first name" type="text" placeholder="Eesnimi"> <?php echo $fname_error; ?><br><br>
			<input name="last name" type="text" placeholder="Perekonnanimi"> <?php echo $lname_error; ?><br><br>
			Sugu:
			<input name="sugu" type="radio" value="Naine">Naine
			<input name="sugu" type="radio" value="Mees">Mees<br><br>
			<input name="vanus" type="number_format" placeholder="Vanus"><br><br>
			<input name="Linn" type="text" placeholder="Linn"><br><br>
			<input name="submit" type="submit" value="Submit"><br><br>
		</form>	
	<h2>Minu mvp idee. Lehekülg kus saab hmm...ma ei tea. Kasutajad saavad üles laadida oma joonistusi ja neid müüa. </h2>
<?php require_once("../footer.php");?>