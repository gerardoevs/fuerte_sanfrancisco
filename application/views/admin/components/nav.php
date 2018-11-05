<!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="<?=base_url()?>assets/img/logo_fsf.png" style="width:60px; display: block; margin: auto;">
        </div>

        <ul class="list-unstyled components">
            <p><center>Administración</center></p>
            <li><a href="#"><span class="oi oi-clipboard"></span>  Noticias</a></li>
            <li><a href="#"><span class="oi oi-video"></span>  Directos</a></li>
            <li><a href="<?= base_url('/Administration/logout')?>">Cerrar sesión  <span class="oi oi-account-logout"></span></a></li>
        </ul>
    </nav>

    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    		<div id="sidebarCollapse">
    			<button class="navbar-menu btn btn-light" ><span class="oi oi-menu"></span></span></button>
    			<img src="<?=base_url()?>assets/img/logo_fsf.png" style="width:40px;">
    			Administracion
    		</div>
        	
            <div class="nav-menu">
        		<a class="navbar-brand" href="#">
			    	<img src="<?=base_url()?>assets/img/logo_fsf.png" style="width:40px;">
			    		Administracion
			    </a>
			   	<ul class="nav-options">
			   		<li><a href=""><span class="oi oi-clipboard"></span>  Noticias</a></li>
			   		<li><a href=""><span class="oi oi-video"></span>  Directos</a></li>
                    <li><a href="<?= base_url('/Administration/logout')?>"><span class="oi oi-account-logout"></span>  Cerrar sesión  </a></li>
			   	</ul>
            </div>
        </nav>

    