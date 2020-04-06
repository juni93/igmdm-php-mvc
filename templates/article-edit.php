<?php include 'inc/header.php'; ?>


    <h2 class="m-4"> Modifica l'articolo</h2>
    <form role="form" id="article-form" class="m-4" method="POST" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>/update-article/<?php echo $singleArticle[0]->id_arti; ?>">
        
        <div class="form-group">
            <label id="article-title" class="font-weight-bold">Titolo</label>
            <input id="article-title-field" type="text" class="form-control" name="article_title" placeholder="GP Report" value="<?php echo $singleArticle[0]->name_arti; ?>">
        </div>
        <!--<div class="form-group">
            <label for='imag_imag' for="name_imag" class="font-weight-bold">Carica Immagine <small  class="badge badge-warning">formati *.jpg | *.png | *.jpeg</small> </label>
            <input id='name_imag' name='name_imag' class='form-control-file' type='file' value="<?php echo $singleArticle[0]->preimage_arti; ?>">
        </div>-->
        <div class="form-group">
            <label class="font-weight-bold">Formato</label>
            <select class="form-control" name="artcile_format">
                <option value="0">Scegli il formato</option>
                <?php foreach($allFormats as $format): ?>
                    <?php if($singleArticle[0]->frmt_arti == $format->id_frmt): ?>
                        <option value="<?php echo $format->id_frmt; ?>" selected> <?php echo $format->name_frmt; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $format->id_frmt; ?>"> <?php echo $format->name_frmt; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label id="article-label" class="font-weight-bold">Articolo</label>
            <textarea type="text" class="form-control" name="article_description" id='article-summernote'><?php echo $singleArticle[0]->desc_arti; ?></textarea>
        </div>
        <div class="">
			<br>
				<ul>
					<li>Usare i Tags per inserire le carte</li>
					<li>Iniziare tag con <b>[mtgcard]</b></li>
					<li>Inserire Nome della Carta es.<b>Plains</b></li>
					<li>Chiudere tag con <b>[/mtgcard]</b></li>
					<li>Puoi utlizzare <b>"Insert MTG Card in Tags"</b></li>
				</ul>
        </div>
        <div class="form-group pt-4">
            <input type="button" name="preview_article" value="Preview" id="preview-article" data-toggle="modal" data-target="#confirm-preview" class="form-control btn btn-secondary mb-2">
            <input type="submit" name="update_article" value="Submit" class="form-control btn btn-primary">
            <!--<input id="submit-article" data-toggle="modal" data-target="confirm-article" type="button" class="form-control btn btn-primary" name="submit_article" value="Submit">-->
        </div>
    </form>
<!--***********************************************************************************-->
<!--MODAL-->
<!--***********************************************************************************-->
    <div class="modal fade bd-example-modal-lg" id="confirm-preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" role="document">
                <div class="modal-header">
                    <h2>Controllare i dati</h2>
                </div>
                <div class="modal-body"> 
                    
                    <div class="">  
                        <h4 class="" id="article-title-preview"></h4>
                        <hr>
                        <p class="" id="article-content-preview"><pre></pre></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Torna indietro</button>
                    <!--<a href="#" id="submit-article-preview" class="btn btn-success success">Procedi</a>-->
                </div>
            </div>
        </div>
    </div>
        
    

<?php include 'inc/footer.php'; ?>