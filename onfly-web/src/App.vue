<template>
  <NavView />
  <div class="box-main">
    <div class="box shadow-sm">
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
