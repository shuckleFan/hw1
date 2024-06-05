<?php   
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');

if(isset($_GET["nome"]) && isset($_GET["vetrina-n-esima"]) && isset($_GET["prodotto-n-esimo"]) )
{
    $dataBaseConnection = mysqli_connect("localhost", "root", "", "mhw4");
    $N_vetrina = mysqli_real_escape_string($dataBaseConnection, $_GET["vetrina-n-esima"]);  //valore che va da 0 a 2
    $N_prodotto = mysqli_real_escape_string($dataBaseConnection, $_GET["prodotto-n-esimo"]);  //valore che va da 0 a 2
    $nome = mysqli_real_escape_string($dataBaseConnection, $_GET["nome"]);  //valore che va da 0 a 2

    
    $query = "SELECT img_URL 
              FROM VETRINA_".$N_vetrina." JOIN MANGA ON VETRINA_".$N_vetrina.".nome = MANGA.nome
              WHERE MANGA.nome = \"".$nome."\"";
    
    
    $RESULT_SET = mysqli_query($dataBaseConnection, $query);


    $results = array(); //definiamo un array, al suo interno salveremo tutte le righe restituite dalla query
    $results[] = mysqli_fetch_assoc($RESULT_SET);    //nome è una primary key ci saà solo una riga

    $results["N_vetrina"] = $N_vetrina;    //in questo modo javaScript riesce a distinguere le moltitudini richieste che vengono fatte asincornamente
    $results["N_prodotto"] = $N_prodotto;

    echo json_encode($results);

    //Libera lo spazio occupato dai risultati di una query
    mysqli_free_result($RESULT_SET);

    //Chiude una connessione
    mysqli_close($dataBaseConnection);

}

?>