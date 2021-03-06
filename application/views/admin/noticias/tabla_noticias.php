<div id="content-adm">

	<nav class="navbar navbar-expand-md bg-light navbar-light">
		<a class="navbar-brand" href="#">Noticias </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="<?= base_url('/Administration/noticias') ?>" class="nav-link"><span class="oi oi-list"></span>  Listado de Noticias</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('/Administration/nuevaNoticia') ?>" class="nav-link"><span class="oi oi-plus"></span>  Agregar Noticia</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2 " type="text" placeholder="Buscar por Titulo o ID">
		      <button class="btn btn-light  my-2 my-sm-0" type="button">Buscar</button>
		    </form>
		</div>
	</nav>


	<div class="row">
		<div class="col-sm-12">
			<div class="table-responsive">
				<table class="table table-striped">
				    <thead>
				      <tr>
				      	<th>Titulo Noticia</th>
				        <th>Fecha</th>
				        
				        <th>Editar</th>
				        <th>Inhabilitar</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php foreach($noticias as $n){

				    		?>
				    			<tr>
								
								<td><strong><?php echo $n->titulo_noticia ?></strong></td>
								<td><?php echo $n->fechaPublicacion?></td>
								<td><a href="<?= base_url('/Administration/editarNoticia/'.$n->id_noticia)?>" class="btn btn-info">Editar</a></td>
								<?php
									if($n->fs_estado == 1){
										?>
											<td><a href="<?= base_url('/Administration/habilitarNoticia/'.$n->id_noticia)?>" class="btn btn-success">Inhabilitar</a></td>
										<?php
									}else{
										?>
											<td><a href="<?= base_url('/Administration/habilitarNoticia/'.$n->id_noticia)?>" class="btn btn-secondary">Habilitar</a></td>
										<?php
									}
								?>
								</tr>
				    		<?php
				    	
				    	}?>

				    </tbody>
				 </table>
			</div>
			<?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>
		</div>
	</div>


</div>