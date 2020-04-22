<?php
if(isset($user)){
    echo $_SESSION['userName'];
    echo '<br>';
    echo $_SESSION['connect'];
    echo '<br>';
    echo $_SESSION['type_compte'];
    echo '<br>';
    echo 'ce sera la première page du programme, donc à faire';
    echo '<br>';
    if(isset($_COOKIE['userName'])) {
        echo $_COOKIE['userName'];
    }
};
?>

<a href="index.php?module=UserController&action=logOut">Deconnexion</a>