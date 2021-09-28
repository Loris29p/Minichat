<?php 
    session_start();

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) or die(print_r($bdd->errorInfo()));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query('SELECT * FROM posts'); 

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Minichat Post</title>
        <link rel="shortcut icon" type="image/png" href="https://i.imgur.com/yxclXiF.png" />
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/Bootstrap-Chat.css">
        <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body><div class="bootstrap_chat">
    <div class="container py-5 px-4">
    <!-- For demo purpose-->
    <header class="text-center">
        <h1 class="display-4 text-white">Minichat</h1>
    </header>

    <div class="row rounded-lg overflow-hidden">
        <!-- Users box-->
        <div class="col-5 px-0">
        <div class="bg-white">

            <div class="bg-gray px-4 py-2 bg-light">
            <p class="h5 mb-0 py-1">Recent</p>
            </div>

            <div class="messages-box">

                <?php

                    while ($donnees = $reponse->fetch())
                    {
                    ?>
                        <div class="list-group rounded-0">
                            <a class="list-group-item list-group-item-action active text-white rounded-0">
                                <div class="media"><img src="https://i.imgur.com/yxclXiF.png" alt="user" width="50" class="rounded-circle">
                                    <div class="media-body ml-4">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <h6 class="mb-0"><?php echo $donnees['pseudo']; ?></h6><small class="small font-weight-bold"><?php echo $donnees['date']; ?></small>
                                        </div>
                                        <p class="font-italic mb-0 text-small"><?php echo $donnees['message']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                
                ?>
            </div>
        </div>

        <!-- Typing area -->
        <form action="upload.php" class="bg-light" method="post">
            <div class="input-group">
            <input type="text" placeholder="Type a message" aria-describedby="button-addon2" name="message" class="form-control rounded-0 border-0 py-4 bg-light">
            <div class="input-group-append">
                <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
            </div>
            </div>
        </form>

        </div>
    </div>
    </div>
    </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>

    <?php
?>