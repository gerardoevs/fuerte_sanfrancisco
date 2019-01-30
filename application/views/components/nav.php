<!-- Sidebar -->
    <nav id="sidebar">
        
        <ul class="list-unstyled components">

            <p><center>C.D.Fuerte San Fracisco</center></p>
            <li><a class="side-menu-link" href="<?=base_url()?>">Noticias</a></li>
            <li><a class="side-menu-link" href="<?=base_url()?>Main/galeria">Galeria</a></li>
            <li><a class="side-menu-link" href="<?=base_url()?>Main/historia">Historia</a></li>
            <li><a class="side-menu-link" href="">Donaciones</a></li>
            <?php 
                if($this->Main_model->checkLive()){
                    ?>
                    <li><a class="side-menu-link" href="<?=base_url()?>Main/directo"><i class="fas fa-circle live-icon" ></i> Directo</a></li> 
                    <?php
                }
            ?>
            
        </ul>
    </nav>

    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    		<div id="sidebarCollapse">
    			<button class="navbar-menu btn btn-light" ><span class="oi oi-menu"></span></span></button>
    			<img src="<?=base_url()?>assets/img/logo_fsf.png" style="width:40px;">
    			Fuerte San Francisco
    		</div>
        	
            <div class="nav-menu">
        		<a class="navbar-brand" href="<?=base_url()?>">
			    	<img src="<?=base_url()?>assets/img/logo_fsf.png" style="width:40px;">
			    		Fuerte San Francisco
			    </a>
			   	<ul class="nav-options">
			   		<li><a class="menu-link" href="<?=base_url()?>">Noticias</a></li>
			   		<li><a class="menu-link" href="<?=base_url()?>Main/galeria">Galeria</a></li>
                    <li><a class="menu-link" href="<?=base_url()?>Main/historia">Historia</a></li>
			   		<li><a class="menu-link" href="">Donaciones</a></li>
                    <?php 
                        if($this->Main_model->checkLive()){
                            ?>
                            <li><a class="menu-link" href="<?=base_url()?>Main/directo"><i class="fas fa-circle live-icon" ></i> Directo</a></li> 
                            <?php
                        }
                    ?>
                    
			   	</ul>
            </div>
        </nav>

    