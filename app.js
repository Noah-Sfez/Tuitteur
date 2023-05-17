const tweets = document.querySelectorAll(".tweet_content");
const buttons = document.querySelectorAll(".buttons-all");
console.log(tweets);
console.log(buttons);
buttons.forEach(Element => {
  Element.addEventListener("click", () => {
    let type = Element.getAttribute('data-tag');
    console.log(type);
    tweets.forEach(tweet => {
      if (tweet.classList.contains(type)){
        tweet.style.display = "block";
      } else {
        tweet.style.display = "none";
      }
    })
  })
})
// Sélectionnez le bouton de réinitialisation
const resetButton = document.getElementById("resetButton");

// Ajoutez un gestionnaire d'événements au bouton de réinitialisation
resetButton.addEventListener("click", () => {
  // Affichez tous les tweets en rétablissant leur style d'affichage initial
  tweets.forEach(tweet => {
    tweet.style.display = "block";
  });
});






const connect = document.querySelector('.modal-connect');

window.addEventListener('scroll', ()=>{
  if(window.scrollY > 500){
    console.log('scroll');
    connect.classList.add('scroll');
  }
});

const sport = document.getElementsByClassName("buttons-all sport");
const politique = document.getElementsByClassName("buttons-all politique");
const musique =document.getElementsByClassName("buttons-all musique");
const divertissement = document.getElementsByClassName("buttons-all divertissement");
const cinema = document.getElementsByClassName("buttons-all cinema");
const voyage = document.getElementsByClassName("buttons-all voyage");
const cuisine = document.getElementsByClassName("buttons-all cuisine");
const art = document.getElementsByClassName("buttons-all art");
const typeTweet = document.getElementById("nav_type");
var btn = document.getElementById("myBtn");
var poster = document.getElementById("poster");
var rechercher = document.getElementById("rechercher");
var deconnexion = document.getElementById("deconnexion");
var typeResponse = document.getElementsByClassName("type_response");

sport[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#E38181";
  btn.style.borderColor = "#E38181";
  btn.style.color ="white";
  typeTweet.style.backgroundColor = "#E38181";
  typeTweet.style.borderColor = "#E38181";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#E38181";
  poster.style.borderColor = "#E38181";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#E38181";
  deconnexion.style.borderColor = "#E38181";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#E38181";
  typeResponse.style.borderColor = "#E38181";
});

politique[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#AC9F9F";
  btn.style.borderColor = "#AC9F9F";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#AC9F9F";
  typeTweet.style.borderColor = "#AC9F9F";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#AC9F9F";
  poster.style.borderColor = "#AC9F9F";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#AC9F9F";
  deconnexion.style.borderColor = "#AC9F9F";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#AC9F9F";
  typeResponse.style.borderColor = "#AC9F9F";
});

musique[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#BE86B9";
  btn.style.borderColor = "#BE86B9";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#BE86B9";
  typeTweet.style.borderColor = "#BE86B9";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#BE86B9";
  poster.style.borderColor = "#BE86B9";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#BE86B9";
  deconnexion.style.borderColor = "#BE86B9";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#BE86B9";
  typeResponse.style.borderColor = "#BE86B9";
});

divertissement[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#CFD492";
  btn.style.borderColor = "#CFD492";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#CFD492";
  typeTweet.style.borderColor = "#CFD492";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#CFD492";
  poster.style.borderColor = "#CFD492";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#CFD492";
  deconnexion.style.borderColor = "#CFD492";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#CFD492";
  typeResponse.style.borderColor = "#CFD492";
});

cinema[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#383638";
  btn.style.borderColor = "#383638";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#383638";
  typeTweet.style.borderColor = "#383638";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#383638";
  poster.style.borderColor = "#383638";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#383638";
  deconnexion.style.borderColor = "#383638";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#383638";
  typeResponse.style.borderColor = "#383638";
});

voyage[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#99D89C";
  btn.style.borderColor = "#99D89C";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#99D89C";
  typeTweet.style.borderColor = "#99D89C";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#99D89C";
  poster.style.borderColor = "#99D89C";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#99D89C";
  deconnexion.style.borderColor = "#99D89C";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#99D89C";
  typeResponse.style.borderColor = "#99D89C";
});

cuisine[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#999FD4";
  btn.style.borderColor = "#999FD4";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#999FD4";
  typeTweet.style.borderColor = "#999FD4";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#999FD4";
  poster.style.borderColor = "#999FD4";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#999FD4";
  deconnexion.style.borderColor = "#999FD4";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#999FD4";
  typeResponse.style.borderColor = "#999FD4";
});

art[0].addEventListener("click", function() {
  btn.style.backgroundColor = "#DEACE2";
  btn.style.borderColor = "#DEACE2";
  btn.style.color = "white";
  typeTweet.style.backgroundColor = "#DEACE2";
  typeTweet.style.borderColor = "#DEACE2";
  typeTweet.style.color = "white";
  poster.style.backgroundColor = "#DEACE2";
  poster.style.borderColor = "#DEACE2";
  poster.style.color = "white";
  deconnexion.style.backgroundColor = "#DEACE2";
  deconnexion.style.borderColor = "#DEACE2";
  deconnexion.style.color = "white";
  typeResponse.style.backgroundColor = "#DEACE2";
  typeResponse.style.borderColor = "#DEACE2";
});

resetButton.addEventListener("click", function() {
  btn.style.backgroundColor = "#edeec9";
  btn.style.borderColor = "#edeec9";
  btn.style.color ="black";
  typeTweet.style.backgroundColor = "#edeec9";
  typeTweet.style.borderColor = "#edeec9";
  typeTweet.style.color = "black";
  poster.style.backgroundColor = "#edeec9";
  poster.style.borderColor = "#edeec9";
  poster.style.color = "black";
  deconnexion.style.backgroundColor = "#edeec9";
  deconnexion.style.borderColor = "#edeec9";
  deconnexion.style.color = "black";
  typeResponse.style.backgroundColor = "#edeec9";
  typeResponse.style.borderColor = "#edeec9";
});


var modal = document.getElementById("myModal");

var span = document.getElementsByClassName("close")[0];

const navButton = document.querySelector('.nav-button');
const navBar = document.querySelector('.nav-bar');

navButton.addEventListener('click', function(){
  navBar.classList.toggle('active');
})

btn.onclick = function() {
  modal.style.display = "block";
  poster.style.display = "none";
}


span.onclick = function() {
  modal.style.display = "none";
  poster.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    poster.style.display = "block";
  }
}

var confirmModalDelete = document.getElementById("confirm-modal-delete");
var confirmDeleteTweet = document.getElementById("cancel-modal-tweet");


if (tweet_id) {
  confirmModalDelete.style.display = "block";
}

confirmDeleteTweet.onclick = function(){
  confirmModalDelete.style.display = "none";
}

