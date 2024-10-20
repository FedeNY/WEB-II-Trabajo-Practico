// Funcion adaptar la url de category

const filterCategory = document.querySelectorAll(".category-radio");
const formCategory = document.querySelector("#category-form");

filterCategory.forEach((element) => {
  element.addEventListener("click", function (e) {
    const BASE_URL = formCategory.action;
    const selectedValue = e.target.value;
    console.log(BASE_URL);
    formCategory.action =
      selectedValue !== "all" ? `${BASE_URL}/${selectedValue}` : `${BASE_URL}`;
  });
});

// Funcion para mostrar y ocultar algo

function showCategory(child) {
  child.classList.remove("hidden");
  child.classList.add("show");
}

function hiddenCategory(child) {
  child.classList.remove("show");
  child.classList.add("hidden");
}

// Nav - desplegar menu marcas

const categoryContainer = document.querySelector("#brand-container");
const category = document.querySelector("#nav-category");

category.addEventListener("mouseenter", () => {
  showCategory(categoryContainer);
});
categoryContainer.addEventListener("mouseleave", () => {
  hiddenCategory(categoryContainer);
});

// Admin - agregar categoria

const btnAddCategory = document.querySelector(".add-category");
const btnCancelCategory = document.querySelector(".cancel-category");
const formAddCategory = document.querySelector(".form-add-category");

if (btnAddCategory) {
  btnAddCategory.addEventListener("click", () => {
    showCategory(formAddCategory);
  });
  btnCancelCategory.addEventListener("click", () => {
    hiddenCategory(formAddCategory);
  });
}

// Admin - borrar categoria

const deleteCategory = document.querySelector(".delete-category");
const cancelCategory = document.querySelector(".cancel-delete-category");
const formDeleteCategory = document.querySelector(".form-delete-category");

if (deleteCategory) {
  deleteCategory.addEventListener("click", () => {
    showCategory(formDeleteCategory);
  });
  cancelCategory.addEventListener("click", () => {
    hiddenCategory(formDeleteCategory);
  });
}
