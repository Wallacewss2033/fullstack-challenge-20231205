<template>
  <div class="container">
    <notify-view
      v-show="!!this.$route.query.message"
      :message="this.$route.query.message"
      :typeNotify="this.$route.query.messageType"
      @close="handlerClose"
    />
    <div class="row">
      <div class="d-flex justify-content-between box-create">
        <h2>Despesas</h2>
        <button type="button" class="btn btn-success" @click="handlerRedirect()">
          Criar
        </button>
      </div>
    </div>
  </div>
  <div class="container">
    <table-view
      :data="expenses"
      @delete="handlerDelete"
      @update="handlerUpdate"
      @show="handlerShow"
    />
  </div>
</template>

<script>
import TableView from "@/components/TableView.vue";
import endPoints from "@/service/endPoints";
import NotifyView from "../components/NotifyView.vue";
export default {
  name: "HomePage",
  components: { TableView, NotifyView },
  data() {
    return {
      expenses: [],
    };
  },
  mounted() {
    this.handlerGet();
  },
  methods: {
    handlerGet() {
      endPoints
        .get("/expenses", "", true)
        .then((response) => {
          this.expenses = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },

    handlerDelete(id) {
      endPoints
        .delete(`/expenses/${id}`, "", true)
        .then(() => {
          this.$router.replace({
            path: "/home",
            query: {
              message: "Despesa Excluída.",
              messageType: "success",
            },
          });
        })
        .catch((error) => {
          console.error(error);
        })
        .finally(() => {
          this.handlerGet();
        });
    },

    handlerUpdate(id) {
      this.$router.push({ path: "/edit", query: { id } });
    },

    handlerShow(id) {
      this.$router.push({ path: "/show", query: { id } });
    },

    handlerRedirect() {
      this.$router.push("/create");
    },

    handlerClose() {
      this.$router.replace({ path: "/home" });
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
