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

    if (isset($_POST['pseudo']) AND isset($_POST['message']))
    {
        if (strlen($_POST['pseudo']) > 0 AND $_POST['message'] > 0)
        {
            $pseudo = $_POST['pseudo'];
            $message = $_POST['message'];
            $_SESSION['pseudo'] = $pseudo;
    
            if (isset($_COOKIE['pseudo']))
            {
                $_SESSION['message'] = $_COOKIE['pseudo'];
            }
            else 
            {
                $_SESSION['message'] = $message;
            }
    
            setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
    
            $req = $bdd->prepare('INSERT INTO posts(pseudo, message, date) VALUES(:pseudo, :message, :date)');
            $req->execute(array(
                'pseudo' => $pseudo,
                'message' => $message,
                'date' => date('j F h:i:s'),
                ));
    
                header('Location: minichat_post.php');
        }
        else
        {
            header('Location: minichat_post.php');
        }
    }
    elseif (isset($_SESSION['pseudo']) AND isset($_POST['message']))
    {
        $req = $bdd->prepare('INSERT INTO posts(pseudo, message, date) VALUES(:pseudo, :message, :date)');
        $req->execute(array(
            'pseudo' => $_SESSION['pseudo'],
            'message' => $_POST['message'],
            'date' => date('j F h:i:s'),
            ));

            header('Location: minichat_post.php');
    }
    else
    {
        header('Location: index.php');
    }
?>