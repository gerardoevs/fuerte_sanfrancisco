<div id="content">

	<nav class="navbar navbar-expand-md bg-light navbar-light">
		<a class="navbar-brand" href="#">Noticias </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url('/Administration') ?>" class="nav-link"><span class="oi oi-list"></span>  Listado de Noticias</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('/Administration/nuevaNoticia') ?>" class="nav-link"><span class="oi oi-plus"></span>  Agregar Noticia</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('/Administration/editarNoticia') ?>" class="nav-link"><span class="oi oi-pencil"></span>  Modificar Noticia</a>
				</li>
			</ul>
		</div>
	</nav>


	<div class="row">
		<div class="col-sm-12">
			<form action="" method="POST">
				<div class="form-group">
					<label for="titulo">Titulo de noticia:</label>
					<input type="text" class="form-control" id="titulo" name="titulo">
				</div>
			</form>
		</div>
	</div>


</div>