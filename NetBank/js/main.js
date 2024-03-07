var modal = document.getElementById("szamlaDelete");
var btn = document.getElementById("deleteSzBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var moneyModal = document.getElementById("addMondeyModal");
var moneyBtn = document.getElementById("addMoneyBtn");
var moneySpan = document.getElementsByClassName("close")[1];
moneyBtn.onclick = function() {
  moneyModal.style.display = "block";
}
moneySpan.onclick = function() {
  moneyModal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    moneyModal.style.display = "none";
  }
}

