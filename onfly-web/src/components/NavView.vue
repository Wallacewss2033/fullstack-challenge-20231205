<template>
  <nav v-if="!isLoginPage">
    <router-link to="/home">Home</router-link>
  </nav>
</template>

<script>
export default {
  name: "NavView",
  data() {
    return {
      isLoginPage: false,
    };
  },
  watch: {
    $route(to) {
      this.isLoginPage = to.name === "login";
    },
  },
};
</script>
