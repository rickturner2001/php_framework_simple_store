"use strict";
const select = document.getElementById("attribute")
const selectContainer = select.parentElement
selectContainer.classList.add("hidden")
// const form = document.getElementById("product_form");
// const inputs = document.getElementsByTagName("input");
// const checkBtn = document.querySelector(".check-btn");
// class Form {
//     constructor() {
//         this.sku = "";
//         this.name = "";
//         this.price = 0;
//         this.type = "";
//         this.attribute = "";
//         this.form = form;
//         // abstract validateAttribute(this: Item): void
//         // abstract validateStringField(this:Item): void
//         // abstract validateNumberField(this:Item): void
//         // abstract generateAttributeFormField(this:Item): void
//         //  hideAttributeField(this:Item): void{
//         //   const last = this.form.children.length - 1
//         //   console.log(this.form.children[last])
//         //  }
//     }
//     setAttributes() {
//         for (let i = 0; i < inputs.length; ++i) {
//             inputs[i].addEventListener("input", (event) => {
//                 if (!event) {
//                 }
//                 switch (i) {
//                     case 0:
//                         this.sku = event.target.value;
//                     case 1:
//                         this.name = event.target.value;
//                     case 2:
//                         Form.checkNumericPrice(event.target.value);
//                 }
//             });
//         }
//     }
//     removeAttributeField() { }
//     static checkNumericPrice(value) {
//         if (isNaN(Number(value))) {
//             throw new Error("Price Must be numeric");
//         }
//         return Number(value);
//     }
//     activeCheck(form) {
//         checkBtn.addEventListener("click", () => {
//             console.log(form);
//         });
//     }
// }

// const myForm = new Form();
// myForm.setAttributes();
// myForm.activeCheck();
