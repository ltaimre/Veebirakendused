
<?php
		
		$dir= 'pildid/';
		$entries = scandir($dir);
		$filelist = array();
		foreach($entries as $entry) {
		if (strpos($entry, "nam") === 0) {
			$filelist[] = $entry;
			}
		}
			
		foreach($filelist as $file) {
			echo '<img src="', $dir, '/', $file, '" alt="', $file, '" />';
		}
		
		?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Praktikum  - Ülesanne</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 
	require_once('Multipage/head.html');
?>

<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
	
		<?php
		
		$dir= 'Multipage/pildid/';
		$entries = scandir($dir);
		$filelist = array();
		foreach($entries as $entry) {
		if (strpos($entry, "nam") === 0) {
			$filelist[] = $entry;
			}
		}
			
		foreach($filelist as $file) {
			echo '<img src="', $dir, '/', $file, '" alt="', $file, '" />';
		}
		
		?>
	</div>
</div>
<?php 
	require_once('Multipage/foot.html');
	?>
</body>
</html>