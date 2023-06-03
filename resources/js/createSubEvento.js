const inputDistancia = document.querySelector("#distancia");
const inputCategoria = document.querySelector("#categoria");
const inputPrecio = document.querySelector("#precio");
//const inputRama = document.querySelector("#rama");
const inputRama = document.querySelector(".radio-input");

let clicks = document.querySelector("#clicks");

const addBtn = document.querySelector("#btn-add");

const ul = document.querySelector("ul");
const empty = document.querySelector("#empty");
var count = 1;

addBtn.addEventListener("click",(e) => {

    e.preventDefault();

    let n = count++;
    const textDistancia = inputDistancia.value;
    const textCategoria = inputCategoria.value;
    const textPrecio = inputPrecio.value;
    const textRama = inputRama.value;

    if (textDistancia !== "") {
        const li = document.createElement("li");
        const pDistancia = document.createElement("input");
        const pCategoria = document.createElement("input");
        const pPrecio = document.createElement("input");
        const pRama = document.createElement("input");
        //p.textContent = text;
        pDistancia.value = textDistancia;
        pDistancia.name = "distancia["+n+"]";

        pCategoria.value = textCategoria;
        pCategoria.name = "categoria["+n+"]";

        pPrecio.value = textPrecio;
        pPrecio.name = "precio["+n+"]";

        pRama.value = textRama;
        pRama.name = "rama["+n+"]";
        //p.name = "click"+n;

        clicks.value = n;

        li.appendChild(pDistancia);
        li.appendChild(pCategoria);
        li.appendChild(pPrecio);
        li.appendChild(pRama);
        li.appendChild(addDeleteBtn());
        ul.appendChild(li);

        inputDistancia.value = "";
        inputCategoria.value = "";
        inputPrecio.value = "";
        inputRama.value = "";

        empty.style.display = "none";
    }



});

function addDeleteBtn() {
    const deleteBtn = document.createElement("button");

    deleteBtn.textContent = "X";
    deleteBtn.className = "btn-delete";

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


