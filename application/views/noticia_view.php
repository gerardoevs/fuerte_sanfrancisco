<div id="content-adm">
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
                            <?php $sharedLink=urlencode(base_url()."main/noticia/".$noticia[0]->id_noticia);?>
                            <a class="btn" href="http://facebook.com/sharer.php?u=<?= $sharedLink ?>" data-toggle="tooltip" title="Compartir"> <i class="fab fa-facebook-square" style="font-size: 30px;"></i></a>
                            <a class="btn" href="http://twitter.com/home?status=<?= $sharedLink ?>" data-toggle="tooltip" title="Compartir"> <i class="fab fa-twitter-square" style="font-size: 30px;"></i></a>
                            <hr>
                            <div class="articulo-noticia">
                                <?= $noticia[0]->articulo; ?>
                            </div>
                            <hr>
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



