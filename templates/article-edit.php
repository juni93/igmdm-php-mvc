
<?php 
$robots = "noindex,nofollow";
$pageTitle = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia"; 
$pageDesc = "magic: the gathering arena decks, metagame, archetype, standard, pioneer, modern, mtgo prices, prices, speculation, speculators, trends";
$pageType = "website";
$ogTitle = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia";
$ogDesc = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia";
$pageImage = ABSOLUTE_PATH . "resources/logos/igmdm.svg";
$pageUrl = "https://igmdm.com/" ;
include 'inc/header.php'; 
?>
 <!--CSS sheet for text Editor with mtgcard tags-->
 <link href="<?php echo ABSOLUTE_PATH; ?>resources/summernote/summernote-bs4.css" rel="preload" as="style" onload="this.rel='stylesheet'">

<!--CSS sheet for datepicker-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="preload" as="style" onload="this.rel='stylesheet'">



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
<!--scripts per summernote editor-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/summernote/summernote/develop/dist/summernote.min.js"></script>
<script>
//button for mtgcards
var MTGCardButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
        contents: 'Tag per Carte',
        tooltip: 'Inserisci Nome della carta',
        click: function() {
        context.invoke('editor.insertText', '[mtgcard]card[/mtgcard]');
        }
    });

    return button.render();
}

//button for mtg decklist
var DecklistButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
        contents: 'Tag per Decklist',
        tooltip: 'Inserisci Nome della carta',
        click: function() {
        context.invoke('editor.insertText', '[decklist]4x Plains : 2x Fabled Passage : 3x Teferi, Time Raveler [/decklist]');
        }
    });

    return button.render();
}

//insert image in textarea and upload in server folder
function uploadImage(file, el) {
    var form_data = new FormData();
    form_data.append('file', file);
    $.ajax({
        data: form_data,
        type: "POST", 
        url: 'controller/editor-upload.php',
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            $(el).summernote('editor.insertImage', url);
        }
    });
}


//Editor for articles and mtgcards 
$(document).ready(function() {
    $('#article-summernote').summernote({
        height: 300,                 // set editor height
        focus: true,                  // set focus to editable area after initializing summernote
        toolbar: [
        ['style', ['insertcard', 'insertdecklist', 'bold', 'italic', 'underline', 'clear']],
        ['font', ['fontsize', 'strikethrough', 'color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link', 'picture']],
        ['view', ['fullscreen', 'undo', 'redo', 'codeview']]
        ],
        buttons: {
        insertcard: MTGCardButton,
        insertdecklist: DecklistButton
        },
        callbacks: {
            onImageUpload : function(files, editor, welEditable) {
    
                for(var i = files.length - 1; i >= 0; i--) {
                    uploadImage(files[i], this);
                }
            }
        }

    });
});

//for Articles
$('#preview-article').click(function() {
    $('#article-title-preview').text($('#article-title-field').val());
    $('#article-content-preview').html($('#article-summernote').val());
}); 
</script>