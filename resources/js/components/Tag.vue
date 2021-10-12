<template>
  <section :class="{'d-none': loading}">
    <div class="container pt-5 pb-2">
    <div class="row">
      <h2 class="title mt-3 mb-4">Tipologie di Ristoranti</h2>
        <ul class="list-unstyled d-flex flex-wrap">
          <li class="my-2">
            <router-link class="nav-link rest-tag fw-bold" :to="{ name: 'home' }">{{ 'Tutti' }}</router-link>
          </li>
          <li class="my-2" v-for="(tag, index) in tags" :key="index">
            <router-link class="nav-link rest-tag fw-bold" :to="{name: 'category', params:{ slug: index }}">{{ tag }}</router-link>
          </li>
        </ul>
      </div>
  </div>
  </section>
</template>

<script>
export default {
  name: "Tag",
  data(){
    return {
      url: '/api/category/fast-food/?tags=show',
      tags: [],
      loading: true
    }
  },
  mounted(){
    this.getTags();
  },
  methods: {
    async getTags(){
      this.loading = true;
      let response = await axios(this.url);
      this.tags = response.data.results;
      this.loading = false;
    }
  }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/_variables.scss';

  section{
    background-color: rgb(255, 214, 112);

    .title{
      color: $blue;
    }

    li{
      font-size: 16px;
      transition: 0.5s;

      &:hover{
        transform: translateY(-15px)
      }
    }

    .rest-tag{
      background-color: $blue;
      margin: 0 12px;
      border-radius: 15px;
      color: white;
    }
  }
</style>