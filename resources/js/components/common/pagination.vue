<template>
  <div v-if="isShow" class="pagination d-flex justify-content-center">
    <a :href="data.current_page == 1? null :data.first_page_url" :class="{'disabled': data.current_page == 1}"> &lt;&lt;</a>
    <a :href="data.prev_page_url" :class="{'disabled': data.current_page == 1}"> &lt; </a>
    <a
      v-for="index in 5"
      :key="index"
      :class="{ 'd-none': data.current_page + (index - 3) < 1 || data.current_page + (index - 3) > data.last_page, 'cur':  data.current_page ==data.current_page + (index - 3) }"
      :href="
        data.links[data.current_page + (index - 3)]
          ? data.links[data.current_page + (index - 3)].url
          : ''
      "
    >
      {{ data.current_page + (index - 3) }}
    </a>
    <a :href="data.next_page_url" :class="{'disabled': data.current_page == data.last_page}"> &gt; </a>
    <a :href="data.current_page == data.last_page ? null : data.last_page_url" :class="{'disabled': data.current_page == data.last_page}"> &gt;&gt; </a>
  </div>
</template>
<script>
export default {
  props: ["data"],
  computed: {
    isShow(){
      return this.data.last_page > 1;
    }
  },
};
</script>

<style scoped>
.pagination {
  margin: 10px;
}
.pagination .cur{
  background: rgb(40, 91, 186)!important;
  color: #eee;
}
.pagination .disabled{
  background: rgb(146, 146, 146)!important;
  color: #eee;
  cursor:default!important;
}
.pagination a {
  padding: 3px;
  border: 1px solid #333;
  align-content: center;
  width: 30px;
  text-align: center;
  margin: 0 3px;
  color: #111;
  transition: 0.3s;
  cursor: pointer;
  text-decoration: none;
}
.pagination a:hover {
  text-decoration: none;
  background:rgb(83, 166, 211);
}
.pagination a:first-child, .pagination a:last-child {
  padding-left: 0;
  letter-spacing: -4px;
}
</style>