<template>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Descrição</th>
        <th scope="col">Data</th>
        <th scope="col">Valor</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr :key="expense.id" v-for="(expense, i) in data">
        <th scope="row">{{ ++i }}</th>
        <td>{{ expense.description }}</td>
        <td>{{ expense.format_date }}</td>
        <td>{{ `R$${expense.format_value}` }}</td>
        <td class="d-flex justify-content-center">
          <a type="button" class="btn btn-primary mx-1" @click="showItem(expense.id)"
            ><i class="bi bi-eye"></i
          ></a>
          <a type="button" class="btn btn-success mx-1" @click="editItem(expense.id)"
            ><i class="bi bi-pencil-square"></i
          ></a>
          <a type="button" class="btn btn-danger mx-1" @click="deleteItem(expense.id)"
            ><i class="bi bi-trash"></i
          ></a>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "TableView",
  props: {
    data: Array,
  },
  methods: {
    editItem(id) {
      this.$emit("update", id);
    },
    showItem(id) {
      this.$emit("show", id);
    },
    deleteItem(id) {
      this.$emit("delete", id);
    },
  },
};
</script>

<style></style>
