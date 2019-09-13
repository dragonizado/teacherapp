<h3>Clases del dia</h3>
<?php foreach ($clases as $key => $clase) : ?>
	<?php
	$now = date('H:i:s');
	$date = strtotime($clase->citaDate);
	$hora = date('H:i:s', $date);
	$sumahora = date("H:i:s",strtotime('+1 hour',strtotime($hora)));
	$btn = '';

	if ($now >= $hora && $now <= $sumahora ) {
		$btn = '<button>Posponer</button> <button>Ingresar</button>';
	}

	if($now >= $sumahora && $clase->citaState == "Pendiente"){
		$btn = '<button>Reprogramar</button>';
	}

	?>
	<div>Clase: <?= $clase->classDescription; ?> <br> Alumno: <?= $clase->studentName; ?> <br> Hora: <?= date('h:i:s a', $date); ?> </div>
	<div><?= $btn; ?></div> 
<?php endforeach ?>