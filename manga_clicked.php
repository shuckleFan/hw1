<?php
if(isset($_GET["nome"]) )
{   
    // ********************************
    // *                              *
    // *     INIZIO JIKAN API         *
    // *                              *
    // ********************************

    $handler = curl_init();

    $mangaName = $_GET["nome"];
    $encodedMangaName = urlencode($mangaName);

    echo "DEBUG INFO:<br>";

    echo "nome manga<br>";
    echo $mangaName;    //non è URL encoded: PHP decodifica automaticamente i parametri GET

    echo "<br>ecodedMangaName<br>";
    echo $encodedMangaName;

    curl_setopt($handler, CURLOPT_URL, "https://api.jikan.moe/v4/manga?q=".$encodedMangaName."&limit=1"."&sfw=true"."&genres_exclude=49");  //ci verrà mandato solo un risultato
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);


    $result = curl_exec($handler);
    $decodedResult = json_decode($result);


    //ESTRAIAMO I DATI DAL JASON
    $img = $decodedResult->data[0]->images->webp->large_image_url;
    $autore = $decodedResult->data[0]->authors[0]->name;
    $editore = $decodedResult->data[0]->serializations[0]->name;
    $genere = $decodedResult->data[0]->genres[0]->name;    

    if($decodedResult->data[0]->status == "Publishing"){
        $stato = "in corso";
    }
    else{
        $stato = "concluso";
    }

    $punteggio = $decodedResult->data[0]->score;
    $sinopsi = $decodedResult->data[0]->synopsis;;
    $img = $decodedResult->data[0]->images->webp->large_image_url;
    //FINE ESTRAZIONE I DATI DAL JASON
    
    curl_close($handler);


    // ********************************
    // *                              *
    // *      INIZIO SPOTIFY API      *
    // *                              *
    // ********************************

    //OTTENIMENTO TOKEN

    $clientID = "0fcbeede27b346e590b13e82cd3b0a25";
    $clientSecret = "41d2e588476641c1a653a740e467f7f1";

    $mangaName = $_GET["nome"];

    //definimao l'header che useremo per la richiesta ai server di spotify
    //base64_encode: fromBinaryToBase64-encoded ASCII string 
    $spotify_header = array("Authorization: Basic ".base64_encode($clientID.":".$clientSecret));;

    $handler = curl_init();

    //IMPOSTIAMO LA CONNESSIONE CON IL SERVER PER L'ACQUISIZIONE DEL TOKEN
    curl_setopt($handler, CURLOPT_URL, "https://accounts.spotify.com/api/token");   //impostiamo l'URL della risorse che vogliamo acquisire
    curl_setopt($handler, CURLOPT_POST, true);   //esplicitiamo il metodo http che vogliamo usare
    curl_setopt($handler, CURLOPT_HTTPHEADER, $spotify_header);   //impostiamo l'header
    curl_setopt($handler, CURLOPT_POSTFIELDS, "grant_type=client_credentials");   //impostiamo il body
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
 
    $result = curl_exec($handler);

    $json_decoded = json_decode($result);    //abbimao trasformato la risposta del server in un oggetto

    $token = $json_decoded->access_token;   //dato l'oggetto siamo stati in grado di acquisire il token

    curl_close($handler);


    //UTILIZZO TOKEN

    $handler = curl_init();

    $spotify_header = array("Authorization: Bearer ".$token);

    curl_setopt($handler, CURLOPT_URL, "https://api.spotify.com/v1/search?q=".$encodedMangaName."&type=album"."&limit=1");
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handler, CURLOPT_HTTPHEADER, $spotify_header);   //impostiamo l'header

    $result = curl_exec($handler);
    $json_decoded = json_decode($result);    //abbimao trasformato la risposta del server in un oggetto
    $immagineAlbum = $json_decoded->albums->items[0]->images[0]->url;  //estraiamo l'immagine dall'oggetto derivato dal json

    curl_close($handler);


}
?>

<!DOCTYPE html>
<html>

<head> 

<title>MangaYo! - Manga, Figure, Shonen Jump e prodotti da collezione Giapponesi</title>

<link rel="stylesheet" href="mhw3.css">
<!--<script src="manga_clicked.js" defer></script>-->

<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<header>
    
    <section class="free_shipping" id="free_shipping">
        <div class="dummy"></div>
        <div>SPEDIZIONE GRATUITA DA 39€</div>
        <img id="closeIconFromFreeShipping" src="immagini_header/close.svg">
    </section> <!--barra eliminabile-->
    <section class="account_bar">   
        <a href="" class="servizio_clienti">SERVIZIO CLIENTI</a>
        <div class="account_option">
            <a href="" class="account_option">
                <img class="image_from_header textSuConsole" src="immagini_header/accedi.svg" data-informazioni-aggiuntive="accedi al tuo account cliente">
                <div class="textSuConsole" data-informazioni-aggiuntive="accedi al tuo account cliente">ACCEDI</div>
            </a>
            <a href="" class="account_option">
                <img class="image_from_header textSuConsole" src="immagini_header/lista_dei_desideri.svg" data-informazioni-aggiuntive="LISTA DEI DESIDERI">
                <div class="textSuConsole" data-informazioni-aggiuntive="LISTA DEI DESIDERI">LISTA DEI DESIDERI</div>
            </a>
            <a href="" id="carrello" class="account_option">
                <img class="image_from_header" src="immagini_header/carrello.svg">
                <div>CARRELLO:0</div>
            </a>
        </div>   
    </section> 
    <nav>
        <div id="sandwich_menu"><img src="immagini_header/sandwich_menu.svg"></div> <!--MOBILE SANDWICH MENU-->
        <div class="logo"><img src="mangayo_logo.svg"></div>
        <div class="navigation_bar">
            <a href="" class="navigation_bar">NOVITÀ</a>
            <a href="" class="navigation_bar">MANGA</a>
            <a href="" class="navigation_bar">GIAPPONE</a>
            <a href="" class="navigation_bar">FIGURE</a>
            <a href="" class="navigation_bar">CARD GAME</a>
            <a href="" class="navigation_bar">PREORDINI</a>
        </div>
        <div class="search_bar">
            <div><img src="immagini_header/search.svg"></div>
            <div>CERCA</div>
        </div>
    </nav>
    <div id="gray_line"></div>
</header>



<article>

        <div id="main_info">
            <div id="main_info_image">
                <img src="<?php echo $img;?>" alt="">
            </div>
            <div id="main_info_texto">
                <h3></h3>
    
                <div><strong>Autore:</strong><div id="autore"></div><?php echo $autore;?></div>
                <div><strong>Editore:</strong><div id="editore"></div><?php echo $editore;?></div>
                <div><strong>Genere:</strong><div id="genere"></div><?php echo $genere;?></div>
                <div><strong>Stato:</strong><div id="stato"></div><?php echo $stato;?></div>
                <div><strong>Punteggio:</strong><div id="punteggio"></div><?php echo $punteggio;?></div>
                
                <div class="acquista">Acquista l'album dell'anime QUI su Mangayo!</div>
                <div id="immagine_album"><img src="<?php echo $immagineAlbum;?>" alt=""></div>
            </div>
        </div>



    <div id="synopsis_box">
        <div class="title_box">Descrizione</div>
        <div id="synopsis_text"><?php echo $sinopsi;?></div>


    </div>
    



</article>

<div class="mobile_footer">
    <div>PRODOTTI</div>
    <div>INFORMAZIONI</div>
    <div>IL TUO ACCOUNT</div>
</div>

<footer>
    <div class="footer_segment">
        <a href=""><img class="logo_footer" src="mangayo_logo.svg"></a>
        <div>Via Giuseppe Trabacchi 16</div>
        <div>00133 Roma</div>
        <div>Roma</div>
        <div>Italia</div>
        <div>servizioclienti@mangayo.it</div>
        <div>Contattaci su <a href="https://api.whatsapp.com/send?phone=393518894525" id="wazap"  class="footer">WhatsApp</a></div>
        <div class="loghi_social">
            <a href="https://www.facebook.com/MangaYo-103839188406532"><img src="social_logos/facebook.png" class="social_logo"></a>
            <a href="https://www.instagram.com/mangayo.it"><img src="social_logos/instagram.png" class="social_logo"></a>
        </div>
    </div>

    <div class="footer_segment">
        <h1 class="footer">PRODOTTI</h1>
        <a href="" class="footer">Novità</a>
        <a href="" class="footer">Manga</a>
        <a href="" class="footer">Giappone</a>
        <a href="" class="footer">Figure</a>
        <a href="" class="footer">Preordine</a>
        <a href="" class="footer">One Piece TCG</a>
    </div>

    <div class="footer_segment">
        <h1 class="footer">INFORMAZIONI</h1>
        <a href="" class="footer">Chi siamo</a>
        <a href="" class="footer">Ambiente</a>
        <a href="" class="footer">Termini e condizioni</a>
        <a href="" class="footer">Spedizioni e resi</a>
        <a href="" class="footer">18App</a>
        <a href="" class="footer">Carta del Docente</a>
        <a href="" class="footer"> Privacy Policy</a>
        <a href="" class="footer">Cookie Policy</a>
        <a href="" class="footer">Cancellazione Account</a>
        <a href="" class="footer">Domande Frequenti</a>
        <a href="" class="footer">Lavora con noi</a>
        <a href="" class="footer">Eventi</a>
        <a href="" class="footer">Carte Cultura</a>
        <a href="" class="footer">Contattaci</a>
    </div>

    <div class="footer_segment">
    <h1 class="footer">IL TUO ACCOUNT</h1>
        <a href="" class="footer">Informazioni personali</a>
        <a href="" class="footer">Ordini</a>
        <a href="" class="footer">Note di credito</a>
        <a href="" class="footer">Indirizzi</a>
        <a href="" class="footer">Buoni</a>
    </div>
    

</footer>

<div class="copyright">
    <a href=https://mangayo.it/# class="copyright"><strong>©2024 MangaYo! s.r.l.s </strong>P.IVA: 15931551004</a>
    <div class="metodi_pagamento">
        <div><img src="metodi_pagamento/apple_pay.webp" alt="" class="metodi_pagamento"></div>
        <div><img src="metodi_pagamento/mastercard.webp" alt="" class="metodi_pagamento"></div>
        <div><img src="metodi_pagamento/visa.webp" alt="" class="metodi_pagamento"></div>
        <div><img src="metodi_pagamento/paypal.webp" alt="" class="metodi_pagamento"></div>
    </div>
</div>

</body>
</html>

