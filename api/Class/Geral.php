<?php
class Geral {
//converte a url amigável para array e faz o tratamento no caso da barra no final da url
	
	function getURL($url) {
		
		if(!empty($url)) {

			$url = explode('/',$url);
			
			if(!empty($url[0])) {
			
				if(isset($url[1])) {
					
					if(empty($url[1])) {
						
						array_pop($url);
						
					}
					
				}
			
			}
		}
		return $url;

	}

}

?>