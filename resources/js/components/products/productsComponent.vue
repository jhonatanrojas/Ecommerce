<template>
    <section>

        <transition-group
        tag="div"
        :css="false"
        name="fadeIn"
        @enter="enter" 
        @before-enter="beforeEnter"
        @leave="leave"
         class="row ">
            <product-card :data-index="index" v-bind:product="product" v-for="(product,index) in products" :key="product.id" >


            </product-card>
             

        </transition-group >
     
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
                },
                //animacion
                beforeEnter(el){
                 el.style.opacity=0;   
                 el.style.transform="scale(0)";
                 el.style.transition ="all 0.2s cubic-bezier(0.4,0.0,0.2,1)"

                }, 
                enter(el){
                const delay =200* el.dataset.index;
                
                setTimeout(()=>{
                el.style.opacity=1;   
                el.style.transform="scale(1)";

                },delay)
             
                },
                leave(el){
                  setTimeout(()=>{
               el.style.opacity=0;   
                 el.style.transform="scale(0)";

                },delay)
                }

            }
    }
</script>

