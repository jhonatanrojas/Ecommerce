<template >

      <div class="card col-xs-12  col-sm-10  col-md-3  marginl " >

                        <header class="padding text-center bg-primary">
    
    
                            </header>
                        <div class="card-body">
                         <a href="">  <h2 class="card-title"> {{ product.title }}</h2></a>
                          <h4 class="card-subtitle"> {{ product.humanPrice }}</h4>
            
                          <p class="card-subtitle"> {{ product.description }}</p>
                        </div>
      </div> 
  
</template>

<script>
    export default {
     props:{
            product:{
                    type: Object
                  }
            }
 
    }
</script>
