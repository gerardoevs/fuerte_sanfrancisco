<div id="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="mySlides " style="background-color: #FAFAFA;">
                
                <div id="fsSlider" class="carousel slide" data-ride="carousel" style="background-color: rgba(0,0,0,0.5);">

                      <ul class="carousel-indicators">
                        <li data-target="#fsSlider" data-slide-to="0" class="active"></li>
                        <li data-target="#fsSlider" data-slide-to="1"></li>
                        <li data-target="#fsSlider" data-slide-to="2"></li>
                      </ul>
                      
                      <div class="carousel-inner">
                        <?php
                            $count=0;
                            foreach ($portadas as $portada) {
                                if($count==0){ $count=1;
                                    ?>
                                    <div class="carousel-item active">
                                    <?php
                                }else{
                                     ?>
                                    <div class="carousel-item">
                                    <?php
                                }
                               ?>
                                <img src="<?=base_url();?>imgUploads/portadas/<?=$portada->nombre_imagen?>" alt="<?=$portada->titulo_noticia;?>">
                                    <div class="carousel-caption ">
                                        <div class="titulo-noticia-portada">
                                            <h3 class=""><?=$portada->titulo_noticia;?></h3 >
                                            <p><a class="portada-link" href="<?=base_url()?>main/noticia/<?=$portada->id_noticia?>">ver noticia</a></p>
                                        </div>
                                    </div>
                                </div>  

                               <?php
                            }
                        ?>
                        
                        
                      </div>
                      
                      <a class="carousel-control-prev" href="#fsSlider" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#fsSlider" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                    </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">

            
            <div class="row">
                <div class="col-md-12">
                    <h2>Noticias</h2><hr>
                    <div class="card-columns">
                    <?php

                      
                        foreach ($noticiainpar as $ninpar) {
                        ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php echo $ninpar->id_noticia;?>
                                    <h4 class="card-title"><a href="<?=base_url()?>main/noticia/<?=$ninpar->id_noticia?>"><?php echo $ninpar->titulo_noticia?></a></h4>
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
                                    <a href="<?=base_url()?>main/noticia/<?=$ninpar->id_noticia?>" class="card-link">Ver noticia</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                      
                        <?php
                        }


                                ?>
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title"><a href="">Anuncio</a></h4>
                                    <img class="card-img-top img-noticia" src="<?=base_url()?>assets/img/default-img.svg" alt="Imagen de noticia"><hr>
                                    <p class="card-text">Este es un anuncio</p>
                                    </div>
                                </div>

                                <?php
                           
                            

                        foreach ($noticiapar as $npar) {
                        ?>
                            <div class="card">
                                <div class="card-body">
                                    <?php echo $npar->id_noticia;?>
                                    <h4 class="card-title"><a href="<?=base_url()?>main/noticia/<?=$npar->id_noticia?>"><?php echo $npar->titulo_noticia?></a></h4>
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
                                    <a href="<?=base_url()?>main/noticia/<?=$npar->id_noticia?>" class="card-link">Ver noticia</a>
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
                      <div class="card-body" style="background-color: #eee; height: 400px;">
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



