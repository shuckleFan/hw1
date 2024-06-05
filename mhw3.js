//chiudi il primissimo banner
const freeShippingBannedId = document.getElementById('free_shipping');
function closeFreeShippingBanner(){
    freeShippingBannedId.classList.add('hidden');
}

const closeIconId = document.getElementById('closeIconFromFreeShipping');
closeIconId.addEventListener('click', closeFreeShippingBanner);



function cambioVetrina(N_riga, N_pallino){
    const vetrinaDaModificare = document.querySelector('div.vetrina[vetrina-n-esima="' + N_riga + '"]');
    //console.log(vetrinaDaModificare);

    const listaDivNomeProdotto = vetrinaDaModificare.querySelectorAll("div.nome_prodotto"); //nomi da modiifcare
    //console.log(listaDivNomeProdotto);
    //cambiamo solamnete il nome, il resto lo affidiamo alle API

    const N_vetrina = N_riga; //il trio di pallini (N_riga) ha una corrispettiva vetrina 

    fetch("load_nomi_vetrina.php"+"?vetrina-n-esima="+N_vetrina+"&pallina-n-esima="+N_pallino )
    .then(promiseHandler);   //diciamo cosa fare, quando ci viene segnalato (dalla promise) che c'è una risposta dalla richiesta asincorna
}


function dotWasClickded(event){
    const parentNode = event.target.parentNode; //che corrisponde alla riga n-esima
    const selectedDot = event.target;   //che corrisponde al pallino n-esimo; così abbiamo l'occorronte per individuare il pallino cliccato
    const collezioneDiPalline =  parentNode.children;   //che corrisponde ad una collezione contenente 3 palline

    const N_riga = parentNode.getAttribute("riga-n-esima");
    const N_pallino = selectedDot.getAttribute("pallina-n-esima");



    for(let i = 0; i < collezioneDiPalline.length; i++ ){
        console.log("dot was clicked");
        console.log(collezioneDiPalline.length);
        collezioneDiPalline[i].classList.remove("selected_dot");    //adesso accediamo ai singoli pallini
    }

    collezioneDiPalline[N_pallino].classList.add("selected_dot"); //aggiungiamo la classe "selezionato" al pallino selezionato
    
    cambioVetrina(N_riga, N_pallino);   //vediamo con quale trio di pallini l'utente ha interagito, e con quale pallino specifico fra i 3
}



const righeDiPalline = document.querySelectorAll("div.owl-dots"); //node list
const totaleVetrine = righeDiPalline.length;    //LO USIAMO NELLA SEZIONE "POPOLA VETRINE"

for(let i = 0; i < righeDiPalline.length; i++){
    let collezioneDiPalline = righeDiPalline[i].children;    //accediamo ai gruppi di 3 pallini (HTML collection)
    for(let c = 0; c < collezioneDiPalline.length; c++){
        collezioneDiPalline[c].addEventListener("click", dotWasClickded); //adesso accediamo ai singoli pallin
    }

}




// ********************************
// *                              *
// *     AGGIUNI nome VETRINE     *
// *                              *
// ********************************



function handlerOnJson(json){
    //console.log("I nomi restituiti dal server SQL sono");
    //console.log(json);
    //vengono mandate 3 richieste ASINCRONE consicutive al server, l'ordine con cui arrivano le risposte non la sappiamo,
    //ci affidiamo quindi alla risposta del server PHP per capire a chi appartiene una determinata richiesta 
    const N_vetrina = json["N_vetrina"]; 
    const N_pallina = json["N_pallina"]; 

    const vetrinaDaPopolare = document.querySelector('div.vetrina[vetrina-n-esima="' + N_vetrina + '"]');   //seleziono vetrina
    const listaDivNomeProdotto = vetrinaDaPopolare.querySelectorAll("div.nome_prodotto");    //acquisisco i div.nomeprodotto
    const listaLinkNomeProdotto = vetrinaDaPopolare.querySelectorAll("a.manga_clicked");

    
    for(let c = 0; c < listaDivNomeProdotto.length; c++){
        //AGGIUNGERE I NOMI NELLA VETRINA
        listaDivNomeProdotto[c].innerHTML = json[c].nome;//l'interno del div.nome_prodotto è semplicemente un text_node

        //AGGIUNGERE IMMAGINI ALLA VETRINA
        let name = listaDivNomeProdotto[c].innerHTML.replace("&amp;","&");  //html contrassegna le & con &amp; noi però vogliamo la &
        //console.log(name);
        let encodedName = encodeURIComponent(name); //encodeURI lascia invariato il carattere & quindi usiamo encodeURIComponent
        //console.log(encodedName);
        fetch("load_img_vetrina.php"+"?nome="+encodedName+"&vetrina-n-esima="+N_vetrina+"&prodotto-n-esimo="+c)
        .then(promiseHandlerImg);   //diciamo cosa fare, quando ci viene segnalato (dalla promise) che c'è una risposta dalla richiesta asincorna

        //AGGIUNGERE I LINK ALLA VETRINA
        listaLinkNomeProdotto[c].href = "manga_clicked.php?nome="+encodedName;
    }
    
}
    
function promiseHandler(response){
    //console.log(response);
    //diciamo cosa fare quando ci viene segnalato che la parte dell'haeder contenente il json è arrivato: 
    //richiedere il json da una risposta http è una richiesta asoncrona, in qunto evidentemente l'intera risposta non è disponibile
    response.json().then(handlerOnJson);    
}

for(let N_vetrina = 0; N_vetrina < totaleVetrine; N_vetrina++){
    fetch("load_nomi_vetrina.php"+"?vetrina-n-esima="+N_vetrina+"&pallina-n-esima=0")
    .then(promiseHandler);   //diciamo cosa fare, quando ci viene segnalato (dalla promise) che c'è una risposta dalla richiesta asincorna
}



// ********************************
// *                              *
// *      AGGIUNI img VETRINE     *
// *                              *
// ********************************

//codice eseguito subito dopo aver cambiato il nome alle vetrine

function handlerOnJsonImg(json){
    //console.log(json);
    const N_vetrina = json["N_vetrina"]; 
    const N_prodotto = json["N_prodotto"]; 

    const vetrinaDaPopolare = document.querySelector('div.vetrina[vetrina-n-esima="' + N_vetrina + '"]');   //seleziono vetrina
    const listaDivNomeProdotto = vetrinaDaPopolare.querySelectorAll("img.prodotto");    //acquisisco i nodi img.prodotto


    listaDivNomeProdotto[N_prodotto].src = json[0].img_URL;  //in json[0] risiede l'URL dell'immagine, che è l'unica chiave, in qunto l'immagine è l'unico attributo restituito dalla query

    // al server abbiamo chiesto l'immagine per l'c-nesimo prodotto in vetrina, quindi cambiamo l'immagine del c-esimo (N_prodotto) prodotto in vetrina

}

function promiseHandlerImg(response){
    //console.log(response);
    response.json().then(handlerOnJsonImg);
}


// ********************************
// *                              *
// *           CARRELLO           *
// *                              *
// ********************************

                                                        //RIMUOVI PRODOTO


    function rimuoviDalCarreloHandlerOnJson(json){
        console.log(json);
    }

    function rimuoviDalCarreloHandlerOnFetch(response){
        response.text().then(rimuoviDalCarreloHandlerOnJson);
    }

function removeProduct(event){
    event.preventDefault();
    
    const bottoneCliccato = event.target;   //acquisiamo il bottone
    const containerCarrello = bottoneCliccato.parentNode;   //acquisiamo il suo container che conterrà il prodotto del relativo manga
    const immagineNelContainer = containerCarrello.querySelector("img");    //dato il contaier possiamo accedere al prodotto

    const immagineProdotto = immagineNelContainer.src;

    fetch("mhw3RimuoviDalCarrello.php"+"?img_URL="+encodeURIComponent(immagineProdotto)).then(rimuoviDalCarreloHandlerOnFetch);

    reloadCarrello();
}

                                                        //RELOAD CARRELLO

function reloadCarrelloOnJson(json){

    if(json != "no_login"){ //(json != "no_login") -> (json == "login")
        console.log("login detected");
        
        sezioneCarrello.innerHTML="";   //svuotiamo il carrello in quanto rileggimo l'interezza del db e non solo l'ultima aggiunta
        for(let i=0; i < json.length; i++){
            console.log(json[i].img_URL);

            let ElementWeJustCreated = document.createElement("div");   //prima creiamo i div per metterci dentro le nostre robe
            sezioneCarrello.appendChild(ElementWeJustCreated);  //aggiunta all'interno del documento
            let containerFromCarrello = ElementWeJustCreated;

            ElementWeJustCreated = document.createElement("img");   //creazione rappresentazione prodotto nel carrello
            ElementWeJustCreated.src = json[i].img_URL; //assegnazione attributi
            containerFromCarrello.appendChild(ElementWeJustCreated);  //aggiunta all'interno del div dentro carrello
        
            ElementWeJustCreated = document.createElement("a");   //creazione bottone per togliere dal carrello
            ElementWeJustCreated.classList.add('rimuovi_dal_carrello'); //definimo la classe
            ElementWeJustCreated.innerHTML = "rimuovi"; //definimo il testo
            containerFromCarrello.appendChild(ElementWeJustCreated);  //aggiunta all'interno del div dentro carrello

            //INFINE ASSOCIAMO UN EVENTO AI PULSANTI IN MODO TALE CHE AL LORO CLICK RIMUVIAMO IL PRODOTTO CORRISPETTIVO
            ElementWeJustCreated.addEventListener("click", removeProduct);
        
        }
    }
    else{
        console.log("login not detected");
    }
}

function reloadCarrelloOnfetch(response){
    response.json().then(reloadCarrelloOnJson);
}

function reloadCarrello(){
    fetch("mhw3ReloadCarrello.php").then(reloadCarrelloOnfetch);

    
}




                                //AGGIUNGERE AL CARRELLO (dopo aver acquisito info)
function AggiungiAlCarrelloHandlerOnHttpResponse(json){
    console.log(json);
    if(json == "no_login"){
        window.location.href = "mhw3Login.php";
    }
    else
   {
        reloadCarrello();
   }
}

function AggiungiAlCarrelloHandlerOnfetch(httpResponse){
    console.log(httpResponse);
    httpResponse.json().then(AggiungiAlCarrelloHandlerOnHttpResponse);
}

function aggiungiAlCarrello(nome_manga, mal_id, img_URL){
    fetch("mhw3AggiungiAlCarrello.php"+"?nome_manga="+encodeURIComponent(nome_manga)+"&mal_id="+encodeURIComponent(mal_id)+"&img_URL="+encodeURIComponent(img_URL)).then(AggiungiAlCarrelloHandlerOnfetch);
}


                                            //ACQUISISCI INFO PRODOTTO
function infoProdottoHandlerOnjson(json){
    console.log(json);

   //USA LE INFO PRODOTTO PER AGGIUNGERE AL CARRELLO
   const nome_manga = json.data[0].title;
   const mal_id = json.data[0].mal_id;
   const img_URL = json.data[0].images.jpg.small_image_url;

   aggiungiAlCarrello(nome_manga, mal_id, img_URL);
    
}



function infoProdottoHandlerOnfetch(response){
    response.json().then(infoProdottoHandlerOnjson);
}

function carreloButtonClicked(event){
    event.preventDefault();
    const nodoPadre = event.target.parentNode;
    const divNomeProdotto = nodoPadre.querySelector("div.nome_prodotto");
    const nomeProdotto = divNomeProdotto.innerHTML;

    console.log(nomeProdotto);

    //l'encode dell'URL lo facciamo lato server
    fetch("mhw3InfoProdotto.php"+"?nome="+encodeURIComponent(nomeProdotto)).then(infoProdottoHandlerOnfetch);
}



const sezioneCarrello = document.querySelector("#sezioneCarrello");
const aggiungiAlCarrelloButtons = document.querySelectorAll("a.aggiungi_al_carrello");
reloadCarrello();

for(let i = 0; i < aggiungiAlCarrelloButtons.length; i++){
    aggiungiAlCarrelloButtons[i].addEventListener("click", carreloButtonClicked);
}


