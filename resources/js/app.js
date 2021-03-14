require('./bootstrap');

window.toggleSidebar = function() {
  var sidebar = document.getElementsByClassName("sidebar")[0];
  if (sidebar.style.left === "0px") {
    sidebar.style.left = '';
  } else {
    sidebar.style.left = "0px";
  }
}

import Vue from 'vue';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import constants from './constants.js'

Vue.use(CKEditor);
Vue.prototype.$constants = constants;

import BtnDelete from './components/common/btnDelete';
import InputPhotos from './components/common/InputPhotos'
import TextareaEditor from './components/common/textareaEditor';
import ProductsIndex from './components/products/index';

const app = new Vue({
  el: '#app',
  components: {
    BtnDelete,
    InputPhotos,
    TextareaEditor,
    ProductsIndex,
  }
})