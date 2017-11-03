<?php
	function carregaClasse($classe){
		require $classe.".php";
	}

	spl_autoload_register("carregaClasse");

	$boletos = array();
	$boletos[] = new Boleto(150.0);
	$boletos[] = new Boleto(350.0);

	$fatura = new Fatura("Renan",500);

	$processador = new ProcessadorDeBoletos();
	$pagou = $processador->processa($boletos,$fatura);
	
	echo  $pagou != 0 ? "Pagou!" : "Não pagou!";