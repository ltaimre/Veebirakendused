

		
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Praktikum  - Ülesanne</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	
<?php
		
require_once('head.html');

if (isset($_GET['page'])) {
	
$pageview=$_GET['page'];

switch($pageview) {
      case 'pealeht':
			require_once('pealeht.html');
      break;
      case 'galerii':
        require_once('galerii.html');
      break;
	  case 'vote':
        require_once('vote.html');
      break;
	  case "tulemus";
	  require_once('tulemus.html');
      break;
	  
	  
	 
    }
}
else {
	require_once('pealeht.html');
	
}



require_once('foot.html');
?>

</body>

