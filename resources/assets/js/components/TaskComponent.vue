<template>
  <div class="row justify-content-center mt-5">
   <div class="col-md-8">
      <div class="card border-info">
      <div class="card-header bg-info text-white">
        Header <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modelId">+</a>
      </div>
      <div class="card-body">
        <ul>
          <li v-for="(item,index) in tasks.data" :key="index">
           {{index +1}}- -{{item.name}}
          </li>
        </ul>
      </div>
      <div class="card-footer border-info">
        <pagination :data="tasks" @pagination-change-page="getResults"></pagination>

      </div>
    </div>
   </div>

   <add-modal @recordAdded="refreshData"></add-modal>
  </div>
</template>
<script>
const AddModal = require("./AddModal.vue");
Vue.component("pagination", require("laravel-vue-pagination"));

export default {
  components: {
    "add-modal": AddModal
  },
  data() {
    return {
      tasks: {},
      data: ""
      // pagination: {}
    };
  },
  created() {
    // this.fetchData();
    var url = "http://localhost/vlp-3/public/task/";
    // var url = "http://127.0.0.1:8000/task"
    let vm = this;
    axios
      .get(url)
      .then(res => {
        this.tasks = res.data;
        // console.log(res.data.data);
        // var data = res.data;
        // console.log(res.data);
        // vm.makePagination(res.meta, res.links);
      })
      .catch(err => console.log(err));
  },
  methods: {
    getResults(page = 1) {
      axios
        .get("http://localhost/vlp-3/public/task?page=" + page)
        .then(response => {
          this.tasks = response.data;
          // console.log(response.data);
        });
    },
    refreshData(data) {
      this.tasks = data.data;
    }
  }
};
</script>

