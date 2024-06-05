<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'ON');

if($_SESSION["username"] == 'ACCEDI'){ //se è uguale ad accedi vuol dire che non abbiamo nessuno loggato, fallo andare al login
    echo json_encode('no_login');
}
else{

    echo json_encode('un_login_risulta_effettuato_procedo_a_inseriro_oggetto_nel_carrello');

    if(isset($_GET["nome_manga"]) && isset($_GET["mal_id"]) && isset($_GET["img_URL"])){
        $nome_manga = $_GET["nome_manga"];
        $mal_id = $_GET["mal_id"];
        $img_URL = $_GET["img_URL"];
        $username = $_SESSION["username"];

        $dataBaseConnection = mysqli_connect("localhost", "root", "", "mhw4");
    
        $nome_manga = mysqli_real_escape_string($dataBaseConnection, $nome_manga);
        $mal_id = mysqli_real_escape_string($dataBaseConnection, $mal_id);
        $img_URL = mysqli_real_escape_string($dataBaseConnection, $img_URL);
    
        $query = "INSERT INTO CARRELLO (mal_id, nome_manga, img_URL, username)
                  values ('$mal_id','$nome_manga','$img_URL','$username')";

        mysqli_query($dataBaseConnection, $query);

        mysqli_close($dataBaseConnection);


        
}






}
?>