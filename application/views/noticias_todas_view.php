<div id="content-adm">
    <div class="row">
        <div class="col-md-8">            
            <div class="row">
                <div class="col-md-12">

                    <?php
                        foreach ($noticias as $noticia) {
                            ?>
                            <div class="card">
                                <div class="card-body-lista">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img class="img-noticia-lista" src="<?=base_url('imgUploads/portadas/').$noticia->nombre_imagen?>" alt="Imagen de noticia.">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="content-noticia-lista">
                                                <a href="<?=base_url()?>/main/noticia/<?= $noticia->id_noticia; ?>"><h4 class="titulo-noticia-lista"><?= $noticia->titulo_noticia; ?></h4></a>
                                                <hr>
                                                <div class="articulo-noticia">
                                                    <?= $noticia->descripcion_corta; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>

                    <?php if (isset($links)) { ?>
                        <?php echo $links ?>
                    <?php } ?>
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



