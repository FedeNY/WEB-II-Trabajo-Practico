
// Funcion para mostrar y ocultar algo

function showCategory(child) {
  child.classList.remove("hidden");
  child.classList.add("show");
}

function hiddenCategory(child) {
  child.classList.remove("show");
  child.classList.add("hidden");
}

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
