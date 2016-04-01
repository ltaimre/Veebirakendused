
<?php
	$tornid = array ( 
					array('nimi' => 'Tallitorn', 'ehitusaeg'  => '14. sajandil', "asukoht" => "Taani Kuninga aia kõrvalt", "viide" => "https://et.wikipedia.org/wiki/Tallitorn", "foto" => "http://enos.itcollege.ee/~ltaimre/Kolmas_fotod/Tallinna_Tallitorn,_vaade_Nevski_katedraali_poolt,_8._august_2011.jpg"),
					
					array("nimi" => "Paks Margareeta", "ehitusaeg"  => "aastal 1529", "asukoht" => "Pikalt tänavalt", "viide" => "https://et.wikipedia.org/wiki/Paks_Margareeta", "foto" => "http://enos.itcollege.ee/~ltaimre/Kolmas_fotod/800px-Paks_Margareeta_2011-05-21.JPG"),
					
					array("nimi" => "Stoltingi torn", "ehitusaeg"  => "14. sajandil", "asukoht" => "Paksu Margareeta kõrvalt", "viide" => "https://et.wikipedia.org/wiki/Stoltingi_torn", "foto" => "http://enos.itcollege.ee/~ltaimre/Kolmas_fotod/Stoltingi_torn_2013.jpg")
					
	
	);
	foreach ($tornid as $torn) {

		include "Kolmas.html";
		
		}
		
?>