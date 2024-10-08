let show = document.querySelector("#fede");
let atr = document.querySelector("#atr");

function showCategoryNav() {
  // show.classList.add("show");
  show.classList.remove("hidden");
}

function hiddenCategoryNav() {
  show.classList.add("hidden");
}

atr.addEventListener("mouseenter", showCategoryNav);
show.addEventListener("mouseleave", hiddenCategoryNav);


