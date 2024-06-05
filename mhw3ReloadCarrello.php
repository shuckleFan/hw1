<?php
session_start();

if($_SESSION["username"] == 'ACCEDI'){ //se è uguale ad accedi vuol dire che non abbiamo nessuno loggato, fallo andare al login
    echo json_encode('no_login');
}
else{
    $username = $_SESSION['username'];

    $dataBaseConnection = mysqli_connect("localhost", "root", "", "mhw4");

    $query = "SELECT img_URL 
              FROM CARRELLO JOIN UTENTI ON CARRELLO.username = UTENTI.username
              WHERE CARRELLO.username='$username'";

    $RESULT_SET = mysqli_query($dataBaseConnection, $query);

    $results = array(); //definiamo un array, al suo interno salveremo tutte le righe restituite dalla query
    while($row = mysqli_fetch_assoc($RESULT_SET)) {
        $results[] = $row;  //ogni riga acquisita viene salvata in $results[]
    }

    echo json_encode($results);

    mysqli_free_result($RESULT_SET);
    mysqli_close($dataBaseConnection);
}




?>