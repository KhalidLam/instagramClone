<template>
  <div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <strong>Laravel Vue JS Infinite Scroll - codechief.org</strong>
          </div>

          <div class="card-body">
            <div>
                <img v-for="item in list" :key="item.id" class="card-img" v-bind:src="'http://127.0.0.1:8000/storage/'+item.image" alt="post image" style="max-height: 767px">
                <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div>
        <div v-for="item in list" :key="item.id" class="card mx-auto custom-card mb-5" id="prova">

            <div class="card-header d-flex justify-content-between align-items-center bg-white px-3 py-3">
                <div class="d-flex align-items-center">
                    <a href="/profile/" style="width: 32px; height: 32px;">
                        <img src="" class="rounded-circle w-100">
                    </a>
                    <a href="/profile/" class="my-0 ml-3 text-dark text-decoration-none">KhalidLam</a>
                </div>
                <div  class="card-dots">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
            </div>


            <img class="card-img" v-bind:src="'http://127.0.0.1:8000/storage/'+item.image" alt="post image" style="max-height: 767px">

            <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>
        </div>
  </div>-->
</template>

<script>
export default {
  data() {
    return {
      list: [],
      page: 1,
    };
  },
  methods: {
    infiniteHandler($state) {
      this.$http
        .get("/posts?page=" + this.page)

        .then((response) => {
          return response.json();
        })
        .then((data) => {
          $.each(data.data, (key, value) => {
            this.list.push(value);
          });

          $state.loaded();
        });

      this.page = this.page + 1;
    },
  },
};
</script>