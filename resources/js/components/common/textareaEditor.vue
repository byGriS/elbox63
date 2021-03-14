<template>
    <ckeditor
      :editor="editor"
      v-model="text"
      :config="editorConfig"
      tag-name="textarea"
      :name="name"
    ></ckeditor>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import "@ckeditor/ckeditor5-build-classic/build/translations/ru";

export default {
  props: ["name", "value"],
  data() {
    return{
      editor: ClassicEditor,
      editorConfig: {
        language: "ru",
        toolbar: [ 'heading','|','bold','italic','link','bulletedList','numberedList','|','blockQuote','insertTable','undo','redo' ]
      },
      text: ""
    }
  },
  beforeMount(){
    this.text = this.value;
  }
};
</script>

<style scoped>
.ck-editor__editable_inline {
    min-height: 400px;
}
</style>