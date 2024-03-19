//Számla törlése
var szamlamodal = document.getElementById("szamlaDeleteModal");
var szamlabtn = document.getElementById("deleteSzBtn");
var szamlaspan = document.getElementsByClassName("szclose")[0];
szamlabtn.onclick = function() {
  szamlamodal.style.display = "block";
}
szamlaspan.onclick = function() {
  szamlamodal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == szamlamodal) {
    szamlamodal.style.display = "none";
  }
}

//Pénz hozzáadaása
var moneyModal = document.getElementById("addMondeyModal");
var moneyBtn = document.getElementById("addMoneyBtn");
var moneySpan = document.getElementsByClassName("mclose")[0];
moneyBtn.onclick = function() {
  moneyModal.style.display = "block";
}
moneySpan.onclick = function() {
  moneyModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == moneyModal) {
    moneyModal.style.display = "none";
  }
}

//Kártya törlése
var cardModal = document.getElementById("kartyaDeleteModal");
var cardBtn = document.getElementById("deleteKBtn");
var cardSpan = document.getElementsByClassName("kclose")[0];
cardBtn.onclick = function() {
  cardModal.style.display = "block";
}
cardSpan.onclick = function() {
  cardModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == cardModal) {
    cardModal.style.display = "none";
  }
}

