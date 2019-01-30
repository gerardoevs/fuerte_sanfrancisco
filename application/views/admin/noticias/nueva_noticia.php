<div id="content-adm">

	<nav class="navbar navbar-expand-md bg-light navbar-light">
		<a class="navbar-brand" href="#">Noticias </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url('/Administration/noticias') ?>" class="nav-link"><span class="oi oi-list"></span>  Listado de Noticias</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('/Administration/nuevaNoticia') ?>" class="nav-link"><span class="oi oi-plus"></span>  Agregar Noticia</a>
				</li>

			</ul>
		</div>
	</nav>


	<div class="row">
		<div class="offset-lg-1 col-lg-10">
			<h2>Nueva Noticia</h2><hr>
			<form action="<?= base_url('/Administration/publicarNoticia') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-12 col-lg-6">
						<div class="form-group">
							<label for="titulo">Titulo de noticia:</label>
							<input type="text" class="form-control" id="titulo" name="titulo">
						</div>
						<div class="form-group">
							<label for="descripcion">Descripcion corta:</label>
							<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-sm-12 col-lg-6">
						<div class="form-group">
					        <label>Subir imagen de portada:</label>
					        <div class="input-group">
					            <span class="input-group-btn">
					                <span class="btn btn-default btn-file">
					                    Seleccionar… <input type="file" id="imgInp" name="portada">
					                </span>
					            </span>
					            <input type="text" class="form-control" readonly>
					        </div>
					        <div>
					        	<img id='img-upload' style="width:auto; height:100px; display:block; margin: auto;"/>
					        </div>
					        
					    </div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<label for="articulo">Articulo:</label>
						<div class="form-group">
							<textarea id="richtext" name="articulo"></textarea>
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