
 <?php
	 session_start();
	
	?>
	
 <?php	
	
	if (isset($_POST['esitatud'])) {
		$_SESSION['kommentaar']= $_POST['kommentaar'];
		$_SESSION['taust']= $_POST['taust'];
		$_SESSION['tekst']= $_POST['tekst'];
		$_SESSION['nurgad']= $_POST['nurgad'];
		
		}
		
	?>
		
  <?php	
 
	$tekst="Siia tuleb kommentaar!";
	if (isset($_POST['kommentaar']) && $_POST['kommentaar']!="") {
 	  $tekst=htmlspecialchars($_POST['kommentaar']);
	} 
	
	$taustav="white";
	if (isset($_POST['taust']) && $_POST['taust']!="") {
 	  $taustav=htmlspecialchars($_POST['taust']);
	} 
	
	$tekstiv="black";
	if (isset($_POST['tekst']) && $_POST['tekst']!="") {
 	  $tekstiv=htmlspecialchars($_POST['tekst']);
	} 
	
	$nurgar=0;
	if (isset($_POST['nurgad'])) {
	Switch($_POST['nurgad']){
		case'kandiline': $nurgar=0; break;
		case'ymar': $nurgar=50; break;} }
	
	?>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Kommentaarikast</title>
	<style type="text/css">
	
	
	.kommentaarikast {
	height: 200px;
	width: 400px;
	background-color:  <?php echo $taustav; ?>;
	border: solid black;
	border-radius: <?php echo $nurgar; ?>px;
	color: <?php echo $tekstiv; ?>;
	display: inline-block;
	position: absolute;
	margin: 30px;
	}
	
	.kommentaaritekst {
	padding: 10px;
	}
	
	.abitekst {
	font-weight: bold;
	
	}
	
	.sisestusväli {
	display: inline-block;
	padding 20px;
	margin: 30px;

	}

	
	</style>
</head>
<body>

	<div class=sisestusväli>
		<form action="Andmeside_TT.php" method="post" > 
		<textarea name="kommentaar" cols="50" rows="10" 
		placeholder="Siia kirjuta oma kommentaar"><?php if($tekst != 'Siia tuleb kommentaar!') echo $tekst; ?></textarea>
		<br>
		
		 Määra tekstivärv:
		<input type="color" name="tekst" value="<?php echo $_SESSION['tekst']?>">
		
		Määra taustavärv:
		<input type="color" name="taust" value="<?php echo $_SESSION['taust']?>">

		<br>
		Kandiline:
		<input 
		type="radio"
		name="nurgad" value="kandiline" <?php if (isset($_SESSION['nurgad']) && $_SESSION['nurgad']=="kandiline") echo "checked";?>/>
		Ümmargune:
		<input type="radio"
		name="nurgad" value="ymar" <?php if (isset($_SESSION['nurgad']) && $_SESSION['nurgad']=="ymar") echo "checked";?> />
		<br>
		
		<input type="submit" name=esitatud value="Sisesta kommentaar">
		</form>
		
	</div>
	<div class=kommentaarikast>
	
	<p class=kommentaaritekst> <?php echo $tekst ?>
		</p>
	
	</div>
		
		
	<?php
	session_unset();
	session_destroy();
?>
<body>
</html>