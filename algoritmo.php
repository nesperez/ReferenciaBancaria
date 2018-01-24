<?php

$refencia=$_POST['folio'];
$referenciaArray  = array_reverse (str_split($refencia));
	$longitudRefencia = count($referenciaArray);
	$resultadoArray   = array();
	for($contador = 0; $contador<$longitudRefencia; $contador++){
		$resultadoOperacion = $referenciaArray[$contador];
		if(($contador % 2)==0){
			$resultadoOperacion = 2*$resultadoOperacion;
			if($resultadoOperacion>9){
				$resultadoOperacion = ($resultadoOperacion-10)+1;
			}
		}
		array_push($resultadoArray,$resultadoOperacion);
	}
	$resultadoSuma = array_sum($resultadoArray);
	$decenaSiguiente = ($resultadoSuma - ($resultadoSuma%10))+10;
	$digitoVerificador = $decenaSiguiente - $resultadoSuma;
	if ($digitoVerificador==10)
	{
		$digitoVerificador=0;
	}
	
	$result=$refencia.$digitoVerificador;
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Generador de Referencias Bancarias</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
<form action="index.html" class="formulario">
	<h1 class="formulario__titulo">Su referencia es:</h1>
	<input type="text" class="formulario__input" name="folio">
	<label for="" class="formulario__label"><?php echo $result ?> </label>
	<input type="submit" class="formulario__submit" value="Volver"></input>
</form>
<script src="form.js"></script>
</body>
</html>






