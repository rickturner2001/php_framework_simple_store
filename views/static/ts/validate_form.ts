const furnitureInputsContainer = document.querySelector(".furniture-inputs") as HTMLDivElement;
const originalAttributeField = document.getElementById("attribute") as HTMLInputElement
const originalAttributeFieldContainer = originalAttributeField.parentElement! as HTMLDivElement
const outerAttributeFieldContainer = originalAttributeFieldContainer.parentElement as HTMLDivElement


outerAttributeFieldContainer.style.display = 'none'
 


const validateForm = (): boolean => {
  const selectedType = document.getElementById("productType") as HTMLSelectElement;

  if (selectedType.value !== "furniture") {
    outerAttributeFieldContainer.remove()
    return true;
  }

  createAttributeField();
  return true;
};

const createAttributeField = (): void => {  

  setValueAndNullifyInputs();
};

const getAttributeField = (): string => {
  return originalAttributeField.value;
};

const setAttributeValue = (newValue: string) => {
    (document.querySelector("#attribute")as HTMLInputElement).value = `${newValue}`
};

const setValueAndNullifyInputs = (): void => {
  const widthInput = document.getElementById("width") as HTMLInputElement;
  const heightInput = document.getElementById("height") as HTMLInputElement;
  const lengthInput = document.getElementById("length") as HTMLInputElement;


  let newValue: string = "";
  newValue += getValueAndRemoveAttributesOnInput(widthInput) + "x";
  newValue += getValueAndRemoveAttributesOnInput(heightInput) + "x";
  newValue += getValueAndRemoveAttributesOnInput(lengthInput);
  setAttributeValue(newValue);
};

const getValueAndRemoveAttributesOnInput = (
  inputField: HTMLInputElement
): string => {
  inputField.removeAttribute("name");
  return inputField.value;
};


// PLACEHOLDERS
const skuInput = document.getElementById("sku") as HTMLInputElement
const nameInput = document.getElementById("name") as HTMLInputElement
const priceInput = document.getElementById("price") as HTMLInputElement

skuInput.setAttribute("placeholder", ("123456789"))
priceInput.setAttribute("placeholder", ("99"))
nameInput.setAttribute("placeholder", ("The Great Gatsby"))

// Labels

const skuLabel = document.getElementById("sku-label") as HTMLLabelElement
const nameLabel = document.getElementById("name-label") as HTMLLabelElement
const priceLabel = document.getElementById("price-label") as HTMLLabelElement


skuLabel.innerText = "SKU (9 characters)"
priceLabel.innerText = "Price (USD)"


// Reload everything:

