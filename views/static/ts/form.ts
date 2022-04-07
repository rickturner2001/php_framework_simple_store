const form = document.getElementById("product_form") as HTMLFormElement;
const inputs = document.getElementsByTagName(
  "input"
) as HTMLCollectionOf<HTMLInputElement>;

const checkBtn = document.querySelector(".check-btn") as HTMLButtonElement



class Form {
  sku: string = "";
  name: string = "";
  price: number = 0;
  type: string = "";
  attribute: string = "";
  form: HTMLFormElement = form;
  
  setAttributes(this: Form) {
    for (let i = 0; i < inputs.length; ++i) {
      inputs[i].addEventListener("input", (event: any) => {
        if (!event) {
        }
        switch (i) {
          case 0:
            this.sku = event.target.value;
            
            case 1:
              this.name = event.target.value;
              
              case 2:
                Form.checkNumericPrice(event.target.value);
                
              }
            });
          }
        }


  removeAttributeField(this: Form) {}

  static checkNumericPrice(value: string | number) {
    if (isNaN(Number(value))) {
      throw new Error("Price Must be numeric")
    }
    return Number(value)
  }

  activeCheck(form: Form){
    checkBtn.addEventListener("click", ()=>{
      console.log(form)
    })
  }
  // abstract validateAttribute(this: Item): void
  // abstract validateStringField(this:Item): void
  // abstract validateNumberField(this:Item): void
  // abstract generateAttributeFormField(this:Item): void

  //  hideAttributeField(this:Item): void{
  //   const last = this.form.children.length - 1
  //   console.log(this.form.children[last])
  //  }
}

// class Furniture extends Item{
//     validateAttribute(this: Item): void {

//     }
//     validateNumberField(this: Item): void {

//     }
//     validateStringField(this: Item): void {

//     }
//     generateAttributeFormField(this: Item): void {

//     }
// }

// class Book extends Item{
//     validateAttribute(this: Item): void {

//     }
//     validateNumberField(this: Item): void {

//     }
//     validateStringField(this: Item): void {

//     }
//     generateAttributeFormField(this: Item): void {

//     }
// }

// class Dvd extends Item{
//     validateAttribute(this: Item): void {

//     }
//     validateNumberField(this: Item): void {

//     }
//     validateStringField(this: Item): void {

//     }
//     generateAttributeFormField(this: Item): void {

//     }
// }

const myForm = new Form();
myForm.setAttributes();
myForm.activeCheck()