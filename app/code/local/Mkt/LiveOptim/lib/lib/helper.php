<?php
function colorisation($chaine)
{
	
	$chaine=str_replace("{mc}","<span class=\"mc\">{mc}</span>",$chaine);
	$chaine=str_replace("{url}","<span class=\"url\">{url}</span>",$chaine);	
	return $chaine;
}

?>
