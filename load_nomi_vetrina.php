<?php   
error_reporting(E_ALL);
ini_set('display_errors', 'OFF');

if(isset($_GET["vetrina-n-esima"]) && isset($_GET["pallina-n-esima"]) )
{
    $dataBaseConnection = mysqli_connect("localhost", "root", "", "mhw4");
    $N_vetrina = mysqli_real_escape_string($dataBaseConnection, $_GET["vetrina-n-esima"]);  //valore che va da 0 a 2
    $N_pallina = mysqli_real_escape_string($dataBaseConnection, $_GET["pallina-n-esima"]);  //valore che va da 0 a 2

    $offset = $N_pallina * 4;  //in base alla pallina selezionata scegliamo un diverso quartetto di risultati
    $N_risultati = 4; 


    
    $query = "SELECT * 
              FROM VETRINA_".$N_vetrina."
              LIMIT ".$N_risultati." OFFSET ".$offset.";";
    
    
    $RESULT_SET = mysqli_query($dataBaseConnection, $query);


    $results = array(); //definiamo un array, al suo interno salveremo tutte le righe restituite dalla query
    while($row = mysqli_fetch_assoc($RESULT_SET)) {
        $results[] = $row;  //ogni riga acquisita viene salvata in $results[]
        //echo $row;
    }

    $results["N_vetrina"] = $N_vetrina;    //in questo modo javaScript riesce a distinguere le moltitudini richieste che vengono fatte asincornamente
    $results["N_pallina"] = $N_pallina;
    echo json_encode($results);

    //Libera lo spazio occupato dai risultati di una query
    mysqli_free_result($RESULT_SET);

    //Chiude una connessione
    mysqli_close($dataBaseConnection);

}

?>

