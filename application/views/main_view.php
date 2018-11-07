<div id="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron w3-display-container">
                <div class="w3-display-container mySlides">
                    <img class="cover-img w3-animate-fading" src="<?=base_url()?>assets/img/Fuerte-San-Francisco-Independiente-1-1024x709.jpg" style="width:100%">
                    <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black w3-animate-fading header-titulo">
                        4-0 Victoria CD Fuerte San Francisco
                    </div>
                </div>
                <div class="w3-display-container mySlides">
                    <img class="cover-img w3-animate-fading" src="<?=base_url()?>assets/img/default-img.svg" style="width:100%">
                    <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black w3-animate-fading header-titulo">
                        Imagen de prueba 01
                    </div>
                </div>  
                <button class="w3-button w3-display-left w3-white" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-display-right w3-white" onclick="plusDivs(1)">&#10095;</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">

            
            <div class="row">
                <div class="col-md-12">
                    <div class="card-columns">
                    <?php
                        foreach ($noticiainpar as $ninpar) {
                        ?>
                            <div class="card">
                                <div class="card-body">
                                     <h4 class="card-title"><?php echo $ninpar->titulo_noticia?></h4>
                                    <?php 
                                        if($ninpar->nombre_imagen == "" ||  is_null($ninpar->nombre_imagen)){
                                            ?>
                                            <img class="card-img-top img-noticia" src="<?=base_url()?>assets/img/default-img.svg" alt="Imagen de noticia"><hr>
                                            <?php
                                        }else{
                                            ?>
                                            <img class="card-img-top img-noticia" src="<?=base_url('imgUploads/portadas/').$ninpar->nombre_imagen?>" alt="Imagen de noticia"><hr>
                                            <?php
                                        }
                                    ?>
                                    <p class="card-text"><?php echo $ninpar->descripcion_corta?></p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                      
                        <?php
                        }
                        foreach ($noticiapar as $npar) {
                        ?>
                            <div class="card">
                                <div class="card-body">
                                     <h4 class="card-title"><?php echo $npar->titulo_noticia?></h4>
                                    <?php 
                                        if($npar->nombre_imagen == "" ||  is_null($npar->nombre_imagen)){
                                            ?>
                                            <img class="card-img-top img-noticia" src="<?=base_url()?>assets/img/default-img.svg" alt="Imagen de noticia"><hr>
                                            <?php
                                        }else{
                                            ?>
                                            <img class="card-img-top img-noticia" src="<?=base_url('imgUploads/portadas/').$npar->nombre_imagen?>" alt="Imagen de noticia"><hr>
                                            <?php
                                        }
                                    ?>
                                    <p class="card-text"><?php echo $npar->descripcion_corta?></p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                      
                        <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-4">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                      <div class="card-body" style="background-color: #eee; height: 800px;">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">Some example text. Some example text.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                      </div>
                    </div>
                 </div>
             </div>
        </div>
    </div>
</div>



