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
				<li class="nav-item">
					<a href="<?= base_url('/Administration/editarNoticia') ?>" class="nav-link"><span class="oi oi-pencil"></span>  Modificar Noticia</a>
				</li>
			</ul>
		</div>
	</nav>


	<div class="row">
		<div class="offset-lg-1 col-lg-10">
			<h2>Editar Noticia</h2><hr>
			<form action="<?= base_url('/Administration/publicarNoticiaEditada') ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="id">Id de noticia:</label>
							<input type="text" class="form-control" readonly id="id" name="id" value="<?= $noticia[0]->id_noticia; ?>">
						</div>
						<hr>
					</div>
					<div class="col-sm-12 col-lg-6">
						
						<div class="form-group">
							<label for="titulo">Titulo de noticia:</label>
							<input type="text" class="form-control" id="titulo" name="titulo" value="<?= $noticia[0]->titulo_noticia; ?>">
						</div>
						<div class="form-group">
							<label for="descripcion">Descripcion corta:</label>
							<textarea name="descripcion" id="descripcion" class="form-control"><?= $noticia[0]->descripcion_corta; ?></textarea>
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
					        	<?php if(isset($noticia[0]->nombre_imagen)){
					        		?>
					        		<img id='img-upload' src="<?= base_url();?>/imgUploads/portadas/<?=$noticia[0]->nombre_imagen?>" style="width:auto; height:100px; display:block; margin: auto;"/>
					        		<?php
					        	}else{
					        		?>
					        		<img id='img-upload' src="" style="width:auto; height:100px; display:block; margin: auto;"/>
					        		<?php
					        	}?>
					        	
					        </div>
					        
					    </div>
					</div>
					<div class="col-sm-12 col-lg-12">
						<label for="articulo">Articulo:</label>
						<div class="form-group">
							<textarea id="richtext" name="articulo"><?= $noticia[0]->articulo; ?></textarea>
						</div>
						<img id='img-upload'/>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<input type="submit" name="submit" value="Editar Noticia" class="btn btn-success btn-block">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


</div>