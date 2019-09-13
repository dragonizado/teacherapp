<header>
	<div>

		<h1><a href="<?= $this->createUrl('default') ?>"><?= APPNAME; ?></a></h1>
	</div>
	<a href="<?= $this->createUrl('citas/register') ?>">Registrar Citas</a>
	<a href="<?= $this->createUrl('class/register') ?>">Crear clases</a>
	<a href="<?= $this->createUrl('students/register') ?>">Registrar Alumnos</a>

	<form action="<?= $this->createUrl('default/logout') ?>" method="post">
		<button type="submit">Cerrar sesión</button>
	</form>
</header>

<?php if (isset($message)) : ?>
	<div class="alert alert-<?= $message[0]; ?> alert-dismissible fade show" role="alert">
		<?= $message[1]; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	
<?php endif ?>