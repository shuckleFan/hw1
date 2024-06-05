<?php
error_reporting(E_ALL);
ini_set('display_errors', 'ON');

session_start();
if(!isset($_SESSION["username"])){
    $_SESSION["username"] = "ACCEDI";
}

?>

<!DOCTYPE html>
<html>

<head> 

<title>MangaYo! - Manga, Figure, Shonen Jump e prodotti da collezione Giapponesi</title>

<link rel="stylesheet" href="mhw3.css">
<script src="mhw3.js" defer></script>

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
            <a href="mhw3Login.php" class="account_option">
                <img class="image_from_header textSuConsole" src="immagini_header/accedi.svg" data-informazioni-aggiuntive="accedi al tuo account cliente">
                <div id="usernameUtente" class="textSuConsole" data-informazioni-aggiuntive="accedi al tuo account cliente"><?php echo $_SESSION["username"];?></div>
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
            <a href="mhw3PaginaRicercaManga.php" class="navigation_bar">MANGA</a>
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
    <div class="main_banner"></div>
</header>

<article>
    <!--LE VETRINE INIZIANO-->
    
    <h2 class="titolo">CONSIGLIATI</h2>
    <div class="vetrina" vetrina-n-esima="0">   
        <div class="prodotto eliminabile"><!--gli elementi div dentro questo container si dovranno nascondere-->
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto eliminabile">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
    </div>
    <div class="owl-dots" riga-n-esima="0">
        <div class="selected_dot unselected_dot" pallina-n-esima="0"></div>
        <div class="unselected_dot" pallina-n-esima="1"></div>
        <div class="unselected_dot" pallina-n-esima="2"></div>
    </div>

    <!--SECONDA VETRINA-->
    <h2 class="titolo">ACCLAMATI DAL PUBBLICO</h2>   
    <div class="vetrina" vetrina-n-esima="1">
        <div class="prodotto eliminabile">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto eliminabile">
            <a href="" class="manga_clicked"><img class="prodotto" src= ""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
    </div>
    <div class="owl-dots" riga-n-esima="1">
        <div class="selected_dot unselected_dot" pallina-n-esima="0"></div>
        <div class="unselected_dot" pallina-n-esima="1"></div>
        <div class="unselected_dot" pallina-n-esima="2"></div>
    </div>

    <!--TERZA VETRINA-->
    <h2 class="titolo">I PIÙ POPOLARI</h2>   
    <div class="vetrina" vetrina-n-esima="2">
        <div class="prodotto eliminabile">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto eliminabile">
            <a href="" class="manga_clicked"><img class="prodotto" src= ""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
        <div class="prodotto">
            <a href="" class="manga_clicked"><img class="prodotto" src=""></a>
            <div class="nome_prodotto"></div>
            <a href="" class="aggiungi_al_carrello">Aggiungi al carrello</a>
        </div>
    </div>
    <div class="owl-dots" riga-n-esima="2">
        <div class="selected_dot unselected_dot" pallina-n-esima="0"></div>
        <div class="unselected_dot" pallina-n-esima="1"></div>
        <div class="unselected_dot" pallina-n-esima="2"></div>
    </div>


    <!--CARRELLO-->
    <h2 class="titolo">CARRELLO</h2>   
    <div id="sezioneCarrello">

    <!-- tramite javascript popoleremo questo elemento #carrello con degli elementi div di questo genere
        <div>
            <img src="novità_figure/leorio-hunter-x-hunter-vibration-stars-banpresto-figure.webp" alt="">
        </div>
    -->
        </div>
    </div>


    <!--VETRINE FINITE -->
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