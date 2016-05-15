<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['user']) && isset($_POST['pass'])) {
			if ($_POST['user'] == "" || $_POST['pass'] == "") {
					$errors[] = "Kasutajanimi või salasõna puudu";
			} else 
			{ $kasutajanimi = mysqli_real_escape_string($connection,htmlspecialchars($_POST['user']));
		      $salasona = mysqli_real_escape_string($connection,htmlspecialchars($_POST['pass']));
			$vaste = mysqli_query($connection, "SELECT id FROM ltaimre_kylastajad WHERE username = '".$kasutajanimi."' AND passw = SHA1('".$salasona."')") or die("Päringut ei 		toimunud");

	if (mysqli_num_rows($vaste) >= 1) {
		$id = mysqli_fetch_assoc($vaste)['id'];
		$_SESSION['user'] = $id;
		$_SESSION['username'] = $kasutajanimi;
		header("Location: loomaaed.php?page=loomad");
			} else {
		$errors[] = "Kasutajanimi või parool on vale"; }
	}
		}			

}

	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
	
	if (!isset($_SESSION['user'])) {

				header("Location: loomaaed.php?page=login");

	}

	$puurid = array();
	$puuriquery= mysqli_query($GLOBALS['connection'], "SELECT DISTINCT puur FROM ltaimre_Loomaaed ORDER BY puur ASC");
	while ($puuri_nr = mysqli_fetch_assoc($puuriquery)) {
			$loomaquery ='SELECT * FROM ltaimre_Loomaaed WHERE puur ='.mysqli_real_escape_string($GLOBALS['connection'], $puuri_nr['puur']);
			$loomad= mysqli_query($GLOBALS['connection'], $loomaquery);
			
				while($loomarida=mysqli_fetch_assoc($loomad)) {
				$puurid[$puuri_nr['puur']][]=$loomarida;
		}
		}
	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	
	global $connection;
	if (!isset($_SESSION['user'])) {
		header("Location: loomaaed.php?page=login");
		}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$lugeja = 1;
	if (!isset($_POST['nimi'])) {$errors[] = "Nimi tühi"; $lugeja = 0;}
	if (!isset($_POST['puur'])) {$errors[] = "Puur tühi"; $lugeja = 0;}
	$liik = upload("liik");
	if ($liik == "") {$errors[] = "Liik tühi"; $lugeja = 0;}

	if ($lugeja == 1) {
	$stmt = $connection->prepare("INSERT INTO ltaimre_Loomaaed_loomaaed (nimi,puur,liik) VALUES (?,?,?)");
	$nimi = mysqli_real_escape_string($connection,htmlspecialchars($_POST["nimi"]));
	$puur = mysqli_real_escape_string($connection,htmlspecialchars($_POST["puur"]));
	$liik = preg_replace("/(pildid\/)|(\.png)/", '', $liik);
	$stmt->bind_param("sis", $nimi,$puur,$liik); //string-integer-string
	$stmt->execute() or die ("Ei õnnestund"); }
	}
	include_once('views/loomavorm.html');
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$parts = explode(".", $_FILES[$name]["name"]);
	$extension = end($parts);

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>