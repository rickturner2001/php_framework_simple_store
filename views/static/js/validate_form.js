"use strict";
const furnitureInputsContainer = document.querySelector(".furniture-inputs");
const originalAttributeField = document.getElementById("attribute");
const originalAttributeFieldContainer = originalAttributeField.parentElement;
const outerAttributeFieldContainer = originalAttributeFieldContainer.parentElement;
outerAttributeFieldContainer.style.display = 'none';
const validateForm = () => {
    const selectedType = document.getElementById("productType");
    if (selectedType.value !== "furniture") {
        outerAttributeFieldContainer.remove();
        return true;
    }
    createAttributeField();
    return true;
};
const createAttributeField = () => {
    setValueAndNullifyInputs();
};
const getAttributeField = () => {
    return originalAttributeField.value;
};
const setAttributeValue = (newValue) => {
    document.querySelector("#attribute").value = `${newValue}`;
};
const setValueAndNullifyInputs = () => {
    const widthInput = document.getElementById("width");
    const heightInput = document.getElementById("height");
    const lengthInput = document.getElementById("length");
    let newValue = "";
    newValue += getValueAndRemoveAttributesOnInput(widthInput) + "x";
    newValue += getValueAndRemoveAttributesOnInput(heightInput) + "x";
    newValue += getValueAndRemoveAttributesOnInput(lengthInput);
    setAttributeValue(newValue);
};
const getValueAndRemoveAttributesOnInput = (inputField) => {
    inputField.removeAttribute("name");
    return inputField.value;
};
// PLACEHOLDERS
const skuInput = document.getElementById("sku");
const nameInput = document.getElementById("name");
const priceInput = document.getElementById("price");
skuInput.setAttribute("placeholder", ("123456789"));
priceInput.setAttribute("placeholder", ("99"));
nameInput.setAttribute("placeholder", ("The Great Gatsby"));
// Labels
const skuLabel = document.getElementById("sku-label");
const nameLabel = document.getElementById("name-label");
const priceLabel = document.getElementById("price-label");
skuLabel.innerText = "SKU (9 characters)";
priceLabel.innerText = "Price (USD)";
// Reload everything:
