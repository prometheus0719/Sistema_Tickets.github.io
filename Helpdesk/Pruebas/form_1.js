//Buscador de Contenido

//Ejecuntando Funciones
document.getElementById("icon-search").addEventListener("click", mostrar_buscador);
document.getElementById("cover-ctn-search").addEventListener("click", ocultar_buscador);


//Declarando variables
bars_search =       document.getElementById("ctn-bars-search"); 
cover_ctn_search =  document.getElementById("cover-ctn-search"); 
inputSearch =       document.getElementById("inputSearch"); 
box_search =        document.getElementById("box-search"); 

//Funcion para mostrar el buscador
function mostrar_buscador(){
    bars_search.style.top= "80px";
    cover_ctn_search.style.display = "block";
    inputSearch.focus();
}

//Funcion para ocultar el buscador
function ocultar_buscador(){
    bars_search.style.top= "-10px";
    cover_ctn_search.style.display = "none";
    inputSearch.value= "";
    box_search.style.display = "none";
}

//Creando Filtrado de Busqueda
document.getElementById("inputSearch").addEventListener("keyup", buscador_interno);

function buscador_interno(){
    
    
    filter = inputSearch.value.toUpperCase();
    li = box_search.getElementsByTagName("li");

    //Recorreindo elementos a filtrar mediante los "li"
    for (i = 0; i < li.length; i++){
        
        a = li[i].getElementsByTagName("a")[0];
        textValue = a.textContent || a.innerText;

        if(textValue.toUpperCase().indexOf(filter) > -1){
            li[i].style.display = "";
            box_search.style.display = "block";

            if(inputSearch.value === ""){
                box_search.style.display = "none";
            }

        }else{
            li[i].style.display = "none";
        }
        
    }
}


document.getElementById('wheel-button').addEventListener('click', function() {
    const optionsContainer = document.getElementById('optionsContainer');
    optionsContainer.classList.toggle('show');
    this.classList.toggle('rotate');
});

function showInstitutionForm() {
    const formContainer = document.getElementById('formContainer');
    formContainer.classList.add('show');
}

function hideForm() {
    const formContainer = document.getElementById('formContainer');
    formContainer.classList.remove('show');
}

document.getElementById('institutionForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const plantelName = document.getElementById('plantelName').value;
    const city = document.getElementById('city').value;

    const folderName = `${plantelName} - ${city}`;

    const folderContainer = document.createElement('div');
    folderContainer.className = 'folder';

    const folderText = document.createElement('div');
    folderText.className = 'text';
    folderText.innerText = folderName;

    const folderIcon = document.createElement('img');
    folderIcon.className = 'icon';
    folderIcon.src = '../img/icons/default-icon.png'; // Aquí puedes cambiar la ruta del icono

    folderContainer.appendChild(folderText);
    folderContainer.appendChild(folderIcon);

    document.getElementById('result').appendChild(folderContainer);

    hideForm();
});
