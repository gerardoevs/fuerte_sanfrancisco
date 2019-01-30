<div id="content-live">
  <div class="row">
    <div class="col-md-12">
    	<div class="livestreaming-div">

    		<?php
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
					</div>
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
    			<?php
    			}

    		?>
			<div>
				<hr>
				<h1><?=$listaDirecto[0]->titulo;?></h1>
			</div>
    	</div>


		
    </div>
  </div>
</div>