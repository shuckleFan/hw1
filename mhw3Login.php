<?php
session_start();

if($_SESSION["username"] != "ACCEDI"){  //se è diverso da ACCEDI significa che abbiamo qualcuno logagto, quindi falllo andare alla sua pagina
    header("Location: mhw3Account.php");
}

error_reporting(E_ALL);
ini_set('display_errors', 'ON');

if(isset($_POST["username"]) && isset($_POST["password"])){
    $dataBaseConnection = mysqli_connect("localhost", "root", "", "mhw4");
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = mysqli_real_escape_string($dataBaseConnection, $username);
    $password = mysqli_real_escape_string($dataBaseConnection, $password);

    $query = "SELECT *
              FROM UTENTI
              WHERE password=\"".$password."\""." AND username=\"".$username."\"".";";

    $RESULT_SET = mysqli_query($dataBaseConnection, $query);

    $row = mysqli_fetch_assoc($RESULT_SET);
    //print_r ($row);

    if(isset($row)) //se $row è null vuol dire che la query non ha restituito nessun risultato, l'utente non esiste
    {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        echo "accesso eseguito!";

        mysqli_free_result($RESULT_SET);
        mysqli_close($dataBaseConnection);
        header("Location: index.php");
    }
    else{
        echo "username o password scorretti";
    }

    mysqli_free_result($RESULT_SET);


    mysqli_close($dataBaseConnection);
}


?>



<html>
    <head>
        <meta charset='utf8'>
        <!--<script src='myJavaScript.js' defer></script>-->
        <link rel="stylesheet" href="signupAndLogin.css">
    </head>
    <body>
    <a id="link_registrazione" href="mhw3Signup.php" >Registra un nuovo account</a> 

    <h1>Accedi al tuo account</h1>
    <form method="post">
        <div class="username">
            <span class="input_name">username</span>
            <input type="text" name="username" placeholder="">
        </div>
        
        <div class="password">
            <span class="input_name">password</span>
            <input type="password" name="password" placeholder="">
        </div>
    
        <div class="submit">
            <input type="submit" value="Accedi">
        </div>
    </form>


    
    </body>
</html>