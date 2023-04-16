
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
var typeResponse = document.getElementById("type_resp");

sport[0].addEventListener("click", function() {
  btn.style.backgroundColor = "red";
  btn.style.borderColor = "red";
  typeTweet.style.backgroundColor = "red";
  typeTweet.style.borderColor = "red";
  poster.style.backgroundColor = "red";
  poster.style.borderColor = "red";
  rechercher.style.backgroundColor = "red";
  rechercher.style.borderColor = "red";
  deconnexion.style.backgroundColor = "red";
  deconnexion.style.borderColor = "red";
  typeResponse.style.backgroundColor = "red";
  typeResponse.style.borderColor = "red";
});

politique[0].addEventListener("click", function() {
  btn.style.backgroundColor = "rgba(128, 128, 128, 0.8)";
  btn.style.borderColor = "rgba(128, 128, 128, 0.8)";
  typeTweet.style.backgroundColor = "rgba(128, 128, 128, 0.8)";
  typeTweet.style.borderColor = "rgba(128, 128, 128, 0.8)";
  poster.style.backgroundColor = "rgba(128, 128, 128, 0.8)";
  poster.style.borderColor = "rgba(128, 128, 128, 0.8)";
  rechercher.style.backgroundColor = "rgba(128, 128, 128, 0.8)";
  rechercher.style.borderColor = "rgba(128, 128, 128, 0.8)";
  deconnexion.style.backgroundColor = "rgba(128, 128, 128, 0.8)";
  deconnexion.style.borderColor = "rgba(128, 128, 128, 0.8)";
  typeResponse.style.backgroundColor = "rgba(128, 128, 128, 0.8)";
  typeResponse.style.borderColor = "rgba(128, 128, 128, 0.8)";
});

musique[0].addEventListener("click", function() {
  btn.style.backgroundColor = "rgba(138, 43, 226, 0.8)";
  btn.style.borderColor = "rgba(138, 43, 226, 0.8)";
  typeTweet.style.backgroundColor = "rgba(138, 43, 226, 0.8)";
  typeTweet.style.borderColor = "rgba(138, 43, 226, 0.8)";
  poster.style.backgroundColor = "rgba(138, 43, 226, 0.8)";
  poster.style.borderColor = "rgba(138, 43, 226, 0.8)";
  rechercher.style.backgroundColor = "rgba(138, 43, 226, 0.8)";
  rechercher.style.borderColor = "rgba(138, 43, 226, 0.8)";
  deconnexion.style.backgroundColor = "rgba(138, 43, 226, 0.8)";
  deconnexion.style.borderColor = "rgba(138, 43, 226, 0.8)";
  typeResponse.style.backgroundColor = "rgba(138, 43, 226, 0.8)";
  typeResponse.style.borderColor = "rgba(138, 43, 226, 0.8)";
});

divertissement[0].addEventListener("click", function() {
  btn.style.backgroundColor = "rgba(196, 196, 89, 0.8)";
  btn.style.borderColor = "rgba(196, 196, 89, 0.8)";
  typeTweet.style.backgroundColor = "rgba(196, 196, 89, 0.8)";
  typeTweet.style.borderColor = "rgba(196, 196, 89, 0.8)";
  poster.style.backgroundColor = "rgba(196, 196, 89, 0.8)";
  poster.style.borderColor = "rgba(196, 196, 89, 0.8)";
  rechercher.style.backgroundColor = "rgba(196, 196, 89, 0.8)";
  rechercher.style.borderColor = "rgba(196, 196, 89, 0.8)";
  deconnexion.style.backgroundColor = "rgba(196, 196, 89, 0.8)";
  deconnexion.style.borderColor = "rgba(196, 196, 89, 0.8)";
  typeResponse.style.backgroundColor = "rgba(196, 196, 89, 0.8)";
  typeResponse.style.borderColor = "rgba(196, 196, 89, 0.8)";
});

cinema[0].addEventListener("click", function() {
  btn.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  btn.style.borderColor = "rgba(0, 0, 0, 0.8)";
  typeTweet.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  typeTweet.style.borderColor = "rgba(0, 0, 0, 0.8)";
  poster.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  poster.style.borderColor = "rgba(0, 0, 0, 0.8)";
  rechercher.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  rechercher.style.borderColor = "rgba(0, 0, 0, 0.8)";
  deconnexion.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  deconnexion.style.borderColor = "rgba(0, 0, 0, 0.8)";
  typeResponse.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
  typeResponse.style.borderColor = "rgba(0, 0, 0, 0.8)";
});

voyage[0].addEventListener("click", function() {
  btn.style.backgroundColor = "rgba(132, 190, 43, 0.8)";
  btn.style.borderColor = "rgba(132, 190, 43, 0.8)";
  typeTweet.style.backgroundColor = "rgba(132, 190, 43, 0.8)";
  typeTweet.style.borderColor = "rgba(132, 190, 43, 0.8)";
  poster.style.backgroundColor = "rgba(132, 190, 43, 0.8)";
  poster.style.borderColor = "rgba(132, 190, 43, 0.8)";
  rechercher.style.backgroundColor = "rgba(132, 190, 43, 0.8)";
  rechercher.style.borderColor = "rgba(132, 190, 43, 0.8)";
  deconnexion.style.backgroundColor = "rgba(132, 190, 43, 0.8)";
  deconnexion.style.borderColor = "rgba(132, 190, 43, 0.8)";
  typeResponse.style.backgroundColor = "rgba(132, 190, 43, 0.8)";
  typeResponse.style.borderColor = "rgba(132, 190, 43, 0.8)";
});

cuisine[0].addEventListener("click", function() {
  btn.style.backgroundColor = "rgba(38, 0, 255, 0.8)";
  btn.style.borderColor = "rgba(38, 0, 255, 0.8)";
  typeTweet.style.backgroundColor = "rgba(38, 0, 255, 0.8)";
  typeTweet.style.borderColor = "rgba(38, 0, 255, 0.8)";
  poster.style.backgroundColor = "rgba(38, 0, 255, 0.8)";
  poster.style.borderColor = "rgba(38, 0, 255, 0.8)";
  rechercher.style.backgroundColor = "rgba(38, 0, 255, 0.8)";
  rechercher.style.borderColor = "rgba(38, 0, 255, 0.8)";
  deconnexion.style.backgroundColor = "rgba(38, 0, 255, 0.8)";
  deconnexion.style.borderColor = "rgba(38, 0, 255, 0.8)";
  typeResponse.style.backgroundColor = "rgba(38, 0, 255, 0.8)";
  typeResponse.style.borderColor = "rgba(38, 0, 255, 0.8)";
});

art[0].addEventListener("click", function() {
  btn.style.backgroundColor = "rgba(255, 192, 203, 0.9)";
  btn.style.borderColor = "rgba(255, 192, 203, 0.9)";
  typeTweet.style.backgroundColor = "rgba(255, 192, 203, 0.9)";
  typeTweet.style.borderColor = "rgba(255, 192, 203, 0.9)";
  poster.style.backgroundColor = "rgba(255, 192, 203, 0.9)";
  poster.style.borderColor = "rgba(255, 192, 203, 0.9)";
  rechercher.style.backgroundColor = "rgba(255, 192, 203, 0.9)";
  rechercher.style.borderColor = "rgba(255, 192, 203, 0.9)";
  deconnexion.style.backgroundColor = "rgba(255, 192, 203, 0.9)";
  deconnexion.style.borderColor = "rgba(255, 192, 203, 0.9)";
  typeResponse.style.backgroundColor = "rgba(255, 192, 203, 0.9)";
  typeResponse.style.borderColor = "rgba(255, 192, 203, 0.9)";
});

var modal = document.getElementById("myModal");

var span = document.getElementsByClassName("close")[0];



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


const supprimerBtn = document.getElementById('supp');
const modalDelete = document.getElementById('confirm-modal-delete');
const cancelDeleteBtn = document.getElementById('cancel-modal-tweet');

supprimerBtn.addEventListener('click', (e) => {
  e.preventDefault();
  modalDelete.style.display = "block";
});

cancelDeleteBtn.addEventListener('click', () => {
  modalDelete.style.display = "none";
});
var confirmModalDelete = document.getElementById("confirm-modal-delete");
var confirmDeleteTweet = document.getElementById("cancel-modal-tweet");


if (tweet_id) {
  confirmModalDelete.style.display = "block";
}

confirmDeleteTweet.onclick = function(){
  confirmModalDelete.style.display = "none";
}



