<template>
  <div>
    Stai mostrando {{ word }} quantità {{ items.length }}
  </div>
</template>

<script>
export default {
  props:{
    word: String
  },
  data(){
    return {
      url: '/api/products/?search=',
      items: []
    }
  },
  mounted(){
    this.searchProducts();
  },
  methods: {
    async searchProducts(){
      if(!this.word){
        this.items = [];
        return null;
      }
      let response = await axios(this.url + this.word);
      this.items = response.data;
    }
  },
  watch: { 
   word: function(){
     this.searchProducts();
   }
  }
}
</script>

<style>

</style>