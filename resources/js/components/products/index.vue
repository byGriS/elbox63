<template>
  <div class="p-2">
    <h3>Товары</h3>
    <div class="content-menu d-flex my-3">
      <a class="btn btn-sm btn-primary mx-1" href="/admin/products/create">Добавить товар</a>
      <button
        class="btn btn-sm btn-danger mx-1"
        :disabled="isSelectAny"
        @click="deleteSelected()"
      >
        Удалить выделенные
      </button>
    </div>
    <div class="my-2 content-table-wrap">
      <div class="content-table-header d-flex">
        <div class="select">
          <input type="checkbox" v-model="isSelectAll" @click="selectAll()" />
        </div>
        <div class="flex-fill d-flex">
          <div class="col-10">Название</div>
          <div class="col-2">Дата создания</div>
        </div>
      </div>
      <div class="content-table-body">
        <div
          class="content-table-row d-flex"
          v-for="product in products"
          :key="product.id"
        >
          <div class="select">
            <input
              type="checkbox"
              v-model="product.selected"
              @click="select(product)"
            />
          </div>
          <a :href="getHref(product)" class="flex-fill d-flex">
            <div class="col-10 px-2">{{ product.title }}</div>
            <div class="col-2 text-center">{{ product.created_at }}</div>
          </a>
        </div>
      </div>
      <pagination :data="inputData"></pagination>
    </div>
  </div>
</template>

<script>
import Pagination from "../common/pagination";

export default {
  props: ["inputData", "hrefToItem"],
  components: {
    Pagination,
  },
  data() {
    return {
      products: [],
      isSelectAll: false,
    };
  },
  computed: {
    isSelectAny() {
      let result = false;
      this.products.forEach((element) => {
        if (element.selected) result = true;
      });
      return !result;
    },
  },
  methods: {
    getHref(product) {
      return this.hrefToItem.replace("#", product.id);
    },
    selectAll() {
      this.isSelectAll = !this.isSelectAll;
      this.products.forEach((element) => {
        element.selected = this.isSelectAll;
      });
    },
    select(product) {
      this.isSelectAll = false;
    },
    deleteSelected() {
      window.axios
        .post("/admin/products/deleteSelected", {
          data: this.products.filter((elem) => {
            return elem.selected;
          }),
        })
        .then((response) => {
          window.location.reload();
        });
    },
  },
  beforeMount() {
    this.inputData.data.forEach((element) => {
      this.products.push(Object.assign(element, { selected: false }));
    });
  },
};
</script>