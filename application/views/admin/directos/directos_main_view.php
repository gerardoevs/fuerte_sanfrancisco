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
			<div class="livestreaming-div">
			<?php

				if($listaDirecto[0]->liveUrl != null){
					if($listaDirecto[0]->host=="YOUTUBE"){
	    			?>
	    			
	    				<div class="youtube-responsive">
	    					<?php

								if($listaDirecto!= null){
									echo $listaDirecto[0]->liveUrl;
								}else{
									echo "Nel";
								}
								
							?>
						</div><br>
	    				<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#cancelarModal"> Cancelar Directo</button>
	    				
	    			<?php

	    			}elseif ($listaDirecto[0]->host=="FACEBOOK") {
	    			?>
	    				<div class="facebook-responsive">
	    					<?php

								if($listaDirecto!= null){
									echo $listaDirecto[0]->liveUrl;
								}else{
									echo "nel";
								}
								
							?>
						</div>
						<br>
						<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#cancelarModal"> Cancelar Directo</button>

	    			<?php
	    			}
				}else{
					?>
					<br>
					<br>
					<div class="alert alert-warning">
					  <strong>No hay directo!</strong> Aguega uno en el siguiente link. <b><a href="<?= base_url('/Administration/nuevoDirecto') ?>" >Agregar en vivo</a></b>
					  o haz click en  <span class="oi oi-plus" style="font-size: 10px;"></span> Agregar directo en la barra superior.
					</div>

					<?php
				}
				
			?>
			</div>
			<div class="modal" id="cancelarModal">
			  <div class="modal-dialog">
			    <div class="modal-content">


			      <div class="modal-header">
			        <h4 class="modal-title">¿Cancelar la directo de la web?</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>


			      <div class="modal-body">
			        si cancelas la transmision siempre seguira, pero en la web del Fuerte San Francisco no sera visible.
			      </div>


			      <div class="modal-footer">
			      	<a href="<?= base_url('/Administration/cancelarDirecto') ?>" class="btn btn-block btn-danger">Cancelar Transmision</a>
			      </div>

			    </div>
			  </div>
			</div>
		</div>
	</div>


</div>