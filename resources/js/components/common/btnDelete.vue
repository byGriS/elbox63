<template>
  <a class="btn btn-sm btn-danger" @click="onClick()">Удалить</a>
</template>

<script>
export default {
  props: ["hrefDelete", 'hrefBack'],
  methods: {
    onClick() {
      if (confirm("Вы действительно хотите удалить?"))
        window.axios
          .delete(this.hrefDelete)
          .then(response => {
            window.location.href = this.hrefBack;
          })
    },
  },
};
</script>