
//Nav Start
/*
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}
  
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}*/

//Nav End

//Account Start
const container = document.getElementById('container');
const regBtn = document.getElementById('regist');
const loginBtn = document.getElementById('login');

regBtn.addEventListener('click', ()=>{
  container.classList.add('active');
});

loginBtn.addEventListener('click', ()=>{
  container.classList.remove('active');
});
//Account End

