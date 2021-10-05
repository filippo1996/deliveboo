<template>
  <div>
    Stai cercando la categoria {{ slug }}
  </div>
</template>

<script>
export default {
  name: 'Category',
  props: {
    slug: String
  }
}
</script>

<style>

</style>