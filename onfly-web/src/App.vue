<template>
  <NavView />
  <div :class="{ 'box-main': !isLoginPage }">
    <div :class="{ 'box shadow-sm': !isLoginPage }">
      <router-view />
    </div>
  </div>
</template>
<script>
import NavView from "./components/NavView.vue";

export default {
  components: {
    NavView,
  },
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
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #68f5ae;
}

.box-main {
  display: flex;
  align-items: center;
  justify-content: center;
}

.box {
  background-color: white;
  width: 80%;
  min-height: 750px;
  border-radius: 10px;
  padding: 35px;
}
</style>
