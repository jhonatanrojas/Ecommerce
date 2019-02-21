<template>
    <section>

        <div class="row">
            <product-card v-bind:product="product" v-for="product in products" >


            </product-card>
             

        </div>
     
    </section>
</template>

<script>
    export default {
        data() {

            return{
                name:"PRODUCTOS",
                products:[]
                ,
                endpoint:"productos"
            }
        }, 
    created(){

        this.  fetchProducts();

    },
            methods:{

                fetchProducts(){
                
                    axios.get(this.endpoint).then((response)=>{
                    console.log(response.data.data)
                    this.products=response.data.data;
                    });
                }

            }
    }
</script>

