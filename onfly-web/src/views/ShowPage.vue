<template>
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-between box-create">
        <h2>Detalhes</h2>
        <button type="button" class="btn btn-primary" @click="handlerRedirect()">
          Voltar
        </button>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        <label class="form-label"
          ><strong>Descrição: </strong> {{ expense.description }}
        </label>
      </div>
      <div class="col">
        <label class="form-label"><strong>Data: </strong> {{ expense.date }} </label>
      </div>
      <div class="col">
        <label class="form-label"><strong>Valor: </strong> {{ expense.value }} </label>
      </div>
    </div>
  </div>
</template>

<script>
import endPoints from "@/service/endPoints";
export default {
  name: "ShowPage",
  data() {
    return {
      expense: {},
      id: this.$route.query.id,
    };
  },
  mounted() {
    this.handlerGet();
  },
  methods: {
    handlerGet() {
      endPoints
        .get(`/expenses/${this.id}`, "", true)
        .then((response) => {
          this.expense = response.data;
        })
        .catch((error) => {
          console.error(error);
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
