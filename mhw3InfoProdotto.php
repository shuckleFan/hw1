<?php
if(isset($_GET["nome"]) )
{
    $handler = curl_init();
    $mangaName = urlencode($_GET["nome"]);

    curl_setopt($handler, CURLOPT_URL, "https://api.jikan.moe/v4/manga?q=".$mangaName."&limit=1");  //ci verrà mandato solo un risultato
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);


    $result = curl_exec($handler);
    

    echo $result;   //il risultato è già in in formato json (ovviamente) quindi non c'è bisogno di decodificarlo

    

    curl_close($handler);

}
?>