<div id="content-adm">

	<nav class="navbar navbar-expand-md bg-light navbar-light">
		<a class="navbar-brand" href="#">Directos </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url('/Administration/nuevoDirecto') ?>" class="nav-link"><span class="oi oi-plus"></span>  Agregar Directo</a>
				</li>
			</ul>
		</div>
	</nav>


	<div class="row">
		<div class="col-sm-12">
			<div class="offset-lg-1 col-lg-10"><br>
			<h2>Nuevo Directo</h2><hr>
			<form action="<?= base_url('/Administration/publicarDirecto') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-12 col-lg-6">
						<div class="form-group">
							<label for="titulo">Titulo del directo:</label>
							<input type="text" class="form-control" id="titulo" name="titulo">
						</div>
						
					</div>
					<div class="col-sm-12 col-lg-6">
						<div class="form-group">
							<label for="host">Host del directo:</label>
							<select class="form-control" name="host" id="host">
								<option disabled selected value>Selecciona un host</option>
								<option value="YOUTUBE">Youtube</option>
								<option value="FACEBOOK">Facebook</option>
							</select>
						</div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<label for="embedlink">Link del directo:</label>
						<div class="form-group" style="width: 100%;">
							<textarea class="form-control" name="embedlink" rows="5"></textarea>
						</div>
						<img id='img-upload'/>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<input type="submit" name="submit" value="Publicar Noticia" class="btn btn-success btn-block">
						</div>
					</div>
				</div>
			</form>
		</div>
		</div>
	</div>


</div>