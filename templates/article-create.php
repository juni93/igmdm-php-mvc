
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


    <h2 class="m-4"> Scrivi il tuo articolo!</h2>
    <form role="form" id="article-form" class="m-4 needs-validation" method="post" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>/creating-new-article" novalidate>
        <input type="hidden" name="action" value="add_form" /> 
        <!--<div class="form-group">
            <label for="validationDefault01" >Nome</label>
            <input type="text" class="form-control" name="user_name" placeholder="Mario Rossi" id="validationDefault01">
        </div>
        <div class="form-group">
            <label for="validationDefault02">Email</label>
            <input type="email" class="form-control" name="user_email" placeholder="mario.rossi@esempio.com" id="validationDefault02">
        </div>-->
        <div class="form-group">
            <label id="article-title">Titolo</label>
            <input id="article-title-field" type="text" class="form-control" name="article_title" placeholder="GP Report con Grixis" required>
            <div class="invalid-feedback font-weight-bold">Inserisci un titolo !</div>
        </div>
        <div class="form-group">
            <label for='imag_imag' for="name_imag">Carica Immagine <small  class="badge badge-warning">formati *.jpg | *.png | *.jpeg</small> </label>
            <input id='name_imag' name='name_imag' class='form-control-file' type='file' required>
            <div class="invalid-feedback font-weight-bold">Inserisci un'immagine valida !</div>
        </div>
        <div class="form-group">
            <label>Formato</label>
            <select class="form-control" name="artcile_format" required>
                <option></option>
                <?php foreach($allFormats as $format): ?>
                    <option value="<?php echo $format->id_frmt; ?>"> <?php echo $format->name_frmt; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback font-weight-bold">Scegli un formato !</div>
        </div>
        <div class="form-group">
            <label id="article-label">Articolo</label>
            <textarea type="text" class="form-control" name="article_description" id='article-summernote' minlength="500" required></textarea>
            <div class="invalid-feedback font-weight-bold">Articolo deve contenere almeno 500 caratteri</div>
        </div>
        <div class="row">
        <div class="col">
			<br>
				<ul>
					<li>Per <strong>Decklist</strong> usare <u>Tag per Decklist</u></li>
                    <li>Iniziare tag con <b>[decklist]</b>:
                        <ul>
                            <li>specificare la quantità con "x" es: <strong>1x</strong> o <strong>3x</strong> o <strong>15x</strong> o </li>
                            <li>usare <strong>SOLO E SOLTANTO</strong> uno spazio tra la quantità e nome della carta</li>
                            <li>Dopo la quantità e nome <strong>È obbligatorio inserire uno spazio e " : "</strong> ed andare a capo</li>
                        </ul> 
                    </li>
					<li>Chiudere tag con <b>[/decklist]</b></li>
					<li>Esempio: <br>
                        [decklist]<br>
                        4x Plains : <br>
                        2x Fabled Passage : <br>
                        3x Teferi, Time Raveler : <br>
                        [/decklist]</li>
				</ul>
        </div>
        <div class="col-md-4">
			<br>
				<ul>
					<li>Usare i Tags per inserire le carte</li>
					<li>Iniziare tag con <b>[mtgcard]</b></li>
					<li>Inserire Nome della Carta es. <b>Plains</b></li>
					<li>Chiudere tag con <b>[/mtgcard]</b></li>
					<li>Puoi utlizzare <u>Tag per Carte</u> da toolbar</li>
				</ul>
        </div>
        </div>
        <div class="form-group pt-4">
            <input type="button" name="preview_article" value="Preview" id="preview-article" data-toggle="modal" data-target="#confirm-preview" class="btn btn-secondary btn-block mb-2">
            <input type="submit" name="submit_article" value="Submit" class="btn btn-primary btn-block">
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
            $(el).summernote('editor.insertImage', 'https://igmdm.com/' + url);
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