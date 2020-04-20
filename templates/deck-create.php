
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


    <h2 class="m-4"> Crea nuovo decklist</h2>
    <form role="form" id="decklist-form" class="m-4 needs-validation" method="post" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>/creating-new-decklist" novalidate>
        <input type="hidden" name="action" value="add_form" /> 
        <div class="form-group">
            <label id="decklist-title">Nome Decklist</label>
            <input id="decklist-title-field" type="text" class="form-control" name="decklist_title" placeholder="BR sacrifice" required>
            <div class="invalid-feedback font-weight-bold">Inserisci un titolo !</div>
        </div>
        <div class="form-group">
            <label for='imag_imag' for="name_imag">Carica Immagine <small  class="badge badge-warning">formati *.jpg | *.png | *.jpeg</small> </label>
            <input id='name_imag' name='name_imag' class='form-control-file' type='file' required>
            <div class="invalid-feedback font-weight-bold">Inserisci un'immagine valida !</div>
        </div>
        <div class="form-group">
            <label>Formato</label>
            <select class="form-control" name="decklist_format" required>
                <option></option>
                <?php foreach($allFormats as $format): ?>
                    <option value="<?php echo $format->id_frmt; ?>"> <?php echo $format->name_frmt; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback font-weight-bold">Scegli un formato !</div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label id="decklist-label">Mainboard</label>
                    <textarea type="text" class="form-control" name="decklist_main" id='decklist-main-field' rows="18" required></textarea>
                    <div class="invalid-feedback font-weight-bold">Manca Mainboard</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label id="decklist-label">Sideboard</label>
                    <textarea type="text" class="form-control" name="decklist_side" id='decklist-side-field' rows="10" required></textarea>
                    <div class="invalid-feedback font-weight-bold">Manca Sideboard</div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Inserire le carte nel seguente formato:</h5>
                <ul>
                    <li>quantità spazio nome della carta</li>
                    <li>Esempio:</li>
                    <li>10 Plains</li>
                    <li>7 Swamps</li>
                    <li>15 Forests</li>
				</ul>
            </div>
        </div>

        <div class="form-group pt-4">
            <input type="button" name="preview_decklist" value="Preview" id="preview-decklist" data-toggle="modal" data-target="#confirm-preview" class="btn btn-secondary btn-block mb-2">
            <input type="submit" name="submit_decklist" value="Submit" class="btn btn-primary btn-block">
            <!--<input id="submit-decklist" data-toggle="modal" data-target="confirm-decklist" type="button" class="form-control btn btn-primary" name="submit_decklist" value="Submit">-->
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
                        <h5>Titolo :</h5> <p class="" id="decklist-title-preview"></p>
                        <hr>
                        <h5>Mainboard :</h5> <p class="" id="decklist-main-preview"><pre></pre></p>
                        <h5>Sideboard :</h5> <p class="" id="decklist-side-preview"><pre></pre></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Torna indietro</button>
                    <!--<a href="#" id="submit-decklist-preview" class="btn btn-success success">Procedi</a>-->
                </div>
            </div>
        </div>
    </div>
        
    

<?php include 'inc/footer.php'; ?>

<script>
    //for decklists
    $('#preview-decklist').click(function() {
        $('#decklist-title-preview').text($('#decklist-title-field').val());
        $('#decklist-main-preview').text($('#decklist-main-field').val());
        $('#decklist-side-preview').html($('#decklist-side-field').val());
    }); 
</script>