<div id="content">
    <div class="row">
        <div class="col-md-8">            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <h2 class="card-title"><?= $noticia[0]->titulo_noticia; ?></h2><hr>
                            <img class="card-img-top img-noticia-in" src="<?=base_url('imgUploads/portadas/').$noticia[0]->nombre_imagen?>" alt="Imagen de noticia.">
                            <hr>
                            <p class="card-text">NOTICIA | <?= $noticia[0]->fechaPublicacion; ?></p>
                            <div style="color: #000">
                                <?= $noticia[0]->articulo; ?>
                            </div>
                            
                        </div>
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



