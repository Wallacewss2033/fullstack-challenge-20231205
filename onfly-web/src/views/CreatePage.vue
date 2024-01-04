<template>
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-between box-create">
        <h2>Criar</h2>
        <button type="button" class="btn btn-primary" @click="handlerRedirect()">
          Voltar
        </button>
      </div>
    </div>
  </div>
  <div class="container">
    <form-view :errors="errors" @handler-submit="handlerSubmit" />
  </div>
</template>

<script>
import FormView from "@/components/FormView.vue";
import endPoints from "@/service/endPoints";
export default {
  name: "CreatePage",
  components: {
    FormView,
  },
  data() {
    return {
      errors: {},
    };
  },
  methods: {
    handlerSubmit(data) {
      endPoints
        .post("/expenses", data, true)
        .then((response) => {
          this.$router.push({
            path: "/home",
            query: {
              message: response.message,
              messageType: "success",
            },
          });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
    handlerRedirect() {
      this.$router.go(-1);
    },
  },
};
</script>
<style>
.box-create {
  border-bottom: 1px solid #bcbcbc;
  padding: 10px;
  margin-bottom: 25px;
}
</style>
