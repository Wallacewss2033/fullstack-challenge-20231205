<template>
  <main class="form-signin w-100 m-auto">
    <form @submit.stop.prevent="submit">
      <h1 class="h3 mb-3 fw-normal">Onfly Despesas</h1>

      <div :key="message" v-for="message in messages">
        <notify-view v-show="!!message" :message="message" :typeNotify="messageType" />
      </div>

      <div class="form-floating">
        <input
          id="validationCustom01"
          v-model="email"
          type="email"
          class="form-control"
          placeholder="name@example.com"
          required
        />
        <label for="floatingInput">Email</label>
      </div>

      <div class="form-floating">
        <input
          v-model="password"
          type="password"
          class="form-control"
          id="floatingPassword"
          placeholder="Password"
        />
        <label for="floatingPassword">Password</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
    </form>
  </main>
</template>

<script>
import NotifyView from "../components/NotifyView.vue";
import cookies from "../service/cookies";
import endPoints from "../service/endPoints.js";
export default {
  name: "LoginPage",
  components: {
    NotifyView,
  },
  data() {
    return {
      email: null,
      password: null,
      messages: [],
      messageType: "success",
    };
  },
  mounted() {
    endPoints
      .get("/check-token", "", true)
      .then(() => {
        this.$router.push("/home");
      })
      .catch(() => {});
  },
  methods: {
    submit() {
      this.messages = [];
      let payload = {
        email: this.email,
        password: this.password,
      };

      endPoints
        .post("/login", payload)
        .then((response) => {
          this.messages.push(response.message);
          this.messageType = "success";
          cookies.set("auth-token", response.data.token);
        })
        .catch((error) => {
          this.messages.push(error.response.data.message);
          this.messageType = "danger";
        })
        .finally(() => {
          this.$router.push("/home");
        });
    },
  },
};
</script>

<style>
html,
body {
  height: 100%;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
