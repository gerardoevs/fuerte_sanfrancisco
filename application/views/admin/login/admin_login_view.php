<div class="container-fluid">
	<div class="login-header">
		<img src="<?=base_url()?>assets/img/logo_fsf.png">
	</div>
	<div class="login-container">
		<form class="login-form" method="post" action="<?= base_url('Administration/submit')?>">
			<div class="form-group">
		    	<label for="user">Usuario:</label>
				<input type="text" name="user" id="user" class="form-control" autocomplete="off">
		  	</div>
		  	<div class="form-group">
		    	<label for="password">Contraseña:</label>
				<input type="password" name="password" id="password" class="form-control" autocomplete="off">
		  	</div>
		  	<input type="submit" name="submit" class="btn btn-success btn-block" value="Ingresar">
		</form>
	</div>
</div>