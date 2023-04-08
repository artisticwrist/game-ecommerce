var popularGame = document.querySelectorAll(".popular")
var viewMoreBox = document.querySelector(".view-more-popular")
var allGame = document.querySelectorAll(".all-game");
var viewMoreAllgame = document.querySelector(".view-more-all-game")
var cart = document.querySelector(".cart")



// POPULAR GAMES SECTION ONCLICK FUNCTION FOR VIEW MORE BUTTON
function popularGameDisplay(){
    popularGame.forEach((container) => {
        container.classList.remove('display-none');
        viewMoreBox.classList.add('display-none')
      });
}


// ALL GAMES SECTION ONCLICK FUNCTION FOR VIEW MORE BUTTON
function allGamedisplay(){
    allGame.forEach((container) => {
        container.classList.remove('display-none');
        viewMoreAllgame.classList.add('display-none')
      });
}

// DISPLAYS CART

function showCart(){
  cart.classList.remove("display-none")
  cart.classList.add("display-flex")
}

// REMOVES CAART
function closeCart(){
  cart.classList.add("display-none")
  cart.classList.remove("display-flex")
}








