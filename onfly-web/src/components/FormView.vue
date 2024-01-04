<template>
  <form @submit.stop.prevent="submit" class="row g-3">
    <div class="col-md-6">
      <input
        v-model="data.description"
        type="text"
        class="form-control"
        :class="{ 'is-invalid': error.description }"
        placeholder="Descrição"
        aria-label="Descrição"
      />
      <div class="invalid-feedback" v-if="error.description">
        {{ error.description[0] }}
      </div>
    </div>
    <div class="col-md-6">
      <input
        v-model="data.date"
        type="date"
        class="form-control"
        :class="{ 'is-invalid': error.date }"
        aria-label="Last name"
      />
      <div class="invalid-feedback" v-if="error.date">{{ error.date[0] }}</div>
    </div>
    <div class="col-md-6">
      <input
        v-model="data.value"
        type="text"
        class="form-control"
        :class="{ 'is-invalid': error.value }"
        placeholder="Valor"
        aria-label="Valor"
      />
      <div class="invalid-feedback" v-if="error.value">{{ error.value[0] }}</div>
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
    errors: {
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
    errors(newData) {
      if (newData) {
        this.error = { ...newData };
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
      error: {},
    };
  },
  methods: {
    submit() {
      this.$emit("handler-submit", JSON.stringify(this.data));
    },
  },
};
</script>
