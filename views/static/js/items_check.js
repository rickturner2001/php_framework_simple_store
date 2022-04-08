"use strict";
const checkboxes = document.getElementsByClassName("checkbox");
const cards = document.getElementsByClassName("card");
for (let i = 0; i < cards.length; ++i) {
    cards[i].addEventListener("click", () => {
        if (checkboxes[i].checked) {
            checkboxes[i].checked = false;
        }
        else {
            checkboxes[i].checked = true;
        }
        cards[i].classList.toggle("card-hidden-border");
    });
}
const dimensions = document.getElementsByClassName("Dimensions");
const sizes = document.getElementsByClassName("Size");
const weights = document.getElementsByClassName("Weight");
for (let i = 0; i < dimensions.length; ++i) {
    const beginningText = dimensions[i].innerText;
    dimensions[i].innerText = beginningText + " (HxWxL)";
}
for (let i = 0; i < sizes.length; ++i) {
    const beginningText = sizes[i].innerText;
    sizes[i].innerText = beginningText + " (MB)";
}
for (let i = 0; i < weights.length; ++i) {
    const beginningText = weights[i].innerText;
    weights[i].innerText = beginningText + " (Kg)";
}
