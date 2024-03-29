const inputDistancia = document.querySelector("#distancia");
const inputUnidadDistancia = document.querySelector("#unidadDistancia");
const inputCategoria = document.querySelector("#categoria");
const inputPrecio = document.querySelector("#precio");
//const inputRama = document.querySelector("#rama");
//const inputRama = document.querySelector(".radio-input");
const inputRamaAmbas = document.querySelector("#ramaAmbas");
const inputRamaFemenil = document.querySelector("#ramaFemenil");
const inputRamaVaronil = document.querySelector("#ramaVaronil");


let clicks = document.querySelector("#clicks");

const addBtn = document.querySelector("#btn-add");

//const ul = document.querySelector("ul");
const ul = document.querySelector("#listaRamas");
const empty = document.querySelector("#empty");
var count = 1;

addBtn.addEventListener("click",(e) => {

    e.preventDefault();

    let n = count++;
    const textDistancia = inputDistancia.value;
    const textUndadDistancia = inputUnidadDistancia.value;
    const textCategoria = inputCategoria.value.toUpperCase();
    const textPrecio = inputPrecio.value;
    //const textRama = inputRama.value;
    const textRamaAmbas = inputRamaAmbas.value;
    const textRamaFemenil = inputRamaFemenil.value;
    const textRamaVaronil = inputRamaVaronil.value;

    //if (textDistancia !== "") {
    if (textCategoria !== "" && textDistancia !== "" && textUndadDistancia !=="" && textPrecio!=="" ) {
        const li = document.createElement("li");

        const pDistancia = document.createElement("input");
        const pUnidadDistancia = document.createElement("input");
        const pCategoria = document.createElement("input");
        const pPrecio = document.createElement("input");
        const pRama = document.createElement("input");

        pDistancia.setAttribute('class',"bg-primary text-white ");
        pUnidadDistancia.setAttribute('class',"bg-primary text-white ");
        pCategoria.setAttribute('class',"bg-primary text-white ");
        pPrecio.setAttribute('class',"bg-primary text-white ");
        pRama.setAttribute('class',"bg-primary text-white ");


        pDistancia.setAttribute('readonly',"readonly");
        pUnidadDistancia.setAttribute('readonly',"readonly");
        pCategoria.setAttribute('readonly',"readonly");
        pPrecio.setAttribute('readonly',"readonly");
        pRama.setAttribute('readonly',"readonly");


        //p.textContent = text;
        //pDistancia.value = textDistancia;
        //pDistancia.value = textDistancia + " "+textUndadDistancia;
        pDistancia.value = textDistancia + " ";
        pDistancia.name = "distancia["+n+"]";

        pUnidadDistancia.value = textUndadDistancia;
        pUnidadDistancia.name = "unidadDistancia["+n+"]";

        pCategoria.value = textCategoria;
        pCategoria.name = "categoria["+n+"]";

        pPrecio.value = textPrecio;
        pPrecio.name = "precio["+n+"]";

        if(inputRamaAmbas.checked){
            pRama.value = textRamaAmbas;
        }
        if(inputRamaFemenil.checked){
            pRama.value = textRamaFemenil;
        }
        if(inputRamaVaronil.checked){
            pRama.value = textRamaVaronil;
        }
        pRama.name = "rama["+n+"]";

        clicks.value = "Has agregado "+ n + " categorías";

        li.appendChild(pCategoria);
        li.appendChild(pDistancia);
        li.appendChild(pUnidadDistancia);
        li.appendChild(pRama);
        li.appendChild(pPrecio);
        li.appendChild(addDeleteBtn());
        ul.appendChild(li);

        inputDistancia.value = "";
        inputUnidadDistancia.value = "";
        inputCategoria.value = "";
        inputPrecio.value = "";
        inputRamaAmbas.checked = false;
        inputRamaFemenil.checked = false;
        inputRamaVaronil.checked = false;
        //inputRama.value = "";

        //empty.style.display = "none";
    }else{
        clicks.value = "Aún faltan campos por llenar.";
    }



});

function addDeleteBtn() {
    const deleteBtn = document.createElement("button");
    deleteBtn.setAttribute('class','mt-2 text-white bg-red-700 hover:bg-red-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-sm rounded-lg text-sm px-2.5 py-1');

    deleteBtn.id = "delete";

    deleteBtn.textContent = "X";
    //deleteBtn.className = "btn-delete";

    deleteBtn.addEventListener("click", (e) => {
        const item = e.target.parentElement;
        ul.removeChild(item);

        const items = document.querySelectorAll("li");

        if (items.length === 0) {
            empty.style.display = "block";
        }
    });

    return deleteBtn;
}
