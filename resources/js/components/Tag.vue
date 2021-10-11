<template>
  <section :class="{'d-none': loading}">
    <div class="container pt-5 pb-2">
    <div class="row">
      <h2 class="mt-3 mb-4">Tipologie di Ristoranti</h2>
        <ul class="list-unstyled d-flex flex-wrap">
          <li>
            <router-link class="nav-link rest-tag fw-bold" :to="{ name: 'home' }">{{ 'Tutti' }}</router-link>
          </li>
          <li v-for="(tag, index) in tags" :key="index">
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
  section{
    background-color: rgb(255, 214, 112);
    li{
      transition: 0.3s;
      transform: perspective(200px) rotateX(25deg);

      &:hover{
        transform: perspective(100px) rotateX(0deg);
      }
    }

    .rest-tag{
      background: rgb(226,225,206);
      background: linear-gradient(0deg, rgba(226,225,206,1) 0%, rgba(215,84,3,1) 5%);
      margin: 0 12px;
      border-radius: 10px;
      color: white;
    }
  }
</style>