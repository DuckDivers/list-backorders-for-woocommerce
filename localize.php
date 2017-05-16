<?php

function dd_localize_backorder(){

	$lang = get_bloginfo('language');

	switch ($lang){
		case "en-US":
			$backorder = 'Backordered';
			break;
		case "nl":
			$backorder = 'Nabesteld';
			break;
		case "nl-be":
			$backorder = 'Nabesteld';
			break;
		case "de":
			$backorder = 'Im Lieferrückstand';
			break;
		case "fr-FR":
			$backorder = 'En cours d&rsquo;approvisionnement';
			break;
	default: $backorder = 'Backordered'	;
		}
return $backorder;
}