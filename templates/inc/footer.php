        <div class="d-flex felx-row">
            <div class="col text-center"> 
                <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" style="cursor: pointer; position: fixed; bottom: 100px; right: 20px; display:none;" 
                role="button" title="Torna all'inizio" 
                data-toggle="tooltip" data-placement="left">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <footer class="blog-footer p-4 mx-1 mt-5 font-weight-bold small">
            <div class="clearfix">
                <!-- Copyright Info -->
                <div class="float-left ">
                    <a href="#">Termini e Condizioni di Utilizzo</a> |
                    <a href="#">Collaborazione</a>
                </div>
                <div class="float-right">
                    Developed by <a href="https://www.linkedin.com/in/juni-ali/" target="_blank">Junaid Ali</a>
                </div>
                <!-- END Copyright Info -->
            </div>
            <div class="row">
                <div class="col-1">
                    <a href="<?php echo BASE_PATH; ?>/admin-area" class="d-flex">Admin</a>
                </div>
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <div class="col-1">
                    <a href="<?php echo BASE_PATH; ?>/logout" class="d-flex">Logout</a>
                </div>
                <?php endif; ?>
            </div>
        </footer>



        <!--DECKBOX.org JS for tooltips-->
        <script src="https://deckbox.org/assets/external/tooltip.js"></script>


        <!--JS BOOTSTRAP-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        

        <!--scripts per summernote editor-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://rawgit.com/summernote/summernote/develop/dist/summernote.min.js"></script>
        
         <!--Date picker-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

            
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
                        $(el).summernote('editor.insertImage', '/project' + url);
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

        </script>
        
        <!-- validation for forms -->
        <script>
            var articleForm = document.querySelector('.needs-validation');
            articleForm.addEventListener('submit', function(event) {
                if (articleForm.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                articleForm.classList.add('was-validated');
            });
            
        </script>
        
        <!--PREVIEW BEFORE SUBMIT-->
        <script type="text/javascript">
            //for Articles
           $('#preview-article').click(function() {
                $('#article-title-preview').text($('#article-title-field').val());
                $('#article-content-preview').html($('#article-summernote').val());
            });


            //for Events 
            $('#preview-event').click(function(){
                $('#event-title-preview').text($('#event-title').val());
                $('#event-date-preview').text($('#datepicker').val());
                $('#event-time-preview').text($('#event-time').val());
                $('#event-place-preview').text($('#event-place').val());
                $('#event-price-preview').text($('#event-price').val());
                $('#event-reduced-price-preview').text($('#event-reduced-price').val());
                $('#event-format-id-preview').text($('#event-format-id').val());
                $('#event-fblink-preview').text($('#event-fblink').val());
                $('#event-prize-preview').text($('#event-prize').val());
                $('#event-description-preview').text($('#event-description').val());
            });
        </script>


        <!--Date Picker-->
        <script type="text/javascript">
            $('#datepicker').datepicker({
                weekStart: 1,
                daysOfWeekHighlighted: "6,0",
                autoclose: true,
                todayHighlight: true,
            });
            $('#datepicker').datepicker("setDate", new Date());
        </script>

        <!--Back to Top-->
        <script type="text/javascript">
            $(document).ready(function(){
                $(window).scroll(function () {
                        if ($(this).scrollTop() > 50) {
                            $('#back-to-top').fadeIn();
                        } else {
                            $('#back-to-top').fadeOut();
                        }
                    });
                    // scroll body to 0px on click
                    $('#back-to-top').click(function () {
                        $('#back-to-top').tooltip('hide');
                        $('body,html').animate({
                            scrollTop: 0
                        }, 800);
                        return false;
                    });
                    
                    $('#back-to-top').tooltip('show');
            });
        </script>
    </body>
</html>