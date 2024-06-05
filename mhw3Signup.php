<?php



error_reporting(E_ALL);
ini_set('display_errors', 'ON');

if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];


    $dataBaseConnection = mysqli_connect("localhost", "root", "", "mhw4");

    $username = mysqli_real_escape_string($dataBaseConnection, $username);
    $password = mysqli_real_escape_string($dataBaseConnection, $password);

    /*
       SPIEGAZIONE PRIMO PARAMETRO DI preg_match()
       /: pattern delimiter
       ^ $: corrispettivamente; start of the line, end of the line; un ulteriore pattern delimiter?
       [0-9]: detect the number belonging to the range from 0 to 9 
       [a-z]: detect letter between a and z
       [a-z][A-Z]: ???????
       [a-zA-Z]: [a-z] OR [A-Z] il modo in cui in genere viene usato: definisce i caratteri che potrebbero essere usati, ma non ti costringe ad utilizzarli tutti
       *: i caratteri permessi possono essere ripetuti
       {1,15}: i caratteri permessi possono essere ripetuti fra le 1 alle 15 volte
    */

    if(preg_match('/^[a-zA-Z0-9]{5,40}$/', $_POST['password'])    )   //{8,40}
    {        

        $queryControlloUsername = "SELECT *
                                   FROM UTENTI
                                   WHERE username='$username'";

        $RESULT_SET = mysqli_query($dataBaseConnection, $queryControlloUsername);

        if(mysqli_num_rows($RESULT_SET) > 0){
            echo "username già utilizzato!!!!";
        }
        else{
            $queryNuovoUtente = "INSERT INTO UTENTI (username, password)
                                 values ('$username','$password')";
            
            mysqli_query($dataBaseConnection, $queryNuovoUtente);

            mysqli_free_result($RESULT_SET);
            mysqli_close($dataBaseConnection);

            header('Location: mhw3Login.php');
        }    

    }
    else
    {
        echo "ammessi solo numeri e lettere; lunghezza fra 5 e 40 caratteri!!!!<br>";

        $queryControlloUsername = "SELECT *
        FROM UTENTI
        WHERE username='$username'";

        $RESULT_SET = mysqli_query($dataBaseConnection, $queryControlloUsername);

        if(mysqli_num_rows($RESULT_SET) > 0){
            echo "username già utilizzato!!!!";
        }
    }


    mysqli_free_result($RESULT_SET);
    mysqli_close($dataBaseConnection);
    
}


?>



<html>
    <head>
        <meta charset='utf8'>
        <script src='signup.js' defer></script>
        <link rel="stylesheet" href="signupAndLogin.css">
    </head>
    <body>
    <a id="link_registrazione" href="mhw3Login.php" >Hai già un account? Accedi</a> 
    <h1>Crea un account</h1>

    <form method="post">
        <div class="username">
            <span class="input_name">username</span>
            <input type="text" name="username" placeholder="">
            <span class="error error_false">username già utilizzato</span>
        </div>
        
        <div class="password">
            <span class="input_name">password</span>
            <input type="password" name="password" placeholder="">
            <span class="error error_false">ammessi solo numeri e lettere; lunghezza fra 5 e 40 caratteri</span>
        </div>
    
        <div class="submit">
            <input type="submit" value="Salva">
        </div>
        
    </form>

    </body>
</html>
<div>
