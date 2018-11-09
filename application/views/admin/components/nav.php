<!-- Sidebar -->
    <nav id="sidebar">
        
        <ul class="list-unstyled components">
            <p><center>Administración</center></p>
            <li><a href="<?= base_url('/Administration')?>"><span class="oi oi-home"></span>  Pagina Principal</a></li>
            <li><a href="<?= base_url('/Administration/noticias')?>"><span class="oi oi-clipboard"></span>  Noticias</a></li>
            <li><a href="<?= base_url('/Administration/portadas')?>"><span class="oi oi-star"></span>  Portada</a></li>
            <li><a href="#"><span class="oi oi-video"></span>  Directos</a></li>
            <li><a href="<?= base_url('/Administration/logout')?>"><span class="oi oi-account-logout"></span>  Cerrar sesión</a></li>
        </ul>
    </nav>

    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    		<div id="sidebarCollapse">
    			<button class="navbar-menu btn btn-light" ><span class="oi oi-menu"></span></span></button>
    			<img src="<?=base_url()?>assets/img/logo_fsf.png" style="width:40px;">
    			Administración
    		</div>
        	
            <div class="nav-menu">
        		<a class="navbar-brand" href="<?= base_url('/Administration')?>">
			    	<img src="<?=base_url()?>assets/img/logo_fsf.png" style="width:40px;">
			    		Administración
			    </a>
			   	<ul class="nav-options">
			   		<li><a href="<?= base_url('/Administration/noticias')?>"><span class="oi oi-clipboard"></span>  Noticias</a></li>
                    <li><a href="<?= base_url('/Administration/portadas')?>"><span class="oi oi-star"></span>  Portada</a></li>
			   		<li><a href=""><span class="oi oi-video"></span>  Directos</a></li>
                    <li><a href="<?= base_url('/Administration/logout')?>"><span class="oi oi-account-logout"></span>  Cerrar sesión  </a></li>
			   	</ul>
            </div>
        </nav>

    