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
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
	
		<?php
		
		$dir= 'Multipage/pildid/';
		$entries = scandir($dir);
		$filelist = array();
		foreach($entries as $entry) {
		if (strpos($entry, "nam") === 0) {
			$filelist[] = $entry;
			}
		}
		$number=1;
		foreach($filelist as $file): 
		$id="p".$number;
		?>
			
			<p>
			<label for='<?php echo $id ?>'>
				<?php echo '<img src="', $dir, '/', $file, '" alt="', $file, '" height="100"/>';
				?>
			</label>
			<input type="radio" value='<?php echo $number ?>' id='<?php echo $id ?>' name="pilt"/>
			</p>
		
		
		 <?php 
			 $number=$number+1;
			 endforeach; ?>

		<br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>
<?php 
	require_once('Multipage/foot.html');
	?>

</body>
</html>