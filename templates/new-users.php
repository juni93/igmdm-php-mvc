<?php include 'inc/header.php'; ?>
<div class="container">
        <h2 class="m-4">Crea nuovo utente</h2>
        <form class="m-4 needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>/new-user" novalidate>
            <div class="form-group">
                    <label class="font-weight-bold">Nick Name <span><small>(serve per il login)</small></span></label>
                    <input type="text" class="form-control" name="new_nick_user" required>
                    
            </div>
            <div class="form-group">
                    <label class="font-weight-bold">Password <span><small>(minimo 6 caratteri)</small></span></label>
                    <input type="text" class="form-control" name="new_user_pwd" required>
            </div>
            <div class="form-group pt-4">
                <input type="submit" name="new_user_submit" value="Submit" class="btn btn-primary">
            </div>
        </form>

</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>