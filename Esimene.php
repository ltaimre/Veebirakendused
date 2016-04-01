<?php
	function peegeldaTeksti ($tekst) {
	
	for ($i=0; $i< strlen($tekst); $i=$i+1) {
		$rida = str_split($tekst);
		$tagurpidi = array_reverse($rida);
		}

		echo implode ($tagurpidi);
	
		
		}
		
	peegeldaTeksti("suur");

	
	?>