<template>
  <form @submit.stop.prevent="submit" class="row g-3">
    <div class="col-md-6">
      <input
        ref="meuInput"
        v-model="data.description"
        type="text"
        class="form-control"
        placeholder="Descrição"
        aria-label="Descrição"
      />
    </div>
    <div class="col-md-6">
      <input
        v-model="data.date"
        type="date"
        class="form-control"
        aria-label="Last name"
      />
    </div>
    <div class="col-md-6">
      <input
        v-model="data.value"
        type="text"
        class="form-control"
        placeholder="Valor"
        aria-label="Valor"
      />
    </div>
    <div class="col-md-12">
      <button type="submit" class="d-flex btn btn-primary">criar</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "FormView",
  props: {
    expense: {
      type: Object,
      required: false,
    },
  },
  watch: {
    expense(newData) {
      if (newData) {
        this.data = { ...newData };
      }
    },
  },
  data() {
    return {
      data: {
        description: "",
        date: "",
        value: null,
      },
    };
  },
  methods: {
    submit() {
      this.$emit("handler-submit", JSON.stringify(this.data));
    },
  },
};
</script>
