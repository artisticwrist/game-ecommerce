
// SEARCH INPUT
var viewMoreAllgame = document.querySelector(".view-more-all-game")

function searchs(){
    let searchInput = document.querySelector('.search-input').value.toUpperCase()
    let header = document.querySelector(".header-product")
    let headerBtn = document.querySelector(".header-btn")
    let headerBox = document.querySelector(".header-box")
    let allProduct = document.querySelector(".all-product")
    let productGame = document.querySelectorAll(".all-product .game-box")
    let pname = allProduct.getElementsByTagName('h3')

    // SEARCH
    for (var i = 0; i < pname.length; i++){
        let match = productGame[i].getElementsByTagName('h3')[0];

        if(match) {
        let textValue = match.textContent || match.innerHTML

        if(textValue.toUpperCase().indexOf(searchInput) > -1) {
            productGame[i].style.display = "";
        } else{
            productGame[i].style.display = "none";
        }
        }
    }

    // CHECKS IF INPUT BOX IS EMPTY
    if(!searchInput == "" || !searchInput == null  ){
        header.classList.add('display-none');
        headerBtn.classList.add('display-none')
        headerBox.style.padding="0px"
    }else{
        header.classList.remove('display-none');
        headerBtn.classList.remove('display-none')
        headerBox.style.padding="120px";
    }
}
