<?php include 'inc/header.php'; ?>


<?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <div class="container">
        <div class="row">
            <h2 class="font-weight-bold">Ciao <?php echo $_SESSION['nick_user'] ?> !</h2>
        </div>
                <div class="row">
                    <?php if($_SESSION['super_user'] == true): ?>
                        <h4 class="font-weight-bold">Di seguito gli articoli da approvare: </h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Immagine</th>
                                    <th scope="col">Titolo</th>
                                    <th scope="col">Formato</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Articolista</th>
                                    <th scope="col">Visualizza</th>
                                    <th scope="col">Pubblica</th>
                                    <th scope="col">Modifica</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($articlesToBeApproved as $article): ?>
                                    <tr>
                                        <td><img src="<?php echo ABSOLUTE_PATH; ?>images/articles/<?php echo $article->preimage_arti; ?>" alt="" class="mx-auto" style="width: 80px; height:80px"></td>
                                        <td><?php echo $article->name_arti; ?></td>
                                        <td><?php echo $article->name_frmt; ?></td>
                                        <td><?php echo $article->date_arti; ?></td>
                                        <td><?php echo $article->name_user; ?></td>
                                        <td><a href="<?php echo BASE_PATH; ?>/article/<?php echo $article->id_arti; ?>/<?php echo $article->name_arti; ?>" class='btn btn-outline-primary btn-sm' style="width: 80px;"><small>View</small></a></td>
                                        <td><a href="<?php echo BASE_PATH; ?>/publish-article/<?php echo $article->id_arti; ?>" class='btn btn-outline-primary btn-sm' style="width: 80px;"><small>Publish</small></a></td>
                                        <td>
                                          
                                                <a href="<?php echo BASE_PATH; ?>/edit-article/<?php echo $article->id_arti; ?>" class='btn btn-outline-primary btn-sm' style="width: 80px;"><small>Edit</small></a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h4 class="font-weight-bold mb-2">Di seguito gli articoli non ancora pubblicati:</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Immagine</th>
                                    <th scope="col">Titolo</th>
                                    <th scope="col">Formato</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Articolista</th>
                                    <th scope="col">Visualizza</th>
                                    <th scope="col">Modifica</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($articlesToBeApproved as $article): ?>
                                    <?php if($article->user_arti ==  $_SESSION['id_user']): ?>
                                    <tr>
                                        <td><img src="<?php echo ABSOLUTE_PATH; ?>images/articles/<?php echo $article->preimage_arti; ?>" alt="" class="mx-auto" style="width: 80px; height:80px"></td>
                                        <td><?php echo $article->name_arti; ?></td>
                                        <td><?php echo $article->name_frmt; ?></td>
                                        <td><?php echo $article->date_arti; ?></td>
                                        <td><?php echo $article->name_user; ?></td>
                                        <td><a href="<?php echo BASE_PATH; ?>/article/<?php echo $article->id_arti; ?>/<?php echo $article->name_arti; ?>" class='btn btn-outline-primary btn-sm' style="width: 80px;"><small>View</small></a></td>                                       
                                        <td><a href="<?php echo BASE_PATH; ?>/edit-article/<?php echo $article->id_arti; ?>" class='btn btn-outline-primary btn-sm' style="width: 80px;"><small>Edit</small></a></td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            
    </div><!-- /.container -->

<?php else: ?>
    <form method="POST" action="<?php echo BASE_PATH; ?>/login">
        <div class="row my-5 justify-content-center">
            <div class="col-lg-4">
                <div class="form-group">
                    <input class="form-control" placeholder="Username" type="text" name="username" autofocus required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login-submit" class="btn btn-lg btn-primary btn-block "><span class="glyphicon glyphicon-log-in"></span> Login</button>
                </div>
            </div>
        </div>
    </form>
<?php endif; ?>

<?php include 'inc/footer.php'; ?>