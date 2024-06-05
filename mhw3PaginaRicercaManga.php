<!DOCTYPE html>
<html>

<head> 

<title>API</title>
<link rel="stylesheet" href="ricercaManga.css">
<script src="ricercaManga.js" defer></script>

<meta name="viewport"
content="width=device-width, initial-scale=1">

</head>

<body>
    <h1>Inserisci query per ottenere manga</h1>
    <form id="form_for_manga">  <!--qui iseriremo un evento, tuttavia non abbiamo bisogno dell'id essendo che di blocco <form> di solito ce ne solo 1, non abbiamo bisogno di getElementByID-->
        <input type="text" name="nome_manga"> <!--questo è il box dove mettere l'utente scriverà la sua query-->  <!--attenzione al valore assegnato a type!-->
        <input type="submit" >   <!--questo è il bottone-->
    </form>

    
    <article>
        <!--la cosa figa delle API è che possimao far spawnare dei blocchi all'interno della pagina, evitando quindi di fare liste
        infinite di elementi a cui associare dati-->

    </article>
</body>