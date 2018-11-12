<div id="content-fluid">
    <div class="mySlides w3-display-container">
         <?php 
                    foreach ($portadas as $portada) {
                        ?>
                        <div class="w3-display-container ">
                            <img class="cover-img w3-animate-fading" src="<?=base_url()?>imgUploads/portadas/<?= $portada->nombre_imagen?>" style="width:100%">
                            <div class="w3-display w3-large w3-container w3-padding-16 w3-light-grey w3-animate-fading header-titulo">
                                <?= $portada->titulo_noticia ?>
                            </div>
                        </div>
                        <?php
                    }
                ?>
    </div>
    <div class="row">
        <div class="col-md-8">

            
            <div class="row">
                <div class="col-md-12">
                    <div class="card-columns">
                    <?php
                        foreach ($noticias as $noticia) {
                        ?>
                            <div class="card">
                                <div class="card-body">
                                     <h4 class="card-title"><a href="<?=base_url()?>main/noticia/<?=$noticia->id_noticia?>"><?php echo $noticia->titulo_noticia?></a></h4>
                                    <?php 
                                        if($noticia->nombre_imagen == "" ||  is_null($noticia->nombre_imagen)){
                                            ?>
                                            <img class="card-img-top img-noticia" src="<?=base_url()?>assets/img/default-img.svg" alt="Imagen de noticia"><hr>
                                            <?php
                                        }else{
                                            ?>
                                            <img class="card-img-top img-noticia" src="<?=base_url('imgUploads/portadas/').$noticia->nombre_imagen?>" alt="Imagen de noticia"><hr>
                                            <?php
                                        }
                                    ?>
                                    <p class="card-text"><?php echo $noticia->descripcion_corta?></p>
                                    <a href="<?=base_url()?>main/noticia/<?=$noticia->id_noticia?>" class="card-link">Ver noticia</a>
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



