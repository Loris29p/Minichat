<?php
    session_start(); // On démarre la session AVANT toute chose
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Minichat</title>
    <link rel="shortcut icon" type="image/png" href="https://i.imgur.com/yxclXiF.png" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form" method="post" action="upload.php">
                <h1>Formulaire de chat</h1>
                <div class="form-row form-group" style="width: 359px;margin-left: 109px;">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Pseudo</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="pseudo"></div>
                </div>
                <div class="form-row form-group" style="width: 529px;margin-left: 52px;">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Message</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="message"></div>
                </div>
                <button class="btn btn-light submit-button" type="submit" >
                    <strong>Soumettre le formulaire</strong>
                </button>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>