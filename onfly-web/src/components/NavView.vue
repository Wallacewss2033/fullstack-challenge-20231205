<template>
  <nav v-if="!isLoginPage" class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Onfly</a>
      <div class="d-flex justify-content-end mx-5">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDarkDropdown"
          aria-controls="navbarNavDarkDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-3" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <button
                class="btn btn-dark dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ user }}
              </button>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" @click="logout">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import cookies from "../service/cookies";
import endPoints from "../service/endPoints";
export default {
  name: "NavView",
  data() {
    return {
      isLoginPage: false,
      user: cookies.get("user").split(" ")[0],
    };
  },
  watch: {
    $route(to) {
      this.isLoginPage = to.name === "login";
    },
  },
  methods: {
    logout() {
      endPoints
        .post(`/logout`, "", true)
        .then(() => {
          cookies.remove("name");
          cookies.remove("auth-token");
          this.$router.push("/");
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>
