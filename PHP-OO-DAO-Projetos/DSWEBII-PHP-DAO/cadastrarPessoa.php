<?php

include_once 'Pessoa.php';


if(isset($_POST)){		
	$pessoa = new Pessoa($_POST);
	echo $pessoa;	
}

	
?>

