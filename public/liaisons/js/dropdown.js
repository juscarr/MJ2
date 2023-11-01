// Dropdown de categorie

const CategorieSelect = document.getElementById("categorie-select");
const CategorieBtn = document.getElementById("categorie-button");
const CategorieDropdown = document.getElementById("categorie-list")

// add a click event to select button
CategorieBtn.addEventListener("click", () => {
    // add/remove active class on the container element
    CategorieSelect.classList.toggle("active");
    CategorieDropdown.classList.toggle("display-none")

    // update the aria-expanded attribute based on the current state
    CategorieBtn.setAttribute(
        "aria-expanded",
        CategorieBtn.getAttribute("aria-expanded") === "true" ? "false" : "true"
    );

});

const CategorieSelectedValue = document.querySelector("#categorie-select .selected-value");
const CategorieOptionsList = document.querySelectorAll("#categorie-select .select-dropdown li");


CategorieOptionsList.forEach((option) => {
    function handler(e) {

        if (e.type === "click") {
            CategorieSelectedValue.textContent = this.children[1].textContent;
        }
        //Accessible pour la navigation clavier

        if (e.key === "Enter") {
            CategorieSelectedValue.textContent = this.textContent;
        }
    }

    option.addEventListener("keyup", handler);
    option.addEventListener("click", handler);
});

// Dropdown de tri


const TriSelect = document.getElementById("tri-select");
const TriBtn = document.getElementById("tri-button");
const TriDropdown = document.getElementById("tri-list")

// add a click event to select button
TriBtn.addEventListener("click", () => {
    // add/remove active class on the container element
    TriSelect.classList.toggle("active");
    TriDropdown.classList.toggle("display-none")

    // update the aria-expanded attribute based on the current state
    TriBtn.setAttribute(
        "aria-expanded",
        TriBtn.getAttribute("aria-expanded") === "true" ? "false" : "true"
    );

});


const TriSelectedValue = document.querySelector("#tri-select .selected-value");
const TriOptionsList = document.querySelectorAll("#tri-select .select-dropdown li");


TriOptionsList.forEach((option) => {
    function handler(e) {

        if (e.type === "click") {
            TriSelectedValue.textContent = this.children[1].textContent;
        }
        //Accessible pour la navigation clavier

        if (e.key === "Enter") {
            TriSelectedValue.textContent = this.textContent;
        }
    }

    option.addEventListener("keyup", handler);
    option.addEventListener("click", handler);
});

