let smallNav = document.getElementById("small-nav");

window.onscroll = function () {
  if(document.body.scrollTop>=500){
    smallNav.classList.remove("hide-nav");
  }
}