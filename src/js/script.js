// Função que adiciona uma classe de estilo que mudar a cor do card de compra
function addcolorBG(props){
    props.classList.add("sobre")
}
// Função que remove uma classe de estilo usada anteriormente
function removecolorBG(props){
    props.classList.remove("sobre")
}
// Função que redireciona o usuario para a pagina de produto
function redirecionar(id){
    window.location.href = `produto.php?id=${id}`
}

function redirecionarEdit(id){
    window.location.href = `editproduto.php?id=${id}`
}

function redirecionarDelete(id){
    window.location.href = `delete.php?id=${id}`
}
// Event Listener para detectar se a pagina já carregou e desabilitar o loading
window.addEventListener('load', (event) => {
    // Seta um intervalo de tempo, pois estamos localmente e possivelmente a pagina carrega rapido. E não dá para perceber o loading 
    setTimeout(() => {
        document.getElementsByClassName("loading")[0].style.display = "none";    
    }, 500);
});
//Função que adiciona uma classe de estilo de sombra nos inputs
function onfocusinput(props){
    props.classList.add("focus")
}
//Função que remove uma classe de estilo de sombra nos inputs
function onblurinput(props){
    props.classList.remove("focus")
}