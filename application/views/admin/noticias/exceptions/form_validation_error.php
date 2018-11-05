<style type="text/css">
	p{
		color: white;
	}
</style>
<div class="container-fluid" style="margin-top: 1em;">
	<div class="login-header">
		<img src="<?=base_url()?>assets/img/logo_fsf.png">
	</div>
	<div class="jumbotron" style="background-color: #ff6666; color: white;">
	  <h1>Error!</h1> 
	  <hr>
	  <p> <?php if(validation_errors()==TRUE){echo validation_errors(); }?></p> 
	  <?php echo "<a class='btn btn-light' href=\"javascript:history.go(-1)\"><span class='oi oi-arrow-circle-left'></span> Regresar</a>";?>
	</div>
</div>