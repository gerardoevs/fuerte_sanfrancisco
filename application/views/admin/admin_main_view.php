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
			<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Titulo Noticia</th>
		        <th>Editar</th>
		        <th>Inhabilitar</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($noticias as $n){

		    		?>
		    			<tr>
						<td><?php echo $n->id_noticia?></td>
						<td><strong><?php echo $n->titulo_noticia ?></strong></td>
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
	</div>


</div>