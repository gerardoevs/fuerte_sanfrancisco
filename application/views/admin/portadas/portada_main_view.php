<div id="content">

	<div class="jumbotron">
		<table class="table table-striped">
				    <thead>
				      <tr>
				      	<th>No. Noticia</th>
				      	<th>Titulo Noticia</th>
				        <th>Es Portada</th>
				        
				      </tr>
				    </thead>
				    <tbody>
				    	<?php foreach($portadas as $p){

				    		?>
				    			<tr>
								<td><strong>No. <?php echo $p->id_noticia ?></strong></td>
								<td><?php echo $p->titulo_noticia?></td>
								<?php
									if($p->fs_estado == 1){
										?>
											<td><a href="<?= base_url('/Administration/agregarPortada/'.$p->id_noticia)?>" class="btn btn-warning"><span class="oi oi-star"></span></a></td>
										<?php
									}else{
										?>
											<td><a href="<?= base_url('/Administration/agregarPortada/'.$p->id_noticia)?>" class="btn btn-default">Habilitar</a></td>
										<?php
									}
								?>
								</tr>
				    		<?php
				    	
				    	}?>

				    </tbody>
				 </table>
	</div>


	<div class="row">
		<div class="col-sm-12">
			<div class="table-responsive">
				<table class="table table-striped">
				    <thead>
				      <tr>
				      	<th>Titulo Noticia</th>
				        <th>Fecha</th>
				        
				        <th>Es Portada</th>
				        
				      </tr>
				    </thead>
				    <tbody>
				    	<?php foreach($noticias as $n){

				    		?>
				    			<tr>
								
								<td><strong><?php echo $n->titulo_noticia ?></strong></td>
								<td><?php echo $n->fechaPublicacion?></td>
								
								<?php
									if($n->fs_estado == 1){
										?>
											<td><a href="<?= base_url('/Administration/agregarPortada/'.$n->id_noticia)?>" class="btn btn-warning"><span class="oi oi-star"></span></a></td>
										<?php
									}else{
										?>
											<td><a href="<?= base_url('/Administration/agregarPortada/'.$n->id_noticia)?>" class="btn btn-default">Habilitar</a></td>
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


</div>