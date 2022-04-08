const app = Vue.createApp({
    data(){
        return{
            sku: null,
            name: null,
            price: null,
            type: 'book',
            attribute: null,
            width: null,
            height: null,
            length: null,
            
            priceValueError: false,
            widthValueError: false,
            lengthValueError: false,
            heightValueError: false,
            skuNotUniqueError: false,
            skuLengthError: false,


            attributeErrorNonNumeric: false,
            attributeErrorFurniture: false,

        }
    },

   

    methods:{
        getData(){
            console.log("SKU: " + this.sku)
            console.log("Name: " + this.name)
            console.log("Price: " + this.price)
            console.log("Type: " + this.type)
            console.log("Attribute: " + this.attribute)
            console.log(skuList)
        },
        getChoice(event){
            this.type = event.target.value
        },
        validateSKU(event){
            if (event.target.value.length === 9){
                this.skuLengthError = false
                if(!skuList.includes(event.target.value)){
                    this.sku = event.target.value
                    this.skuNotUniqueError = false
                }else{
                    this.skuNotUniqueError = true

                }
            }else{
                this.skuLengthError = true
            }
        },
        validateName(event){
            this.name = event.target.value
        },
        validatePrice(event){
            if(isNaN(event.target.value)){
                this.priceValueError = true
            }else{
                this.priceValueError = false
                this.price = event.target.value
            }
        },



        validateAttribute(event){
            switch (this.type){
                case "book" || 'dvd':
                    if (isNaN(event.target.value)){
                        this.attributeErrorNonNumeric = true
                        console.log("this is true")
                    }else{
                        this.attributeErrorNonNumeric = false
                        this.attribute = event.target.value
                    }
                }
        },
        
        validateWidth(event){
            if (isNaN(event.target.value)){
                this.widthValueError = true
            }else{
                this.widthValueError = false
                this.width = event.target.value
                if (this.height && this.width && this.length){
                    this.attribute = `${this.height}x${this.length}x${this.width}`
                }
            }
        },
        
        validateHeight(event){
            if (isNaN(event.target.value)){
                this.widthValueError = true
            }else{
                this.widthValueError = false
                this.height = event.target.value
                if (this.height && this.width && this.length){
                    this.attribute = `${this.height}x${this.length}x${this.width}`
                }
            }
        },
        
        validateLength(event){
            if (isNaN(event.target.value)){
                this.widthValueError = true
            }else{
                this.lengthValueError = false
                this.length = event.target.value
                if (this.height && this.width && this.length){
                    this.attribute = `${this.height}x${this.length}x${this.width}`
                }
            }
        }
        
    }
})
app.mount("#app")