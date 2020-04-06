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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
            
            
        <script>
            var forms = document.querySelector('.needs-validation');
            if(forms){
                forms.addEventListener('submit', function(event) {
                    if (forms.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    forms.classList.add('was-validated');
                });
            }
            
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
        <!--Back to Top-->
        <script >
            jQuery(document).ready(function(){
                jQuery(window).scroll(function () {
                        if (jQuery(this).scrollTop() > 50) {
                            jQuery('#back-to-top').fadeIn();
                        } else {
                            jQuery('#back-to-top').fadeOut();
                        }
                    });
                    // scroll body to 0px on click
                    jQuery('#back-to-top').click(function () {
                        jQuery('body,html').animate({
                            scrollTop: 0
                        }, 800);
                        return false;
                    });
            });
        </script>
    </body>
</html>