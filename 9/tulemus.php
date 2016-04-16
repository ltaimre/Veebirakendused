<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Praktikum  - Ülesanne</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
	require_once('Multipage/head.html');
	?>

<div id="wrap">
	<h3>Valiku tulemus:</h3>
	<p>
	<?php 
	
	$dir= 'Multipage/pildid/';
		$entries = scandir($dir);
		$filelist = array();
		foreach($entries as $entry) {
		if (strpos($entry, "nam") === 0) {
			$filelist[] = $entry;
			}
		}
		
		if (isset($_GET['pilt']) && file_exists($dir."/".$filelist[$_GET['pilt']-1])) {
		
		$tulemus=$_GET['pilt'];
		$pilt=$tulemus-1;
		?>
		<b> Valisid pildi number <?php echo $tulemus ?>.  </b> </p>
		<p>
		<?php echo '<img src="', $dir, '/',  $filelist[$pilt], '" alt="',  $filelist[$pilt], '" />'; ?>
		</p> 
		<?php 	}
			
		else {
		$teade="Sa ju ei valinud pilti!";
		echo $teade;

		}
		?>
	
		

</div>
<?php 
	require_once('Multipage/foot.html');
	?>

</body>
</html>