const app = Vue.createApp({
    data(){
        return{
            sku: null,
            name: null,
            price: null,
            type: 'book',
            attribute: null
        }
    },
    methods:{
        getData(){
            console.log("SKU: " + this.sku)
            console.log("Name: " + this.name)
            console.log("Price: " + this.price)
            console.log("Type: " + this.type)
            console.log("Attribute: " + this.attribute)
        },
        getChoice(event){
            this.type = event.target.value
        },
        validateSKU(event){
            this.sku = event.target.value
        },
        validateName(event){
            this.name = event.target.value
        },
        validatePrice(event){
            this.name = event.value
        },
        validateAttribute(event){
            this.attribute = event.target.value
        }
        
    }
})
app.mount("#app")