<template>
  <section>
    <div v-if="!loading">
      <div class="container py-5">
        <!-- category -->
        <Tag/>
        <!-- end category -->
        <div class="row justify-content">
          <Card :items="restaurants"/>
        </div>
      </div>
      <div>
        <Affiliati />
      </div>
      <div>
        <ContactUs />
      </div>
    </div>
    <div v-else class="text-center pb-4">
      <div class="pt-5 fw-bold buffering">Caricamento...</div>
      <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </section>
</template>

<script>
import Tag from '../components/Tag.vue';
import Card from '../components/Card.vue';
import Affiliati from '../partials/Affiliati.vue';
import ContactUs from '../partials/ContactUs.vue';

export default {
  name: "Main",
  components: {
    Tag,
    Card,
    Affiliati,
    ContactUs,
  },
  data(){
    return{
      apiUrl: '/api/restaurants',
      restaurants: [],
      loading: true,
    }
  },
  created(){
    this.getRestaurant();
  },
  methods: {
    getRestaurant(){
      axios.get(this.apiUrl)
      .then(resp => {
        this.restaurants= resp.data.results;
        this.loading = false;
      })
    }
  }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

section{
  background-color: $yellow;
}

.buffering{
  color: $blue;
}

.lds-ellipsis {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: $blue;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}


</style>