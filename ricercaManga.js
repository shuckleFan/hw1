

function handlerOnJson(json){
    console.log(json);
    console.log(json.data.length);
    
    imageContainer.innerHTML = '';
    //POPOLA PAGINA
    for(let i=0; i < json.data.length; i++){
        console.log("asasa");

        let ElementWeJustCreated = document.createElement("img");
        ElementWeJustCreated.src = json.data[i].images.webp.image_url;
        imageContainer.appendChild(ElementWeJustCreated); 
    }

}

function handlerOnPromise(response){
    response.json().then(handlerOnJson);
}

function ricercaManga(nomeInseritoDaUtente){
    fetch("mhw3PaginaRicercaMangaApiClient.php"+"?nomeInseritoDaUtente="+encodeURIComponent(nomeInseritoDaUtente)).then(handlerOnPromise);
}


function submitButtonClicked(event){
    event.preventDefault();

    const formElement = event.target;
    console.log(event.target);
    const queryFromUser =  formElement.querySelector('input[type=text]').value;

    console.log(event.target);

    ricercaManga(queryFromUser);
}

console.log("puppata al bomber");

const imageContainer = document.querySelector("article");
const submitButton = document.querySelector("form");
submitButton.addEventListener("submit", submitButtonClicked);

