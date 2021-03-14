<template>
  <div>
    <div class="photo row my-1">
      <div
        class="col-4 d-flex"
        v-for="(photo, index) in photosLocal"
        :key="photo.id"
      >
        <input
          type="text"
          class="d-none"
          :name="'photos[' + index + '][id]'"
          :value="photo.id"
        />
        <input
          type="text"
          class="d-none"
          :name="'photos[' + index + '][src]'"
          v-model="photo.src"
        />
        <div class="col-10 p-0">
          <img :src="photo.src" />
        </div>
        <div class="col-2 p-0">
          <div class="btn btn-sm btn-danger" @click="removePhoto(index)">X</div>
        </div>
      </div>
    </div>
    <div class="">
      <label for="addImage" class="select-file-label btn btn-sm btn-info my-1"
        >Добавить фото</label
      >
      <input
        type="file"
        class="select-file-input"
        id="addImage"
        accept="image/png, image/jpeg"
        multiple
        @change="selectFile"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: ["photos"],
  data() {
    return {
      photosLocal: [],
    };
  },
  methods: {
    addPhoto() {
      this.photosLocal.push({ src: "" });
    },
    removePhoto(index) {
      this.photosLocal.splice(index, 1);
    },
    selectFile(event) {
      if (event.target.files.length == 0) {
        return;
      }
      var formData = new FormData();
      for (var i = 0; i < event.target.files.length; i++) {
        formData.append("image[]", event.target.files[i]);
      }
      window.axios
        .post("/admin/upload", formData, {
          headers: { "Content-Type": "multipart/form-data" },
        })
        .then((response) => {
          response.data.forEach((element) => {
            this.photosLocal.push({ src: "/storage/" + element });
          });
          document.getElementById("addImage").value = "";
        });
    },
  },
  beforeMount() {
    this.photos.forEach((element) => {
      this.photosLocal.push(Object.assign(element, {}));
    });
  },
};
</script>

<style scoped>
img {
  width: 100%;
}
.select-file-label {
  border-radius: 4px;
  text-align: center;
  height: 30px;
  padding: 3px;
  margin: 0;
  width: 150px;
}
.select-file-input {
  opacity: 0;
  position: absolute;
  width: 150px;
  display: none;
}
</style>