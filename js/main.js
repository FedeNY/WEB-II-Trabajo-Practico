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
atr.addEventListener("mouseleave", hiddenCategoryNav);

function cargarAction() {
  const form = document.getElementById("categoryForm");

  const ruta = document.getElementById("category");

  form.action = "<?php echo BASE_URL ?>/phone/" + ruta;
}
