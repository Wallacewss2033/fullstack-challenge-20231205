<template>
  <div :class="`alert alert-${typeNotify} alert-dismissible fade show`" role="alert">
    {{ message }}
    <button
      type="button"
      class="btn-close"
      data-bs-dismiss="alert"
      aria-label="Close"
      @click="close()"
    ></button>
  </div>
</template>

<script>
export default {
  props: {
    message: { type: String, default: "algo saiu errado." },
    typeNotify: {
      Type: String,
      default: "danger",
      validator: function (value) {
        return ["success", "warning", "danger"].indexOf(value) !== 1;
      },
      require: true,
    },
  },
  name: "NotifyView",
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>
