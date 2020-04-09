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


    <h2 class="m-4"> Crea nuovo Evento</h2>
    <form role="form" id="event-form" class="needs-validation m-4" method="post" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>/create-new-event" novalidate>
        <input type="hidden" name="action" value="add_form" /> 
        <div class="row">
            <div class="col">
                <label>Titolo Evento</label>
                <input type="text" class="form-control" name="event-title" id="event-title" placeholder="Pioneer Vol. 2" required>
            </div>
            <div class="col">
                <label>Data Evento</label>
                <input class="form-control" data-date-format="dd-mm-yyyy" id="datepicker" name="event-date" required>
            </div>
            <div class="col">
                <label>Ora Inizio Evento</label>
                <input class="form-control" type="time" placeholder="09:30:00" name="event-time" id="event-time" required>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label>Luogo Evento</label>
                <input type="text" class="form-control" name="event-place" id="event-place" placeholder="Piazza del Mercato" required>
            </div>
            <div class="col">
                <label>Prezzo</label>
                <span class="input-number input-number-currency">
                    <input type="number" class="form-control" name="event-price" id="event-price" min="0" placeholder="15,00" placeholder="Prezzo" required>
                </span>
            </div>
            <div class="col">
                <label>Prezzo Ridotto (se previsto)</label>
                <span class="input-number input-number-currency">
                    <input type="number" class="form-control" name="event-reduced-price" id="event-reduced-price" min="0" placeholder="10,00" placeholder="Prezzo">
                </span>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label for='imag_imag' for="name_imag">Carica Immagine <small  class="badge badge-warning">formati *.jpg | *.png | *.jpeg</small> </label>
                <input id='name_imag' name='event-image' class='form-control-file' type='file' required>
                <div class="invalid-feedback font-weight-bold">Inserisci un'immagine valida !</div>
            </div>
            <div class="col">
                <label >Formato</label>
                <select class="form-control" name="event-format-id" id="event-format-id" required>
                    <option></option>
                    <?php foreach($allFormats as $format): ?>
                        <option value="<?php echo $format->id_frmt; ?>"> <?php echo $format->name_frmt; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label>Link evento Facebook</label>
                <input type="url" class="form-control" name="event-fblink" id='event-fblink' required>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label>Premi e modalità di premiazione</label>
                <textarea type="text" class="form-control" name="event-prize" id='event-prize' required></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label>Descrizione Evento (modalità di svolgimento, judge, ecc)</label>
                <textarea type="text" class="form-control" name="event-description" id='event-description' required></textarea>
            </div>
        </div>
        <div class="form-group pt-4">
            <input type="button" name="preview_event" value="Preview" id="preview-event" data-toggle="modal" data-target="#confirm-preview" class="btn btn-secondary btn-block mb-2">
            <input type="submit" name="submit_event" value="Submit" class="btn btn-primary btn-block">
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
                <hr>
                <div class="modal-body">
                    <label>Titolo Evento</label>
                    <h3 class="font-weight-bold" id="event-title-preview"></h3>
                    <hr>
                    <label>Data Evento</label>
                    <p class="" id="event-date-preview"></p>
                    <hr>
                    <label>Ora inzio Evento</label>
                    <p class="" id="event-time-preview"></p>
                    <hr>
                    <label>Luogo Evento</label>
                    <p class="" id="event-place-preview"></p>
                    <hr>
                    <label>Prezzo Evento</label>
                    <p class="" id="event-price-preview"></p>
                    <hr>
                    <label>Prezzo ridotto Evento</label>
                    <p class="" id="event-reduced-price-preview"></p>
                    <hr>
                    <label>Formato Evento</label>
                    <p class="" id="event-format-id-preview"></p>
                    <hr>
                    <label>Link evento Facebook</label>
                    <p class="" id="event-fblink-preview"></p>
                    <hr>
                    <label>Premi Evento</label>
                    <p class="" id="event-prize-preview"></p>
                    <hr>
                    <label>Descrizione Evento</label>
                    <p class="" id="event-description-preview"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Torna indietro</button>
                </div>
            </div>
        </div>
    </div>
        
    

<?php include 'inc/footer.php'; ?>